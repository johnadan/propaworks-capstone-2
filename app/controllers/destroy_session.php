<?php 
	//destroy session
	session_start();
	session_destroy();
header("Location: ../views/index.php");
 ?>