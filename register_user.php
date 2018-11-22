<?php
	require_once 'controllers/connect.php';


	$username = $_POST['uname'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$password = sha1($_POST['password']);

	//SHA1 = Secured Hash Algorithm 40 characters
	//MD5 = Message Digest 5

	$sql = "INSERT INTO tbl_users (uname,address,email,pw)
	VALUES('$username', '$address', '$email', '$password')";

	
	// if(mysqli_num_rows($email) > 0){
 //      	echo "alert('The email has already been used')";
 //      }	
	
	$result = mysqli_query($conn, $sql);

	if($result){
		header("Location: register.php");
	}

	// $count = mysqli_num_rows($result);

	// if($count == 0){
		// echo "Success";
	// 	header("Location: catalog2.php");
	// }
	// else{
	// 	echo "Invalid username/password";
	// }
?>