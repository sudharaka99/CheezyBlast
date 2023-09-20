<?php include('Partial_Front\Menu.php'); ?>
<?php $SITEURL = ('http://localhost/Cheezy%20Blast/'); ?>
<?php
if(isset($_GET['Food_ID']))
{
    $food_id=$_GET['Food_ID'];

    $sql="SELECT * FROM food WHERE Food_ID=$food_id";
    $res=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($res);
    if($count==1)
    {
        $row=mysqli_fetch_assoc($res);
        $title=$row['Title'];
        $price=$row['Price'];
        $description=$row['Food_Description'];
        $image_name=$row['Food_Image_Name'];
    }
    else
    {
        header('location:'.$SITEURL);
    }

}
else
{
    header('location:'.$SITEURL);
}

?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="Post"  class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                    <?php
                        if($image_name=="")
                        {
                            echo "<div class='error'> Image not Available.</div>";
                        }
                        else
                        {
                            ?>
                                <img src="<?php echo $SITEURL;?>images/Food/<?php echo $image_name;?> "  class="img-responsive img-curve">
                            <?php
                        }
                        ?>
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title;?> </h3>
                        <input type ="hidden" name="Food" value="<?php echo $title;?>">

                        <p class="food-price"><?php echo $price;?> </p>
                        <input type ="hidden" name="Price" value="<?php echo $price;?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>

                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="name" placeholder="E.g. Sandeepa Sudharaka" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 0715691384" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. jrsandeepa1999@gmail.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>
            <?php
                if(isset($_POST['submit']))
                {
                    $food=$_POST['Food'];
                    $price=$_POST['Price'];
                    $qty=$_POST['qty'];
                    $total= $price * $qty;
                    $order_date= date("Y-m-d h:i:sa");
                    $status="ordered";
                    $customer_name=$_POST['name']; 
                    $customer_contact=$_POST['contact'];
                    $customer_email=$_POST['email'];
                    $customer_address=$_POST['address'];

                    $sql2 = "INSERT INTO `order`(`Food`, `Price`, `Qty`, `Total`, `Order_Date`, `Order_Status`, `Customer_Name`, `Customer_Contact`, `Customer_Email`, `Customer_Address`)
                    VALUES ('$food','$price','$qty','$total','$order_date','$status','$customer_name','$customer_contact','$customer_email','$customer_address')";
                    $res2=mysqli_query($conn,$sql2);

                    if($res2==TRUE)
                    {
                        
                      $_SESSION['order'] ="<div class='success text-center'>Food Ordered successfully.</div>";
                        header('location:'.$SITEURL);
                       
                        
                    } 
                    else {
                        
                        $_SESSION['order'] ="<div class='error text-center'>Food Ordered Failed.</div>";
                        header('location:'.$SITEURL);
                        
                    }
         
                        
                }
            ?>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php include('Partial_Front\Footer.php'); ?>