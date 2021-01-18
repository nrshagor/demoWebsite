<?php
use PHPMailer\PHPMailer\PHPMailer;
require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';
$mail = new PHPMailer(true);
  $alert = '';
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $message = $_POST['msg'];
  $location = $_POST['location'];

try{
  $mail->isSMTP();
  $mail->Host ='smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail-> Username = 'noorerabbishagar@gmail.com';
  $mail->Password = '01725885591';
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  $mail->Port ='587';

  $mail->setFrom('noorerabbishagar@gmail.com');
  $mail->addAddress('cleverfox884@gmail.com');
  $mail->IsHTML(true);
  $mail->Subject ='Message Receive(Contact Page)';
  $mail->Body = "<h3>Name: $name <br> Email: $email <br> Location: $location <br> Phone: $phone <br> Message: $message </h3>";

  $mail->send();
  $alert ='<div class="alert-success">
  <span>Message send!</span>
  </div>';
} catch (Exception $e){
  $alert  = '<div class="alert-error">
  <span>'.$e->getMessage().'</span>
  </div>';
}
}
 ?>
