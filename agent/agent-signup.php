<?php
include_once(__DIR__ . '../../global-php-functions/functions.php');
if ($_POST) {
    if (empty($_POST['email'])) {
        sendErrorMessage('Missing email', __LINE__);
    }
    if (empty($_POST['agentPass1'])) {
        sendErrorMessage('Missing password', __LINE__);
    }
    if (empty($_POST['agentPass2'])) {
        sendErrorMessage('Missing repeated password', __LINE__);
    }
    $sEmail = $_POST['email'];
    $sPassword1 = $_POST['agentPass1'];
    $sPassword2 = $_POST['agentPass2'];
    if (!filter_var($sEmail, FILTER_VALIDATE_EMAIL)) {
        sendErrorMessage('Email is invalid', __LINE__);
    }
    if (strlen($sPassword1) < 6 || strlen($sPassword2) < 6) {
        sendErrorMessage('Password is too short, must be at least 6 characters', __LINE__);
    }
    if (strlen($sPassword1) > 15 || strlen($sPassword2) > 15) {
        sendErrorMessage('Password is too long, must be 15 characters at most', __LINE__);
    }
    if ($sPassword1 !== $sPassword2) {
        sendErrorMessage('Passwords do no match', __LINE__);
    }
    $sDataPath = __DIR__ . '../../data/data.json';

    $iUniqueId = uniqid();
    $jData = getAndDecodeToJSON($sDataPath);
    //CHECK IF EMAIL EXISTS IN DATA
    foreach ($jData->agents as $sAgentId => $sAgent) {
        if ($sAgent->email == $sEmail) {
            sendErrorMessage('User with this email already exists', __LINE__);
        }
    }
    $jAgent = new stdClass();
    $jAgent->email = $sEmail;
    $jAgent->password = $sPassword1;
    $jData->agents->$iUniqueId = $jAgent;

    encodeAndPutToFile($sDataPath, $jData);
    header('Location: agent-login-form.php?from=success');
}
