<?php 
include('C:\PHP\htdocs\Cheezy Blast\Partials\Menu.php');
$SITEURL = 'http://localhost/Cheezy%20Blast/';
?>

		<!-- Main section -->
		<div class="Main">
			<div class="wrapper">
				<h1>Food Menu</h1></br>
				<?php
				if(isset($_SESSION['add']))
				{
					echo $_SESSION['add'];
					unset($_SESSION['add']);
				
				}
				if(isset($_SESSION['upload']))
				{
					echo $_SESSION['upload'];
					unset($_SESSION['upload']);
				
				}
				if(isset($_SESSION['delete']))
				{
					echo $_SESSION['delete'];
					unset($_SESSION['delete']);
				
				}
				if(isset($_SESSION['remove']))
				{
					echo $_SESSION['remove'];
					unset($_SESSION['remove']);
				
				}
				if(isset($_SESSION['NoCategoryFound']))
				{
					echo $_SESSION['NoCategoryFound'];
					unset($_SESSION['NoCategoryFound']);
				
				}
				if(isset($_SESSION['update']))
				{
					echo $_SESSION['update'];
					unset($_SESSION['update']);
				
				}
				if(isset($_SESSION['Faildremove']))
				{
					echo $_SESSION['Faildremove'];
					unset($_SESSION['Faildremove']);
				
				}

				
				
				?>
				<br>
				<table class="tbl-full">
					<tr>
						<th>ID</th>
						<th>Title</th>
						<th>Price</th>
						<th>Image</th>
						<th>Featured</th>
						<th>Active</th>
						<th>Actions</th>
					</tr>
					<tr>
					<?php
					$sql2 = "SELECT * FROM food";
					$res=mysqli_query($conn,$sql2);
					$count=mysqli_num_rows($res);
					// $count=mysqli_num_rows($conn->query($sql));
					// if($count>0)
					if($count>0)
					{
						while($row=mysqli_fetch_assoc($res))
						{
							$id=$row['Food_ID'];
							$title=$row['Title'];
							$description=$row['Food_Description'];
							$price=$row['Price'];
							$image_name=$row['Food_Image_Name'];
							$featured=$row['Featured'];
							$active=$row['Active'];
							?>
						<tr>
						<td><?php echo $id;?></td>
						<td><?php echo $title;?></td>
						<td><?php echo $price ;?></td>
						<td>
							<?php 
							if($image_name!="")
							{
								?>
								<img src="<?php echo $SITEURL;?>images/Food/<?php echo $image_name;  ?>" width="150px">

								<?php


							}
							else
							{
								echo"<b><p style='color:green'>Image Not Added.</p></b>";
							}
							
							?>
						</td>
						<td><?php echo $featured ?></td>
						<td><?php echo $active;?></td>
						<td>
							<!-- <a href="" class="btn-2">Update Category</a> -->
							<a href="<?php echo $SITEURL?>Admin/UpdateFood.php?id=<?php echo $row['Food_ID']; ?>  " class="btn-2">Update Food</a>
							<a href="<?php echo $SITEURL?>Admin/DeleteFood.php? id=<?php echo $row['Food_ID']; ?>&image_Name=<?php echo $row['Food_Image_Name']; ?>"class="btn-dlt">Delete Food</a>

						</td>
						</tr>


						<?php
						}
					}					
					else
					{
						?>
				
					<tr>
						<td colospan="6">"<b><p style='color:Red'>New record not added.</p></b></td>
					</tr>
					


						<?php

					}
					?>


				</table>
				</br>
				<a href="AddFood.php" class="btn-1">Add Food</a>
				


			</div>
		</div>

		
<?php include('C:\PHP\htdocs\Cheezy Blast\Partials\Footer.php');?>