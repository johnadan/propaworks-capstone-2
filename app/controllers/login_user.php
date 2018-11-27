<?php session_start(); ?>

<?php require_once 'controllers/connect.php'; 

	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM tbl_users WHERE email = '$email' AND pw = '$password'";

	$result = mysqli_query($conn, $sql);

	// $count = mysqli_num_rows($result);

	// $result = mysqli_query($conn,$sql);

	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			$_SESSION['email'] = $row["email"];
			// $_SESSION['email'] = $row["firstname"];
			// $_SESSION['email'] = $row["lastname"];
		}
		header("Location: home.php");
	}

	// if($count == 1){
	// 	// echo "Success!";
	// 	$_SESSION['email'];
	// 	header("Location: catalog.php");
	// }
	// else{
	// 	echo "Invalid username/password";
	// }

?>