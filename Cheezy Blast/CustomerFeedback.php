<?php   
include('Partial_Front\Menu.php'); 
$SITEURL = ('http://localhost/Cheezy%20Blast/'); ?>

<link rel="stylesheet"href="../css/admin.css">
<link rel="stylesheet" href="css/style.css">

<?php
	if(isset($_POST['submit']))
	{
	$Full_Name=$_POST['Full_Name'];
	$description=$_POST['description'];	
	$satisfaction=$_POST['satisfaction'];
	
	
	$sql = "INSERT INTO `feedback` (`Full_Name`, `Feedback`,`Satisfaction`)
VALUES ('$Full_Name', '$description', '$satisfaction')";
	
		 if ($conn->query($sql) === TRUE) {
		
			$_SESSION['order'] ="<div class='success text-center'>Feedback Successfully Updated.</div>";
			header('location:'.$SITEURL.'index.php');
			
		   } 
		   else {
		 	
			$_SESSION['order'] ="<div class='error text-center'>Feedback Failed.</div>";
			header('location:'.$SITEURL.'index.php');
			
		   }
		
		}
    ?>
		

<!-- Main section -->
<div class="Main">
			<div class="wrapper">
				<h1 class="text-center">Customer Feedback</h1>
				<form action="" method="Post">
				<table class="tbl-full  text-left" >
				<tr>
						<td>Full Name :</td>
						<td><input type="text" name="Full_Name" placeholder="Enter Your Name"></td>
					</tr>
					</br>
                 
					<tr>
                        <td>Feedback : </td>
						<td><textarea name ="description" cols="30" rows="10"></textarea></td> 
					</tr>
					
                    </br>
					<tr>
                        <td colospan="2">Overall satisfaction of service</td>
                        <td><input type="radio" name="satisfaction" value="Very satisfied">Very satisfied</br>
                        <input type="radio" name="satisfaction" value="Satisfied">Satisfied</br>
                        <input type="radio" name="satisfaction" value="Neutral">Neutral</br>
                        <input type="radio" name="satisfaction" value="Unsatisfied">Unsatisfied</br>
                        <input type="radio" name="satisfaction" value="Very unsatisfied">Very unsatisfied</td>
					</tr>
					<tr>
						<td colspan="2" >
							<input type="submit" name="submit" value="Submit Feedback" class="login__submit">
						</td>
					</tr>
						
				
				</table>
				</form>
				

			</div>
		</div>

<?php include('Partial_Front\Footer.php'); ?>