<?php
include('../config/constants.php'); 
// include('../Admin/ManageCategory.php');
$SITEURL = 'http://localhost/Cheezy%20Blast/';

if(isset($_GET['id']) AND isset($_GET['image_Name']))
{
    $id=$_GET['id'];
    $image_name=$_GET[image_Name];

    if($image_name !="")
    {
        $remove = unlink("../images/Category/".$image_name);

        if($remove==false)
        {
            $_SESSION['remove'] ="<b><p style='color:red'>Faile To Remove.</p></b>";
			header('location:'.$SITEURL.'Admin/ManageCategory.php');
            die();

        }
        else
        {
            echo"ghy";
        }
    }


    $sql="DELETE FROM category WHERE Category_ID=$id";
    $res = mysqli_query($conn,$sql);
    if($res==true)
    {
        $_SESSION['delete'] ="<b><p style='color:green'>Category Deleted successfully.</p></b>";
		header('location:'.$SITEURL.'Admin/ManageCategory.php');
    }
    else
    {
        $_SESSION['delete'] ="<b><p style='color:red'>Faile to Delete.</p></b>";
		header('location:'.$SITEURL.'Admin/ManageCategory.php');
    }
}
else
{
    header("location:".$SITEURL.'Admin/ManageCategory.php');
}



?>