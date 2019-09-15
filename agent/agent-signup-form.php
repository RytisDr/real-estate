<?php
$sPageTitle = 'Sign up as a Seller';
$cssPath = '../css/main.css';
include_once(__DIR__ . '../../components/html-top.php');
include_once(__DIR__ . '../../components/html-nav.php');
?>
<div id="agentSignupBodyCont">
    <form class="signupForm" id="agentForm" method="POST">
        <input type="text" placeholder="email" name="email" id="inputEmail" value="">
        <input type="password" placeholder="Password" name="agentPass1" id="pass1" value="">
        <input type="password" placeholder="Repeat the Password" name="agentPass2" id="pass2" value="">
        <button id="btnSignup">Sign Up</button>
    </form>
</div>
<script src="../JS/activeLink.js"> </script>
<script>
    removeActiveClass()
    setActiveLink("navSignup");
</script>
<?php
include_once(__DIR__ . '/agent-signup.php');
include_once(__DIR__ . '../../components/html-bottom.php')
?>