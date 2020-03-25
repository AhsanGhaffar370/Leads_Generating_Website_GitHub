<?php 
include_once "config/database.php";
session_start();
error_reporting(0);
include('includes/config.php');
// $idd=$_SESSION['id'];
$id=$_SESSION['id'];
$count=1;
if (strlen($_SESSION['Catogory'])==0){
    header('location:login');
}
if(strlen($_SESSION['Lawyerlogin'])==0)
	{	
header('location:login');
}
else{
    
    if ((strlen($_SESSION['Catogory'])==0) && (strlen($_SESSION['Catogory2'])==0) && (strlen($_SESSION['Catogory3'])==0) && (strlen($_SESSION['Catogory4'])==0) ){
        header('location:update-profile');
    }
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact us | Affordable Attorney leads</title>
<link rel="shortcut icon" type="image/x-icon" href="https://affordableattorneyleads.com/site_icon.png" />

</head>
<?php include_once "libs.php"; ?>


<body class="bg-light">
    
<?php include_once "dashboard_header.php"; ?>


<br><br><br>    
<section class="pl-2 pr-2">
    <div class="container bg-white text-center text-black dash pt-2 mt-5 mb-5 border-light border-right border-left border-top border-bottom"> 

        <?php include_once"balance_status.php" ?>   
        <h4 class="text-left pl-5 font-weight-bold p-3" style="background-color:#d1ecf1; color:#0c5460;">Contact Us </h4>
        
        
      	<div class="alert alert-primary text-left mb-4 xs_texts container font-weight-normal text-secondary">
            <i class="fas fa-info-circle text-info"> </i>
            If you are facing some trouble or want to know more about our services feel free to contact us
        </div>
        
        <center>
        <div class="col-lg-8 col-md-8 col-sm-8 col-12 d-block mt-5">
        
        	<form class="contact-form1" method="post" >
                <div class="form-group ">
                    <input type="text" class="form-control p-4" name="fname" id="fname"  placeholder="Full Name"/> 
                </div>
                
                <div class="form-group">
                    <input type="text" class="form-control p-4" name="email" id="email" placeholder="Email Address"/>
                </div>
                
                <div class="form-group">
                    <input type="tel" class="form-control p-4" name="mob" id="mob" placeholder="Phone No"/>
                </div>
                
                <div class="form-group">
                    <input type="text" class="form-control p-4" name="lname" id="lname" placeholder="subject"/>
                </div>
                <div class="form-group">
                    <textarea class="form-control p-4" name="msg" id="msg" placeholder="Message" rows="8" cols="60"></textarea>
                </div>
                
                <hr />
                <div class="form-group">
                    <input type="submit" name="submitbtn" class="btn btn-lg headerbtn buttons button_size2 mb-4" value="Submit" />
                </div>
            
            </form>
        
        </div>
        </center>
    </div>
</section>

<?php include_once"tidio_chat.php" ?> 
</body>

</html>
<?php } ?>