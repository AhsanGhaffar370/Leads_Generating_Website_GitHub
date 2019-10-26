<?php 
include_once "config/database.php"; 
include_once "object/login.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lawyer SignUp</title>

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
        if($sign_up->lawyerSignup())
        {
            echo "<div class='alert alert-success'>Successfully Signup.</div> <script type='text/javascript'> document.location = 'login'; </script>";
        }

        // if unable to create the product, tell the user
        else
        {
            echo "<div class='alert alert-danger'>Unable.</div>";
        }
        //////////////////////////////////////

    }
?>
<center>
<section class="cus-sec1">
	<div class=" container mt-5 mb-5"><br /><br />
    <div class=" col-lg-7 m-auto d-block  bg-light p-5">
    
        <div class="col-lg-7 col-md-7 col-sm-7 col-12 ">
        	<a href="home"><img class="logo images" src="Image/attorney.png" alt="attorney logo" /></a><hr />
        </div>
                
        <h4 class="text-dark text-center font-weight-bold p-3 heading" style="background-color:#d1ecf1;">--SIGNUP--</h4><br />
        
        <form class="lawyer-form1 p-4 text-left" method="post" >
            <div class="form-group ">
                <label>Fullname</label>
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
                		<option value="-1" selected="selected" disabled="disabled">choose state</option>
                        <option value="Dayton,OH">Dayton(OH)</option>
                        <option value="Cleveland,OH">Cleveland(OH)</option>
                        <option value="Cincinnati,OH">Cincinnati(OH) </option>
                        <option value="Columbus,OH">Columbus(OH)</option>
                        
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
            
            
           <hr />
            <div class="form-group text-center">
            	<input type="submit" name="submitbtn" value="SIGNUP" class="button_size btn p-3 btn-lg mb-3 btn-danger font-weight-bold"/>
            </div>
        
        </form>
        <div class="text-center">
        <p>Already have an account. Please <a href="login" >Login</a></p>
        </div>
    </div>
</div>
</section>
</center>
</body>
</html>