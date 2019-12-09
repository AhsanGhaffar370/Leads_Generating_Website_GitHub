<?php
include_once "config/database.php";
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['Catogory'])==0){
    header('location:login');
}
if(strlen($_SESSION['Lawyerlogin'])==0)
	{	
header('location:login');
}
else{
    $id=$_SESSION['id'];
    if ((strlen($_SESSION['Catogory'])==0) && (strlen($_SESSION['Catogory2'])==0) && (strlen($_SESSION['Catogory3'])==0) && (strlen($_SESSION['Catogory4'])==0) ){
        header('location:update-profile');
    }
?>
<?php 
// Include configuration file  
require_once 'configs.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- jQuery is used only for this example; it isn't required to use Stripe -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Stripe JavaScript library
<script src="https://js.stripe.com/v2/"></script> -->

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Secure Payment | Affordable Attorney leads </title>
<link rel="shortcut icon" type="image/x-icon" href="https://affordableattorneyleads.com/growth.png" />
    
<!--#####################################Libraries file##########################################-->
<?php include "libs.php"; ?>
<script src="client_validate.js"></script> 
</head>
<body class="bg-light">
<?php include_once "dashboard_header.php"; ?>
<br><br><br>
<section class="pl-2 pr-2">
    <div class="container bg-white text-center text-black dash pt-2 mt-5 mb-5 border-light border-right border-left border-top border-bottom">
        <?php include_once "balance_status.php" ?>      
        <h4 class="text-left pl-5 font-weight-bold p-3" style="background-color:#d1ecf1; color:#0c5460;">Payment </h4>
        
        <div class="container">
            <center>
                <div class="col-12 col-lg-7  col-md-10 col-sm-12">
                <div class="payment-status"></div>
              
                    <form class="payment-form1111" action="payments.php" method="POST" id="paymentFrm">
                    
                        <div class="form-group text-left">
                        
                            <label class="mt-3">Name:</label>
                            <input type="text" name="name" id="name" placeholder="Enter name" value="<?php echo $_SESSION['Name']?>" class="form-control p-4"/>
                        </div>
                        <div class="form-group text-left">
                            <label class="mt-3">Amount:</label>
                            <input type="text" name="money" id="money" placeholder="Enter Amount" class="form-control p-4"/>
                        </div>
                        
                        <div class="form-group text-left">
                            <label class="mt-3">Email:</label>
                            <input type="email" name="email" id="email" placeholder="Enter email" value="<?php echo $_SESSION['Lawyerlogin']?>"  class="form-control p-4"/>
                        </div>   
                         
                        <div class="form-group text-left">
                            <label class="mt-3">Card Number:</label>
                            <input type="text" class="form-control p-4" name="card_number" id="card_number" placeholder="Card Number" autocomplete="off"/>
                        </div>
                        
                        <div class="form-group text-left">
                            <label class="mt-3">CVC:</label>
                            <input type="text" class="form-control p-4" name="card_cvc" id="cvc" placeholder="CVC"/>
                        </div>
                        
                        <div class="form-group text-left">
                            <label class="mt-3">Expiration:</label>
                            
                            <div class="row col-12">
                                <div class="col-12 col-sm-12  col-lg-6 col-md-6">
                                <input type="text" class="form-control p-4 mt-2" name="card_exp_month" id="card_exp_month" placeholder="MM"/>
                                </div>
                                <div class="col-12 col-sm-12 col-lg-6 col-md-6">
                                <input type="text" class="form-control p-4 mt-2" name="card_exp_year" id="card_exp_year" placeholder="YYYY"/>
                                </div>
                            </div>
                        </div>
    
                       <br /><hr />
                        <div class="form-group">
                                <input type="submit" name="submitbtn" id="payBtn" class="btn p-3 btn-md mb-5 buttons font-weight-bold button_size" value="SUBMIT" />
                        </div>
                    </form>
                </div>
            </center>
        </div>
    </div>
</section>

<?php include_once"tidio_chat.php" ?> 
</body> 
</script>
</html>
<?php 
}
?>