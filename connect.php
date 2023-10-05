<?php 

	$host = "localhost";
	$email = "root";
	$password = "";
	$db_name = "dorms";

	$con = mysqli_connect($host, $email, $password, $db_name);

	if(!$con) {
		die("Cannot connect to the database");
	}

?>