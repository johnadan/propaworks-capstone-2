<?php //session_start(); ?>

<?php 
//This page is not accessible if user is not logged in
//if(!isset($_SESSION["email"])){
  //header("Location: login.php");
//}
 ?>

<?php require_once "../partials/header.php" ?>

<?php require_once "../partials/navbar.php" ?>

<h1 class="text-center">Checkout</h1>

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
				    <select class="form-control" id="exampleFormControlSelect1" name="mode_of_payment">
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

<script type="text/javascript">
	function generate_code() {
$ref_number = '';
 $source = array('0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
  
  for($i=0; $i < 36; $i++){
     $index = rand(0,35);
     $ref_number = $ref_number.$source[$index];
    }
  $today = getdate();
  echo $ref_number."-".$today[0];
}
</script>


<?php require_once "../partials/footer.php" ?>	