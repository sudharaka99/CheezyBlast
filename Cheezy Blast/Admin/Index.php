

<?php include('..\Partials\Menu.php')?>
		
		<!-- Main section- -->
		<div class="Main">
			<div class="wrapper">
				<h1>Dashboard</h1><br>
				<?php
        			if(isset($_SESSION['login']))
						{
							echo $_SESSION['login'];
							unset($_SESSION['login']);
				
						}
				?>
					</br>
					</br>

						<div class="col text-center">

						<?php
						$sql = "SELECT*FROM category";
						$res =mysqli_query($conn, $sql);
						$count=mysqli_num_rows($res);
						?>

							<h2> <?php echo $count;?> </h2>
							Category
						</div>

						<div class="col text-center">
						<?php
						$sql2 = "SELECT*FROM food";
						$res2 =mysqli_query($conn, $sql2);
						$count2=mysqli_num_rows($res2);
						?>

							<h2> <?php echo $count2;?> </h2>
							Foods
						</div>

						<div class="col text-center">
						<?php
						$sql3 = "SELECT*FROM `order`";
						$res3=mysqli_query($conn, $sql3);
						$count3=mysqli_num_rows($res3);
						?>

							<h2> <?php echo $count3;?> </h2>
							Total Order
						</div>

						<div class="col text-center">
							<?php
							$sql4 = "SELECT SUM(Total) AS total FROM `order` WHERE Order_Status='Delivered'";
							$res4 =mysqli_query($conn, $sql4);
							$row4=mysqli_fetch_assoc($res4);
							$total_revenue=$row4['total'];
							?>

								<h2><?php echo $total_revenue;?> </h2>
								Profit gained
							</div>
										
					<div class="clearfix"></div>


					</div>
				</div>

<?php include('..\Partials\Footer.php')?>


