<?php include('C:\PHP\htdocs\Cheezy Blast\Partials\Menu.php');?>
<link rel="stylesheet"href="../css/admin.css">
<?php $SITEURL = 'http://localhost/Cheezy%20Blast/'; ?>



	<!-- Main section -->
		<div class="Main">
			<div class="wrapper">
				<h1>Change Password</h1>

				<br>
				<?php	
                if(isset($_GET['id']))
                {
                    $id=$_GET['id'];
                    
                }
             
			
				$sql="SELECT * FROM admin where ID=$id;";
                //$sql="SELECT * FROM admin where Password=$Current_password;";

				if(mysqli_query($conn,$sql)){
					
					echo $id;
					$row=mysqli_fetch_assoc(mysqli_query($conn,$sql));
                        $Current_password=$row['Password'];

				 } 
				else
				{
					header("location:http://localhost/Cheezy%20Blast/Admin/ManageAdmin.php");
					
				}
				?>


				<form action="" method="Post">
				<table class="tbl-full">
                <tr>
						<td>Current Password :</td>
						<td><input type="password" name="Cpassword" placeholder="Current Password" value="<?php $Current_password;?>"></td>
				</tr>
                <tr>
						<td>New Password :</td>
						<td><input type="password" name="Npassword" placeholder="New Password"></td>
				</tr>
                <tr>
						<td>Comfirm Password :</td>
						<td><input type="password" name="Fpassword" placeholder="Comfirm Password"></td>
				</tr>
                <tr>
						<td colospan="2">
							<input type="hidden" name="ID" value="<?php echo $id;?>">
							<input type="submit" name="submit" value="Change Password" class="btn-2">
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
	$Current_password=($_POST['Cpassword']);
	$New_password=($_POST['Npassword']);
    $Com_password=($_POST['Fpassword']);	
	

    $sql="SELECT ID FROM admin WHERE ID='$id' AND Password='$Current_password'";
    $count=mysqli_num_rows($conn->query($sql));
    // $sql="SELECT * FROM admin WHERE ID='$id'";
    // $sql="SELECT * FROM admin WHERE Password='$Current_password'";

        if($count==1)
        {
           if($New_password==$Com_password)
           {
            $sql2="UPDATE admin SET Password ='$New_password' WHERE ID='$id'";
                if($conn->query($sql2) === TRUE) 
                {
                $_SESSION['ChangePwd'] ="<b><p style='color:green'>Successfully.</p></b>";
                header('location:'.$SITEURL.'Admin/ManageAdmin.php');
               } 
               else 
               { 
                $_SESSION['ChangePwd'] ="<b><p style='color:red'>Change password.</p></b>";
                header('location:'.$SITEURL.'Admin/ManageAdmin.php');
               }
           }
           else
           {
            $_SESSION['PasswordNotMatch'] ="<b><p style='color:red'>Password not match.</p></b>";
            header('location:'.$SITEURL.'Admin/ManageAdmin.php');
           }
          //echo $Current_password;  
        }
        else
        {
            $_SESSION['UserNotFound'] ="<b><p style='color:red'>User not found.</p></b>";
            header('location:'.$SITEURL.'Admin/ManageAdmin.php');
        }

}

?>

<?php include('C:\PHP\htdocs\Cheezy Blast\Partials\Footer.php');?>



		

