<?php include_once(__DIR__ . '../../components/html-top.php');
?>

<form id="agentForm" method="POST">
    <input type="text" placeholder="email" name="email" id="inputEmail" value="">
    <input type="password" placeholder="Password" name="agentPass1" id="pass1" value="">
    <input type="password" placeholder="Repeat the Password" name="agentPass2" id="pass2" value="">
    <button id="btnSignup">Sign Up</button>
</form>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="agent-signup.js"></script> -->
<?php
include_once(__DIR__ . '/agent-signup.php');
include_once(__DIR__ . '../../components/html-bottom.php')

?>