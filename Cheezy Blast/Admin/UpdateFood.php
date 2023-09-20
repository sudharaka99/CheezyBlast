<?php include('C:\PHP\htdocs\Cheezy Blast\Partials\Menu.php');?>
<?php $SITEURL = 'http://localhost/Cheezy%20Blast/'; ?> 

<?php  
if(isset($_GET['id']))
{
    $id=$_GET['id'];

    $sql2="SELECT*FROM food WHERE Food_ID=$id";
    $res2=mysqli_query($conn, $sql2);
    $row2=mysqli_fetch_assoc($res2);

    
    $title = $row2['Title'];
    $description=$row2['Food_Description'];
    $price=$row2['Price'];
    $current_image=$row2['Food_Image_Name'];
    $Current_category=$row2['Category_ID'];
    $featured=$row2['Featured'];
    $active=$row2['Active'];

}
else
{
    header('location:'.SITEURL.'Admin/ManageFood.php');
}



?>
 <!-- Main section -->
 <div class="Main">
			<div class="wrapper">
				<h1>Update Food</h1><br>
              
				<form action="" method="Post" enctype="multipart/form-data">
				<table class="tbl-full">
					<tr>
						<td>Title :</td> 
						<td><input type="text" name="Title" value="<?php echo $title; ?>"></td>
					</tr>
					</br>
                    <tr>
						<td>Description: </td>
						<td><textarea name ="description" cols="30" rows="10"><?php echo $description;?></textarea></td> 
					</tr>
					</br>
					<tr>
						<td>Price :</td>
						<td><input type="number" name="price" value="<?php echo $price;?>"></td> 
                       

					</tr>
					</br>
                    <tr>
						<td>Current Image :</td>
						<td>
                        <?php
                            if($current_image =="")
                            {
                                echo "<b><p style='color:red'>Image Not Available.</p></b>";
                            }
                            else
                            {
                                ?>
                                <img src="<?php echo $SITEURL;?>images/Food/<?php echo $current_image;  ?>"width="150px">

                                <?php
                            }


                        ?>
                    </td> 
                    </tr>
                    </br>
                    <tr>
                    <td>Select New Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                    </tr>
                    </br>
                    <tr>
						<td>Category :</td>
						<td><select name="category">

                        <?php
                           $sql="SELECT * FROM category WHERE Active='yes'";
                           $res=mysqli_query($conn,$sql);
                            $count=mysqli_num_rows($res);

                            if($count>0)
                            {
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    $Category_id=$row['Category_ID'];
                                    $Category_title=$row['Title'];

                                    //echo "<option value='$Category_id'>$Category_title</option>";
                                    
                                    ?>
                                    <option <?php if($Current_category==$Category_id) {echo "selected";} ?> value="<?php echo $Category_id;?>"> <?php echo $Category_title;?></option>
                                    <?php 
                                }
                                
                            }
                            else
                            {
                            
                                echo"<option value='0'>NO Category Found</option>";
                                
                            }

                            ?>
                       
                        </select>
                        </td> 
					</tr>

                    <tr>
						<td>Featured :</td>
						<td><input  <?php if($featured=="Yes"){echo"checked";}  ?> type="radio" name="Featured" value="Yes">Yes
                        <input  <?php if($featured=="No"){echo"checked";}  ?> type="radio" name="Featured" value="No">No</td> 
					</tr>
					</br>
					<tr>
						<td>Active :</td>
						<td><input  <?php if($active=="Yes"){echo"checked";}  ?> type="radio" name="Active" value="Yes">Yes
                        <input  <?php if($active=="No"){echo"checked";}  ?> type="radio" name="Active" value="No">No</td>
					</tr>
					<tr>
					<tr>
						<td colospan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="current_image" value ="<?php echo $current_image;?>">
						<input type="submit" name="submit" value="Update Food" class="btn-2">
						</td>
					</tr>
						
				
				</table>
				</form>	
                
<?php

if(isset($_POST['submit']))
{
   $id=$_POST['id'];
   $title=$_POST['Title'];
   $description=$_POST['description'];
   $price=$_POST['price'];
   $current_image=$_POST['current_image'];
   $category=$_POST['category'];

   $featured=$_POST['Featured'];
   $active=$_POST['Active'];

   if(isset($_FILES['image']['name']))
   {
       $image_name=$_FILES['image']['name'];
       if($image_name!="")
       {
           // new image
            //renname
            $ext = end(explode('.',$image_name));
            $image_name="Food_Name_".rand(000,999).'.'.$ext; 

            $source_path=$_FILES['image']['tmp_name'];

            $destination_path="../images/Food/".$image_name;

            $upload = move_uploaded_file($source_path,$destination_path);

        if($upload==false)
            {
            $_SESSION['upload'] ="<b><p style='color:green'>Failed to upload image.</p></b>";
            header('location:'.$SITEURL.'Admin/ManageFood.php');
            die();
            }
//remove
        if($current_image !="")
            {
                $remove_path="../images/Food/".$current_image;
                $remove=unlink($remove_path);

        if($remove==false)
            {
           $_SESSION['Faildremove'] ="<b><p style='color:green'>Failed to upload image.</p></b>";
           header('location:'.$SITEURL.'Admin/ManageFood.php');
           die();
            }
        }
    }
    else
    {
        $image_name=$current_image;
    }
            
}
else
{
    $image_name=$current_image;
}

$sql3="UPDATE  food  SET 
Title='$title',
Food_Description='$description',
Price=$price,
Food_Image_Name='$image_name',
Category_ID='$category',
Featured='$featured',
Active='$active'
WHERE Food_ID=$id
";



if ($conn->query($sql3) === TRUE) {
            
    $_SESSION['update'] ="<b><p style='color:green'>New record Update successfully.</p></b>";
    header('location:'.$SITEURL.'Admin/ManageFood.php');

} 
else {
    
    $_SESSION['update'] ="<b><p style='color:red'>New record Update Faile.</p></b>";
    header('location:'.$SITEURL.'Admin/ManageFood.php');
}
}

?>






			</div>
		</div>


<?php include('C:\PHP\htdocs\Cheezy Blast\Partials\Footer.php');?>
