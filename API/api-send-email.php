<?php
session_start();
include_once(__DIR__ . '/../global-php-functions/functions.php');
if (!$_SESSION) {
    sendErrorMessage('Cannot send email', __LINE__);
}
$sUserEmail = $_SESSION['userProps']->email;
$sAgentEmail = $_POST['agentEmail'];
$sPropertyTitle = strval($_POST['propTitle']);
$sPropertyPrice = strval($_POST['propPrice']);
$sPropertyImg = $_POST['propImg'];
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'src/PHPMailer.php';
require 'src/Exception.php';
require 'src/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
$mail->AddEmbeddedImage(__DIR__ . "/../$sPropertyImg", 'Property'); //embed an image in the email
try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'php.auto.sender.email@gmail.com';                     // SMTP username
    $mail->Password   = 'passout112';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('php.auto.sender.email@gmail.com', 'Dont-Reply');
    $mail->addAddress("$sAgentEmail", '');     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Property Interest';
    $mail->Body    = "Hello, user with email $sUserEmail has shown interest in a property: 
                    <img src='cid:Property' alt='Main image of the property.'>
                    <h1>$sPropertyTitle</h1>
                    <h1>Price:$ $sPropertyPrice</h1>";
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent."; /* Mailer Error: {$mail->ErrorInfo} */
}
