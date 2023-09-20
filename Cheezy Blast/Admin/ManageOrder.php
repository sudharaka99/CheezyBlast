<?php include('C:\PHP\htdocs\Cheezy Blast\Partials\Menu.php');
$SITEURL = 'http://localhost/Cheezy%20Blast/';

?>
		<!-- Main section -->
		
		<div class="Main">
			<div class="">
				<h1 class="text-center">Manage Orders</h1>
</br>
				<?php
				if(isset($_SESSION['update']))
				{
					echo $_SESSION['update'];
					unset($_SESSION['update']);
				
				}
				?>
				</br>
				
				<table class="tbl-full  Order_font">
				
					<tr>
						<th>ID</th>
						<th>Food</th>
						<th>Price</th>
						<th>Qty</th>
						<th>Total</th>
						<th>Order_Date</th>
						<th>Status</th>
						<th>Customer_Name</th>
						<th>Customer_Contact</th>
						<th>Customer_Email</th>
						<th>Customer_Address</th>
						<th>Actions</th>
					</tr>
					<?php
					 $sql2 ="SELECT * FROM `order` ORDER BY Order_ID DESC" ;
					 $res2 = mysqli_query($conn,$sql2);
		 
					 $count2=mysqli_num_rows($res2);
					 $O_ID=1;
					if($count2>0)
					{
						while($row=mysqli_fetch_assoc($res2))
						{
							$id=$row['Order_ID'];
							$food=$row['Food'];
							$price=$row['Price'];
							$qty=$row['Qty'];
							$total=$row['Total'];
							$order_date=$row['Order_Date'];
							$status=$row['Order_Status'];
							$customer_name=$row['Customer_Name'];
							$customer_contact=$row['Customer_Contact'];
							$customer_email=$row['Customer_Email'];
							$customer_address=$row['Customer_Address'];
							?>
							<tr>
								<td><?php echo $O_ID++;?> </td>
								<td><?php echo $food; ?> </td>
								<td> <?php echo $price; ?></td>
								<td> <?php echo $qty; ?> </td>
								<td> <?php echo $total; ?> </td>
								<td> <?php echo $order_date; ?> </td>

								<td> <?php if($status=="Ordered")
								{
									echo "<label> $status </label>";
								} 
								elseif($status=="On Delivery")
								{
									echo "<label style='color:yellow;'> $status </label>";
								}
								elseif($status=="Delivered")
								{
									echo "<label style='color:green;'> $status </label>";
								}
								elseif($status=="Cancelled")
								{
									echo "<label style='color:red;'> $status </label>";
								}
								?> </td>

								<td> <?php echo $customer_name; ?> </td>
								<td> <?php echo $customer_contact; ?> </td>
								<td> <?php echo $customer_email; ?> </td>
								<td> <?php echo $customer_address; ?> </td>


								<td><a href="<?php echo $SITEURL?>Admin/UpdateOrder.php?id=<?php echo $row['Order_ID']; ?>" class="btn-2">Update Order</a></td>	
							</tr>

							<?php
	
						}
							
					}
					else
					{
						echo "<tr><td colspan='12' class='error'>Orders Not Availables</td></tr>";
					}


					?>
					

				</table>
				</br>
				
				


			</div>
		</div>


		

<?php include('C:\PHP\htdocs\Cheezy Blast\Partials\Footer.php')?>