<?php
function sendErrorMessage($sErrorMessage, $iErrLineNumber)
{
    echo '{"status":0, "message":"' . $sErrorMessage . '", "line":' . $iErrLineNumber . '}';
    exit;
}
function getAndDecodeToJSON($sFilePath)
{
    $sjData = file_get_contents($sFilePath);
    $jData = json_decode($sjData);
    return $jData;
}
function encodeAndPutToFile($sFilePath, $jData)
{
    $sData = json_encode($jData, JSON_PRETTY_PRINT);
    file_put_contents($sFilePath, $sData);
}
