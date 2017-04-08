<?php
require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer(true);

$mail->SMTPDebug = 3;                               // Enable verbose debug output

$name     = $_POST['name'];
$companyname     = $_POST['companyname'];
$email    = $_POST['email'];
$tel    = $_POST['tel'];
$comments = $_POST['comments'];

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'lv-shared04.cpanelplatform.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'test@carolinajan.com';                 // SMTP username
$mail->Password = 'qR([72;yJ+(E';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('test@carolinajan.com', $name);
$mail->addAddress('hello@carolinajan.com', 'Carolini Jani');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo($email, $name);
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = "New message from {$name}";
$mail->Body    = $comments;
$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    echo $e->errorMessage();
} else {
    echo 'Message has been sent';
}