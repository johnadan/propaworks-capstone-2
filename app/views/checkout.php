<?php require_once "../partials/header.php" ?>

<?php require_once "../partials/navbar.php" ?>

<?php
ob_start();
if(!isset($_SESSION['email'])){
echo "<script type='text/javascript'>location.href='login.php'</script>";
}
if(!isset($_SESSION['cart'])){
echo "<script type='text/javascript'>location.href='catalog2.php'</script>";
}
?>

<h1 class="text-center mt-5 pt-5">Checkout</h1>

<div class="container" id="register">
	<div class="row mt-5 pt-5">
		<div class="col-lg-1"></div>
		<div class="col-lg-10">
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
			                     //$subTotal = $_SESSION["grandtotal"]['id'];
			                       $subTotal = $quantity * $price;
			                       //$grand_total = $row["grandtotal"];
			                       $grand_total += $subTotal;

			                       $data .=
			                         "<tr id='cartItems'>
			                             <td><img class='card-img-top' src='$row[img_path]' width='25%' height='25%'></td>
			                            <td id='price$id'>$price</td>
			                             <td><input value = '$quantity' id='quantity$id'></td>
			                             <td class='sub-total' id='subTotal$id'>$subTotal</td>
			                         </tr>";
			                   }
			               }
			}

			$data .="</tbody></table>
			             <hr>
			             <h3 align='right'>Total: &#x20B1; <span id='grandTotal'>$grand_total </span><br><form><div class='form-group text-center'><button class='a_demo_two' id='place_order'><a href='../controllers/place_order.php'>Place Order</a></button></h3></div></form>
			             <hr>";
			echo $data;
			?>
		</div>
	</div>
</div>

<!-- <script type="text/javascript">
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
</script> -->

<!-- <script type="text/javascript"> -->
	<!-- // add or subtract item quantity -->
<!-- function changeNoItems(id){
	let items = $("#quantity" + id).val();
	console.log(items);
	let price = $("#price" + id).text();
	console.log(price);
	let newPrice = items * price;
	$("#subTotal" + id).html(newPrice);
	console.log("Sub Total is: " + newPrice);

	let grandTotal = 0;
	$('.sub-total').each(function(){
		grandTotal += parseFloat($(this).text());
	});
	$("#grandTotal").html(grandTotal);

}
</script> -->

<?php require_once "../partials/footer.php" ?>