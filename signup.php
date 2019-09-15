<?php
$sPageTitle = 'Signup';
$cssPath = 'css/main.css';
include_once(__DIR__ . '/components/html-top.php');

include_once(__DIR__ . '/components/html-nav.php');
?>
<div id="signupBodyCont">
    <a href="user/user-signup-form">As a Buyer</a>
    <a href="agent/agent-signup-form">As a Seller</a>
    <script src="JS/activeLink.js"> </script>
</div>
<script>
    removeActiveClass()
    setActiveLink("navSignup");
</script>
<?php
include_once(__DIR__ . '/components/html-bottom.php');
