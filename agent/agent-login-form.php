<?php
$sPageTitle = 'Seller Login';
include_once(__DIR__ . '../../components/html-top.php');
?>
<form method="POST">
    <input type="email" name="email" placeholder="email" value="a@a.com">
    <input type="password" name="password" placeholder="passme" value="passme">
    <button>Log In</button>
</form>
<?php
include_once(__DIR__ . '/agent-login.php');
include_once(__DIR__ . '../../components/html-bottom.php');
