<?php

$sProfileId = $_POST['accId'];
$sPropertyId = $_POST['propId'];
$sKeyToUpdate = $_POST['key'];
$sNewValue = $_POST['value'];
include_once(__DIR__ . '/../global-php-functions/functions.php');

$sDataPath = __DIR__ . '/../data/data.json';
$jData = getAndDecodeToJSON($sDataPath);
$jData->agents->$sProfileId->properties->$sPropertyId->$sKeyToUpdate = $sNewValue;
encodeAndPutToFile($sDataPath, $jData);
echo '{"status": 1, "message":"success, property updated"}';
