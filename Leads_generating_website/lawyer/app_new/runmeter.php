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
  $id=$_SESSION['id'];
  $dbins = new Database();
  $db = $dbins->getConnection();
  $sent_details = $_REQUEST;
  \Stripe\Stripe::setApiKey(STRIPE_SECRET_KEY);
  try{

    $sql = "SELECT * from  `subscriptions` WHERE lawyer_id = $id Limit 1"; 
    //$insert = $db->query($sql); 
    if($db->query($sql)->rowCount() >0)
    {
      foreach ($db->query($sql) as $row){

        $item = \Stripe\SubscriptionItem::createUsageRecord(
            $row['subscription_item_id'],
            [
              'quantity' => 102, 
              'timestamp' => time(),
              'action' => "increment",
            ]
          );
        echo'<pre>';print_r($item);echo'</pre>';
          $subs = \Stripe\Subscription::retrieve(
            $row['subscription_id']
          );
        //echo'<pre>';print_r($subs);echo'</pre>';

      }      
    }


  /*
    sub_GLTUBqDFc1Scxn
  */
  /*\Stripe\SubscriptionItem::createUsageRecord(
    'si_GLVnOyGiMK5xy9',
    [
      'quantity' => 123,
      'timestamp' => time(),
      'action' => "increment",
    ]
  );

  $subs = \Stripe\Subscription::retrieve(
    'sub_GLVn2iq6oyYvbH'
  );
  echo'<pre>';print_r($subs);echo'</pre>';*/
  //hook
  /*
  INSERT INTO `invoices` (`id`, `unique_id`, `subscription_id`, `lawyer_id`, `amount`, `status`, `payment_date`, `usage_start`, `usage_end`) VALUES (NULL, '323sdfd', 'sdfsdewre', '3', '124', 'paid', '2019-12-19 09:24:24', '2019-12-03 09:24:25', '2019-12-19 10:25:20');
  */


  }catch(Exception $e){
  	echo'<pre>';print_r($e);echo'</pre>';	
  	echo 'Unsuccessful';exit;
  }




?>