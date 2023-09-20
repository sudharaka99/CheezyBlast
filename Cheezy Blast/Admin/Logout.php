<?php  include('../Config/Constants.php'); 
$SITEURL = 'http://localhost/Cheezy%20Blast/';

session_destroy();

header('location:'.$SITEURL.'Admin/Login.php');
?>