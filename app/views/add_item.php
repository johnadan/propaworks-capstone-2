<?php require_once "../partials/header.php" ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-3"></div>
		<div class="col-lg-6">
			<form class="mt-3"><h5>Add Catalog Item</h5>
			  <div class="form-group">
			    <label for="exampleFormControlInput1">Name</label>
			    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Product/Item Name">
			  </div>
			  <div class="form-group">
			    <label for="exampleFormControlSelect1">Category</label>
			    <select class="form-control" id="exampleFormControlSelect1">
			      <option>Tees</option>
			      <option>Collared Shirts</option>
			      <option>Hoodies and Longsleeves</option>
			      <option>Lanyard</option>
			      <option>Artists and Bands</option>
			    </select>
			  </div>
			  <div class="form-group">
			    <label for="exampleFormControlInput2">Price</label>
			    <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="eg. &#8369;60.00">
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
			  <div class="form-group">
			    <label for="exampleFormControlTextarea1">Description</label>
			    <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Product/Item Description" rows="5"></textarea>
			  </div>
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