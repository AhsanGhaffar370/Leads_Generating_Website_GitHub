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
<html lang="en-US">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Forgot Password</title>
<link rel="shortcut icon" type="image/x-icon" href="https://affordableattorneyleads.com/site_icon.png" />

<!--#####################################Libraries file##########################################-->
<?php include "libs.php"; ?>
<script src="client_validate.js"></script>

</head>

<body>

<?php
$home_url="http://app.affordableattorneyleads.com/";
session_start();
$database=new Database();
$db = $database->getConnection();
$sign=new Signup($db);
if (isset($_POST['submitbtn1']))
{
    $sign->Email=$_POST['email'];
 
        if($sign->emailExists()){
 
            // update access code for user
            $access_code=$sign->getToken();
 
            $sign->access_code=$access_code;
            if($sign->updateAccessCode()){
 
                // send reset link
                // $body="Hi there.<br /><br />";
                $body="Please click the following link to reset your password: {$home_url}reset_password.php/?access_code={$access_code}";
                $subject="Reset Password";
                $send_to_email=$_POST['email'];
                $from_name="Password Reset";
                $from_email="info@legalhelpservice.com";
             
                $headers  = "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
                $headers .= "From: {$from_name} <{$from_email}> \n";
             
                if(mail($send_to_email, $subject, $body, $headers)){
                    echo "<div class='alert alert-info'>
                            Password reset link was sent to your email.
                            Click that link to reset your password.
                        </div>";
                }
               
 
                // message if unable to send email for password reset link
                else{ echo "<div class='alert alert-danger'>ERROR: Unable to send reset link.</div>"; }
            }
 
            // message if unable to update access code
            else{ echo "<div class='alert alert-danger'>ERROR: Unable to update access code.</div>"; }
 
        }
 
        // message if email does not exist
        else{ echo "<div class='alert alert-danger'>Your email cannot be found.</div>"; }
 
    // $sign->Email = $_POST['email'];
    // $sign->Password = md5($_POST['pass']);
    // if($sign->lawyerSignIn())
    // {
    //     $id= $_SESSION['id'];
    //     $idhash=md5($id);
    //     $sql1="update lawyer_profile set idhash=:idhash where id=:id ";
    //     $query1 = $db->prepare($sql1);
    //     $query1->bindParam(':idhash',$idhash,PDO::PARAM_STR);
    //     $query1->bindParam(':id',$id,PDO::PARAM_STR);
    //     $query1->execute();
    //     echo "<script type='text/javascript'>
        
    //     document.location = 'dashboard'; </script>";
        
    // }
    // else
    // {
    //     $msg="Unable to Login";
    //     // $msg = "<div class='alert alert-danger'>Unable to login.</div>";
    // }
}
?><center>
<section class="pl-3 pr-3" style="margin-top:8%;">
	<div class="col-lg-4 col-md-6 col-sm-8 pt-2 pb-4 pl-4 pr-4 bg-light">
        <div class="col-lg-12 col-md-12 col-sm-9 col-12">
            <a href="https://affordableattorneyleads.com/home"><img class="logo images" src="https://affordableattorneyleads.com/Image/attorney.png" alt="Affordable Attorney leads " /></a>
        </div>
        <hr />
		<?php if($error){?>
        <div class="errorWrap">
        <strong>ERROR</strong>:
        <?php
        ?>
        </div>
        <?php } 
        else if($msg){
            ?>
            <div class="alert alert-danger">
            <!-- <strong>SUCCESS</strong>: -->
            <?php 
            ?> 
            </div>
        <?php }?>
        <form class="lawyer-signIn-form1" method="post" >
            <div class="form-group text-left">
                <label><i class="fa fa-user fa-2x"></i> Email</label>
                <input type="text" class="form-control p-4" name="email" id="email"  placeholder="Email"/> 
            </div>
            
            <div class="form-group">
                <input type="submit" name="submitbtn1" value="Reset Password" class="button_size btn p-3 btn-lg mt-4 mb-3 btn-danger font-weight-bold texts"/>
            </div>
        </form>
        
	</div>
</section>
</center>

<?php include_once"tidio_chat.php" ?> 
</body>
</html>

<?php }?>