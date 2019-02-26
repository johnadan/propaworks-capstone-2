<?php include "../partials/header.php";?>
<?php include "../partials/navbar.php";?>
<!-- header and navbar -->
   
	 <!-- Page Content -->
    <div class="container-fluid pt-2 mt-1">
    	<!-- Jumbotron Header -->
      <header class="jumbotron my-4 text-center pt-5 mt-5">
        <h1 class="display-3">Propaworks</h1>
        <p class="lead">Propaworks offers apparels such as PUP-inspired campus tees, raglans and hoodies, and music artists-insipired shirts. They also offer shirts, raglans, hoodies, mugs, and lanyard printing services.</p>
        <button class="a_demo_two btn-shadow"><a href="#products">Go shopping!</button></a>
      </header>

	    <div class="row">
	    	<div class="col-lg-3">
	    		<!-- <p><a href="cart.php">Cart</a></p> -->
  				<!--<p><a href="../controllers/destroy_session.php">Destroy Session</a></p>-->
	    		<h5 class="mt-5">Categories</h5>
	    		<div class="list-group">
	    		<?php 
	    			require "../controllers/connect.php";
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
		    		<form method="POST" action="../controllers/sort_price.php">
					    <div class="form-group mt-2">
					      <!-- <label for="price">Sort by Price</label> -->
					      	<select class="custom-select" name="price" id="price">
								<option selected="">Sort by Price</option>
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
				      <button class="a_demo_two" type="button">
				        <i class="fas fa-search"></i>
				      </button>
				    </div>
			  	</div>
	    		
				<div class="row" id="products">
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
				  						<a href='product.php?id=$row[id]'><h4 class='card-title'>$row[name]</h4></a>
				  						<h5>&#8369;$row[price]</h5>
				  						<p class='card-text'>
				  							$row[description]
				  						</p>	
				  					</div>
				  					<div class='card-footer'>
				  						<input type='number' class='form-control mb-3' min='1' value='1' id='quantity$row[id]'>
				  						<button class='a_demo_two btn-shadow btn-block' id='addToCart' data-id='$row[id]'><i class='fas fa-cart-plus'></i> Add to Cart</button>
				  					</div>		
			      			</div>	
			      		</div>";
			      	}
			      }
			     ?>
  				</div>
  				<!-- /.row -->
	    		<!-- </div> -->	
	    	</div>
	    </div>	
		<!-- /.row -->
	</div>
	<!-- /.container     -->

<!-- Footer -->
<?php 
include "../partials/footer.php"
 ;?>

<!-- show categories -->
 <script type="text/javascript">function showCategories(category_id){
 	// alert(category_id);
 	$.ajax({
 		url : "../controllers/show_items.php",
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
 		url : "../controllers/sort_price.php",
 		method : "POST",
 		data: {
 			price : price
 		},
 		dataType: "text",
 		success : function(value){
 			$("#products").html(value)
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
		$.post("../controllers/search_result.php",{word:word},function(data){
				$("#products").html(data);
		})
	});
</script>

<!-- sort price -->
<script type="text/javascript">
	$("#price").change(function(){
		let price = $(this).val();
		// console.log(sort);
		$.post("../controllers/sort_price.php",{price:price},function(value){
				$("#products").html(value);
		})
	});
</script>

<!-- add item to cart -->
<script>
$("button#addToCart").on("click",function(){
	// $("#addToCart").on("click",function(){
	//Get the product id
	// let productId = $(this).attr("data-id");
	var productId = $(this).attr("data-id");
	var quantity = $("#quantity" + productId).val();
	console.log("Product Id:" + productId);
	console.log("Quantity:" + quantity);
	$.ajax({
		url:"../controllers/addToCart.php",
		method:"POST",
		data:
		{
			productId: productId,
			quantity:quantity
		},
		dataType:"text",
		success:function(data){
			$('a[href="../views/cart.php"]').html(data);
		}
	})
})			
</script>

<!-- Load Cart -->
<script type="text/javascript">
	function loadCart(){
	$.get("loadCart.php",function(data){
		$("#loadCart").html(data);
	});
}

$(document).ready(function(){
	loadCart();
});

// add or subtract item quantity
function changeNoItems(id){
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

function removeFromCart(id){
	var answer = confirm("Remove item from cart?");
	if(answer){
		// alert("You answered Yes");
		$.ajax({
			url:"removeFromCart.php",
			method:"POST",
			data:
			{
				productId:id
			},
			dataType:"text",
			success:function(data){
				$('a[href="cart.php"]').html(data);
				loadCart();
			}
		});
	}
}
</script>