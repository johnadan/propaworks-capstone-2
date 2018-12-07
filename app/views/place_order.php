<?php 
//app/sample_mail.php
require '../../vendor/autoload.php';

require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../../vendor/phpmailer/phpmailer/src/Exception.php';
require '../../vendor/autoload.php';
// use PHPMailer\PHPMailer;
// use PHPMailer\Exception;

// require 'phpmailer/phpmailer/src/PHPMailer.php';

$mail = new PHPMailer\PHPMailer\PHPMailer(true);

$staff_email = "mclemadan@gmail.com"; //where the email is coming from
$users_email = "mclemadan@gmail.com"; //where the email will go
$email_subject = "UniversiTees Order Confirmation";
$email_body = "<h3>Reference Number: D8KCKAIK6UT4JWFI5RMKOTJGR1ZOSL55UPIF</h3>";

try{
	$mail->isSMTP();
	$mail->Host = "smtp.gmail.com";
	$mail->SMTPAuth = true;
	$mail->Username = $staff_email;
	$mail->Password = "johnmclem";
	$mail->SMTPSecure = "tls";
	$mail->Port = 587;
	$mail->setFrom($staff_email, "UniversiTees");
	$mail->addAddress($users_email);
	$mail->isHTML(true);
	$mail->Subject = $email_subject;
	$mail->Body = $email_body;
	$mail->send();

	echo "Message has been sent"; //for testing purposes only, should be thrown to confirmation.php
} catch (Exception $e){
	echo "Message sending failed".''.$mail->ErrorInfo;
}

 ?>