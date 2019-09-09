<?php
$sPageTitle = 'Seller Login';
include_once(__DIR__ . '../../components/html-top.php');
?>
<form action="agent-login.php" method="POST">
    <input type="email" name="email" placeholder="email" value="a@a.com">
    <input type="password" name="password" placeholder="password" value="password">
    <button>Log In</button>
</form>
<?php
include_once(__DIR__ . '../../components/html-bottom.php');
