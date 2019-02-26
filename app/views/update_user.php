<?php include "../partials/header.php";?>
<?php include "../partials/admin_navbar.php";?>
<?php require_once '../controllers/connect.php'; ?>


<?php
    $id = $_GET['id'];

    $sql = "SELECT * FROM tbl_users WHERE id = $id";

    $result = mysqli_query($conn, $sql);

?>

<div class="container-fluid">
  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
    	<div class="card">
    		<div class="card-header mt-5">Update User Details</div>
    		<div class="card-body">
    			<form action="../controllers/process_update.php" method="POST">
                    <?php while($row = mysqli_fetch_assoc($result)){ ?>

        <input type="hidden" name="id" value="<?=$row['id']?>">
    				<div class="form-group">
    					<label>Username</label>
    					<input type="text" value="<?= $row['username']?>" class="form-control" name="uname">
    				</div>
    				<div class="form-group">
    					<label>Email</label>
    					<input type="text" value="<?= $row['email']?>" class="form-control" name="email">
    				</div>

    				<input class="btn btn-success" type="submit" value="SUBMIT">
    				<input class="btn btn-warning" type="reset" value="CLEAR">
                    <?php } ?>
    			</form>
    		</div>

    	</div>


    </div>
  </div>
</div>

<!-- <?php //require_once 'partials/footer.php'; ?> -->

