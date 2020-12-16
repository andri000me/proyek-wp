<?php

	date_default_timezone_set("Asia/Bangkok");

	$servername = "localhost";
	$database = "dbngevote";
	$username = "root";
	$password = "";
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $database);
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	// echo "Connected successfully";
	// mysqli_close($conn);
?>