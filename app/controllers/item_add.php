<?php 

session_start();

require_once 'connect.php';
	
$item_name = $_POST['product_name'];
$item_price = $_POST['item_price'];
$item_desc = $_POST['product_desc'];
$img_path = "../assets/images/items/" . $_FILES['myFile']['product_name'];
//$category_name = $_POST['category_selection'];
$category_id = $_POST['category_id'];
	
$feature_item = $_POST['featured_item'];
//$img_path = $_POST[''];


move_uploaded_file($FILES['myFile']['tmp_name'], $img_path);


//$data = "";



$sql = "INSERT INTO tbl_items (name, price, description, img_path, category_id, featured_item) VALUES ($item_name, $item_price, $item_desc, $img_path, $category_id, $feature_item)";

// $data =  
// 	"<div class='col-md-4 mb-3 mt-3'>
// 		<div class='card h-100 mt-3 mb-3 text-center'>
// 			<img class='card-img-top' src='$row[img_path]'>
// 				<div class='card-body'>
// 					<a href='admin_product.php?id=$row[id]'><h4 class='card-title'>$row[name]</h4></a>
// 					<h5>&#8369;$row[price]</h5>
// 					<p class='card-text'>
// 						$row[description]
// 					</p>	
// 				</div>	
// 		</div>	
// 	</div>";
echo "Item successfully added!";

		mysqli_query($conn, $sql);
	mysqli_close($conn);
	header("Location: ../views/admindashboard.php");

?>