<?php require_once 'partials/header.php'; ?>
<!-- Page Content -->
<div class="container-fluid mt-3">
	<div class="row">
		<div class="col-lg-4">
			<?php 
				$id = $_GET['id'];

				require "controllers/connect.php";

				$sql = "SELECT * FROM tbl_items WHERE id = '$id'";
				$result = mysqli_query($conn, $sql);

				if(mysqli_num_rows($result)>0){
					while($row = mysqli_fetch_assoc($result)){
						echo "<img src='$row[img_path]'>";

					}
				}
			?>
		</div>
		<div class="col-lg-8">
			<h2>Product Information and Description</h2>
			<hr>
			<?php 
				$id = $_GET['id'];

				require "controllers/connect.php";

				$sql = "SELECT * FROM tbl_items WHERE id = '$id'";
				$result = mysqli_query($conn, $sql);

				if(mysqli_num_rows($result)>0){
					while($row = mysqli_fetch_assoc($result)){
						echo "$row[name]<br>";
						echo "$row[description]<br>";
						echo "&#8369;$row[price]<br>";
						echo "<input type='number' mb-3'>
							  <button class='btn btn-primary'>Add to Cart</button>";

					}
				}
			?>

		</div>
	</div>
</div>

<?php require_once 'partials/footer.php'; ?>