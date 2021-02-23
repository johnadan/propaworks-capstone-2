<?php session_start(); ?>

<?php
	require_once 'connect.php';

	$username = $_POST['uname'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	//$password = $_POST['password'];
	$password = sha1($_POST['password']);

	// $data = 

	$data = "";

	//SHA1 = Secured Hash Algorithm 40 characters
	//MD5 = Message Digest 5

	$sql = "SELECT * FROM tbl_users WHERE email = '$email'";

	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) > 0){
		$data = "Sorry, email already exists. Please use a different email.";
	}
	else {
		// $sql2 = "INSERT INTO tbl_users (username,email,address,password)
		$sql = "INSERT INTO tbl_users (username,email,address,password)
		VALUES ('$username','$email','$address','$password')";
		// mysqli_query($conn,$sql2);
		mysqli_query($conn,$sql);
		$data = "You have successfully registered!";
		//header("Location: ../views/index.php");
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