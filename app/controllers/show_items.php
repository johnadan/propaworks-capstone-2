<?php 
	// connect to the database
	include 'connect.php';
	$data = "";
	// id is from ajax
	$categoryId = $_POST['categoryId'];

	$sql = "SELECT * FROM tbl_items where category_id = '$categoryId'";
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			$data .= "<div class='col-md-4 mb-3 mt-3'>
				      			<div class='card h-100 mt-3 mb-3 text-center'>
				      				<img src='$row[img_path]'>
					  					<div class='card-body'>
					  						<h4 class='card-title'>$row[name]</h4>
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
	echo $data;

 ?>