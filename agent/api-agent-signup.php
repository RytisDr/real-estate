<?php
include_once(__DIR__ . '../../global-api/functions.php');
if (empty($_POST['email'])) {
    sendErrorMessage('missing email', __LINE__);
}
if (empty($_POST['agentPass1'])) {
    sendErrorMessage('missing password', __LINE__);
}
if (empty($_POST['agentPass2'])) {
    sendErrorMessage('missing repeated password', __LINE__);
}
$sEmail = $_POST['email'];
$sPassword1 = $_POST['agentPass1'];
$sPassword2 = $_POST['agentPass2'];
if (strlen($sPassword1) < 6 || strlen($sPassword2) < 6) {
    sendErrorMessage('password is too short, at least 6 characters', __LINE__);
}
if (strlen($sPassword1) > 15 || strlen($sPassword2) > 15) {
    sendErrorMessage('password is too long, 15 characters at most', __LINE__);
}
if ($sPassword1) {
    sendErrorMessage('password is too long, 15 characters at most', __LINE__);
}
