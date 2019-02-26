<?php require_once '../partials/header.php'; ?>
<?php require_once '../partials/navbar.php'; ?>

<!-- Page Content -->
<div class="container-fluid mt-3">
	<div class="row">
		<div class="col-lg-6 mt-5">
			<?php 
				$id = $_GET['id'];

				require "../controllers/connect.php";

				$sql = "SELECT * FROM tbl_items WHERE id = '$id'";
				$result = mysqli_query($conn, $sql);

				if(mysqli_num_rows($result)>0){
					while($row = mysqli_fetch_assoc($result)){
						echo "
						<div class='col-lg-2'></div>
						<div class='col-lg-10 mb-2 mt-2'>
            				<div class='card h-100 mt-2 mb-2 text-center'>
              					<img class='card-img-top' src='$row[img_path]'>
              				</div>
              			</div>";	
					}
				}
			?>
		</div>
		<div class="col-lg-6">
			<h4 class="mt-5">Product Information and Description</h4>
			<hr>
			<?php 
				$id = $_GET['id'];

				require "../controllers/connect.php";

				$sql = "SELECT * FROM tbl_items WHERE id = '$id'";
				$result = mysqli_query($conn, $sql);

				if(mysqli_num_rows($result)>0){
					while($row = mysqli_fetch_assoc($result)){
						echo "$row[name]<br>";
						echo "$row[description]<br>";
						echo "&#8369;$row[price]<br>";
						echo "<input type='number' class='form-control mb-3' min='1' value='1' id='quantity$row[id]'>	
							  <button class='a_demo_two btn-shadow' id='addToCart' data-id='$row[id]'><i class='fas fa-cart-plus' ></i> Add to Cart</button>";

					}
				}
			?>

		</div>
	</div>
</div>

<?php require_once '../partials/footer.php'; ?>

<script>
	//add item to cart
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
// load cart
// function loadCart(){
// 	$.get("loadCart.php",function(data){
// 		$("#loadCart").html(data);
// 	});
// }

// $(document).ready(function(){
// 	loadCart();
// });	
</script>