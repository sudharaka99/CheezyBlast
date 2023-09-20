<?php include('C:\PHP\htdocs\Cheezy Blast\Partials\Menu.php');?>



<link rel="stylesheet"href="../css/admin.css">


<?php
	if(isset($_POST['submit']))
	{
	$Full_Name=$_POST['Full_Name'];
	$Username=$_POST['username'];	
	$Password=$_POST['password'];
	
	
	$sql = "INSERT INTO admin (Full_Name, Username,Password)
VALUES ('$Full_Name', '$Username', '$Password')";
	
		 if ($conn->query($sql) === TRUE) {
		
			$_SESSION['add'] ="<b><p style='color:green'>New record created successfully.</p></b>";
			//header("location:http://localhost/Cheezy%20Blast/Admin/ManageAdmin.php");
			header('location:'.$SITEURL.'Admin/ManageAdmin.php');
			
		   } 
		   else {
		 	
			$_SESSION['add'] ="<b><p style='color:red'>New record Faile.</p></b>";
			header('location:'.$SITEURL.'Admin/ManageAdmin.php');
			 //header("location:http://localhost/Cheezy%20Blast/Admin/ManageAdmin.php");
		   }
		
		}
		
else{
?>

	<!-- Main section -->
		<div class="Main">
			<div class="wrapper">
				<h1>Add Admin</h1>
				<form action="" method="Post">
				<table class="tbl-full">
					<tr>
						<td>Full Name :</td>
						<td><input type="text" name="Full_Name" placeholder="Enter Your Name"></td>
					</tr>
					</br>
					<tr>
						<td>Username :</td>
						<td><input type="text" name="username" placeholder="Your Username"></td>
					</tr>
					</br>
					<tr>
						<td>Password :</td>
						<td><input type="password" name="password" placeholder="Your Password"></td>
					</tr>
					<tr>
						<td colospan="2">
							<input type="submit" name="submit" value="Add admin" class="btn-2">
						</td>
					</tr>
						
				
				</table>
				</form>
				

			</div>
		</div>
<?php  
}
?>

<?php include('C:\PHP\htdocs\Cheezy Blast\Partials\Footer.php');?>



		

