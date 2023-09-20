<?php include('Partial_Front\Menu.php'); ?>
<?php
if(isset($_GET['Category_ID']))
{
    $category_id=$_GET['Category_ID'];
    $sql="SELECT Title FROM category WHERE Category_ID=$category_id";
    $res= mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($res);
    $category_title=$row['Title'];

}
else
{
    //header('location:'.$SITEURL);
}
?>


    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white">"<?php echo $category_title;?> "</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



   <!-- fOOD MEnu Section Starts Here -->
   <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
                $sql2="SELECT * FROM food  WHERE Category_ID=$category_id";
                $res2= mysqli_query($conn,$sql2);

                $count2=mysqli_num_rows($res2);
                 if($count2>0)
                 {
                    while($row2=mysqli_fetch_assoc($res2))
                    {
                        $id=$row2['Food_ID'];
                        $title=$row2['Title'];
                        $price=$row2['Price'];
                        $description=$row2['Food_Description'];
                        $image_name=$row2['Food_Image_Name'];
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
                                            <img src="<?php echo $SITEURL;?>images/Food/<?php echo $image_name;?> "  width="400px" highth="500" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                            </div>

                            <div class="food-menu-desc">
                                <h4><?php echo $title; ?></h4>
                                <p class="food-price"><?php echo $price; ?></p>
                                <p class="food-detail">
                                <?php echo $description; ?>
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
                    echo "<div class='error'> Food not found.</div>";
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