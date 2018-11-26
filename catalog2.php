<?php session_start(); ?>

<?php include "partials/header.php";?>
<?php include "partials/navbar.php";?>
<!-- header and navbar -->
   
	 <!-- Page Content -->
    <div class="container pt-3">
	    <div class="row">
	    	<div class="col-lg-3">
	    		<h5 class="mt-5">Categories</h5>
	    		<div class="list-group">
	    		<?php 
	    			require "controllers/connect.php";
	    			$sql = "SELECT * FROM tbl_categories";
				      $result = mysqli_query($conn,$sql);

				      if(mysqli_num_rows($result) > 0){
				      	while($row = mysqli_fetch_assoc($result)){
				      		echo "
				      		<a href='#' class='list-group-item' onclick='showCategories($row[id])'>$row[name]</a>
				      		";
				      	}
				      }	
	    		 ?>
	    		</div>
	    		<!-- <form method="GET" action="sort_price.php">
	    			<div class="form-group">
		    			<h5 class="mt-3">Price</h5>
			    		<div class="dropdown">
						  <button class="btn bg-light dropdown-toggle" name="dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						  </button>
						  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						    <a class="dropdown-item" id="desc" href="#">Highest to Lowest</a>
						    <a class="dropdown-item" id="asc" href="#">Lowest to Highest</a>
						  </div>
						</div>
		    		</div>
	    		</form> -->
		    		<form method="POST" action="sort_price.php">
					    <div class="form-group">
					      <label for="price">Sort by Price</label>
					      	<select class="custom-select">
								<option selected="" name="price" id="price">------</option>
								<option value="desc">Highest to Lowest</option>
								<option value="asc">Lowest to Highest</option>
							</select>
					    </div>
					 </form>

	    	</div>
	    	<div class="col-lg-9">
	    		<!-- <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
	    			<ol class="carousel-indicators">
	    				<li data-target="#carouselExampleIndicators" data-slide-to="0"></li>
	    				<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
	    				<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
	    			</ol>
	    		</div> -->
	    		<div class="input-group mt-5 mb-3">
				    <input type="text" class="form-control" id="search" placeholder="Search...">
				    <div class="input-group-append">
				      <button class="btn btn-secondary" type="button">
				        <i class="fas fa-search"></i>
				      </button>
				    </div>
			  	</div>
	    		<div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner" role="listbox">
						<div class="carousel-item active">
							<img class="d-block img-fluid" src="http://placehold.it/900x350" alt="First slide">
						</div>
						<div class="carousel-item">
							<img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">
						</div>
						<div class="carousel-item">
							<img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
						</div>
					</div>
					<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
					</div>
					<div class="row" id="products">
				      <?php 

				      require "controllers/connect.php";
				      $sql = "SELECT * FROM tbl_items";
				      $result = mysqli_query($conn,$sql);

				      if(mysqli_num_rows($result) > 0){
				      	while($row = mysqli_fetch_assoc($result)){
				      		echo "
				      		<div class='col-md-4 mb-3 mt-3'>
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
					  						<button class='btn btn-block btn-primary'>Add to Cart</button>
					  					</div>		
				      			</div>	
				      		</div>";
				      	}
				      }
				     ?>
      				</div>
      				<!-- /.row -->
	    		</div>	
	    	</div>
	    </div>	
	<!-- /.row -->
	</div>
	<!-- /.container     -->

<!-- Footer -->
<?php 
include "partials/footer.php"
 ;?>

<!-- show categories -->
 <script type="text/javascript">function showCategories(category_id){
 	// alert(category_id);
 	$.ajax({
 		url : "controllers/show_items.php",
 		method : "POST",
 		data: {
 			categoryId : category_id
 		},
 		dataType: "text",
 		success : function(data){
 			$("#products").html(data)
 		}
 	})
 }
 </script>

<!-- sort price -->
 <!-- <script type="text/javascript">function sortPrice(price){
 	// alert(category_id);
 	$.ajax({
 		url : "controllers/sort_price.php",
 		method : "POST",
 		data: {
 			price : price
 		},
 		dataType: "text",
 		success : function(data){
 			$("#products").html(data)
 		}
 	})
 }
 </script> -->

<!-- search bar -->
 <script type="text/javascript">
	$("#search").keyup(function(){
		let word = $(this).val();
		// console.log(word);
		//AJAX Request
		$.post("controllers/search_result.php",{word:word},function(data){
				$("#products").html(data);
		})
	});
</script>

<!-- sort price -->
<script type="text/javascript">
	$("#price").change(function(){
		let sort = $(this).val();
		console.log(sort);
		$.post("controllers/sort_price.php",{price:price},function(data){
				$("#products").html(data);
		})
	});
</script>