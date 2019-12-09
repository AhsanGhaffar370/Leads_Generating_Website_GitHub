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
<title>Login | Affordable Attorney Leads </title>
<link rel="shortcut icon" type="image/x-icon" href="https://affordableattorneyleads.com/growth.png" />



<!--#####################################Libraries file##########################################-->
<?php include "libs.php"; ?>
<script src="../client_validate.js"></script>

</head>

<body>

<?php

session_start();
$database=new Database();
$db = $database->getConnection();
$sign=new Signup($db);
if (isset($_POST['submitbtn1']))
{
    $sign->Email = $_POST['email'];
    $sign->Password = md5($_POST['pass']);
    if($sign->lawyerSignIn())
    {
        $id= $_SESSION['id'];
        $idhash=md5($id);
        $sql1="update lawyer_profile set idhash=:idhash where id=:id ";
        $query1 = $db->prepare($sql1);
        $query1->bindParam(':idhash',$idhash,PDO::PARAM_STR);
        $query1->bindParam(':id',$id,PDO::PARAM_STR);
        $query1->execute();
        echo "<script type='text/javascript'>
        
        document.location = 'dashboard'; </script>";
        
    }
    else
    {
        $msg="Unable to Login";
        // $msg = "<div class='alert alert-danger'>Unable to login.</div>";
    }
}
?>
<center>
<section class="pl-3 pr-3" style="margin-top:8%;">
	<div class="col-lg-4 col-md-6 col-sm-8 pt-2 pb-4 pl-4 pr-4 bg-light">
        <div class="col-lg-12 col-md-9 col-sm-9 col-12">
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
                <label><i class="fa fa-user fa-2x"></i> Email</label>
                <input type="text" class="form-control p-4" name="email" id="email"  placeholder="Email"/> 
            </div>
            
            <div class="form-group text-left">
                <label><i class="fa fa-lock fa-2x"></i> Password</label>
                <input type="password" class="form-control p-4" name="pass" id="pass" placeholder="Password"/>
                <div  class="text-right">
                     <a href="forgot_password.php">Forget Password?</a>
                </div>
            </div>
            
            <div class="form-group">
                <input type="submit" name="submitbtn1" value="Login" class="button_size btn p-3 btn-lg mb-2 btn-danger font-weight-bold"/>
            </div>
        </form>
        <div  class="text-center">
            <label>Create an Account?<a href="signup"> Sign Up</a></label>
        </div>
    </div>
</section>
</center>

<?php include_once"tidio_chat.php" ?> 
</body>
</html>

<?php }?>