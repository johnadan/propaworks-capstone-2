<?php include "../partials/header.php"; ?>

<div class="container" id="register">
	<div class="row mt-5">
		<div class="col-lg-3"></div>
		<div class="col-lg-6">
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
			
			<div class="card">
    		<div class="card-header">Log In</div>
    		<div class="card-body">
    			<form action="../controllers/login_user.php" method="POST">
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
                    
    				<!-- <button id="btn_login" class="btn btn-success" type="button">SUBMIT</button> -->
    				<button type="submit" id="btn_login" class="a_demo_two btn-shadow">Log In</button>
    			</form>
    			<br>
    			<a href="register.php"><input class="a_demo_two btn-shadow mb-3" type="reset" value="Sign Up"></a>
    			<br>
    			<input class="a_demo_two btn-shadow" type="reset" value="Clear">
    		</div>

    	</div>
		</div>
	</div>
</div>
	
<!-- Footer -->
<?php include "../partials/footer.php";?>