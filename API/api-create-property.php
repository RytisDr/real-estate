<?php
include_once(__DIR__ . '/../global-php-functions/functions.php');
session_start();
$sAgentId = $_SESSION['userId'];
$sUniqueId = uniqid();

$sNewTitleValue = $_POST['title'];
$sNewPriceValue = $_POST['price'];
$sImageSource = $_POST['mainPropertyImg'];
$sDataPath = __DIR__ . '/../data/data.json';

$jData = getAndDecodeToJSON($sDataPath);

if (empty($_POST['mainPropertyImg'])) {
    $sImageSource = 'default-property-image.jpg';
}
$jProperty = new stdClass();
$jProperty->title = $sNewTitleValue;
$jProperty->price = $sNewPriceValue;
$jProperty->image = $sImageSource;

$jData->agents->$sAgentId->properties->$sUniqueId = $jProperty;

encodeAndPutToFile($sDataPath, $jData);
echo $jData;
