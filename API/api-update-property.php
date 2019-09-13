<?php
include_once(__DIR__ . '/../global-php-functions/functions.php');
session_start();
$sProfileId = $_SESSION['userId'];
$sPropertyId = $_POST['propId'];
$sKeyToUpdate = $_POST['key'];
$sNewValue = $_POST['value'];

$sDataPath = __DIR__ . '/../data/data.json';
$jData = getAndDecodeToJSON($sDataPath);
$jData->agents->$sProfileId->properties->$sPropertyId->$sKeyToUpdate = $sNewValue;
encodeAndPutToFile($sDataPath, $jData);
echo '{"status": 1, "message":"success, property updated"}';
