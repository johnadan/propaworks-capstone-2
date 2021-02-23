<?php

	$host = "localhost";
	$db_username = "id8407942_mclemadan";  
	$db_password = "jesus247";
	$db_name = "id8407942_propaworks";

	$conn = mysqli_connect($host, $db_username, $db_password, $db_name);

	if(!$conn){
		echo "Failed to connect to MYSQL:" . mysqli_connect_error();
	}

?>