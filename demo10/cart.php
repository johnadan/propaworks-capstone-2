<?php 

	// session_start();

 ?>
<!-- cart.php -->
<!-- <pre> -->
	<?php 

 // print_r($_SESSION["cart"]);

  ?>
<!-- </pre> -->
 
 <?php 

// $host = "localhost";
// 	$db_username = "root";  
// 	$db_password = "";
// 	$db_name = "demoStoreNew";

// 	$conn = mysqli_connect($host, $db_username, $db_password, $db_name);

// 	if(!$conn){
// 		echo "Failed to connect to MYSQL:" . mysqli_connect_error();
// 	}

// $data = "";
//  foreach($_SESSION['cart'] as $id => $quantity) {
//  	//echo "product id:" .$id."</br>";
//  	$sql = "SELECT * FROM tbl_items WHERE id = '$id'";
//  	$result = mysqli_query($conn, $sql);

// if(mysqli_num_rows($result) > 0){
//     while($row = mysqli_fetch_assoc($result)) {
//     	$name = $row["name"];
//     	$description = $row["description"];
//     	$price = $row["price"];
//     	$image = $row["img_path"];

//     	$data.="Product Name: $name <br>
//     			Description: $description <br>
//     			Image: <img src='$image'> <br>
//     			Price: &#8369;$price <br>
//     			Quantity: <input type='number' value='$quantity'> <br>
//     			<button type='submit'>Remove</button>
//     			<hr>";
//     		}
//     	}	
//  	}
//  	echo $data;
  ?>

  
<?php session_start(); ?>

<h1>My Shopping Cart</h1>

	<div id="loadCart">


	</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="script.js"></script>