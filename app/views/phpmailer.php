<?php 
//app/sample_mail.php
require '../../vendor/autoload.php';

require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../../vendor/phpmailer/phpmailer/src/Exception.php';
require '../../vendor/autoload.php';
require '../controllers/place_order.php';

require_once 'connect.php';
// use PHPMailer\PHPMailer;
// use PHPMailer\Exception;

// require 'phpmailer/phpmailer/src/PHPMailer.php';


$mail = new PHPMailer\PHPMailer\PHPMailer(true);

$staff_email = "mclemadan@gmail.com"; //where the email is coming from
$users_email = "mclemadan@gmail.com"; //where the email will go
$email_subject = "Propaworks Order Confirmation";
$transaction_code = generate_code();

$email_body = '<h5>Reference Number:'.$transaction_code.'</h5>'.'<br>'.'Thank you for shopping at Propaworks!';

try{
	$mail->isSMTP();
	$mail->Host = "smtp.gmail.com";
	$mail->SMTPAuth = true;
	$mail->Username = $staff_email;
	$mail->Password = "johnmclem";
	$mail->SMTPSecure = "tls";
	$mail->Port = 587;
	$mail->setFrom($staff_email, "Propaworks");
	$mail->addAddress($users_email);
	$mail->isHTML(true);
	$mail->Subject = $email_subject;
	$mail->Body = $email_body;
	$mail->send();

	echo "Thank you for shopping! Kindly check your email for further details about your order. Have a great day!"; //for testing purposes only, should be thrown to confirmation.php
} catch (Exception $e){
	echo "Message sending failed".''.$mail->ErrorInfo;
}

?>