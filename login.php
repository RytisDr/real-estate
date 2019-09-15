<?php
$sPageTitle = 'Login';
$cssPath = 'css/main.css';
include_once(__DIR__ . '/components/html-top.php');

include_once(__DIR__ . '/components/html-nav.php');
?>
<div id="loginBodyCont">
    <a href="user/user-login-form">As a Buyer</a>
    <a href="agent/agent-login-form">As a Seller</a>
</div>
<script src="JS/activeLink.js"> </script>
<script>
    removeActiveClass()
    setActiveLink("navLogInOut");
</script>
<?php
include_once(__DIR__ . '/components/html-bottom.php');
