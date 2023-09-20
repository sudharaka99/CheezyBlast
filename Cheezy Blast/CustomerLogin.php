<?php include('Partial_Front\Menu.php'); ?>
<?php $SITEURL = ('http://localhost/Cheezy%20Blast/'); ?>
<link rel="stylesheet"href="../css/admin.css">
<link rel="stylesheet" href="css/style.css">


        
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
                <td rowspan="5">
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
                            <input type="text" placeholder="Username" name="CusUserName" class="login__input">
                        </td>
                        </tr>

                      

                            <tr>
                            <td>
                                <input type="password" placeholder="Password" name="Cuspassword" class="login__input">     
                            </td>
                            </tr>
                            <tr>
                            <td>
                                <input type="submit" value="Sign_In" name="Sign_in" class="login__submit">
                            </td>
                            <td>
                                <input type="submit" value="Sign Up" name="Sign_up"class="login__submit">
                            </td>
                            </tr>
                        </form> 

                </table>
				</form>
</div>  

    </body>
</html>

<?php
if(isset($_POST['Sign_up']))
{
    header('location:'.$SITEURL.'CustomerRegistration.php');   
}
?>


<?php
if(isset($_POST['Sign_in']))
{
    //$username=$_POST['user'];
    $username=mysqli_real_escape_string($conn, $_POST['CusUserName']);
    //$password=$_POST['password'];
    $st_password=$_POST['Cuspassword'];
    $password=mysqli_real_escape_string($conn, $st_password);

   $sql="SELECT Username AND Password FROM `customer` WHERE Username='$username' AND Password='$password'";

    $count=mysqli_num_rows($conn->query($sql));
        if($count==1)
        {
            $_SESSION['login'] ="<b><p style='color:green'>Login Successful.</p></b>";
            $_SESSION['user']=$username;

            $_SESSION['Islogin'] =true;
            header('location:'.$SITEURL.'index.php');


            
            
        }
        
        else
        {
            $_SESSION['login'] ="<b><p style='color:red'>Login Not Successful</p></b>";
            header('location:'.$SITEURL.'CustomerLogin.php');
        }
    }


?>
<?php include('Partial_Front\Footer.php'); ?>
<script>
                function myFunction() {
                var x = document.getElementById("show");
                if (x.type === "password") {
                x.type = "text";
                 } else {
                    x.type = "password";
                 }
                    }
                </script>
