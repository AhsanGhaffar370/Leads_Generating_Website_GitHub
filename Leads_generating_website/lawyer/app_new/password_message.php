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
<title>Password message</title>
<link rel="shortcut icon" type="image/x-icon" href="site_icon.png" />

<!--#####################################Libraries file##########################################-->
<?php include "libs.php"; ?>

</head>

<body>

<?php

session_start();
$database=new Database();
$db = $database->getConnection();
$sign=new Signup($db);
?>
<center>
<section class="m-auto">
	<div class=" margin_width container  bg-transparent"><br />
        <div class=" col-lg-7 m-auto d-block">
        
            <div class=" margin_width mt-5 p-5 bg-light">
                <div class="col-lg-9 col-md-9 col-sm-9 col-12 ">
                
                    <a href="home"><img class="logo images" src="https://affordableattorneyleads.com/Image/attorney.png" alt="Attorney logo" /></a><hr />
               
                </div>
                <h4 class="text-dark text-center font-weight-bold p-3 heading" style="background-color:#d1ecf1;">--LOGIN--</h4><br />
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
                        <p>An email Has been send to you</p>
                    </div>
                    
                    
                    <div  class="text-right">
                    	<!-- // <a href="#">Forget Password?</a> -->
                    </div>
                   <hr />
                    <div class="form-group">
                    	<input type="submit" name="submitbt" value="Recover your password" class="button_size btn p-3 btn-lg mb-4 btn-danger font-weight-bold"/>
                    </div>
                </form>
                <div  class="text-center font-weight-light">
                    <h6>--OR--</h6>
                </div>
                <div  class="text-center">
                    <a href="signup"> Create an Account</a>
                </div>
           </div>
        </div>
	</div>
</section></center>
</body>
<script src="//code.tidio.co/ovzedednhjqt4dhp1ht5ewo21eep1wny.js" async></script>
</html>

<?php }?>