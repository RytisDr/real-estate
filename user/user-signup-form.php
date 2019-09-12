<?php
$sPageTitle = 'Sign up as a Buyer';
$cssPath = '../css/main.css';
include_once(__DIR__ . '../../components/html-top.php');

include_once(__DIR__ . '../../components/html-nav.php');
?>

<form id="userForm" method="POST">
    <input type="text" placeholder="email" name="email" id="inputEmail" value="">
    <input type="password" placeholder="Password" name="userPass1" id="pass1" value="">
    <input type="password" placeholder="Repeat the Password" name="userPass2" id="pass2" value="">
    <button id="btnSignup">Sign Up</button>
</form>
<?php
include_once(__DIR__ . '/user-signup.php');
include_once(__DIR__ . '../../components/html-bottom.php')

?>