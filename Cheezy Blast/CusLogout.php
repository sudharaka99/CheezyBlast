<?php  include('../Config/Constants.php'); 
$SITEURL = 'http://localhost/Cheezy%20Blast/';

//Initialize the session
session_start();
//Unset all of the session variables
$_SESSION = array();
 //Destroy the session.
session_destroy();



header('location:'.$SITEURL.'CustomerLogin.php');
?>