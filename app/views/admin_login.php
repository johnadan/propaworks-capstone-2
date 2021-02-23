<?php require_once "../partials/header.php" ?>

<div class="container">
  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
    	<div class="card">
    		<div class="card-header">Admin Login Form</div>
    		<div class="card-body">
    			<form action="../controllers/login_admin.php" id="form_login" method="POST">
    				<div class="form-group">
    					<label>Email</label>
    					<input type="email" class="form-control" id="email" name="email">
                        <p class="validation"></p>
    				</div>
    				<div class="form-group">
    					<label>Password</label>
    					<input type="password" class="form-control" id="password" name="password">
                        <p class="validation"></p>
    				</div>

                    <p id="error_message" name="errorMessage"></p>
                    
    				<button id="btn_login" type="submit" class="a_demo_two btn-shadow">Log In</button>
    				<input class="a_demo_two btn-shadow" type="reset" value="Clear">
    			</form>
    		</div>

    	</div>


    </div>
  </div>
</div>

<!-- Footer -->
<?php require_once "../partials/footer.php" ?>
<!-- <footer class="py-5 bg-dark mt-5">
  <div class="container">
    <p class="m-0 text-center text-white">Copyright &copy; Propaworks 2018</p>
  </div> -->
  <!-- /.container -->
<!-- </footer> -->

<!-- Bootstrap core JavaScript -->
<!-- <script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script type="text/javascript" src="../assets/js/script3.js"></script>
<script type="text/javascript" src="../assets/js/script2.js"></script> -->