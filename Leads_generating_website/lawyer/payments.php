<?php 
// Include Authorize.Net PHP sdk 
require 'authorize_net_sdk_php/autoload.php';  
use net\authorize\api\contract\v1 as AnetAPI; 
use net\authorize\api\controller as AnetController;
?>
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
 
$paymentID = $statusMsg = ''; 
$ordStatus = 'error'; 
$responseArr = array(1 => 'Approved', 2 => 'Declined', 3 => 'Error', 4 => 'Held for Review'); 
 
// Check whether card information is not empty 
if(!empty($_POST['card_number']) && !empty($_POST['card_exp_month']) && !empty($_POST['card_exp_year']) && !empty($_POST['card_cvc'])){ 
     
    // Retrieve card and user info from the submitted form data 
    $Lid=$_SESSION['id'];
    $name = $_POST['name']; 
    $names = explode(" ", $name);
    $email = $_POST['email']; 
    $itemPrice = $_POST['money'];
    $card_number = preg_replace('/\s+/', '', $_POST['card_number']); 
    $card_exp_month = $_POST['card_exp_month']; 
    $card_exp_year = $_POST['card_exp_year']; 
    $card_exp_year_month = $card_exp_year.'-'.$card_exp_month; 
    $card_cvc = $_POST['card_cvc']; 
     
    // Set the transaction's reference ID 
    $refID = 'REF'.time(); 
     
    // Create a merchantAuthenticationType object with authentication details 
    // retrieved from the config file 
    $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();    
    $merchantAuthentication->setName(ANET_API_LOGIN_ID);    
    $merchantAuthentication->setTransactionKey(ANET_TRANSACTION_KEY);    
     
    // Create the payment data for a credit card 
    $creditCard = new AnetAPI\CreditCardType(); 
    $creditCard->setCardNumber($card_number);
    $creditCard->setExpirationDate($card_exp_year_month); 
    $creditCard->setCardCode($card_cvc); 

     
    // Add the payment data to a paymentType object 
    $paymentOne = new AnetAPI\PaymentType(); 
    $paymentOne->setCreditCard($creditCard); 
     
    // Create order information 
    $order = new AnetAPI\OrderType(); 
    $order->setDescription($itemName); 
     
    // Set the customer's Bill To address
    $customerAddress = new AnetAPI\CustomerAddressType();
    $customerAddress->setFirstName($names[0]);
    $customerAddress->setLastName($names[1]);
    $customerAddress->setAddress("karac");
    $customerAddress->setCity("kara");
    $customerAddress->setState("TX");
    $customerAddress->setZip("12223");
    $customerAddress->setPhoneNumber("122232332");
    
    // Set the customer's identifying information 
    $customerData = new AnetAPI\CustomerDataType(); 
    $customerData->setType("individual");
    // $customerData->setFirstName("Ellen");
    // $customerData->setLastName("Johnson");
    // $customerData->setAddress("14 Main Street");
    // $customerData->setCity("Pecan Springs");
    // $customerData->setState("TX");
    // $customerData->setZip("44628");
    // $customerData->setId("99999456654");
    
    $customerData->setId("99999456654");
    $customerData->setEmail($email); 
     
    // Create a transaction 
    $transactionRequestType = new AnetAPI\TransactionRequestType(); 
    $transactionRequestType->setTransactionType("authCaptureTransaction");    
    
    $transactionRequestType->setBillTo($customerAddress);
    $transactionRequestType->setAmount($itemPrice); 
    $transactionRequestType->setOrder($order); 
    $transactionRequestType->setPayment($paymentOne); 
    $transactionRequestType->setCustomer($customerData); 
    $request = new AnetAPI\CreateTransactionRequest(); 
    $request->setMerchantAuthentication($merchantAuthentication); 
    $request->setRefId($refID); 
    $request->setTransactionRequest($transactionRequestType); 
    $controller = new AnetController\CreateTransactionController($request); 
    $response = $controller->executeWithApiResponse(constant("\\net\authorize\api\constants\ANetEnvironment::$ANET_ENV")); 
     
    if ($response != null) { 
        // Check to see if the API request was successfully received and acted upon 
        if ($response->getMessages()->getResultCode() == "Ok") { 
            // Since the API request was successful, look for a transaction response 
            // and parse it to display the results of authorizing the card 
            $tresponse = $response->getTransactionResponse(); 
 
            if ($tresponse != null && $tresponse->getMessages() != null) { 
                // Transaction info 
                $transaction_id = $tresponse->getTransId(); 
                $payment_status = $response->getMessages()->getResultCode(); 
                $payment_response = $tresponse->getResponseCode(); 
                $auth_code = $tresponse->getAuthCode(); 
                $message_code = $tresponse->getMessages()[0]->getCode(); 
                $message_desc = $tresponse->getMessages()[0]->getDescription(); 
                 
                // Include database connection file  
                include_once 'dbConnect.php'; 
                
                // Insert tansaction data into the database 
                $sql = "INSERT INTO payments(LawyerID,name,email,item_name,item_number,item_price,item_price_currency,card_number,card_exp_month,card_exp_year,paid_amount,txn_id,payment_status,payment_response,created,modified) VALUES('".$Lid."','".$name."','".$email."','".$itemName."','".$itemNumber."','".$itemPrice."','".$currency."','".$card_number."','".$card_exp_month."','".$card_exp_year."','".$itemPrice."','".$transaction_id."','".$payment_status."','".$payment_response."',NOW(),NOW())"; 
                $insert = $db->query($sql); 
                $paymentID = $db->insert_id; 
                 
                $ordStatus = 'success'; 
                $statusMsg = 'Your Payment has been Successful!'; 
            } else { 
                $error = "Transaction Failed! \n"; 
                if ($tresponse->getErrors() != null) { 
                    $error .= " Error Code  : " . $tresponse->getErrors()[0]->getErrorCode() . "<br/>"; 
                    $error .= " Error Message : " . $tresponse->getErrors()[0]->getErrorText() . "<br/>"; 
                } 
                $statusMsg = $error; 
            } 
            // Or, print errors if the API request wasn't successful 
        } else { 
            $error = "Transaction Failed! \n"; 
            $tresponse = $response->getTransactionResponse(); 
         
            if ($tresponse != null && $tresponse->getErrors() != null) { 
                $error .= " Error Code  : " . $tresponse->getErrors()[0]->getErrorCode() . "<br/>"; 
                $error .= " Error Message : " . $tresponse->getErrors()[0]->getErrorText() . "<br/>"; 
            } else { 
                $error .= " Error Code  : " . $response->getMessages()->getMessage()[0]->getCode() . "<br/>"; 
                $error .= " Error Message : " . $response->getMessages()->getMessage()[0]->getText() . "<br/>"; 
            } 
            $statusMsg = $error; 
        } 
    } else { 
        $statusMsg =  "Transaction Failed! No response returned"; 
    } 
}else{ 
    $statusMsg = "Error on form submission."; 
} 
?>

<div class="status">
	<?php if(!empty($paymentID)){
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


        $PendingBalance=$itemPrice+$pend;

        $sqlQuery="update lawyer_profile set PendingBalance=:PendingBalance where id=:id";
        $querys=$d->prepare($sqlQuery);
        $querys->bindParam(':PendingBalance',$PendingBalance);
        $querys->bindParam(':id',$id);
        $querys->execute();
        ?>
		<h1 class="<?php echo $ordStatus; ?>"><?php echo $statusMsg; ?></h1>
		
		<h4>Payment Information</h4>
		<p><b>Reference Number:</b> <?php echo $paymentID; ?></p>
		<p><b>Transaction ID:</b> <?php echo $transaction_id; ?></p>
		<p><b>Status:</b> <?php echo $responseArr[$payment_response]; ?></p>
		
		<h4>Information</h4>
		<p><b>Name:</b> <?php echo $itemName; ?></p>
		<p><b>Price:</b> <?php echo $itemPrice.' '.$currency; ?></p>
	<?php }else{ ?>
		<h1 class="error">Your Payment has Failed</h1>
		<p class="error"><?php echo $statusMsg; ?></p>
	<?php } ?>
</div>
    <?php }
    ?>
    