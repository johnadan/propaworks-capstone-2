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
			<!-- <form class="mt-5 mb-3" action="login_user.php" method="POST">
				<h5 class="text-center">LOG IN</h5>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Email address</label>
			    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
			    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
			    <p class="validation"></p>
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
			  </div>
			 
			  <p id="error_message" name="errorMessage"></p>
			  
			  <div class="form-group text-center">
			  	<button type="submit" id="btn_login" class="btn btn-primary">Log In</button>
			  </div>
			</form> -->
			
			<!-- <div class="card">
    		<div class="card-header">Log In</div>
    		<div class="card-body">
    			<form action="login_user.php" method="POST">
    				<div class="form-group">
    					<label>Email</label>
    					<input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                        <p class="validation"></p>
    				</div>
    				<div class="form-group">
    					<label>Password</label>
    					<input type="password" class="form-control" id="password" name="password">
                        <p class="validation"></p>
    				</div>

                    <p id="error_message" name="errorMessage"></p>
                    
    				<! <button id="btn_login" class="btn btn-success" type="button">SUBMIT</button> -->
    				<!-- <button type="submit" id="btn_login" class="btn btn-primary">Log In</button>
    				<button type="submit" id="btn_register" class="btn btn-secondary">Register</button>
    				<input class="btn btn-warning" type="reset" value="CLEAR">
    			</form> -->
    		<!-- </div> --> 
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
			             <h3 align='right'>Total: &#x20B1; <span id='grandTotal'>$grand_total </span><br><form><div class='form-group text-center'><button class='btn btn-success'><a href='checkout.php'>Place Order</a></button></h3></div></form>
			             <hr>";
			echo $data;
			?>
		</div>
	</div>
</div>

<?php require_once "../partials/footer.php" ?>	