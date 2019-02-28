<?php require_once "../partials/header.php" ?>
<?php include "../partials/admin_navbar.php";?>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-3"></div>
		<div class="col-lg-6">
			<form class="mt-3" action="../controllers/item_add.php" method="POST"><h5 class="mt-5 text-center" enctype="multipart/form-data">Add Catalog Product/Item</h5>
			  <div class="form-group">
			    <label for="exampleFormControlInput1">Name</label>
			    <input type="text" class="form-control" id="item_name" name="product_name" placeholder="Product/Item Name">
			  </div>
			  <div class="form-group">
			    <label for="ProductItemCategory">Product/Item Category</label>
			    <select class="form-control" id="category_selection" name="category_id">
			      <option value="1">Campus Tees</option>
			      <option value="2">Hoodies and Raglans</option>
			      <option value="3">Artists, Bands, and others</option>
			    </select>  
			    
			     <!-- <?php 
					// $category_query = "SELECT * FROM tbl_categories";
					$sql = "SELECT * FROM tbl_categories";
				      $result = mysqli_query($conn,$sql);
					// $categories = mysqli_query($conn, $category_query);
					foreach ($result as $category) {
						extract($category);
						echo "<option value='$id'>$name</option>";	
					}
				 ?> -->
			    
			  </div>
			  <div class="form-group">
			  	<label for="featured_item">Featured Item</label>
			  	<select class="form-control" id="featured_item" name="featured_item">
			    	<option value="0">Yes</option>
			    	<option value="1">No</option>
			    </select>
			  </div>
			  <div class="form-group">
			    <label for="ProductItemPrice">Price</label>
			    <input type="text" class="form-control" id="product_price" name="item_price" placeholder="eg. &#8369;60.00">
			    <label for="desc">Description</label>
			   <!--  <input type="text" class="form-control" id=7"777777"  placeholder="7"> -->
			     <textarea class="form-control" id="item_desc" name="product_desc" placeholder="eg. UP-inspired campus tee" rows="5"></textarea>
			  </div>
			  <!-- <div class="form-group">
			    <label for="exampleFormControlInput3">Description</label>
			    <input type="textarea" class="form-control" id="exampleFormControlInput3" placeholder="Product/Item Description">
			  </div> -->
			  <!-- <div class="form-group">
			      <label for="description">Description</label>
			      <textarea class="form-control" rows="5" id="desc"></textarea>
		    </div> -->
			  <!-- <div class="form-group">
			    <label for="exampleFormControlSelect2">Example multiple select</label>
			    <select multiple class="form-control" id="exampleFormControlSelect2">
			      <option>1</option>
			      <option>2</option>
			      <option>3</option>
			      <option>4</option>
			      <option>5</option>
			    </select>
			  </div> -->
			  <!-- 7 -->
			  <!-- <button type="submit" class="btn btn-primary mb-3">Submit</button> -->
			  <div class="form-group">
			  	<label for="image"></label>
			  	Image: <input type="file" name="myFile"><br><br>
			  <input type="submit" class="a_demo_two btn-shadow">
			  </div>
			  <!-- <form action="#">
					</form> -->
			</form>
		</div>
	</div>
</div>

<?php require_once "../partials/footer.php" ?>