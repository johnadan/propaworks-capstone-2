<?php require_once "../partials/header.php" ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-3"></div>
		<div class="col-lg-6">
			<form class="mt-3" action="item_add.php" method="POST"><h5>Add Catalog Product/Item</h5>
			  <div class="form-group">
			    <label for="exampleFormControlInput1">Name</label>
			    <input type="text" class="form-control" id="item_name" name="product_name" placeholder="Product/Item Name">
			  </div>
			  <div class="form-group">
			    <label for="ProductItemCategory">Product/Item Category</label>
			    <select class="form-control" id="category_selection" name="category_selection">
			      <option value="1">Campus Tees</option>
			      <option value="2">Collared Shirts</option>
			      <option value="3">Hoodies and Raglans</option>
			      <!-- <option>Lanyard</option> -->
			      <option value="4">Artists, Bands, and others</option>
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
			  <form action="#">
			  Image: <input type="file" name="myFile"><br><br>
			  <input type="submit">
			</form>
			</form>
		</div>
	</div>
</div>

<?php require_once "../partials/footer.php" ?>