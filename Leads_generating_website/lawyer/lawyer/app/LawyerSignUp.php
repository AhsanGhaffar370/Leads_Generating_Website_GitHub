<?php 
include_once "config/database.php"; 
include_once "object/login.php";
?>
<?php
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
<title>Sign up | Affordable Attorney Leads </title>
<link rel="shortcut icon" type="image/x-icon" href="https://affordableattorneyleads.com/growth.png" />

<!--#####################################Libraries file##########################################-->
<?php include "libs.php"; ?>

<script src="client_validate.js"></script>

</head>

<body>

<?php
    $database=new Database();
    $db = $database->getConnection();
    //pass connection to objects
    $sign_up = new Signup($db);

    if (isset($_POST['submitbtn']))
    {
        $sign_up->Name = $_POST['fname'];
        $sign_up->Organization = $_POST['organ'];
        $sign_up->Email = $_POST['email'];
        $sign_up->Password = md5($_POST['pass']);
        $sign_up->Contact = $_POST['mob'];
        $sign_up->Zipcode = $_POST['zip'];
        $sign_up->LawyerName = $_POST['fname'];
        $sign_up->state=$_POST['state'];
        // Insert lawyer
        if ($sign_up->emailExists()){
           echo "<div class='alert alert-success'>Email Already Exist.</div>";
        } 
         else{
            if($sign_up->lawyerSignup())
            {
                echo "<div class='alert alert-success'>Successfully Signup.</div> <script type='text/javascript'> document.location = 'login'; </script>";
            }
            else
            {
                echo "<div class='alert alert-danger'>Unable.</div>";
            }

         }
        

        // if unable to create the product, tell the user
       
        //////////////////////////////////////

    }
?>
<center>
<section class="pl-2 pr-2" style="margin-top:8%;margin-bottom:5%;">
	<div class="col-lg-6 col-md-8 col-sm-10 pt-2 pb-4 pl-3 pr-3 bg-light">
    
        <div class="col-lg-9 col-md-9 col-sm-9 col-12">
        	<a href="https://affordableattorneyleads.com/home"><img class="logo images" src="https://affordableattorneyleads.com/Image/attorney.png" alt="Affordable Attorney leads " /></a>
        </div>
        <hr />  
        <form class="lawyer-form1 text-left" method="post" >
            <div class="form-group ">
                <label>Full Name:</label>
                <input type="text" class="form-control p-4" name="fname" id="fname"  placeholder="Full Name"/> 
            </div>
            <div class="form-group ">
                <label>Organization</label>
                <input type="text" class="form-control p-4" name="organ" id="organ"  placeholder="Organization"/> 
            </div>
            
            <div class="form-group">
                <label>Email:</label>
                <input type="text" class="form-control p-4" name="email" id="email" placeholder="Email Address"/>
            </div>
            
            <div class="form-group">
                <label>Phone:</label>
                <input type="tel" class="form-control p-4" name="mob" id="mob" placeholder="Phone"/>
            </div>
            
            <div class="form-group">
                <label>State:</label>
                <select name="state" class="form-control" id="state">
                		<option value="-1" selected="selected" disabled="disabled">-Select-</option>
                        <option value="Alabama" formula_val="">Alabama</option>
                        <option value="Alaska" formula_val="">Alaska</option>
                        <option value="Arizona" formula_val="">Arizona</option>
                        <option value="Arkansas" formula_val="">Arkansas</option>
                        <option value="California" formula_val="">California</option>
                        <option value="Colorado" formula_val="">Colorado</option>
                        <option value="Connecticut" formula_val="">Connecticut</option>
                        <option value="Delaware" formula_val="">Delaware</option>
                        <option value="Florida" formula_val="">Florida</option>
                        <option value="Georgia" formula_val="">Georgia</option>
                        <option value="Hawaii" formula_val="">Hawaii</option>
                        <option value="Idaho" formula_val="">Idaho</option>
                        <option value="Illinois" formula_val="">Illinois</option>
                        <option value="Indiana" formula_val="">Indiana</option>
                        <option value="Iowa" formula_val="">Iowa</option>
                        <option value="Kansas" formula_val="">Kansas</option>
                        <option value="Kentucky" formula_val="">Kentucky</option>
                        <option value="LouisianaMaine" formula_val="">LouisianaMaine</option>
                        <option value="Maryland" formula_val="">Maryland</option>
                        <option value="Massachusetts" formula_val="">Massachusetts</option>
                        <option value="Michigan" formula_val="">Michigan</option>
                        <option value="Minnesota" formula_val="">Minnesota</option>
                        <option value="Mississippi" formula_val="">Mississippi</option>
                        <option value="Missouri" formula_val="">Missouri</option>
                        <option value="Montana" formula_val="">Montana</option>
                        <option value="Nebraska" formula_val="">Nebraska</option>
                        <option value="Nevada" formula_val="">Nevada</option>
                        <option value="New Hampshire" formula_val="">New Hampshire</option>
                        <option value="New Jersey" formula_val="">New Jersey</option>
                        <option value="New Mexico" formula_val="">New Mexico</option>
                        <option value="New York" formula_val="">New York</option>
                        <option value="North Carolina" formula_val="">North Carolina</option>
                        <option value="North Dakota" formula_val="">North Dakota</option>
                        <option value="Ohio" formula_val="">Ohio</option>
                        <option value="Oklahoma" formula_val="">Oklahoma</option>
                        <option value="Oregon" formula_val="">Oregon</option>
                        <option value="Pennsylvania" formula_val="">Pennsylvania</option>
                        <option value="Rhode Island" formula_val="">Rhode Island</option>
                        <option value="South Carolina" formula_val="">South Carolina</option>
                        <option value="South Dakota" formula_val="">South Dakota</option>
                        <option value="Tennessee" formula_val="">Tennessee</option>
                        <option value="TexasUtah" formula_val="">TexasUtah</option>
                        <option value="Vermont" formula_val="">Vermont</option>
                        <option value="Virginia" formula_val="">Virginia</option>
                        <option value="Washington" formula_val="">Washington</option>
                        <option value="West Virginia" formula_val="">West Virginia</option>
                        <option value="Wisconsin" formula_val="">Wisconsin</option>
                        <option value="Wyoming" formula_val="">Wyoming</option>
                        <option value="Washington DC" formula_val="">Washington DC</option>
                        <option value="ARMED FORCES AFRICA  CANADA  EUROPE  MIDDLE EAST" formula_val="">ARMED FORCES AFRICA  CANADA  EUROPE  MIDDLE EAST</option>
                        <option value="ARMED FORCES AMERICA (EXCEPT CANADA)" formula_val="">ARMED FORCES AMERICA (EXCEPT CANADA)</option>
                        <option value="ARMED FORCES PACIFIC" formula_val="">ARMED FORCES PACIFIC</option>

                 </select>
            </div>
            
            <div class="form-group">
                <label>Zip Code:</label>
                <input type="text" class="form-control p-4" name="zip" id="zip" placeholder="Zip Code"/>
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" class="form-control p-4" name="pass" id="pass" placeholder="Password"/>
            </div>
            
            <div class="form-group text-center">
            	<input type="submit" name="submitbtn" value="SIGNUP" class="button_size btn p-3 btn-lg mb-3 btn-danger font-weight-bold"/>
            </div>
        
        </form>
        <div class="text-center">
        <p>Already have an account?<a href="login" > Login</a></p>
        </div>
    </div>
</section>
</center>

<?php include_once"tidio_chat.php" ?> 
</body>
</html>
<?php 
}
?>