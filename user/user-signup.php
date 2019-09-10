<?php
include_once(__DIR__ . '../../global-php-functions/functions.php');
if ($_POST) {
    if (empty($_POST['email'])) {
        sendErrorMessage('Missing email', __LINE__);
    }
    if (empty($_POST['userPass1'])) {
        sendErrorMessage('Missing password', __LINE__);
    }
    if (empty($_POST['userPass2'])) {
        sendErrorMessage('Missing repeated password', __LINE__);
    }
    $sEmail = $_POST['email'];
    $sPassword1 = $_POST['userPass1'];
    $sPassword2 = $_POST['userPass2'];
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
    foreach ($jData->users as $sUserId => $sUser) {
        if ($sUser->email == $sEmail) {
            sendErrorMessage('User with this email already exists', __LINE__);
        }
    }
    $jUser = new stdClass();
    $jUser->email = $sEmail;
    $jUser->password = $sPassword1;
    $jData->users->$iUniqueId = $jUser;

    encodeAndPutToFile($sDataPath, $jData);

    echo '{"status":1,"message":"success", "line": ' . __LINE__ . '}';
    header('Location: user-login-form.php?from=success');
}
