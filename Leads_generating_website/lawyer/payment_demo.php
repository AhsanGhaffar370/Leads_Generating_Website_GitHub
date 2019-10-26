<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>

<!--#####################################Libraries file##########################################-->
<?php include "libs.php"; ?>


<script src="client_validate.js"></script>

</head>

<body class="bg-light">
              
<section class="container bg-white text-center text-black dash pt-1 border-light border-right border-left border-top border-bottom">
<?php include_once"balance_status.php" ?>   
    <h4 class="text-left pl-5 font-weight-bold p-3" style="background-color:#d1ecf1; color:#0c5460;">Payment </h4>
    
    <div class="container">
    <center>
    	<div class="col-7">
        <form class="payment-form1111" method="post" >
        
                <h4 class="text-left text-center bg-light border-top border-bottom font-weight-medium p-3 mt-5 heading">---Payment Information---</h4>
                
            <div class="form-group text-left">
                <label class="mt-3">Card Number:</label>
                <input type="text" class="form-control p-4" name="card_number" id="card_number" placeholder="Card Number"/>
            </div>
            <div class="form-group text-left">
                <label class="mt-3">CVC:</label>
                <input type="text" class="form-control p-4" name="cvc" id="cvc" placeholder="CVC"/>
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
                	<input type="submit" name="submitbtn" class="btn p-3 btn-lg mb-5 buttons font-weight-bold" value="SUBMIT" />
            </div>
   		</form>
        </div>
        </center>
    </div>
</section>
    
</body>
</html>