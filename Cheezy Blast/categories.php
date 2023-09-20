<?php include('Partial_Front\Menu.php'); ?>
<?php if(!isset($_SESSION['login']))
{
    header('location: '.$SITEURL.'CustomerLogin.php');
}
?>



<section class="categories">
        <div class="container">
            <h2 class="text-center">Categories</h2>

            <?php 
            $sql="SELECT * FROM category WHERE Active='Yes'" ;
            $res= mysqli_query($conn,$sql);

            $count=mysqli_num_rows($res);
             if($count>0)
             {
                while($row=mysqli_fetch_assoc($res))
                {
                    $id=$row['Category_ID'];
                    $title=$row['Title'];
                    $image_name=$row['Category_Image_Name'];
                    ?>
                     <a href="<?php echo $SITEURL;?>category-foods.php?Category_ID=<?php echo $id;?>">
                        <div class="box-3 float-container">
                            <?php 
                            if($image_name=="")
                            {
                                echo "<b><p style='color:red'>Image not Available.</p></b>";
                            }
                            else
                            {
                                ?>
                                    <img src="<?php echo $SITEURL;?>images/Category/<?php echo $image_name;?> " width="400px" highth="500" class="img-responsive img-curve">
                                <?php
                            }
                            
                            ?>
                            <h3 class="float-text text-white"><?php  echo $title;?></h3>
            </div>
            </a>
                    <?php

                }
             }
            else
            {
                echo "<b><p style='color:red'>Category not Found.</p></b>";
            }
            
            
            
            
            ?>
           
            
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->
 


    <?php include('Partial_Front\Footer.php'); ?>