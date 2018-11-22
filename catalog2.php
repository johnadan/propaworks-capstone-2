<?php include "partials/header.php";?>
<!-- header and navbar -->

	<!-- <form class="form-block my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>	 -->
    <!-- <div class="container">
    	<div class="row">
    		<div class="col-lg-3"></div>
    		<div class="col-lg-9">
    			<div class="search-container">
	    			<form class="form-block mt-3 mb-3" action="#">
				      <input class="form-control mr-sm-2" type="search" type="text" placeholder="Search.." name="search" aria-label="Search"> -->
				      <!-- <button type="submit"><i class="btn btn-outline-success my-2 my-sm-0"></i></button> -->
				      <!-- <button type="submit"><i class="fa fa-search"></i></button> -->
		    		<!-- </form>
		    	</div>	
    		</div>
    	</div>
    </div> -->
       
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
	    		<h5 class="mt-3">Price</h5>
		    		<div class="dropdown">
					  <button class="btn bg-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					  -----------------------------------------</button>
					  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					    <a class="dropdown-item" href="#">Highest to Lowest</a>
					    <a class="dropdown-item" href="#">Lowest to Highest</a>
					  </div>
					</div>
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



<!-- $(document).ready(()=>{
  		$('#input').keypress((e)=>{
  			if(e.which == 13){
  			let input = $('#input').val();
  			alert(input);
  			}
  		});
  	}); -->
