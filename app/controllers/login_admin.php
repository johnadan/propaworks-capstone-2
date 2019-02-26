<?php session_start(); ?>

<?php

require_once 'connect.php'; 

	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$sql = "SELECT * FROM tbl_users WHERE email = '$email' AND password = '$password' AND is_admin = 1";

	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			$_SESSION['user-id'] = $row['id'];
			$_SESSION['email'] = $row['email'];
		}
		echo "<script type='text/javascript'>location.href='../views/admindashboard.php'</script>";
	}
?>