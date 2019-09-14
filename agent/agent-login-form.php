<?php
if (!empty($_SESSION)) {
    header('Location: ../profile.php');
}
$sPageTitle = 'Seller Login';
$cssPath = '../css/main.css';
include_once(__DIR__ . '../../components/html-top.php');
include_once(__DIR__ . '../../components/html-nav.php');
?>
<form method="POST">
    <input type="email" name="email" placeholder="email" value="r.drazdauskas@gmail.com">
    <input type="password" name="password" placeholder="passme" value="passme">
    <button>Log In</button>
</form>
<?php
include_once(__DIR__ . '/agent-login.php');
include_once(__DIR__ . '../../components/html-bottom.php');
