<?php
function sendErrorMessage($sErrorMessage, $iErrLineNumber)
{
    echo '{"status":0, "message":"' . $sErrorMessage . '", "line":' . $iErrLineNumber . '}';
    exit;
}
