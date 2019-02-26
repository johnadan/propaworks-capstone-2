<?php session_start(); ?>

<?php
	require_once '../controllers/connect.php';

	$id = $_GET['id'];

	$sql = "DELETE FROM tbl_users WHERE id = $id";

	$result = mysqli_query($conn, $sql);

	if($result){
		header("Location: ../views/admin_userlist.php");
	}



?>