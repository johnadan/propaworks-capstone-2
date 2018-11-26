<?php session_start(); ?>

<?php  
//Get values from the login form
$email = $_POST['email'];
$password = $_POST['password'];

//Check if we are getting the correct values
// echo $email."-".$password;

//Database info
$servername = "localhost";
$username	= "root";
$pw = "";
$dbname = "demoStoreNew";

//Create connection
$conn = mysqli_connect($servername, $username, $pw, $dbname);
//Check connection
if(!$conn){
	die("Connection failed:".mysqli_connect_error());
}

$sql = "SELECT * FROM tbl_users WHERE email = '$email' && pw ='$password'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$_SESSION['email'] = $row["email"];
		// $_SESSION['lname'] = $row["lname"];
		// $_SESSION['fname'] = $row["fname"];
	}
	header("Location: home.php");
}
?>