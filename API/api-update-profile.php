<?php
session_start();

$accType = $_SESSION['accType'];
$sProfileId = $_SESSION['userId'];
$sKeyToUpdate = $_POST['key'];
$sNewValue = $_POST['value'];
include_once(__DIR__ . '/../global-php-functions/functions.php');

$sDataPath = __DIR__ . '/../data/data.json';

$jData = getAndDecodeToJSON($sDataPath);

//TO DO: VALIDATION OF DATA
//update the data
if (empty($jData->$accType->$sProfileId->$sKeyToUpdate)) {
    $jData->$accType->$sProfileId->$sKeyToUpdate = $sKeyToUpdate;
}
$jData->$accType->$sProfileId->$sKeyToUpdate = $sNewValue;
encodeAndPutToFile($sDataPath, $jData);
echo '{"status": 1, "message":"success, account updated"}';
