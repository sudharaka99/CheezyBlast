<?php include('Partial_Front\Menu.php'); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <?php
             //$search=$_POST['search'];
             $search=mysqli_real_escape_string($conn, $_POST['search']);
            ?>
            <h2>Foods on Your Search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
                $sql="SELECT * FROM food WHERE Title LIKE '%$search%' OR Food_Description LIKE '%$search%'";
                $res= mysqli_query($conn,$sql);

                $count=mysqli_num_rows($res);

                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
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
                                            <img src="<?php echo $SITEURL;?>images/Food/<?php echo $image_name;?> "  width="400px" highth="500" class="img-responsive img-curve">
                                        <?php
                                    }


                                ?>

                            </div>

                            <div class="food-menu-desc">
                                <h4><?php echo $title;  ?></h4>
                                <p class="food-price"><?php echo $price;  ?></p>
                                <p class="food-detail">
                                <?php echo $description;  ?>
                                </p>
                                <br>

                                <a href="#" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                    echo "<div class='error'> Food not found.</div> ";
                }

            ?>
            <div class="clearfix"></div>

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('Partial_Front\Footer.php'); ?>