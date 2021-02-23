<?php session_start(); ?>

<?php

require_once 'connect.php'; 

	$email = $_POST['email'];
	$password = $_POST['password'];
	$isadmin = $_POST['is_admin'];
	
	$sql = "SELECT * FROM tbl_users WHERE email = '$email' AND password = '$password' AND is_admin = 1";

	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			$_SESSION['user-id'] = $row['id'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['is_admin'] = $row['is_admin'];
			if(is_admin == 1){
		    echo "<script type='text/javascript'>location.href='../views/add_item.php'</script>"; 
		} else {
		    echo "<script type='text/javascript'>location.href='../views/checkout.php'</script>";
		    }
		}
		//echo "<script type='text/javascript'>location.href='../views/add_item.php'</script>";
	}
?>