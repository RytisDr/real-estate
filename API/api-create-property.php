<?php
include_once(__DIR__ . '/../global-php-functions/functions.php');
session_start();
$sAgentId = $_SESSION['userId'];
$sUniquePropertyId = uniqid();
$sNewTitleValue = $_POST['title'];
$sNewPriceValue = intval($_POST['price']);
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
$jProperty = new stdClass();
$jProperty->title = $sNewTitleValue;
$jProperty->price = $sNewPriceValue;
$jProperty->image = $sUniqueImageName;

if (empty($jData->agents->$sAgentId->properties)) {
    $jData->agents->$sAgentId->properties;
}
$jData->agents->$sAgentId->properties->$sUniquePropertyId = $jProperty;

encodeAndPutToFile($sDataPath, $jData);
$aDataToSendBack = array(
    "propertyId" => $sUniquePropertyId,
    "image" => $sUniqueImageName
);
echo json_encode($aDataToSendBack, JSON_PRETTY_PRINT);
