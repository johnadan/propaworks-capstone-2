<?php include "../partials/header.php";?>

<div class="container" id="register">
	<div class="row mt-5">
		<div class="col-lg-3"></div>
		<div class="col-lg-6">
			<form class="mt-5 mb-3" action="../controllers/register_user.php" method="POST">
			<h5 class="text-center">REGISTER</h5>
			<div class="form-group">
			    <label for="exampleInputUsername">Username</label>
			    <input type="text" class="form-control" id="username" name="uname" placeholder="Enter Username">
			    <!-- <p class="validation"></p> -->
			    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
			 </div>	
			 <div class="form-group">
			    <label for="exampleFormControlTextarea1">Address</label>
			    <textarea class="form-control" name="address" id="address" rows="3" placeholder="Enter Address"></textarea>
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Email address</label>
			    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
			    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
			    <p class="validation"></p>
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
			    <!-- <p class="validation"></p> -->
			  </div>
			 
			  <p id="error_message" name="errorMessage"></p>
			  
			  <div class="form-group text-center">
			  	<button type="submit" id="btn_register" class="btn btn-primary">Register</button>
			  </div>
			</form>
		</div>
	</div>
</div>


			
<!-- Footer -->
<?php include "../partials/footer.php";?>