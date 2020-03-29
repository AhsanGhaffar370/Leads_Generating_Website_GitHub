<?php 
session_start();

if(!isset($_SESSION['user_name'])){

header("location: login.php");
}
else {

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard | Affordable Attorney leads </title>
<link rel="shortcut icon" type="site_icon.png" />

<!--#####################################Libraries file##########################################-->
<script src="ckeditor/ckeditor.js"></script>
<?php include "libs.php"; ?>
<!--<script src="client_validate.js"></script>
-->
</head>

	
<body>
      
<div class="wrapper">
    <?php include"admin_sidebar.php" ?>
        <!--
        <section class="container-fluid text-left text-black pt-1 pb-5">    
            
            <span class=" d-block p-3" style="background-color:#d1ecf1; color:#0c5460;">
                <h4 class="text-left font-weight-bold">VIEW POST </h4>
            </span> 
            -->
            
        <section class="pl-2 pr-2">
            <div class="container-fluid bg-white text-center text-black dash pt-2 mt-5 mb-5 border-light border-right border-left border-top border-bottom">  
                <h4 class="text-left pl-5 font-weight-bold p-3" style="background-color:#d1ecf1; color:#0c5460;">
                	Edit Post  
                </h4>
                
                <center>
                <div class="col-lg-8 col-md-12 col-sm-12 col-12 d-block mt-5">
        
					<?php 
    
                    include("includes/connect.php");
                    
                    if(isset($_GET['edit'])){
                        
                        $edit_id = $_GET['edit'];
                        
                        $edit_query = "select * from posts where post_id='$edit_id'";
                        
                        $run_edit = mysqli_query($con,$edit_query); 
                        
                        while ($edit_row=mysqli_fetch_array($run_edit)){
                        
                        
                            $post_id = $edit_row['post_id'];
                            $post_title = $edit_row['post_title'];
                            $post_author = $edit_row['post_author'];
                            $post_keywords = $edit_row['post_keywords'];
                            $post_image = $edit_row['post_image'];
                            $post_content = $edit_row['post_content'];
                        }
                    }
                    ?>
                    
                    <form class="form123" method="POST" action="edit_posts.php?edit_form=<?php echo $edit_id; ?>"  enctype="multipart/form-data">
                        
                        <div class="form-group text-left ">
                            <label>Post Title:</label>
                            <input type="text" class="form-control p-4" name="title" id="title" value="<?php echo $post_title; ?>"  placeholder="Post Title"/> 
                        </div>
                        <div class="form-group text-left">
                            <label>Post Author</label>
                            <input type="text" class="form-control p-4" name="author" id="author" value="<?php echo $post_author; ?>" placeholder="Post Author"/> 
                        </div>
                        
                        <div class="form-group text-left">
                            <label>Post Keywords:</label>
                            <input type="text" class="form-control p-4" name="keywords" id="keywords" value="<?php echo $post_keywords; ?>" placeholder="Post Keywords"/>
                        </div>
                        
                        <div class="form-group text-left">
                            <label>Post Image:</label>
                            <input type="file" name="image" class="form-control p-1 mb-1" > 
                <img src="../images/<?php echo $post_image;?>" width="100" height="100">
                
                        </div>
                        
                        <div class="form-group text-left">
                       
                            <label class="mt-3 font-weight-bold">Post Content:</label>
                            
                            <textarea class="ckeditor form-control" placeholder="This description will appear on your Blog page" name="content" rows="15" ><?php echo $post_content; ?></textarea>
                        </div>   
                         <hr />
                         
                        <div class="form-group">
                                <input type="submit" name="update" id="update" class="btn p-3 btn-sm mb-5 font-weight-bold button_size2 btn-outline-info" value="Update"/>
                        </div>
                    </form>
            	</div>
                </center>    	    
            </div>
        </section>
        
	</div><!--end of content class div-->
   	
</div><!--end of wrapper class div-->

    
<script>
	$(document).ready(function(){
		$('#sidebarCollapse').on('click',function(){
			$('#sidebar').toggleClass('active');
		});
	});  
</script>

<?php } ?>
   
   
</body>
</html>

<?php
	
	if(isset($_POST['update'])){
	
	$update_id = $_GET['edit_form'];
	$post_title1 = $_POST['title'];
	  $post_date1 = date('m-d-y');
	  $post_author1 = $_POST['author'];
	  $post_keywords1 = $_POST['keywords'];
	  $post_content1 = $_POST['content'];
	  $post_image1= $_FILES['image']['name'];
	  $image_tmp= $_FILES['image']['tmp_name'];
	
	if($post_title1=='' or $post_author1=='' or $post_keywords1=='' or $post_content1=='' or $post_image1==''){
	
	echo "<script>alert('Any of the fields is empty')</script>";
	exit();
	}

	else {
	
	 move_uploaded_file($image_tmp,"../images/$post_image1");
		
		$update_query = "update posts set post_title='$post_title1',post_date='$post_date1',post_author='$post_author1',post_image='$post_image1',post_keywords='$post_keywords1',post_content='$post_content1' where post_id='$update_id'";
		
		if(mysqli_query($con,$update_query)){
		
		echo "<script>alert('Post has been updated')</script>";
		
		echo "<script>window.open('view_posts.php','_self')</script>";
		
		}
	
	}
	}



?>