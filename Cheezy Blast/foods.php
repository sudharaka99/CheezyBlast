<?php include('Partial_Front\Menu.php'); ?>
<?php $SITEURL = ('http://localhost/Cheezy%20Blast/'); ?>
<?php if(!isset($_SESSION['login']))
{
    header('location: '.$SITEURL.'CustomerLogin.php');
}
?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo $SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



  <!-- fOOD MEnu Section Starts Here -->
  <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php

                    $sql2="SELECT * FROM food WHERE Active='Yes'" ;
                    $res2= mysqli_query($conn,$sql2);

                    $count2=mysqli_num_rows($res2);
                    if($count2>0)
                    {
                        while($row=mysqli_fetch_assoc($res2))
                        {
                            $id=$row['Food_ID'];
                            $title=$row['Title'];
                            $price=$row['Price'];
                            $description=$row['Food_Description'];
                            $image_name=$row['Food_Image_Name'];
                            ?>
                                <div class="food-menu-box">
                                    <div class="food-menu-img">
                                    <?php 
                                    if($image_name=="")
                                    {
                                        echo "<b><p style='color:red'>Image not Available.</p></b>";
                                    }
                                    else
                                    {
                                        ?>
                                           <img src="<?php echo $SITEURL; ?>images/Food/<?php echo $image_name;?> "  class="img-responsive img-curve">
                                        <?php
                                    }
                                    
                                    ?>

                                   
                                </div>

                                    <div class="food-menu-desc">
                                        <h4><?php  echo $title;?></h4>
                                        <p class="food-price"><?php  echo $price;?></p>
                                        <p class="food-detail">
                                        <?php  echo $description;?>
                                        </p>
                                        <br>

                                        <a href="<?php echo $SITEURL; ?>order.php?Food_ID=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                                    </div>
                                </div>

                            <?php
                    
                        }
                    }
                    else
                    {
                        echo "<b><p style='color:red'>Food not Available.</p></b>";
                    }

            ?>

            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('Partial_Front\Footer.php'); ?>