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
}



$mail = new PHPMailer\PHPMailer\PHPMailer(true);

$staff_email = "mclemadan@gmail.com"; //where the email is coming from
$users_email = "mclemadan@gmail.com"; //where the email will go
$email_subject = "UniversiTees Order Confirmation";

$email_body = '<h5>Reference Number:'.$ref_number.'</h5>';

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

 <h1 class="text-center">UniversiTees</h1>

<div class="container" id="register">
	<div class="row mt-5">
		<div class="col-lg-3"></div>
		<div class="col-lg-6">
			<form>
				<div class="form-group">
				    <label for="exampleFormControlInput1">Shipping Address</label>
				    <textarea class="form-control" id="exampleFormControlInput1" placeholder="Enter Shipping Address" rows="3"></textarea>
			  	</div>
			  	<div class="form-group">
				    <label for="exampleFormControlSelect1">Payment Method</label>
				    <select class="form-control" id="exampleFormControlSelect1">
				      <option>Cash on Delivery</option>
				      <option>Paypal</option>
				      <option>Debit Card</option>
				      <option>Credit Card</option>
				      <option>Installment/Downpayment</option>
				    </select>
				  </div>
			</form>
			<h1 class="text-center">Order Summary</h1>
			    		<?php require_once '../controllers/connect.php' ?>

			<?php
			$data ='
			         <table class="table table-hover">
			           <thead>
			             <tr>
			               <th scope="col">Product</th>
			               <th scope="col">Price</th>
			               <th scope="col">Quantity</th>
			               <th scope="col">Sub-total</th>
			             </tr>
			           </thead>
			           <tbody>
			  ';

			$grand_total = 0;
			foreach($_SESSION['cart'] as $id=> $quantity) {
			   $sql = "SELECT * FROM tbl_items where id = '$id' ";
			             $result = mysqli_query($conn, $sql);
			               if(mysqli_num_rows($result) > 0){
			                   while($row = mysqli_fetch_assoc($result)){
			                     $name = $row["name"];
			                     $description = $row["description"];
			                     $price = $row["price"];

			                       //For computing the sub total and grand total
			                       $subTotal = $quantity * $price;
			                       $grand_total += $subTotal;

			                       $data .=
			                         "<tr id='cartItems'>
			                             <td><img src='$row[img_path]' width='25%' height='25%'></td>
			                            <td id='price$id'>$price</td>
			                             <td><input type='number' class ='form-control' value = '$quantity' id='quantity$id'  min='1' size='5' onchange=changeNoItems($id)></td>
			                             <td class='sub-total' id='subTotal$id'>$subTotal</td>
			                         </tr>";
			                   }
			               }
			}

			$data .="</tbody></table>
			             <hr>
			             <h3 align='right'>Total: &#x20B1; <span id='grandTotal'>$grand_total </span><br><form><div class='form-group text-center'><button class='btn btn-success' id='place_order' onclick=generate_trans_number()><a href='place_order.php'>Place Order</a></button></h3></div></form>
			             <hr>";
			echo $data;
			?>
		</div>
	</div>
</div>