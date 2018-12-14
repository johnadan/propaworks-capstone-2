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
	use PayPal\Rest\ApiContext;
	use PayPal\Auth\OAuthTokenCredential;
	use PayPal\Api\Payer;
	use PayPal\Api\Item;
	use PayPal\Api\ItemList;
	use PayPal\Api\Details;
	use PayPal\Api\Amount;
	use PayPal\Api\Transaction;
	use PayPal\Api\RedirectUrls;
	use PayPal\Api\Payment;

//paypal sandbox api
$apiContext = new \PayPal\Rest\ApiContext(new \PayPal\Auth\OAuthTokenCredential(
	'AXah74phf3I-Occ2V4hggrNLRN8ncEKV3BJ8DJ6ijS-RAtmQSsf8AYcwO6p6Y_wxWgD40Z70MIqyYp1c',
	'EJYB9Eb0THlGo2AA21RDPedIT4hyGHicEOxA9M1n-VSOLvXThzDWgAmRKkpOHNjZ5pQmqrNDDWEN5Q2A'
	)
);
//client id then client secret 
$payer = new Payer();
$payer -> setPaymentMethod("paypal");

//create array to contain individual items
$items = [];
$indiv_item = new Item();
$indiv_item-> setName("Laptop")
			-> setCurrency("PHP")
			-> setQuantity(1)
			-> setPrice(15000);
			//setprice - indiv prices of items

//add indiv items to $items[] array
$items [] = $indiv_item;
//$items [] += $indiv_item;
$item_list = new ItemList();
$item_list -> setItems($items);

$amount = new Amount();
$amount -> setCurrency("PHP")
		-> setTotal(15000);
		//amount - grand total price of items

$transaction = new Transaction();
$transaction -> setAmount($amount)
			-> setItemList($item_list)
			-> setDescription("Transaction from your shop")
			-> setInvoiceNumber(uniqid("demoStoreNew-"));		

$redirectUrls = new RedirectUrls();
$redirectUrls
//create successful file
-> setReturnUrl("https://localhost/night6/demoStoreNew/demo12_paypal/success.php")
//create unsuccessful file
-> setCancelUrl("https://localhost/night6/demoStoreNew/demo12_paypal/failed.php"); 

$payment = new Payment();
$payment-> setIntent("sale")
-> setPayer($payer)
-> setRedirectUrls($redirectUrls)
//can be multiple transactions in one payment
-> setTransactions([$transaction]);

try{
	$payment->create($apiContext);
} catch(Exception $e){
	die($e->getData());
}

$approvalUrl = $payment->getApprovalLink();
header('location:'.$approvalUrl);

 ?>