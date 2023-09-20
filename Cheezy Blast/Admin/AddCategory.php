<?php include('C:\PHP\htdocs\Cheezy Blast\Partials\Menu.php');?>
<link rel="stylesheet"href="../css/admin.css">

<!-- Main section -->
<div class="Main">
			<div class="wrapper">
				<h1>Add Category</h1><br>
              
				<form action="" method="Post" enctype="multipart/form-data">
				<table class="tbl-full">
					<tr>
						<td>Title :</td> 
						<td><input type="text" name="Title" placeholder="Category Title"></td>
					</tr>
					</br>
                    <tr>
						<td>Select Image :</td>
						<td><input type="File" name="image" ></td>
					</tr>
					</br>
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
						<td colospan="2">
							<input type="submit" name="submit" value="Add Category" class="btn-2">
						</td>
					</tr>
						
				
				</table>
				</form>	
<?php
if(isset($_POST['submit']))
{
    $title=$_POST['Title'];

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
    }

    }
    else
    {
        $image_name="";
    } 

    $sql = "INSERT INTO category (Title,Category_Image_Name,Featured,Active)
    VALUES ('$title','$image_name','$Featured', '$Active')";
        
             if ($conn->query($sql) === TRUE) {
            
                $_SESSION['add'] ="<b><p style='color:green'>Category Add successfully.</p></b>";
                //header("location:http://localhost/Cheezy%20Blast/Admin/ManageAdmin.php");
                header('location:'.$SITEURL.'Admin/ManageCategory.php');
                
               } 
               else {
                 
                $_SESSION['add'] ="<b><p style='color:red'>Category Add Faile.</p></b>";
                header('location:'.$SITEURL.'Admin/ManageCategory.php');
                 //header("location:http://localhost/Cheezy%20Blast/Admin/ManageAdmin.php");
               }

            }
?>

			</div>
		</div>

<?php include('C:\PHP\htdocs\Cheezy Blast\Partials\Footer.php');?>