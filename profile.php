
<?php
$sPageTitle = 'Profile';
include_once(__DIR__ . '/components/html-top.php');
include_once(__DIR__ . '/components/html-nav.php');
echo 'User:' . json_encode($_SESSION['userId']) . ', with properties:' . json_encode($_SESSION['userProps']);
?>


<?php
include_once(__DIR__ . '/components/html-bottom.php');
