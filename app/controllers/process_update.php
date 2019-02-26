<?php session_start(); ?>

<?php
	require_once '../controllers/connect.php';

	$username = $_POST['uname'];
	$email = $_POST['email'];
	$id = $_POST['id'];

	$sql = "UPDATE tbl_users SET uname = '$username', email = '$email' WHERE id = $id";

	$result = mysqli_query($conn,$sql);

	if($result){
		header("Location: ../views/admin_userlist.php");
	}





?>