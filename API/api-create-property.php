<?php
$res = (object) array("success" => false);
include_once(__DIR__ . '/../global-php-functions/functions.php');
session_start();
$sAgentId = $_SESSION['userId'];
$sAccType = $_SESSION['accType'];
$sUniquePropertyId = uniqid();
$sNewTitleValue = $_POST['title'];
$sNewPriceValue = intval($_POST['price']);
$sNewLongitudeValue = floatval($_POST['longitude']);
$sNewLatitudeValue = floatval($_POST['latitude']);
if ($_FILES) {
    $fNewPropertyImage = $_FILES['file']['name'];
    $sExtention = pathinfo($fNewPropertyImage, PATHINFO_EXTENSION);
    $sUniqueImageName = uniqid() . "." . $sExtention;
    move_uploaded_file(
        $_FILES['file']['tmp_name'],
        __DIR__ . "/../images/$sUniqueImageName"
    );
}
$sDataPath = __DIR__ . '/../data/data.json';

$jData = getAndDecodeToJSON($sDataPath);

if (empty($_FILES['file'])) {
    $sUniqueImageName = 'default-property-image.jpg';
}
//this escapes the warning of not existing objectand fixes error on first property creation
if (empty($jData->$sAccType->$sAgentId->properties)) {
    $jData->$sAccType->$sAgentId->properties = new stdClass();
    $jData->$sAccType->$sAgentId->properties->$sUniquePropertyId = $sUniquePropertyId;
}



$jProperty = new stdClass();
$jProperty->title = $sNewTitleValue;
$jProperty->price = $sNewPriceValue;
$jProperty->image = $sUniqueImageName;
$jProperty->geometry = new stdClass();
$jProperty->geometry->coordinates = new stdClass();
$jProperty->geometry->coordinates = [$sNewLongitudeValue, $sNewLatitudeValue];
$jProperty->geometry->type = new stdClass();
$jProperty->geometry->type = "Point";


$jData->$sAccType->$sAgentId->properties->$sUniquePropertyId = $jProperty;

encodeAndPutToFile($sDataPath, $jData);
$aDataToSendBack = array(
    "propertyId" => $sUniquePropertyId,
    "image" => $sUniqueImageName
);
echo json_encode($aDataToSendBack, JSON_PRETTY_PRINT);
