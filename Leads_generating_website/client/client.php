<?php
// Required if your environment does not handle autoloading
require __DIR__ . '/vendor/autoload.php';

// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;


session_start();
error_reporting(0);
if (strlen($_SESSION['city'])==0){
    header('location:index');
}
 include_once "config/database.php"; 
include_once "object/user.php";

require_once "configs.php"; 
  include "vendors/autoload.php";
//   error_reporting(E_ALL); ini_set('display_errors', 1);



  ?>
<?php
// if(isset($_REQUEST['submitbtn']))
// {
// $_SESSION['eid']=$_GET['submitbtn'];
// $o=$_SESSION['eid'];
// // $status="2";
// // $sql = "UPDATE tblbooking SET Status=:status WHERE  id=:eid";
// // $query = $dbh->prepare($sql);
// // $query -> bindParam(':status',$status, PDO::PARAM_STR);
// // $query-> bindParam(':eid',$eid, PDO::PARAM_STR);
// // $query -> execute();
// echo "$o";
// $msg="Booking Successfully Cancelled";
// }

            // $database=new Database1();
            $database=new Database();
            $db = $database->getConnection();
    //pass connection to objects
            $user = new userRequest($db);
            $msg="";
            
            $t=$_SESSION['city'];
                // echo "city is".$t;
            // $db = $database->connect();
            if (isset($_POST['submitbtn']))
            {
                $lname= $_POST['lname'];
                $fname= $_POST['fname'];
                $fullname="";
                $fullname=$fname." ".$lname;
                $user->Name = $fullname;
                
                $_SESSION['fname']=$fname." ".$lname;
                $_SESSION['emailsss']=$_POST['email'];
                $_SESSION['pho']=$_POST['mob'];
                
                $user->Email = $_POST['email'];
                $user->PhoneNo  = $_POST['mob'];
                
                $user->state= $_SESSION['city'];
                $user->city= $_SESSION['city'];
                $user->city3= $_SESSION['city'];
                $user->city4= $_SESSION['city'];
                
                $_SESSION['userName']=$_POST['fname'];
                // $user->State= $_POST['state'];
                $user->Lawyer_category= $_POST['law_cat'];
                
                
                $user->legal_matter= $_POST['msg'];
                $user->State=$_SESSION['city'];
                $u=$_SESSION['city'];
                $j=$_SESSION['cato'];
                // echo $j;
                //    $query="INSERT INTO `customer_info`(`Name`, `Email`, `PhoneNo`, `ZipCode`, `State`, `Lawyer_category`, `legal_matter`) VALUES ('$fname','$email','$mob','$zip','$state','$lawyer_cat','$matter')";

                    // $run=mysqli_query($db,$query);

                    // if($run == true)
                    //     echo "Successfully Sign Up";
                //     echo $u;
                // echo $j;
                $email = $_POST['email'];
                // $stmt = $db->prepare("SELECT * FROM customer_info WHERE Email=?");
                // $stmt->execute([$email]);
                // $user1 = $stmt->fetch();
                // if ($user1) {
                //     echo "<div class='alert alert-danger'>Email Already Exist</div>";
                // }
                    if($user->UserR())
                    {
                        // $msg="Successfully Signup.";
                        // echo "<div class='alert alert-success mt-4'>Successfully Signup.</div>";
                        
                        if($user->AssignLawyer())
                    {
                        
                        
                        $user->LawyerID=$_SESSION['ID1'];
                        $id1=$_SESSION['ID1'];
                        $ii=$_SESSION['ii'];
                        $user->ClientID=$ii;
                        $user->LawyerName=$_SESSION['Namess'];
                        $user->EntityType="Family Law Leads";
                        $user->Phone  = $_POST['mob'];
                        $user->Amount=40;
                        $de=$_SESSION['des'];
                        $em=$_SESSION['Email1'];
                        $r=$_SESSION['time'];
                        if ($r==""){
                            $r='America/New_York';
                        }
                        $dt = new DateTime('now', new DateTimezone($r));
                        $da=$dt->format('F j, Y, g:i a');
                        $user->Created=$da;
                        $Pending_balance=$_SESSION['pending'];
                        $newPendingBalance=($Pending_balance-40);
                        $sqls="update lawyer_profile set PendingBalance=:newPendingBalance where id=:id1";
                        $querys = $db->prepare($sqls);
                        $querys->bindParam(':newPendingBalance',$newPendingBalance);
    
                        $querys->bindParam(':id1',$id1);
                        if ($querys->execute()){
                            if ($user->invoice1()){
                            
                                $id=$_SESSION['ID1'];
                            // echo $id;
                            
                            $user->id=$id;
                            if ($user->leadsWork()){
                                // $id=$_SESSION['ID1'];
                                $lea=$_SESSION['leads'];
                                $dummy=$_SESSION['dummy'];
                                $lea=$lea+1;
                                // echo "$lea";
                                $dum=$dummy+1;
                                
                                // echo "$dum";
                                $total=$dum*40;
                                $user->leads=$lea;
                                $user->total_Leads=$total;
                                $user->DummyLeads=$dum;
                               
                                if ($user->leadWork()){

                                    $sqlquery = "SELECT subject,detail,active,smsstatus from lawyer_profile where id=:id";
                                    $query1 = $db -> prepare($sqlquery);
                                    $query1->bindParam(':id',$id,PDO::PARAM_STR);
                                    $query1->execute();
                                    $re=$query1->fetchAll(PDO::FETCH_OBJ);
                                    $cnt=1;
                                    if($query1->rowCount() > 0)
                                    {
                                    foreach($re as $ree)
                                    {
                                    // $detail = htmlentities($ree->detail);
                                    $sub= htmlentities($ree->subject);
                                    $act= htmlentities($ree->active);
                                    $sms=htmlentities($ree->smsstatus);
                                    
                                    
                                    if ($act=="1"){
                                        $from_name="Affordable Legal Help";
                                        $from_email="info@affordablelegalhelp.com";
                                    
                                        $headers  = "MIME-Version: 1.0\r\n";
                                        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
                                        $headers .= "From: {$from_name} <{$from_email}> \n";
                                        $body=$ree->detail;
                                        // $body.="Please click the following link to reset your password: {$home_url}reset_password/?access_code={$access_code}";
                                        $subject=$sub;
                                        $send_to_email=$_POST['email'];
                                    
                                       mail($send_to_email, $subject, $body, $headers);
                                       
                                            // return true;
                                        
                                    }
                                   
                                    if($sms=="1"){
                                        

                                        // Your Account SID and Auth Token from twilio.com/console
                                        $sid = 'ACddc3b947e7fe603112de083a42e1eb43';
                                        $token = '985626b65e5beb727aae5529197e5cf5';
                                        $client = new Client($sid, $token);
                                        $num='+1';
                                        $num.=$_SESSION['sms'];
                                        // Use the client to do fun stuff like send text messages!
                                        
                                        try{$client->messages->create(
                                            // the number you'd like to send the message to
                                            $num,
                                            array(
                                                // A Twilio phone number you purchased at twilio.com/console
                                                'from' => '+12054489445',
                                                // the body of the text message you'd like to send
                                                'body' => 'Leads Arrived!'
                                            )
                                        );
                                        // echo "Message send ";
                                            
                                        }
                                        catch(Exception $e) {
                                            // echo "not send";
                                            // echo 'Error: ' . $e->getMessage();
                                        }

                                    }
                                    }}
                                    
                                        $to=$em;
                                        $subject="Affordable Attorney leads ";
                                        $cname=$_SESSION['Namess'];
                                        $cemail=$_SESSION['emailsss'];
                                        $cphone=$_SESSION['pho'];
                                        $subjj=$_POST['law_cat'];
                                        $mssg=$_POST['msg'];
                                        
                                        
                                        $msg="New Leads Arrives \n Name: ".$cname." \n Email: ".$cemail."\n Contact: ".$cphone." \n Subject: ".$subjj." \n Message: ".$mssg;
                                        // $msg="New Leads Arrived";
                                        $header="From: info@legalhelpservice.com";
                                        if (mail($to,$subject,$msg,$header)){
                                                // echo "Mail send successfully";
                                            }
                                            else{
                                                // "can not send email";
                                            }
                                        
                                    // echo "$de";
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
                                          'quantity' => 40, 
                                          'timestamp' => time(),
                                          'action' => "increment",
                                        ]
                                      );
                                    // echo'<pre>';print_r($item);echo'</pre>';
                                      $subs = \Stripe\Subscription::retrieve(
                                        $row['subscription_id']
                                      );
                                      
                                    //echo'<pre>';print_r($subs);echo'</pre>';
                            
                                  }      
                                }
                              }catch(Exception $e){
                            //   	echo'<pre>';print_r($e);echo'</pre>';	
                            //   	echo 'Unsuccessful';exit;
                              }
                                    echo "<script type='text/javascript'> document.location = 'request'; </script>";
                         
                                    // echo "Succesful update";
                                }
                            
                            }
        
                            }
                        }
                       
                        
                    }
                    else
                    {
                        
                        $sqq ="SELECT active,subject,detail,smsstatus,smsPhoneNumber,timezone FROM
                lawyer_profile WHERE 
                     id=13 ";
                
                $quey= $db->prepare($sqq);

                // // posted values
              
                // $query->bindParam(":id", $this->state);
                // $query->bindParam(":Catogory", $this->Catogory);
                $quey->execute();
                $resu=$quey->fetchAll(PDO::FETCH_OBJ);
                $row = $quey->fetch(PDO::FETCH_ASSOC);
                if($quey->rowCount() > 0)
                {
                    foreach($resu as $resul){
                       $su =htmlentities($resul->subject);
                    //   $de =htmlentities($result->detail);
                       $sm =htmlentities($resul->smsstatus);
                       $sPhoneN =htmlentities($resul->smsPhoneNumber);
                       $tim =htmlentities($resul->timezone);
                       $ac =htmlentities($resul->active);
                       
                       
                       
                      if ($ac=="1"){
                                        $from_name="Affordable Legal Help";
                                        $from_email="info@affordablelegalhelp.com";
                                    
                                        $headers  = "MIME-Version: 1.0\r\n";
                                        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
                                        $headers .= "From: {$from_name} <{$from_email}> \n";
                                        $body=$resul->detail;
                                        // $body.="Please click the following link to reset your password: {$home_url}reset_password/?access_code={$access_code}";
                                        $subject=$su;
                                        $send_to_email=$_POST['email'];
                                    
                                      mail($send_to_email, $subject, $body, $headers);
                                       
                                            // return true;
                                        
                                    }
                                    if($sm=="1"){
                                        

                                        // Your Account SID and Auth Token from twilio.com/console
                                        $sid = 'ACddc3b947e7fe603112de083a42e1eb43';
                                        $token = '985626b65e5beb727aae5529197e5cf5';
                                        $client = new Client($sid, $token);
                                        $num='+1';
                                        $num.=$_SESSION['sms'];
                                        // Use the client to do fun stuff like send text messages!
                                        
                                        try{$client->messages->create(
                                            // the number you'd like to send the message to
                                            $num,
                                            array(
                                                // A Twilio phone number you purchased at twilio.com/console
                                                'from' => '+12054489445',
                                                // the body of the text message you'd like to send
                                                'body' => 'Leads Arrived!'
                                            )
                                        );
                                        // echo "Message send ";
                                            
                                        }
                                        catch(Exception $e) {
                                            // echo "not send";
                                            // echo 'Error: ' . $e->getMessage();
                                        }

                                    }
                                    
                        
                    }}
                    
                $lname=$_POST['lname'];
                $fname=$_POST['fname'];
                $fullname=$fname." ".$lname;
                $Name = $fullname;
                $Email = $_POST['email'];
                $Phone  = $_POST['mob'];
                $r='America/New_York';
                        
                        $dt = new DateTime('now', new DateTimezone($r));
                        $da=$dt->format('F j, Y, g:i a');
            $Created = $da;
                // $state= $_SESSION['city'];
                    $ClientID=$_SESSION['ii'];
                    // echo $ClientID;
                    $LawyerID=13;
                    // echo $LawyerID;
                        // $LawyerName=$_SESSION['Namess'];
                        $EntityType=$_SESSION['from_page'];
                        // echo $EntityType;
                        $Phone  = $_POST['mob'];
                        // echo $Phone;
                        $Amount=40;
                        // $de=$_SESSION['des'];
                    $sqlss = "INSERT INTO
                       lawyer_invoice
                    SET
                    LawyerID=:LawyerID,ClientID=:ClientID,EntityType=:EntityType,Name=:Name,Email=:Email,Phone=:Phone,Created=:Created";
     
            $queryss = $db->prepare($sqlss);
            
     
            // posted values
           
 
            
            // bind values 
            $queryss->bindParam(":LawyerID", $LawyerID);
            
            // $query->bindParam(":LawyerName", $this->LawyerName);
            
            // $query->bindParam(":LawyerName", $this->LawyerName);
            $queryss->bindParam(":ClientID", $ClientID);
            
            $queryss->bindParam(":EntityType", $EntityType);
            // echo "helll";
            $queryss->bindParam(":Name", $Name);
            $queryss->bindParam(":Email", $Email);
            $queryss->bindParam(":Phone", $Phone);
            // echo "helloss";
            // $query->bindParam(":Amount", $this->Amount);
            $queryss->bindParam(":Created", $Created);
     
            if($queryss->execute()){
                echo "<script type='text/javascript'> document.location = 'thank-you'; </script>";
                         
                // echo "hello";
                // return true;
            }else{
                // echo "not hello";
                // return false;
            }

                
             
                        // echo "<script type='text/javascript'> document.location = 'thank-you'; </script>";
                         
                        //echo "<div class='alert alert-danger'>Lawyers are Not Avaibalable in this City.</div>";
                    }
                       
                    }
                    else
                {
                    echo "<div class='alert alert-danger'>Unable.</div>";
                }
                
               

        // if unable to create the product, tell the user
            }
            
        ?>