<?php
session_start();
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/
include_once "config/database.php";
include "libs.php";
include "includes/config.php";
require_once "configs.php"; 
include "vendor/autoload.php";
// 
if (strlen($_SESSION['Catogory'])==0){
  header('location:login');
}
if(strlen($_SESSION['Lawyerlogin'])==0){	
  header('location:login');
}
else{
    $id=$_SESSION['id'];
    if ((strlen($_SESSION['Catogory'])==0) && (strlen($_SESSION['Catogory2'])==0) && (strlen($_SESSION['Catogory3'])==0) && (strlen($_SESSION['Catogory4'])==0) ){
        header('location:update-profile');
    }
  }
  $dbins = new Database();
  $db = $dbins->getConnection();
  $sent_details = $_REQUEST;
  \Stripe\Stripe::setApiKey(STRIPE_SECRET_KEY);

  if(isset($sent_details['stripeToken']) and !empty($sent_details['stripeToken']))
  {

    $email = $sent_details['email'];
    $name = $sent_details['name'];
    try {
        $customer = \Stripe\Customer::create(array(
            "description" => "Dedicated customer made for $email",
            "email" => $email,
            "name" => $name,
            "source" => $sent_details['stripeToken'],
        ));
        
        if(isset($customer->id) and !empty($customer->id))
        {
          


            $subscription = \Stripe\Subscription::create([
              'customer' => $customer->id,
              'items' => [['plan' => 'plan_GLVczzXyMaKbIw']],
            ]);


            if(isset($subscription) and $subscription->id != '')
            {

                $cid = $customer->id;
                $sid = $subscription->id;
                $si_id = isset($subscription->items->data[0]->id)?$subscription->items->data[0]->id:'';
                $Lid=$_SESSION['id'];
                $name = $name; 
                //$names = explode(" ", $name);
                $email = $email; 


                echo $sql = "INSERT INTO `subscriptions` (`subscription_id`, `customer_id`, `subscription_item_id`, `lawyer_id`, `name`, `email`, `status`, `start_date`, `end_date`) VALUES ('".$sid."', '".$cid."', '".$si_id."', '".$Lid."', '".$name."', '".$email."', '1', '".date('Y-m-d H:i:s',$subscription->current_period_start)."', '".date('Y-m-d H:i:s',$subscription->current_period_end)."');"; 
                $insert = $db->query($sql); 
                $paymentID = $db->insert_id; 
                $ordStatus = 'success'; 
                $statusMsg = 'You are successfully subscribed.'; 
            }
        }
        //echo '<pre>';print_r($customer);echo'</pre>';

      } catch(\Stripe\Error\Card $e) {
        $body = $e->getJsonBody();
        $err  = $body['error'];
        $msg = $err['message'];
        header("Location: error.php?msg=$msg");
      } catch (\Stripe\Error\RateLimit $e) {
        $body = $e->getJsonBody();
        $err  = $body['error'];
        $msg = $err['message'];     
        header("Location: error.php?msg=$msg");
      } catch (\Stripe\Error\InvalidRequest $e) {
        $body = $e->getJsonBody();
        $err  = $body['error'];
        $msg = $err['message'];
        header("Location: error.php?msg=$msg");
      } catch (\Stripe\Error\Authentication $e) {
        $body = $e->getJsonBody();
        $err  = $body['error'];
        $msg = $err['message'];
        header("Location: error.php?msg=$msg");
      } catch (\Stripe\Error\ApiConnection $e) {
        $body = $e->getJsonBody();
        $err  = $body['error'];
        $msg = $err['message'];
        header("Location: error.php?msg=$msg");
      } catch (\Stripe\Error\Base $e) {
        $body = $e->getJsonBody();
        $err  = $body['error'];
        $msg = $err['message'];
        header("Location: error.php?msg=$msg");
      } catch (Exception $e) {
        $body = $e->getJsonBody();
        $err  = $body['error'];
        $msg = $err['message']; 
        header("Location: error.php?msg=$msg");
      }
      //
    }
    else
    {
      header("Location: error.php?msg=Plan Should be selected");
    }






 
/*
require_once 'configs.php'; 
                $sql = "INSERT INTO payments(LawyerID,name,email,item_name,item_number,item_price,item_price_currency,card_number,card_exp_month,card_exp_year,paid_amount,txn_id,payment_status,payment_response,created,modified) VALUES('".$Lid."','".$name."','".$email."','".$itemName."','".$itemNumber."','".$itemPrice."','".$currency."','".$card_number."','".$card_exp_month."','".$card_exp_year."','".$itemPrice."','".$transaction_id."','".$payment_status."','".$payment_response."',NOW(),NOW())"; 
                $insert = $db->query($sql); 
                $paymentID = $db->insert_id; 
*/                 
