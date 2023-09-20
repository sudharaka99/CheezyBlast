<?php  include('../Config/Constants.php'); ?>
<?php $SITEURL = 'http://localhost/Cheezy%20Blast/'; ?>

<html>
    <head>
        <title>Login-Food order system</title>
        <style>
        <?php include('..\css\admin.css'); ?>
        </style>
    </head>

<body>
        <div class="login">
        <table>
            <tr>
                <td width="50%">
        <h1 class="text-center"  >CHEEZY BLAST</h1><br>
</td>
<td rowspan="4">
<h1 class="text-center">Hello, Friend!</h1><br>
				<p class="text-center"><b>Whenever, wherever.We’ll bring food to you.<b></p> 
               
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
            <input type="text" placeholder="Username" name="user" class="login__input">
        </td>
        </tr>
        <tr>
            <td>
                <input type="password" placeholder="Password" name="password" class="login__input">     
            </td>
            </tr>
            <tr>
            <td>
				<input type="submit" value="Login" name="submit" class="login__submit">
            </td>
            </tr>
        </form> 

</table>
</div>  

    </body>
</html>


<?php
if(isset($_POST['submit']))
{
    //$username=$_POST['user'];
    $username=mysqli_real_escape_string($conn, $_POST['user']);
    //$password=$_POST['password'];
    $st_password=$_POST['password'];
    $password=mysqli_real_escape_string($conn, $st_password);

   $sql="SELECT Username AND Password FROM admin WHERE Username='$username' AND Password='$password'";

    $count=mysqli_num_rows($conn->query($sql));
        if($count==1)
        {
            $_SESSION['login'] ="<b><p style='color:green'>Login Successful.</p></b>";
            $_SESSION['user']=$username;
            header('location:'.$SITEURL.'Admin/');
            
        }
        
        else
        {
            $_SESSION['login'] ="<b><p style='color:red'>Login Not Successful</p></b>";
            header('location:'.$SITEURL.'Admin/Login.php');
        }
    }


?>
<?php include('C:\PHP\htdocs\Cheezy Blast\Partials\Footer.php');?>
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
