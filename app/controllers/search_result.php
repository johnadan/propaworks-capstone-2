<?php

	// echo "<h2>This is demo2 page</h2>";

	// $name = $_GET['name'];

	// echo $name;

	include 'connect.php';
	
	$word = $_POST['word'];
	$data = "";
	$sql = "SELECT * FROM tbl_items WHERE name LIKE '%".$word."%'";
	$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)){
				$data.="<div class='col-md-4 mb-3 mt-3'>
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
					  						<button class='a_demo_two' data-id='$row[id]'><i class='fas fa-cart-plus'></i> Add to Cart</button>
					  					</div>		
				      			</div>	
				      		</div>";
			}
		}
		// else if(!mysqli_num_rows($result) == null){
		// while($row != mysqli_fetch_assoc($result)){
		// 	$data = "Search is empty";
		// 	}
		// }
		else {
			$data = "No Records Found!";
		}
		echo $data;

 ?>

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