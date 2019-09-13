<?php
include_once(__DIR__ . '/../global-php-functions/functions.php');
session_start();
if (empty($_SESSION['userId']) || empty($_POST['propId'])) {
    sendErrorMessage('Cannot delete property.', __LINE__);
}
$sUserId = $_SESSION['userId'];
$sPropertyId = $_POST['propId'];

$sDataPath = __DIR__ . '/../data/data.json';
$jData = getAndDecodeToJSON($sDataPath);
$sImageName = $jData->agents->$sUserId->properties->$sPropertyId->image;
unset($jData->agents->$sUserId->properties->$sPropertyId);
if ($sImageName != 'default-property-image.jpg') {
    unlink(__DIR__ . "/../images/$sImageName");
}
encodeAndPutToFile($sDataPath, $jData);
echo '{"status": 1, "message":"success, property deleted"}';
