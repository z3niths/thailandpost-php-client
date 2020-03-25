<?php

require_once('vendor/autoload.php');

use DPostInter\Authentication;
use DPostInter\DPostInterDeliveryInfo;
use DPostInter\DPostInterClient;


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$auth = new Authentication();
$dPostInter = new DPostInterClient($auth);

$dPostInter->login();
$dPostInter->getUserInfo();

$deliveryNoteObjs = [];
$deliveryNoteObj = new DPostInterDeliveryInfo();
$deliveryNoteObj->setDestinationCountry('US');
$deliveryNoteObj->setWeight(10);
$deliveryNoteObj->setServiceCode(16089);
$deliveryNoteObj->setSenderName('A Company');
$deliveryNoteObj->setSenderTelephone('09999999');
$deliveryNoteObj->setSenderEmail('example@gmail.com');
$deliveryNoteObj->setSenderAddress('321/4');
$deliveryNoteObj->setSenderState('หลักสี่');
$deliveryNoteObj->setSenderCity('กรุทเทพ');
$deliveryNoteObj->setSenderPostalCode('10210');
$deliveryNoteObj->setSenderCountryCode('TH');
$deliveryNoteObj->setReceiverName('test reciever');
$deliveryNoteObj->setReceiverTelephone('09802222');
$deliveryNoteObj->setReceiverEmail('reciever@test.com');
$deliveryNoteObj->setReceiverAddress('99/99 river');
$deliveryNoteObj->setReceiverState('Manhattan');
$deliveryNoteObj->setReceiverCity('New York');
$deliveryNoteObj->setReceiverPostalCode('10001');
$deliveryNoteObj->setCurrency('EUR');
$deliveryNoteObj->setItems('HS001');
$deliveryNoteObj->setQuantity(1);
$deliveryNoteObj->setTotalValue(100);
$deliveryNoteObj->setProduceFrom('TH');
$deliveryNoteObjs [] = $deliveryNoteObj;

$dPostInter->preload($deliveryNoteObjs);
var_dump($deliveryNoteObjs);