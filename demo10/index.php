<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add To Cart</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
  <p><a href="cart.php"></a></p>

<?php
//Database Info
$servername = "localhost";
$username = "root";
$pw = "";
$dbname = "demoStoreNew";

//Create connection
$conn = mysqli_connect($servername, $username, $pw, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM tbl_items limit 2 "; //make sure table name matches yours
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)) {
      //Retrieve products from the items table
      echo "<div class='col-md-3 mb-3'>
                    <div class='card h-100'>
                       <img src='$row[img_path]'>
                          <div class='card-body'>
                            <h4 class='card-title'><a href='product.php?id=$row[id]'>$row[name]</a></h4>
                            <h5 class='price'>₱ $row[price]</h5>
                            <input type='number' class ='form-control mb-3' min='1' value='1' id='quantity$row[id]'>
                          	<button class='btn btn-block btn-primary' id='addToCart' data-id='$row[id]'><i class='fas fa-cart-plus'></i> Add to Cart</button>
                          </div>
                    </div>
            </div>";
    }
}

?>

</body>
</html>  

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
    url:"addToCart.php",
    method:"POST",
    data:
    {
      productId: productId,
      quantity:quantity
    },
    dataType:"text",
    success:function(data){
      $('a[href="cart.php"]').html(data);
    }
  })
 }) 

</script>
