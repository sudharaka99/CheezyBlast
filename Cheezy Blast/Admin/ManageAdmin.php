<?php include('C:\PHP\htdocs\Cheezy Blast\Partials\Menu.php');
$SITEURL = 'http://localhost/Cheezy%20Blast/';

?>
		

		<div class="Main">
			<div class="wrapper">
				<h1>Admin</h1></br>
				<?php 
				
				if(isset($_SESSION['add']))
				{
					echo $_SESSION['add'];
					unset($_SESSION['add']);
				
				}

				if(isset($_SESSION['delete']))
				{
					echo $_SESSION['delete'];
					unset($_SESSION['delete']);
				
				}

				if(isset($_SESSION['update']))
				{
					echo $_SESSION['update'];
					unset($_SESSION['update']);
				
				}

				if(isset($_SESSION['UserNotFound']))
				{
					echo $_SESSION['UserNotFound'];
					unset($_SESSION['UserNotFound']);
				
				}

				if(isset($_SESSION['PasswordNotMatch']))
				{
					echo $_SESSION['PasswordNotMatch'];
					unset($_SESSION['PasswordNotMatch']);
				
				}

				if(isset($_SESSION['ChangePwd']))
				{
					echo $_SESSION['ChangePwd'];
					unset($_SESSION['ChangePwd']);
				
				}



				
				?>
				</br>

				<table class="tbl-full">
					<tr>
						<th>ID</th>
						<th>Full_Name</th>
						<th>Username</th>
						<th>Actions</th>
					</tr>
					<?php 
					$sql = "SELECT ID, Full_Name, Username FROM admin";
					$result = $conn->query($sql);
					
					if ($result->num_rows > 0) {
					  // output data of each row
					  while($row = $result->fetch_assoc()) {
						//$_GET['id'] = $row["ID"];
					
					?>
					<tr>
					<td><?php echo $row["ID"] ?></td>
					<td><?php echo $row["Full_Name"] ?></td>
					<td><?php echo $row["Username"] ?></td>
					<td>
					<a href="<?php echo $SITEURL?>Admin/UpdatePassword.php?id=<?php echo $row['ID']; ?>"class="btn-1">Change Password</a>
					<a href="<?php echo $SITEURL?>Admin/UpdateAdmin.php?id=<?php echo $row['ID']; ?>" class="btn-2">Update Admin</a>
					<a href="<?php echo $SITEURL?>Admin/DeleteAdmin.php?id=<?php echo $row['ID']; ?>" class="btn-dlt">Delete Admin</a>
					<!-- <a href="<?php  ?>" class="btn-dlt">Delete Admin</a> -->

					</td>	
					</tr>
					<?php 
					  }
				
					}else {
					  echo "0 results"; 
					}
					 //$conn->close(); 
					 ?>
					

				</table>
				</br>
				<a href="Add-Admin.php" class="btn-1">Add Admin</a>


			</div>
		</div>

		

<?php include('C:\PHP\htdocs\Cheezy Blast\Partials\Footer.php')?>