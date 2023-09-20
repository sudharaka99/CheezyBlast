<?php

  include('../Config/Constants.php'); 
  //include('../Admin/ManageAdmin.php');
  $SITEURL = 'http://localhost/Cheezy%20Blast/';
  if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql= "DELETE FROM admin WHERE ID=$id;";

$res=mysqli_query($conn,$sql);
 if($res==true){
    //echo $sql;
    //echo '<script>alert("Delete successfully")</script>';
    $_SESSION['delete']="<b><p style='color:green'>User Deleted Successfully</p></b>";
    header("location:".$SITEURL.'Admin/ManageAdmin.php');
 } 
 }
else
{

}
?>
