<?php // Get the subscription ID if it is available. 
// Otherwise $subscription_id will be set to zero. 
$subscription_id = (int) $_POST['x_subscription_id']; 
// Check to see if we got a valid subscription ID. 
// If so, do something with it. 
if ($subscription_id) { 
    // Get the response code. 1 is success, 2 is decline, 3 is error 
    $response_code = (int) $_POST['x_response_code']; 
    // Get the reason code. 8 is expired card. 
    $reason_code = (int) $_POST['x_response_reason_code']; 
    if ($response_code == 1) { 
        // Approved! 
        echo "Approved";
        echo $response_code;
        // Some useful fields might include: 
        // $authorization_code = $_POST['x_auth_code']; 
        // $avs_verify_result = $_POST['x_avs_code']; 
        // $transaction_id = $_POST['x_trans_id']; 
        // $customer_id = $_POST['x_cust_id']; 
    } 
    else if ($response_code == 2) { 
        // Declined 
        echo "Dec";
    } 
    else if ($response_code == 3 && $reason_code == 8) { 
        // An expired card 
        echo "ex";
    } 
    else { 
        // Other error 
        echo "erro";
    } 
} ?>;