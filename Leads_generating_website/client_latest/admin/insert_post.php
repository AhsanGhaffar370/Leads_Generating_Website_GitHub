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
                	Dashboard  
                </h4>
                
                <form class="form123" method="POST" action="insert_post.php" enctype="multipart/form-data">
                	
                    <div class="form-group text-left ">
                        <label>Post Title:</label>
                        <input type="text" class="form-control p-4" name="title" id="title" placeholder="Post Title"/> 
                    </div>
                    <div class="form-group text-left">
                        <label>Post Author</label>
                        <input type="text" class="form-control p-4" name="author" id="author" placeholder="Post Author"/> 
                    </div>
                    
                    <div class="form-group text-left">
                        <label>Post Keywords:</label>
                        <input type="text" class="form-control p-4" name="keywords" id="keywords" placeholder="Post Keywords"/>
                    </div>
                    
                    <div class="form-group text-left">
                        <label>Post Image:</label>
                        <input type="file" name="image" class="form-control p-4" > 
                    </div>
                    
                    <div class="form-group text-left">
                   
                        <label class="mt-3 font-weight-bold">Post Content:</label>
                        
                        <textarea class="ckeditor form-control" placeholder="This description will appear on your Blog page" name="content" rows="15" ></textarea>
                    </div>   
                     <hr />
                     
                    <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="btn p-3 btn-sm mb-5 font-weight-bold button_size2 btn-outline-info" value="Publish Post"  onclick="window.location.href='index.php'"/>
                    </div>
                </form>
                
            </div>
        </section>
        
	</div><!--end of container-fluid class div-->
   	
</div><!--end of wrapper class div-->

  
<script>
	$(document).ready(function(){
		$('#sidebarCollapse').on('click',function(){
			$('#sidebar').toggleClass('active');
		});
	});  
</script>

</body>
</html>

<?php 
include("includes/connect.php"); 

if(isset($_POST['submit'])){

	  $post_title = $_POST['title'];
	  $post_date = date('m-d-y');
	  $post_author = $_POST['author'];
	  $post_keywords = $_POST['keywords'];
	  $post_content = $_POST['content'];
	  $post_image= $_FILES['image']['name'];
	  $image_tmp= $_FILES['image']['tmp_name'];
	
	if($post_title=='' or $post_author=='' or $post_keywords=='' or $post_content=='' or $post_image==''){
	
	echo "<script>alert('Any of the fields is empty')</script>";
	exit();
	}

	else {
	
	 move_uploaded_file($image_tmp,"../images/$post_image");
	
	  $insert_query = "insert into posts (post_title,post_date,post_author,post_image,post_keywords,post_content) values ('$post_title','$post_date','$post_author','$post_image','$post_keywords','$post_content')";
	
	if(mysqli_query($con,$insert_query)){
	
	echo "<script>alert('post published successfuly')</script>";
	echo "<script>window.open('view_posts.php','_self')</script>";
	
	}


}


}

?>

<?php } ?>