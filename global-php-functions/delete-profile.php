<?php
include_once('functions.php');
session_start();
if (!$_SESSION) {
    header('Location: ../index.php');
}
include_once('functions.php');
$sProfileId = strval($_SESSION['userId']); ///set in login
$jData = getAndDecodeToJSON(__DIR__ . '../../data/data.json');
echo strval($_SESSION['accType']);
if ($_SESSION['accType'] == 'users') {
    unset($jData->users->$sProfileId);
};
if ($_SESSION['accType'] == 'agents') {
    unset($jData->agents->$sProfileId);
};


encodeAndPutToFile(__DIR__ . '../../data/data.json', $jData);
session_destroy();
header('Location: ../index.php');
