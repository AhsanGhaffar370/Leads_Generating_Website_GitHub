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
if (isset($_POST['submitbtn1']))
{
    $sign->Email=$_POST['email'];
 
        if($sign->emailExists()){
 
            // update access code for user
            $access_code=$sign->getToken();
            echo $access_code;
 
            $sign->access_code=$access_code;
            if($sign->updateAccessCode()){
 
                // send reset link
                $body="Hi there.<br /><br />";
                $body.="Please click the following link to reset your password: {$home_url}reset_password/?access_code={$access_code}";
                $subject="Reset Password";
                $send_to_email=$_POST['email'];
 
                if($utils->sendEmailViaPhpMail($send_to_email, $subject, $body)){
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
<section class="m-auto">
	<div class=" margin_width container  bg-transparent"><br />
        <div class=" col-lg-7 m-auto d-block">
        
            <div class=" margin_width mt-5 p-5 bg-light">
                <div class="col-lg-9 col-md-9 col-sm-9 col-12 ">
                
                    <a href="home"><img class="logo images" src="Image/attorney.png" alt="Attorney logo" /></a><hr />
                </div>
                <h4 class="text-dark text-center font-weight-bold p-3 heading" style="background-color:#d1ecf1;">Forgot Password</h4><br />
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
                    
                   <hr />
                    <div class="form-group">
                    	<input type="submit" name="submitbtn1" value="Reset " class="button_size btn p-3 btn-lg mb-4 btn-danger font-weight-bold"/>
                    </div>
                </form>
                
           </div>
        </div>
	</div>
</section></center>
</body>
</html>

<?php }?>