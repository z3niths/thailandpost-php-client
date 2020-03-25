<?php


namespace DPostInter;

use DPostInter\Interfaces\ISheetRenderer;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class SheetRenderer implements ISheetRenderer
{
    const SHEET_TITLE = 'Digital Post international';

    /** @var Worksheet */
    private $sheet = null;

    private $data;

    private const COLUMNS = [
        'A' => ['width' => 26, 'title' => 'รหัสประเทศปลายทาง'],
        'B' => ['width' => 26, 'title' => 'น้ำหนัก(กรัม)'],
        'C' => ['width' => 26, 'title' => 'บริการ'],
        'D' => ['width' => 26, 'title' => 'ประเภทสิ่งของ'],
        'E' => ['width' => 26, 'title' => 'ชื่อผู้ส่ง'],
        'F' => ['width' => 26, 'title' => 'เบอร์โทรผู้ส่ง'],
        'G' => ['width' => 26, 'title' => 'อีเมลล์ผู้ส่ง'],
        'H' => ['width' => 26, 'title' => 'ที่อยู่ผู้ส่ง'],
        'I' => ['width' => 26, 'title' => 'เขต/แขวง'],
        'J' => ['width' => 26, 'title' => 'จังหวัด'],
        'K' => ['width' => 26, 'title' => 'รหัสไปรษณีย์'],
        'L' => ['width' => 26, 'title' => 'รหัสประเทศ'],
        'M' => ['width' => 26, 'title' => 'ชื่อผู้รับ'],
        'N' => ['width' => 26, 'title' => 'เบอร์โทรผู้รับ'],
        'O' => ['width' => 26, 'title' => 'อีเมลล์ผู้รับ'],
        'p' => ['width' => 26, 'title' => 'ที่อยู่ผู้รับ'],
        'Q' => ['width' => 26, 'title' => 'เขต'],
        'R' => ['width' => 26, 'title' => 'เมือง'],
        'S' => ['width' => 26, 'title' => 'รหัสไปรษณีย์'],
        'T' => ['width' => 26, 'title' => 'ค่าเงิน'],
        'U' => ['width' => 26, 'title' => 'สิ่งของภายใน'],
        'V' => ['width' => 26, 'title' => 'จำนวน'],
        'W' => ['width' => 26, 'title' => 'น้ำหนัก'],
        'X' => ['width' => 26, 'title' => 'มูลค่า'],
        'Y' => ['width' => 26, 'title' => 'ประเทศกำเนิดสิ่งของ'],
    ];

    public function __construct($data)
    {
        $this->data = $data ?? null;
    }

    /**
     * @param Spreadsheet $spreadSheet
     */
    public function prepare(Spreadsheet $spreadSheet): void
    {
        $this->sheet = $spreadSheet->createSheet();
        $this->sheet->setTitle(self::SHEET_TITLE);
    }

    /**
     * @param Spreadsheet $spreadSheet
     */
    public function addHeaders(Spreadsheet $spreadSheet): void
    {
        foreach (self::COLUMNS as $letter => $column) {
            $this->sheet->setCellValue("{$letter}1", $column['title']);
        }
    }

    /**
     * @param Spreadsheet $spreadSheet
     */
    public function addRows(Spreadsheet $spreadSheet): void
    {
        $rowNum = 2;
        /* @var $item DPostInterDeliveryInfo */
        foreach ($this->data as $item) {
            $this->sheet->fromArray([
                $item->getDestinationCountry(),
                $item->getWeight(),
                $item->getServiceCode(),
                $item->getProductType(),
                $item->getSenderName(),
                $item->getSenderTelephone(),
                $item->getSenderEmail(),
                $item->getSenderAddress(),
                $item->getSenderState(),
                $item->getSenderCity(),
                $item->getSenderPostalCode(),
                $item->getSenderCountryCode(),
                $item->getReceiverName(),
                $item->getReceiverAddress(),
                $item->getReceiverTelephone(),
                $item->getReceiverEmail(),
                $item->getReceiverState(),
                $item->getReceiverCity(),
                $item->getReceiverPostalCode(),
                $item->getCurrency(),
                $item->getItems(),
                $item->getQuantity(),
                $item->getWeight(),
                $item->getTotalValue(),
                $item->getProduceFrom(),
            ], null, "A{$rowNum}");
            $rowNum++;
        }
    }

    /**
     * @param Spreadsheet $spreadSheet
     */
    public function finalise(Spreadsheet $spreadSheet): void
    {
        foreach (self::COLUMNS as $letter => $column) {
            $this->sheet->getColumnDimension($letter)->setWidth($column['width']);
        }
        $this->sheet->getStyle('A1:Y1')->getFont()->setBold(true);
    }
}
