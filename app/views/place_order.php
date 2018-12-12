<?php session_start();  ?>

<script type="text/javascript">
document.ready(()=>{
	$("#place_order").click(() =>{
		function generate_trans_number(){
 $ref_number = '';
 $source = array('0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
  
  for($i=0; $i < 36; $i++){
     $index = rand(0,35);
     $ref_number = $ref_number.$source[$index];
    }
  $today = getdate();
  $_SESSION["transaction_code"] = $ref_number;
  $_SESSION["purchase_date"] = $today[0];
}
//alert($ref_number.$today);
//call the function and echo
//echo generate_trans_number();
//echo "<br>";
//echo date ("Y-m-d G:i:s"); //Date function in PHP

	});
});

</script>	

<?php
require '../controllers/connect.php';
//insert to orders table
$user_id = $_SESSION["user_id"];
$transaction_code = $_SESSION["transaction_code"];
$purchase_date = $_SESSION["purchase_date"];
// $status_id = $_SESSION["status_id"];
$status_id = 1;
$payment_mode_id = $_SESSION["mode_of_payment"];

$sql = "INSERT INTO tbl_orders (user_id, transaction_code, purchase_date, status_id, payment_mode_id) VALUES ($user_id, $transaction_code, $purchase_date, $status_id, $payment_mode_id)";

	$result = mysqli_query($conn, $sql);

// foreach($_SESSION['cart'] as $id=> $quantity) {
// 			   $sql = 
// 			             $result = ($conn, $sql);
// 			                     $user_id = $row["user_id"];
// 			                     $transaction_code = $row["transaction_code"];
// 			                     $purchase_date = $row["purchase_date"]
// 			                     $status_id = $row["status_id"];
// 			                     $payment_mode_id = $row["payment_mode_id"]
// 			                   }

 ?>

 <?php 
//app/sample_mail.php
require '../../vendor/autoload.php';

require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../../vendor/phpmailer/phpmailer/src/Exception.php';
require '../../vendor/autoload.php';
require 'place_order.php';

require_once 'connect.php';
// use PHPMailer\PHPMailer;
// use PHPMailer\Exception;

// require 'phpmailer/phpmailer/src/PHPMailer.php';

function generate_trans_number(){
	echo $ref_number;
	echo $today[0];
}


$mail = new PHPMailer\PHPMailer\PHPMailer(true);

$staff_email = "mclemadan@gmail.com"; //where the email is coming from
$users_email = "mclemadan@gmail.com"; //where the email will go
$email_subject = "UniversiTees Order Confirmation";

$email_body = '<h5>Reference Number:'.$ref_number.'</h5>'.'Thank you for shopping!';

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

	echo "Thank you for shopping!"; //for testing purposes only, should be thrown to confirmation.php
} catch (Exception $e){
	echo "Message sending failed".''.$mail->ErrorInfo;
}

 ?>