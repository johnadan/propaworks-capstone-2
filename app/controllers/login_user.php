<?php session_start(); ?>

<?php require_once 'controllers/connect.php'; 

	$email = $_POST['email'];
	$password = sha1($_POST['password']);
	//$user_id = $_SESSION['user_id'];

	$sql = "SELECT * FROM tbl_users WHERE email = '$email' AND pw = '$password' AND id = '$user_id'";

	$result = mysqli_query($conn, $sql);

	// $count = mysqli_num_rows($result);

	// $result = mysqli_query($conn,$sql);

	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			$_SESSION['id'] = $row["id"];
			$_SESSION['email'] = $row["email"];
			//$_SESSION['user_id'] = $row["user_id"];

			// $_SESSION['email'] = $row["firstname"];
			// $_SESSION['email'] = $row["lastname"];
		}
		header("Location: catalog2.php");
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