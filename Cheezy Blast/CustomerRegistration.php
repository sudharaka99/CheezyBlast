<?php include('Partial_Front\Menu.php'); ?>
<?php $SITEURL = ('http://localhost/Cheezy%20Blast/'); ?>
<link rel="stylesheet"href="../css/admin.css">
<link rel="stylesheet" href="css/style.css">



<?php
	if(isset($_POST['submit']))
	{
	$Full_Name=$_POST['Cusfullname'];
	$Username=$_POST['CusUserName'];	
	$email=$_POST['Cusemail'];
    $phone_number=$_POST['CusPhoneNumber'];
    $address=$_POST['CusAddress'];
    $password=$_POST['Cuspassword'];
  
	
	
	$sql = "INSERT INTO `customer`(`Full_Name`, `Username`, `Email`, `Mobile_number`, `Address`, `Password`)
VALUES ('$Full_Name', '$Username', '$email','$phone_number','$address','$password')";



                $res=mysqli_query($conn,$sql);

                if($res==TRUE)
                {
			$_SESSION['login'] ="<b><p style='color:green'>Customer Registration successfully.</p></b>";
            header('location:'.$SITEURL.'CustomerLogin.php'); 
			
		   } 
		   else {
		 	
			$_SESSION['No_login_massage'] ="<b><p style='color:red'>Customer Registration Faile.</p></b>";
			header('location:'.$SITEURl.'CustomerRegistration.php');
		   }
		
		}
		
else{
?>

	<!-- Main section -->
		<div class="Main">
			<div class=" wrapper login">
				<form action="" method="Post">
                <table class="tbl-full">
                        
                            <tr>
                                <td>
                        <h1 class="text-center"  >CHEEZY BLAST</h1><br>
                        <h4 class="text-center"  >Customer Registration</h4><br>
                </td>
                
                <td>
                    <td>
</td>
                </td>
                <td rowspan="8">
                <h1 class="text-center">Hello, Friend!</h1><br>
                                <p class="text-right"><b>Whenever, wherever.We’ll bring food to you.<b></p> 
                            
                </td>
                </tr>
                <?php
                        if(isset($_SESSION['login']))
                                {
                                    echo $_SESSION['login'];
                                    unset($_SESSION['login']);
                                
                                }

                                if(isset($_SESSION['No_login_massage']))
                                {
                                    echo $_SESSION['No_login_massage'];
                                    unset($_SESSION['No_login_massage']);
                                
                                }
                ?>
                <br>

                        <form action="" method="POST" >
                        <tr>
                        <td>
                            <input type="text" placeholder="Full name" name="Cusfullname" class="login__input">
                        </td>
                        </tr>
                        <tr>
                        <td>
                            <input type="text" placeholder="Username" name="CusUserName" class="login__input">
                        </td>
                        </tr>

                        <tr>
                            <td>
                                <input type="mail" placeholder="E-Mail" name="Cusemail" class="login__input"> 
                            </td>
                            </tr>

                            <tr>
                            <td>
                                <input type="number" placeholder="Phone Number" name="CusPhoneNumber" class="login__input">     
                            </td>
                            </tr>

                            <tr>
                            <td>
                                <input type="text" placeholder="Address" name="CusAddress" class="login__input">     
                            </td>
                            </tr>

                            <tr>
                            <td>
                                <input type="password" placeholder="Password" name="Cuspassword" class="login__input">     
                            </td>
                            </tr>
                            <tr>
                            <td>
                                <input type="submit" value="Sign Up" name="submit" class="login__submit">
                            </td>
                            </tr>
                        </form> 

                </table>
				</form>
				

			</div>
		</div>


        <?php
    }
?>








<?php include('Partial_Front\Footer.php'); ?>


		

