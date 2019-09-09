<?php
session_start();
if ($_SESSION) {
    header('Location: profile.php');
    exit;
}
include_once(__DIR__ . '../../global-php-functions/functions.php');

if (empty($_POST['email'])) {
    sendErrorMessage('Missing email', __LINE__);
}
if (empty($_POST['password'])) {
    sendErrorMessage('Missing password', __LINE__);
}
$sEmail = $_POST['email'];
$sPassword = $_POST['password'];

if (!filter_var($sEmail, FILTER_VALIDATE_EMAIL)) {
    sendErrorMessage('Email is invalid', __LINE__);
}

if (strlen($sPassword) < 6) {
    sendErrorMessage('Password is too short, must be at least 6 characters', __LINE__);
}
if (strlen($sPassword) > 15) {
    sendErrorMessage('Password is too long, must be 15 characters at most', __LINE__);
}
$sDataPath = __DIR__ . '../../data/data.json';

$jData = getAndDecodeToJSON($sDataPath);
foreach ($jData->agents as $sAgentId => $sAgent) {
    if ($sAgent->email == $sEmail && $sAgent->password == $sPassword) {
        $_SESSION['agentId'] = $sAgentId;
        header('Location: profile.php');
    }
}
