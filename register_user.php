<?php
	require_once 'controllers/connect.php';


	$username = $_POST['uname'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$password = sha1($_POST['password']);

	// $data = 

	$data = "";

	//SHA1 = Secured Hash Algorithm 40 characters
	//MD5 = Message Digest 5

	$sql = "SELECT * FROM tbl_users WHERE email = '$email'";

	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) > 0){
		$data = "Email is already used";
	}
	else {
		$sql2 = "INSERT INTO tbl_users (uname,email,address,pw)
		VALUES ('$username','$email','$address','$password')";
		mysqli_query($conn,$sql2);
		$data = "Successfully registered!";
	}
	echo $data;
	
	// if(mysqli_num_rows($email) > 0){
 //      	echo "alert('The email has already been used')";
 //      }	
	
	// if($result){
	// 	header("Location: register.php");
	// }

	// $count = mysqli_num_rows($result);

	// if($count == 0){
		// echo "Success";
	// 	header("Location: catalog2.php");
	// }
	// else{
	// 	echo "Invalid username/password";
	// }
?>