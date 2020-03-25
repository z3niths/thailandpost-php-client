<?php

namespace DPostInter;

use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DPostInterClient
{
    private $apiUrl = 'https://dpostinter.thailandpost.com/api/';
    private Authentication $authentication;
    private $grantType = 'password';
    private $sessionToken = null;
    private $tokenType = null;

    private $httpClient = null;
    private $cookies = null;
    private $userInfo = null;

    public function __construct(Authentication $authentication)
    {
        $this->authentication = $authentication;
        $this->cookies = new CookieJar();
        $this->httpClient = new Client([
            'headers' => [
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36',
                'Accept' => 'application/json, text/plain, */*',
                'Accept-Encoding' => 'gzip, deflate, br',
                'referer' => 'https://dpostinter.thailandpost.com/Login',
            ],
            //'debug' => true,
            'verify' => false,
            'cookies' => true
        ]);
    }

    public function endpoint(string $method): string
    {
        return $this->apiUrl . $method;
    }

    public function login()
    {
        echo "- Authenticating ...\n";
        try {
            $response = $this->httpClient->request('POST', $this->endpoint('token'), [
                'form_params' => [
                    'userName' => $this->authentication->getUsername(),
                    'password' => $this->authentication->getPassword(),
                    'grant_type' => $this->grantType
                ]
            ]);
        } catch (\Exception $e) {
            echo($e);
            return false;
        }
        $response = json_decode($response->getBody(), true);
        $this->sessionToken = $response['access_token'];
        $this->tokenType = $response['token_type'];
        echo "- Authenticated\n";

        return true;

    }

    public function getUserInfo()
    {
        $response = $this->httpClient->request('GET', $this->endpoint('Account/UserInfo'), [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->sessionToken,
            ],
        ]);
        $this->userInfo = json_decode($response->getBody(), true);
        echo "- Logged in as {$this->userInfo['UserName']}\n";
        return true;
    }

    public function preloadExcelFile($filePath)
    {
        echo "- Uploading ...\n";
        $response = $this->httpClient->request('POST', $this->endpoint('upload/excel'), [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->sessionToken,
            ],
            'multipart' => [
                [
                    'name' => 'unknown',
                    'contents' => fopen($filePath, 'r')
                ]
            ]
        ]);
        $response = json_decode($response->getBody(), true);
        if ($response['statusCode'] == 200) {
            echo '- Uploaded';
        }
        $uploadedFile = $response['userMessage'];

        $uploadedData = $this->httpClient->request('POST', $this->endpoint('service/preload/excel'), [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->sessionToken,
            ],
            'query' => [
                'fileName' => $uploadedFile
            ]
        ]);

        $uploadedData = json_decode($uploadedData->getBody(), true);
        return $uploadedData['items'];
    }

    public function preload($deliveryNotes)
    {
        //Create excel file from array
        $filePath = $this->createExcelFiles($deliveryNotes);
        $deliveryData = $this->preloadExcelFile($filePath);

        if (!empty($deliveryData)) {
            $i = 0;
            /* @var $deliveryNote DPostInterDeliveryInfo */
            foreach ($deliveryNotes as &$deliveryNote) {
                $deliveryNote->setTrackingNumber($deliveryData[$i]['barcode']);
                $deliveryNote->setLabel($deliveryData[$i]['url']);
                $i++;
            }
        }
    }

    public function createExcelFiles($deliveryNotes)
    {
        $renderer = new SheetRenderer($deliveryNotes);
        $spreadsheet = new Spreadsheet();
        $spreadsheet->removeSheetByIndex(0);
        $renderer->prepare($spreadsheet);
        $renderer->addHeaders($spreadsheet);
        $renderer->addRows($spreadsheet);

        $writer = new Xlsx($spreadsheet);
        $filePath = __DIR__ . '/../upload/d-post-inter-' . date('YmdHis') . '.xlsx';
        $writer->save($filePath);
        return $filePath;
    }
}