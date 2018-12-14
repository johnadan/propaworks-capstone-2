<?php 

	$host = "localhost";
	$db_username = "root";  
	$db_password = "";
	$db_name = "demoStoreNew";

	//create connection
	$conn = mysqli_connect($host, $db_username, $db_password, $db_name);

	//check connection
	if(!$conn){
		echo "Failed to connect to MYSQL:" . mysqli_connect_error();
	}

	require "../vendor/autoload.php";

	use PayPal\Api\Payment;
	use PayPal\Api\PaymentExecution;

	$apiContext = new \PayPal\Rest\ApiContext(new \PayPal\Auth\OAuthTokenCredential(
	'AXah74phf3I-Occ2V4hggrNLRN8ncEKV3BJ8DJ6ijS-RAtmQSsf8AYcwO6p6Y_wxWgD40Z70MIqyYp1c',
	'EJYB9Eb0THlGo2AA21RDPedIT4hyGHicEOxA9M1n-VSOLvXThzDWgAmRKkpOHNjZ5pQmqrNDDWEN5Q2A'
	)
);

	if(!isset($_GET['paymentId'], $_GET['PayerID'])){
		die();
	}

	$paymentId = $_GET['paymentId'];
	$payerId = $_GET['PayerID'];

	$payment = Payment::get($paymentId, $PayPal);
	$execute = new PaymentExecution();
	$execute->setPayerId($payerId);

	//
	$trans_code = "";

	try{
		$result = $payment->execute($execute, $paypal);
		$result_of_payment = json_decode($result);
		$trans_code = $result_of_payment->transactions[0]->invoice_number;
	} catch(Exception $e){
		
	}

 ?>