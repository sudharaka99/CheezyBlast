<?php include('C:\PHP\htdocs\Cheezy Blast\Partials\Menu.php');
$SITEURL = 'http://localhost/Cheezy%20Blast/';
?>

<!-- Main section -->
<div class="Main">
			<div class="wrapper">
				<h1>Update Order</h1>
				<br>
                <?php	
		        if(isset($_GET['id']))
                {
                    $id=$_GET['id'];
                    $sql="SELECT * FROM `order` WHERE Order_ID=$id";
                    $res=mysqli_query($conn,$sql);
                    $count=mysqli_num_rows($res);
                    if($count==1)
                    {
                        $row=mysqli_fetch_assoc($res);
                        $id=$row['Order_ID'];
                        $food=$row['Food'];
                        $qty=$row['Qty'];
                        $status=$row['Order_Status'];
                        $customer_name=$row['Customer_Name'];
                        $total=$row['Total'];
                        $price=$row['Price'];
                    }
                    else
                    {
                        header('location:'.$SITEURL.'/Admin/UpdateOrder.php');
                    }

                    
                    
                }
                else
                {
                    header('location:'.$SITEURL.'/Admin/UpdateOrder.php');
                }
                ?>
                            
				<form action="" method="Post">
				<table class="tbl-full">
					<tr>
						<td>Food Name </td>
                        <td>: <?php echo $food; ?> </td>
			
					</tr>
                    <tr>
						<td>Customer Name </td>
                        <td>: <?php echo $customer_name; ?> </td>
			
					</tr>
					</br>
					<tr>
						<td>Qty </td>
						<td>: <input type="number" name="qty" value="<?php echo $qty;?>"></td>
					</tr>
					</br>
					<tr>
                        <td>Status </td>
                        <td>: 
                            <select name="status">
                            <option <?php if($status=="Ordered"){echo"Selected";} ?>value="Ordered"> Ordered</option>
                            <option <?php if($status=="On Delivery"){echo"Selected";} ?> value="On Delivery"> On Delivery</option>
                            <option <?php if($status=="Delivered"){echo"Selected";} ?>  value="Delivered"> Delivered</option>
                            <option <?php if($status=="Cancelled"){echo"Selected";} ?> value="Cancelled"> Cancelled</option>
                            </select>
                        </td>
					</tr>
                    <tr>
						<td colospan="2">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="hidden" name="food" value ="<?php echo $food;?>">
                            <input type="hidden" name="cus_name" value ="<?php echo $customer_name;?>">
                            <input type="submit" name="submit" value="Update Order" class="btn-2">
						</td>
					</tr>
						
						
				
				</table>
				</form>
                    
                <?php
                if(isset($_POST['submit']))
                {
                    $id=$_POST['id'];
                    $qty=$_POST['qty'];
                    $status=$_POST['status'];
                    $total=$price*$qty;

                    $sql2="UPDATE  `order` SET 
                    Qty='$qty',
                    Order_Status='$status',
                    Total='$total'
                    WHERE Order_ID=$id
                    ";
                  if ($conn->query($sql2) === TRUE) {
            
                    $_SESSION['update'] ="<div class='success text-center'>Update successfully.</div>";
                    header('location:'.$SITEURL.'Admin/ManageOrder.php');
                
                } 
                else {
                    
                    $_SESSION['update'] ="<div class='error text-center'>Update Failed.</div>";
                    header('location:'.$SITEURL.'Admin/ManageOrder.php');
                }

                }
                ?>
				

			</div>
		</div>




<?php include('C:\PHP\htdocs\Cheezy Blast\Partials\Footer.php')?>