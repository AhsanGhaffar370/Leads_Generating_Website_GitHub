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
    if (strlen($_SESSION['Catogory'])==0){
        header('location:update-profile');
    }
?>
<?php 
// Include configuration file  
require_once 'configs.php'; 
 
$payment_id = $statusMsg = ''; 
$ordStatus = 'error'; 
 
// Check whether stripe token is not empty 
if(!empty($_POST['stripeToken'])){ 
     
    // Retrieve stripe token, card and user info from the submitted form data 
    $token  = $_POST['stripeToken'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $card_number = $_POST['card_number']; 
    $card_exp_month = $_POST['card_exp_month']; 
    $card_exp_year = $_POST['card_exp_year']; 
    $card_cvc = $_POST['ccvc']; 
    $itemPrice1=$_POST['money'];
     
    // Include Stripe PHP library 
    require_once 'stripe-php/init.php'; 
     
    // Set API key 
    \Stripe\Stripe::setApiKey(STRIPE_API_KEY);
     
    // Add customer to stripe 
    $customer = \Stripe\Customer::create(array( 
        'email' => $email, 
        'source'  => $token 
    )); 
     
    // Unique order ID 
    $orderID = strtoupper(str_replace('.','',uniqid('', true))); 
     
    // Convert price to cents 
    $itemPrice1 = ($itemPrice1*100); 
     
    // Charge a credit or a debit card 
    $charge = \Stripe\Charge::create(array( 
        'customer' => $customer->id, 
        'amount'   => $itemPrice1, 
        'currency' => $currency, 
        'description' => $itemName, 
        'metadata' => array( 
            'order_id' => $orderID 
        ) 
    )); 
     
    // Retrieve charge details 
    $chargeJson = $charge->jsonSerialize(); 
 
    // Check whether the charge is successful 
    if($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1){ 
        // Order details  
        // $itemPrice1=$itemPrice1/100;
        $transactionID = $chargeJson['balance_transaction']; 
        $paidAmount = $chargeJson['amount']; 
        $paidCurrency = $chargeJson['currency']; 
        $payment_status = $chargeJson['status']; 
         
        // Include database connection file  
        include_once 'dbconnect.php'; 
        $Lid=$_SESSION['id'];
         
        // Insert tansaction data into the database 
        $sql = "INSERT INTO payment(LawyerID,name,email,card_number,card_exp_month,card_exp_year,item_name,item_price,item_price_currency,paid_amount,paid_amount_currency,txn_id,payment_status,created,modified) VALUES('".$Lid."','".$name."','".$email."','".$card_number."','".$card_exp_month."','".$card_exp_year."','".$itemName."','".$itemPrice1."','".$currency."','".$paidAmount."','".$paidCurrency."','".$transactionID."','".$payment_status."',NOW(),NOW())"; 
        $insert = $db->query($sql); 
        $payment_id = $db->insert_id;
         
        // If the order is successful 
        if($payment_status == 'succeeded'){ 
            $ordStatus = 'success'; 
            $statusMsg = 'Your Payment has been Successful!'; 
        }else{ 
            $statusMsg = "Your Payment has Failed!"; 
        } 
    }else{ 
        //print '<pre>';print_r($chargeJson); 
        $statusMsg = "Transaction has been failed!"; 
    } 
}else{ 
    $statusMsg = "Error on form submission."; 
} 
?>

<div class="container">
    <div class="status">
        <?php if(!empty($payment_id)){
            
            $database=new Database();
            $d=$database->getConnection();
            $sq ="SELECT PendingBalance FROM lawyer_profile WHERE  id=:id";
 
            $quer = $d->prepare($sq);
            // bind values 
           $quer-> bindParam(':id', $id, PDO::PARAM_STR);
            $quer->execute();
            $resu=$quer->fetchAll(PDO::FETCH_OBJ);
            $ro = $quer->fetch(PDO::FETCH_ASSOC);
            if($quer->rowCount() > 0)
            {
                foreach($resu as $resul){
                    $pend=htmlentities($resul->PendingBalance);
                }
            }


            $PendingBalance=($itemPrice1/100)+$pend;

            $sqlQuery="update lawyer_profile set PendingBalance=:PendingBalance where id=:id";
            $querys=$d->prepare($sqlQuery);
            $querys->bindParam(':PendingBalance',$PendingBalance);
            $querys->bindParam(':id',$id);
            $querys->execute();
             ?>
            <h1 class="<?php echo $ordStatus; ?>"><?php echo $statusMsg; ?></h1>
			
            <h4>Payment Information</h4>
            <p><b>Reference Number:</b> <?php echo $payment_id; ?></p>
            <p><b>Transaction ID:</b> <?php echo $transactionID; ?></p>
            <p><b>Paid Amount:</b> <?php echo $paidAmount.' '.$paidCurrency; ?></p>
            <p><b>Payment Status:</b> <?php echo $payment_status; ?></p>
			
            <h4>Product Information</h4>
            <p><b>Name:</b> <?php echo $itemName; ?></p>
            <p><b>Price:</b> <?php echo $itemPrice1.' '.$currency; ?></p>
        <?php }else{ ?>
            <h1 class="error">Your Payment has Failed</h1>
        <?php } ?>
    </div>
    <a href="paymentForm.php" class="btn-link">Back to Payment Page</a>
</div>
<?php
}
?>