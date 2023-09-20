<?php include('C:\PHP\htdocs\Cheezy Blast\Partials\Menu.php');
$SITEURL = 'http://localhost/Cheezy%20Blast/';

?>
		<!-- Main section -->
		
		<div class="Main">
			<div class="">
				<h1 class="text-center">Customer Feedback</h1>
</br>
				
				</br>
				
				<table class="tbl-full">
				
					<tr>
						<th>ID</th>
						<th>Full_Name</th>
						<th>Feedback</th>
						<th>Satisfaction</th>
					</tr>
					<?php
					 $sql2 ="SELECT * FROM `feedback` ORDER BY Feedback_ID DESC" ;
					 $res2 = mysqli_query($conn,$sql2);
		 
					 $count2=mysqli_num_rows($res2);
					 $O_ID=1;
					if($count2>0)
					{
						while($row=mysqli_fetch_assoc($res2))
						{
							$id=$row['Feedback_ID'];
							$fullname=$row['Full_Name'];
							$feedback=$row['Feedback'];
							$satisfaction=$row['Satisfaction'];
                            ?>
							<tr>
								<td><?php echo $O_ID++;?> </td>
								<td><?php echo $fullname; ?> </td>
								<td> <?php echo $feedback; ?></td>
								<td> <?php echo $satisfaction; ?> </td>
								</td>

							</tr>

							<?php
	
						}
							
					}
					else
					{
						echo "<tr><td colspan='12' class='error'>Feedback Not Yet</td></tr>";
					}


					?>
					

				</table>
				</br>
				
				


			</div>
		</div>


		

<?php include('C:\PHP\htdocs\Cheezy Blast\Partials\Footer.php')?>