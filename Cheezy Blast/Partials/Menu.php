<?php
 include('../Config/Constants.php');
 $SITEURL = 'http://localhost/Cheezy%20Blast/';
 include('../Admin/logincheck.php');

 ?>


<html>
	<head>	
		<title>CHEEZY BLAST</title>

		<link rel="stylesheet"href="../css/admin.css">
   
	</head>

	<body>
		<!-- Menu section -->
		<div class="Menu text-center">
			<div class="wrapper">
				<ul>
					<li><a href="Index.php">Home</a></li>
					<li><a href="ManageAdmin.php">Admin</a></li>
					<li><a href="ManageCategory.php">Category</a></li>
					<li><a href="ManageFood.php">Food</a></li>
					<li><a href="ManageOrder.php">Order</a></li>
					<li><a href="Feedback.php">Feedback</a></li>
					<li><a href="Logout.php">Logout</a></li>
				</ul>
				
			</div>
		</div>
	