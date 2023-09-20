<?php

	session_start();

	//define('SITEURL','http://localhost/Cheezy%20Blast/');
	$server = 'localhost';
	$username = 'root';
	$pasword = '';
	$database = 'food_order';	

	$conn =mysqli_connect($server,$username,$pasword,$database);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	  }
	  "Connected successfully";

	  //session_close();

?>
