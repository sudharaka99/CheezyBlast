<?php include('C:\PHP\htdocs\Cheezy Blast\Partials\Menu.php');?>
<link rel="stylesheet"href="../css/admin.css">
<?php $SITEURL = 'http://localhost/Cheezy%20Blast/'; ?>


	<!-- Main section -->
		<div class="Main">
			<div class="wrapper">
				<h1>Update Admin</h1>

				<br>
				<?php	
		
				$id=$_GET['id'];
				
				$sql="SELECT * FROM admin where ID=$id;";

				if(mysqli_query($conn,$sql)){
					
					echo"<b>Admin Avaliable</b>";
					$row=mysqli_fetch_assoc(mysqli_query($conn,$sql));

					$Full_Name=$row['Full_Name'];
					$Username=$row['Username'];
					
				 } 
				else
				{
					header("location:http://localhost/Cheezy%20Blast/Admin/ManageAdmin.php");
					
				}
				?>


				<form action="" method="Post">
				<table class="tbl-full">
					<tr>
						<td>Full Name :</td>
						<td><input type="text" name="Full_Name" value="<?php echo $Full_Name;?>"></td>
					</tr>
					</br>
					<tr>
						<td>Username :</td>
						<td><input type="text" name="username" value="<?php echo $Username;?>"></td>
					</tr>
					</br>
					<tr>
						<td colospan="2">
							<input type="hidden" name="ID" value="<?php echo $id;?>">
							<input type="submit" name="submit" value="Add admin" class="btn-2">
						</td>
					</tr>
						
				
				</table>
				</form>
				

			</div>
		</div>


<?php

if(isset($_POST['submit']))
{
	$id=$_POST['ID'];
	$Full_Name=$_POST['Full_Name'];
	$Username=$_POST['username'];	
	
	$sql="UPDATE  admin  SET 
	Full_Name='$Full_Name',
	username='$Username'
	WHERE ID='$id'
	";


if ($conn->query($sql) === TRUE) {
		
	$_SESSION['update'] ="<b><p style='color:green'>New record Update successfully.</p></b>";
	//header("location:http://localhost/Cheezy%20Blast/Admin/ManageAdmin.php");
	header('location:'.$SITEURL.'Admin/ManageAdmin.php');
	
   } 
   else {
	 
	$_SESSION['update'] ="<b><p style='color:red'>New record Update Faile.</p></b>";
	header('location:'.$SITEURL.'Admin/ManageAdmin.php');
	 //header("location:http://localhost/Cheezy%20Blast/Admin/ManageAdmin.php");
   }


}

?>

<?php include('C:\PHP\htdocs\Cheezy Blast\Partials\Footer.php');?>



		

