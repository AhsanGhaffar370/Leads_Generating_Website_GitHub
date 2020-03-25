<?php
session_start();
include_once "config/database.php";
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
}

// Include configuration file  
require_once 'configs.php'; 
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Secure Payment | Affordable Attorney leads </title>
<link rel="shortcut icon" type="image/x-icon" href="https://affordableattorneyleads.com/growth.png" />
    
<!--#####################################Libraries file##########################################-->
<?php include "libs.php"; ?>
    <style type="text/css">
    .StripeElement {
        box-sizing: border-box;
        height: 40px;
        padding: 10px 12px;
        border: 2px solid tomato;
        border-radius: 4px;
        background-color: white;
        width:100%;
        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
      }
      .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
      }
      .StripeElement--invalid {
        border-color: #fa755a;
      }
      .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
      }
    </style>
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
              
                    <form  action="paymentstripe" method="POST" accept-charset="UTF-8" id="payment-form" data-stripe-publishable-key="<?php echo STRIPE_PUBLIC_KEY; ?>">
                    
                        <div class="form-group text-left">
                        
                            <label class="mt-3">Name:</label>
                            <input type="text" name="name" id="name" placeholder="Enter name" value="<?php echo $_SESSION['Name']?>" class="form-control p-4"/>
                        </div>

                        
                        <div class="form-group text-left">
                            <label class="mt-3">Email:</label>
                            <input type="email" name="email" id="email" placeholder="Enter email" value="<?php echo $_SESSION['Lawyerlogin']?>"  class="form-control p-4"/>
                        </div>   
                        <div class="form-group text-left">
                            <label class="mt-3">Card Details:</label>
                            <div id="card-element">
                            </div>
                            <div id="card-errors" role="alert"></div>
                        </div>  

                        <div class="form-group">
                                <input type="submit" name="submitbtn" id="submit-form" class="btn p-3 btn-md mb-5 buttons font-weight-bold button_size" value="SUBMIT" />
                        </div>
                    </form>
                </div>
            </center>
        </div>
    </div>
</section>


    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script type="text/javascript">
      
    jQuery(document).ready(function ($) {
        var stripe = Stripe($("#payment-form").attr("data-stripe-publishable-key"));
        var elements = stripe.elements();
        hidePostalCode = true;
        var style = {
            base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };
        var card = elements.create('card', {style: style, hidePostalCode: true});
        card.mount('#card-element');
        card.addEventListener('change', function (event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function (event) {
            event.preventDefault();
        });
        $("#submit-form").on('click',function(){
            stripe.createToken(card).then(function (result) {
              console.log('Must Be Called piece');
                if (result.error) {
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                    console.log('error came out');
                } else {     
                    stripeTokenHandler(result.token);
                }
            });
        });
        function stripeTokenHandler(result) 
        {
            var stripeToken = result.id;
            $("#payment-form").append("<input type='hidden' name='stripeToken' value='" + stripeToken + "'/>");
            $("#payment-form").submit();
        }
    });
    </script>

</body> 
</html>
