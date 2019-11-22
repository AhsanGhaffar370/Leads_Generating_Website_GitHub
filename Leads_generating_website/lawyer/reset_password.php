<?php include_once "config/database.php"; 

include_once "object/login.php";
include "config/database1.php";
?>
<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['Lawyerlogin'])!=0)
	{	
header('location:dashboard');
}
else{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Forgot Password</title>

<!--#####################################Libraries file##########################################-->
<?php include "libs.php"; ?>
<script src="client_validate.js"></script>

</head>

<body>

<?php
$home_url="https://affordableattorneyleads.com/";
session_start();

$database=new Database();
$db = $database->getConnection();
$sign=new Signup($db);
$access_code=isset($_GET['access_code']) ? $_GET['access_code'] : die("Access code not found.");
// check if access code exists
$sign->access_code=$access_code;
 
if(!$sign->accessCodeExists()){
    die('Access code not found.');
}
if (isset($_POST['submitbtn1']))
{
    $sign->Password=md5($_POST['pass']);
 
    // reset password
    if($sign->updatePassword()){
        echo "hello";
        echo "<div class='alert alert-info'>Password was reset. Please <a href='{$home_url}login'>login.</a></div>";
    }
    else{
        echo "<div class='alert alert-danger'>Unable to reset password.</div>";
    }
}
?>
<center>
<section class="m-auto">
	<div class=" margin_width container  bg-transparent"><br />
        <div class=" col-lg-7 m-auto d-block">
        
            <div class=" margin_width mt-5 p-5 bg-light">
                <div class="col-lg-9 col-md-9 col-sm-9 col-12 ">
                
                    <a href="home"><img class="logo images" src="Image/attorney.png" alt="Attorney logo" /></a><hr />
                </div>
                <h4 class="text-dark text-center font-weight-bold p-3 heading" style="background-color:#d1ecf1;">--Forgot--</h4><br />
                <?php if($error){?>
				<div class="errorWrap">
				<strong>ERROR</strong>:
				<?php
				echo htmlentities($error);
				?>
				</div>
				<?php } 
				else if($msg){
					?>
					<div class="alert alert-danger">
					<!-- <strong>SUCCESS</strong>: -->
					<?php echo htmlentities($msg);
					?> 
					</div>
				<?php }?>
                <form class="lawyer-signIn-form1" method="post" >
                    <div class="form-group text-left">
                        <label><i class="fa fa-user fa-2x"></i>New Password</label>
                        <input type="password" class="form-control p-4" name="pass" id="pass"  placeholder="Password"/> 
                    </div>
                    
                   <hr />
                    <div class="form-group">
                    	<input type="submit" name="submitbtn1" value="Update Password" class="button_size btn p-3 btn-lg mb-4 btn-danger font-weight-bold"/>
                    </div>
                </form>
                
           </div>
        </div>
	</div>
</section></center>
</body>
</html>
<?php 
// htmlspecialchars($_SERVER['PHP_SELF'])."?access_code={$access_code}
?>
<?php }?>