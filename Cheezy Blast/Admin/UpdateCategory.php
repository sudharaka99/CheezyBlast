<?php include('C:\PHP\htdocs\Cheezy Blast\Partials\Menu.php');?>
<link rel="stylesheet"href="../css/admin.css">
<?php $SITEURL = 'http://localhost/Cheezy%20Blast/'; ?> 
<!-- Main section -->
<div class="Main">
			<div class="wrapper">
				<h1>Update Category</h1>
                <?php	
		
				$id=$_GET['id'];
				
				$sql="SELECT * FROM category WHERE Category_ID=$id;";

				if(mysqli_query($conn,$sql)){
					
					$row=mysqli_fetch_assoc(mysqli_query($conn,$sql));

					$id=$row['Category_ID'];
                    $title=$row['Title'];
					$current_Image=$row['Category_Image_Name'];
				    $featured=$row['Featured'];
					$active=$row['Active'];
					
				 } 
				else
				{
					header("location:http://localhost/Cheezy%20Blast/Admin/ManageAdmin.php");
					
				}
				?>


				<form action="" method="Post" enctype="multipart/form-data">
				<table class="tbl-full">
					<tr>
						<td>Title :</td> 
						<td><input type="text" name="Title" placeholder="Category Title"  value="<?php echo $title;?>"  ></td>
					</tr>
					</br>
                    <tr>
						<td>Current Image :</td> 
						<td>
                        <?php
                            if($current_Image !="")
                            {
                                ?>
                                <img src="<?php echo $SITEURL;?>images/Category/<?php echo $current_Image;  ?>" width="150px">

                                <?php
                            }
                            else
                            {
                                echo "<b><p style='color:red'>Image Not Added.</p></b>";
                            }


                        ?>
                        </td>
					</tr>
					</br>
                    <tr>
						<td>New Image :</td>
						<td><input type="File" name="image" ></td>
					</tr>
					</br>
					<tr>
						<td>Featured :</td>
						<td><input <?php if($featured=="Yes"){echo"checked";}  ?> type="radio" name="Featured" value="Yes">Yes
                        <input <?php if($featured=="No"){echo"checked";}  ?> type="radio" name="Featured" value="No">No</td>

					</tr>
					</br>
					<tr>
						<td>Active :</td>
						<td><input <?php if($featured=="Yes"){echo"checked";}  ?>  type="radio" name="Active" value="Yes">Yes
                        <input <?php if($featured=="No"){echo"checked";}  ?> type="radio" name="Active" value="No">No</td>
					</tr>
					<tr>
						<td colospan="2">
							<input type="submit" name="submit" value="Update Category" class="btn-2">
                            <input type="hidden" name="current_image" value="<?php echo $current_Image;?>">
                            <input type="hidden" name="id" value="<?php echo $id;?>">
						</td>
					</tr>
						
				
				</table>
				</form>	


    <?php
    if(isset($_POST['submit']))
    {
        $id=$_POST['id'];
        $title=$_POST['Title'];
        $current_Image=$_POST['current_image'];
        $featured=$_POST['Featured'];
		$active=$_POST['Active'];
//get image
        if(isset($_FILES['image']['name']))
        {
            $image_name=$_FILES['image']['name'];
            if($image_name!="")
            {
                // new image
                 //renname
        $ext = end(explode('.',$image_name));
        $image_name="Food_Category_".rand(000,999).'.'.$ext; 

        $source_path=$_FILES['image']['tmp_name'];

        $destination_path="../images/Category/".$image_name;

        $upload = move_uploaded_file($source_path,$destination_path);

        if($upload==false)
        {
            $_SESSION['upload'] ="<b><p style='color:green'>Failed to upload image.</p></b>";
            header('location:'.$SITEURL.'Admin/ManageCategory.php');
            die();
        }
//remove
        if($current_Image !="")
        {
            $remove_path="../images/Category/".$current_Image;
            $remove=unlink($remove_path);
    
            if($remove==false)
            {
                $_SESSION['Faildremove'] ="<b><p style='color:green'>Failed to upload image.</p></b>";
                header('location:'.$SITEURL.'Admin/ManageCategory.php');
                die();
            }
        }
       
        }
        else
            {
                $image_name=$current_Image;
            }
    }
    else
    {
        $image_name=$current_Image;
    }

         $sql3="UPDATE  category  SET 
         Title='$title',
         Category_Image_Name='$image_name',
         Featured='$featured',
         Active='$active'
         WHERE Category_ID='$id'
         ";
    
    
     if ($conn->query($sql3) === TRUE) {
            
         $_SESSION['update'] ="<b><p style='color:green'>New record Update successfully.</p></b>";
         header('location:'.$SITEURL.'Admin/ManageCategory.php');
        
        } 
        else {
         
         $_SESSION['update'] ="<b><p style='color:red'>New record Update Faile.</p></b>";
         header('location:'.$SITEURL.'Admin/ManageCategory.php');
        }
    }
    
    ?>

    </div>
</div>








<?php include('C:\PHP\htdocs\Cheezy Blast\Partials\Footer.php');?>