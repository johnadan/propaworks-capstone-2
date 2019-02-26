<?php
ob_start();
if(!isset($_SESSION['email'])){
echo "<script type='text/javascript'>location.href='login.php'</script>";
}
?>

<?php
function generate_code() {
$ref_number = '';
 $source = array('0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
  
  for($i=0; $i < 36; $i++){
     $index = rand(0,35);
     $ref_number = $ref_number.$source[$index];
    }
  $today = getdate();
  return $ref_number."-".$today[0];
}
?>
	
<?php
require 'connect.php';
//insert to orders table
//$transaction_id = $_SESSION['transid'];
//$user_id = $_SESSION['user-id'];
//$user_id = $_POST['id'];
$user_id = mysqli_insert_id($conn);
//$transaction_code = generate_code();
$purchase_date = getdate("Y-m-d G:i:s");
// $status_id = $_SESSION["status_id"];
$status_id = 1;
//$payment_mode_id = $_SESSION['mode_of_payment'];
$payment_mode_id = 1;
//$result = "";

// echo  $_POST['payment_mode'];
if ($payment_mode_id == 1){ //COD payment
	$transaction_code = generate_code();
	$_SESSION['trans_code'] = $transaction_code;

$sql = "INSERT INTO tbl_orders (transaction_code, purchase_date, user_id, status_id, payment_mode_id) VALUES ($transaction_code, $purchase_date, $user_id, $status_id, $payment_mode_id)";
}
echo $sql;
header("Location: ../views/confirmation.php");
?>

<!-- $last_id = mysqli_insert_id($conn);

	$result = mysqli_query($conn, $sql);
	if(!$result){
		echo "Failed to connect:" . mysqli_connect_error();
	} else {
		echo "<div class='container-fluid'>
				<div class='row'>
					<div class='col-lg-3'></div>
					<div class='col-lg-6'>
						<h3 class='mt-5'>Confirmation</h3>
						<h6 class>Thank you for shopping at Propaworks!</h6>
						<label class='mx-auto'>Order Reference Number</label>
						<p>'.$transaction_code.'</p>
						<label class='mx-auto'>Transaction date:</label>	
						<p>'.$purchase_date.'</p>
					</div>
				</div>
			  </div>";
	}
	mysqli_close($conn);

//$order_id = $_SESSION['transid'];
$last_id = mysqli_insert_id($conn);
//$item_id = $_POST["itemid"];
$item_id = $_SESSION['cart']['id'];
$quantity = $_SESSION['cart']['quantity'];
$price = $row["price"];

$result2 = "";

foreach($_SESSION['cart'] as $id=> $quantity) {
 			   $sql2 = "INSERT INTO tbl_order_items (order_id, item_id, quantity, price) VALUES ($last_id, $item_id, $quantity, $price)";
 			             $result2 = mysqli_query($conn, $sql2);
 			             if(!$result2){
		echo "Failed to connect:" . mysqli_connect_error();
						}
						elseif($result2) {
							//header("Location: ../views/confirmation.php");
						}
// 			                     $user_id = $row["user_id"];
// 			                     $transaction_code = $row["transaction_code"];
// 			                     $purchase_date = $row["purchase_date"]
// 			                     $status_id = $row["status_id"];
// 			                     $payment_mode_id = $row["payment_mode_id"]
 			                   }

 	mysqli_close($conn);

?> -->

<!-- <?php //require_once "../partials/header.php" ?> -->

<!-- <?php //require_once "../partials/navbar.php" ?> -->