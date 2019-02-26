<?php include "../partials/header.php";?>
<?php include "../partials/admin_navbar.php";?>
<?php require_once '../controllers/connect.php'; ?>

<?php
    $sql = "SELECT * FROM tbl_users";

    $result = mysqli_query($conn, $sql);
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
    	<div class="card">
    		<div class="card-header mt-5 text-center">Users</div>
    		<div class="card-body">
    			<table class="table table-bordered">
                    <tr>
                        <th>ID </th>
                        <th>Usernames </th>
                        <th>Email </th>
                        <th colspan="2">Actions </th>
                    </tr>
                    <?php while($row = mysqli_fetch_assoc($result)){ ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['username'] ?> </td>
                            <td><?= $row['email'] ?></td>
                            <td>
                            	<a href="update_user.php?id=<?= $row['id'] ?>">Update</a>
                                <a onclick="return confirm('Archive this user?')" href="archive_user.php?id=<?= $row['id'] ?>">Archive</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
    		</div>

    	</div>


    </div>
  </div>
</div>

<!-- <?php //require_once 'partials/footer.php'; ?> -->

