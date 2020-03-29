<?php 
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard | Affordable Attorney leads </title>
<link rel="shortcut icon" type="site_icon.png" />

<!--#####################################Libraries file##########################################-->

<?php include "libs.php"; ?>
<!--<script src="client_validate.js"></script>
-->
</head>
<body >

<center>
<section class="pl-3 pr-3" style="margin-top:8%;">
	<div class="col-lg-4 col-md-6 col-sm-8 pt-2 pb-4 pl-4 pr-4 bg-light">
        
        <div class="col-lg-12 col-md-9 col-sm-9 col-12">
            <a href="https://affordableattorneyleads.com/home">
            	<img class="logo images" src="https://affordableattorneyleads.com/Image/attorney.png" alt="Affordable Attorney leads " />
            </a>
        </div>
        <hr />
        
        
        <form method="post"  action="login.php">
            <div class="form-group text-left">
                <label><i class="fa fa-user fa-2x"></i> Name</label>
                <input type="text" class="form-control p-4" name="user_name" id="user_name"  placeholder="Admin Name"/> 
            </div>
            
            <div class="form-group text-left">
                <label><i class="fa fa-lock fa-2x"></i> Password</label>
                <input type="password" class="form-control p-4" name="user_pass" id="user_pass" placeholder="Password"/>
                <div  class="text-right">
                     <a href="forgot_password.php">Forget Password?</a>
                </div>
            </div>
            
            <div class="form-group">
                <input type="submit" name="login" value="Login" class="button_size btn p-3 btn-lg mb-2 btn-danger font-weight-bold"/>
            </div>
        </form>

        
	</div>
</section>
</center>

</body>
</html>
<?php 
include("includes/connect.php");

if(isset($_POST['login'])){
	
	$user_name = mysqli_real_escape_string($con,$_POST['user_name']);
	$user_pass = mysqli_real_escape_string($con,md5($_POST['user_pass']));
	
	$encrypt = md5($user_pass);
    
	$admin_query = "select * from admin_login where user_name='$user_name' AND user_pass='$user_pass'";

	$run = mysqli_query($con,$admin_query); 
	
	if(mysqli_num_rows($run)>0){
	
	$_SESSION['user_name']=$user_name;
	
	echo "<script>window.open('index.php','_self')</script>";
	}
	else {
	
	echo "<script>alert('User name or password is incorrect')</script>";
	
	}
}


?>