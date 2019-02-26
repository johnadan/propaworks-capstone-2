<?php include "../partials/header.php";?>
<?php include "../partials/admin_navbar.php";?>
<!-- header and navbar -->

 <!-- Page Content -->
<div class="container-fluid pt-2 mt-1">
	<div class="row">
		<div class="col-lg-1"></div>
		<div class="col-lg-10">
			<h6 class="text-center mt-5 mb-5 mr-5">Catalog Items</h6>
			<!-- <form>
				<div class="form-group">
					<button class="a_demo_two btn-shadow btn-block">Add Item</button>
				</div>
			</form> -->
			<div class="row" id="items">
				<?php 

			      require "../controllers/connect.php";
			      $sql = "SELECT * FROM tbl_items";
			      $result = mysqli_query($conn,$sql);

			      if(mysqli_num_rows($result) > 0){
			      	while($row = mysqli_fetch_assoc($result)){
			      		echo "
			      		<div class='col-md-4 mb-3 mt-3'>
			      			<div class='card h-100 mt-3 mb-3 text-center'>
			      				<img class='card-img-top' src='$row[img_path]'>
				  					<div class='card-body'>
				  						<a href='admin_product.php?id=$row[id]'><h4 class='card-title'>$row[name]</h4></a>
				  						<h5>&#8369;$row[price]</h5>
				  						<p class='card-text'>
				  							$row[description]
				  						</p>	
				  					</div>
				  					<div class='card-footer'>
				  						<button class='a_demo_two btn-shadow btn-block' id='removeFromCatalog' data-id='$row[id]'> Remove from Catalog</button>
				  					</div>		
			      			</div>	
			      		</div>";
			      	}
			      }
			     ?>
			</div>
		</div>
	</div>	
</div>