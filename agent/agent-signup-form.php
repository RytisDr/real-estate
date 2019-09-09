<?php include_once(__DIR__ . '../../components/html-top.php');
?>

<form id="agentForm">
    <input type="text" placeholder="email" name="email" id="inputEmail" value="" required>
    <input type="password" placeholder="Password" name="agentPass1" id="pass1" value="" required>
    <input type="password" placeholder="Repeat the Password" name="agentPass2" id="pass2" value="" required>
    <button id="btnSignup">Sign Up</button>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="agent-signup.js"></script>
<?php
include_once(__DIR__ . '../../components/html-bottom.php') ?>