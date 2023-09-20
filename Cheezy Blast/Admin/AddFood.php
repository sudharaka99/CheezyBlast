
 <?php include('C:\PHP\htdocs\Cheezy Blast\Partials\Menu.php');?>
 <link rel="stylesheet"href="../css/admin.css">

 <!-- Main section -->
<div class="Main">
			<div class="wrapper">
				<h1>Add Food</h1><br>
              
				<form action="" method="Post" enctype="multipart/form-data">
				<table class="tbl-full">
					<tr>
						<td>Title :</td> 
						<td><input type="text" name="Title" placeholder="Title of the Food "></td>
					</tr>
					</br>
                    <tr>
						<td>Description: </td>
						<td><textarea name ="description" cols="30" rows="10"></textarea></td> 
					</tr>
					</br>
					<tr>
						<td>Price :</td>
						<td><input type="number" name="price"></td> 
                       

					</tr>
					</br>
					<tr>
						<td>Select Image :</td>
						<td><input type="file" name="image"></td> 
					</tr>


                    <tr>
						<td>Category :</td>
						<td><select name="category">

                        <?php
                           $sql="SELECT * FROM category WHERE active='yes'";
                           $res=mysqli_query($conn,$sql);
                            $count=mysqli_num_rows($res);

                            if($count>0)
                            {
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    $id=$row['Category_ID'];
                                    $title=$row['Title'];

                                    ?>

                                    
                                    <option value="<?php echo $id;  ?>"><?php echo $title;?></option>
                                    <?php 
                                }
                            }
                            else
                            {
                                ?>
                                <option value="0">NO Category Found</option>
                                <?php
                            }

                            ?>
                       
                        </select>
                        </td> 
					</tr>

                    <tr>
						<td>Featured :</td>
						<td><input type="radio" name="Featured" value="Yes">Yes
                        <input type="radio" name="Featured" value="No">No</td> 
					</tr>
					</br>
					<tr>
						<td>Active :</td>
						<td><input type="radio" name="Active" value="Yes">Yes
                        <input type="radio" name="Active" value="No">No</td>
					</tr>
					<tr>
					<tr>
						<td colospan="2">
							<input type="submit" name="submit" value="Add Food" class="btn-2">
						</td>
					</tr>
						
				
				</table>
				</form>	
<?php
if(isset($_POST['submit']))
{
    $title=$_POST['Title'];
    $description=$_POST['description'];
    $price=$_POST['price'];
    $category=$_POST['category'];



    if(isset($_POST['Featured']))
    {
    $Featured=$_POST['Featured'];
    }
    else
    {
        $Featured="No";
    }
    
    if(isset($_POST['Active']))
    {
    $Active=$_POST['Active'];
    }
    else
    {
        $Active="No";
    }
    
    if(isset($_FILES['image']['name']))
    {
        $image_name=$_FILES['image']['name'];
        if($image_name !="")
    {
    
        //renname
        $ext = end(explode('.',$image_name));
        $image_name="Food_Name_".rand(000,999).'.'.$ext; 

        $source_path=$_FILES['image']['tmp_name'];

        $destination_path="../images/Food/".$image_name;

        $upload = move_uploaded_file($source_path,$destination_path);

        if($upload==false)
        {
            $_SESSION['upload'] ="<b><p style='color:green'>Failed to upload image.</p></b>";
            header('location:'.$SITEURL.'Admin/AddFood.php');
            die();
        }
    }

    }
    else
    {
        $image_name="";
    } 

    $sql2 = "INSERT INTO food (Title,Food_Description,Price,Food_Image_Name,Category_ID,Featured,Active)
    VALUES ('$title','$description','$price','$image_name','$category','$Featured', '$Active')";
        
             if ($conn->query($sql2) === TRUE) {
            
                $_SESSION['add'] ="<b><p style='color:green'>Food Add successfully.</p></b>";
                //header("location:http://localhost/Cheezy%20Blast/Admin/ManageAdmin.php");
                header('location:'.$SITEURL.'Admin/ManageFood.php');
                
               } 
               else {
                 
                $_SESSION['add'] ="<b><p style='color:red'>Food Add Faile.</p></b>";
                header('location:'.$SITEURL.'Admin/ManageFood.php');
                 //header("location:http://localhost/Cheezy%20Blast/Admin/ManageAdmin.php");
               }

            }
?>

			</div>
		</div>








 <?php include('..\Partials\Footer.php')?>





