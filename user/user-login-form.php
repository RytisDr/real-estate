<?php
if (!empty($_SESSION)) {
    header('Location: ../profile.php');
}
$sPageTitle = 'Buyer Login';
$cssPath = '../css/main.css';
include_once(__DIR__ . '../../components/html-top.php');
include_once(__DIR__ . '../../components/html-nav.php');
?>
<div id="userLoginBodyCont">
    <form method="POST">
        <input type="email" name="email" placeholder="email" value="z@z.com">
        <input type="password" name="password" placeholder="pass12" value="pass12">
        <button>Log In</button>
    </form>
    <script src="../JS/activeLink.js"> </script>
    <script>
        removeActiveClass()
        setActiveLink("navLogInOut");
    </script>
</div>
<?php
include_once(__DIR__ . '/user-login.php');
include_once(__DIR__ . '../../components/html-bottom.php');
