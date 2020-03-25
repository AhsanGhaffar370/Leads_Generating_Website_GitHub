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
<title>Reset Password</title>
<link rel="shortcut icon" type="image/x-icon" href="https://affordableattorneyleads.com/site_icon.png" />

<!--#####################################Libraries file##########################################-->
<?php include "libs.php"; ?>

</head>

<body>

<?php
$home_url="http://app.affordableattorneyleads.com/";
session_start();

$database=new Database();
$db = $database->getConnection();
$sign=new Signup($db);
$access_code=isset($_GET['access_code']) ? $_GET['access_code'] : die("404 not found.");
// check if access code exists
$sign->access_code=$access_code;
 
if(!$sign->accessCodeExists()){
    die('404 not found.');
}
if (isset($_POST['submitbtn1']))
{
    $sign->Password=md5($_POST['pass']);
 
    // reset password
    if($sign->updatePassword()){
        // echo "hello";
        echo "<div class='alert alert-info'>Password was reset.</div>";
        // Please <a href='{$home_url}login'>login.</a></div>";
         echo "<script type='text/javascript'>
        
        document.location = 'http://app.affordableattorneyleads.com/login'; </script>";
    }
    else{
        echo "<div class='alert alert-danger'>Unable to reset password.</div>";
    }
}
?>
<center>
<section class="pl-3 pr-3" style="margin-top:8%;margin-bottom:3%;">
	<div class="col-lg-4 col-md-6 col-sm-8 pt-2 pb-4 pl-4 pr-4 bg-light">
        <div class="col-lg-12 col-md-10 col-sm-9 col-12">
            <a href="https://affordableattorneyleads.com/home"><img class="logo images" src="https://affordableattorneyleads.com/Image/attorney.png" alt="Affordable Attorney leads " /></a>
        </div>
        <hr />
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
                <label><i class="fa fa-user fa-2x"></i> New Password</label>
                <input type="password" class="form-control p-4" name="pass" id="pass"  placeholder="New Password"/> 
            </div>
            <div class="form-group text-left">
                <label><i class="fa fa-user fa-2x"></i> Confirm Password</label>
                <input type="password" class="form-control p-4" name="con_pass" id="con_pass"  placeholder="Confirm Password"/> 
            </div>
            
            <div class="form-group">
                <input type="submit" name="submitbtn1" value="Reset Password" class="button_size texts btn p-3 btn-lg mb-3 mt-2 btn-danger font-weight-bold"/>
            </div>
        </form>
                
	</div>
</section>

</center>

<?php include_once"tidio_chat.php" ?> 
</body>
</html>
<?php 
// htmlspecialchars($_SERVER['PHP_SELF'])."?access_code={$access_code}
?>
<?php }?>