<?php 
// session_start(); ?>

<?php include "../partials/header.php";?>
<?php include "../partials/navbar.php";?>

    <!-- Page Content -->
    <div class="container mt-5">
      <div class="row">
      <?php 

      require "controllers/connect.php";
      $sql = "SELECT * FROM tbl_items";
      $result = mysqli_query($conn,$sql);

      if(mysqli_num_rows($result) > 0){
      	while($row = mysqli_fetch_assoc($result)){
      		echo "
      		<div class='col-lg-3 mb-3 mt-3'>
      			<div class='card h-100 mt-3 mb-3 text-center'>
      				<img src='$row[img_path]'>
	  					<div class='card-body'>
	  						<a href='product.php?id=$row[id]'><h4 class='card-title'>$row[name]</h4></a>
	  						<h5>&#8369;$row[price]</h5>
	  						<p class='card-text'>
	  							$row[description]
	  						</p>	
	  					</div>
	  					<div class='card-footer'>
	  						<input type='number' class='form-control mb-3'>
	  						<button class='a_demo_two' id='addToCart' data-id='$row[id]'><i class='fas fa-cart-plus'></i> Add to Cart</button>
	  					</div>		
      			</div>	
      		</div>";
      	}
      }
     ?>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

   <!-- Footer -->
    <?php include "../partials/footer.php" ;?>