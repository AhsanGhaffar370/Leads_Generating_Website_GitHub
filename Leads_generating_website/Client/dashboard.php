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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lawyer Dashboard</title>

<!--#####################################Libraries file##########################################-->
<?php include "libs.php"; ?>


</head>

<body class="bg-white">
<?php include_once "dashboard_header.php"; ?>
<?php 

$database=new Database();
$db = $database->getConnection();
$lead=0;
$total_Leads=0;
$DummyLeads=0;
 $sql ="SELECT * FROM lawyer_profile WHERE  id=:id";
 
 $query = $db->prepare($sql);
 // bind values 
$query-> bindParam(':id', $id, PDO::PARAM_STR);
 $query->execute();
 $results=$query->fetchAll(PDO::FETCH_OBJ);
 $row = $query->fetch(PDO::FETCH_ASSOC);
 if($query->rowCount() > 0)
 {
     foreach($results as $result){
         $lead=htmlentities($result->Leads);
         $total_Leads=htmlentities($result->total_Leads);
         $DummyLeads=htmlentities($result->DummyLeads);
         
         
     }
 }

$totalmoneys=$total_Leads*100;
?>
<section class="container bg-light text-center text-black-50 pt-1 pb-5" style="margin-top:130px;">

          
        <h4 class="text-left pl-5 text-white-50 bg-dark border-top border-bottom font-weight-bold p-3 mt-3 mb-5">Personal Information</h4>
        
        <div class="container">
        <div class="p-1 mt-3 bg-transparent border  border-bottom  font-weight-medium">
            	<p class="text-info text-left text-white" >
                	The Past Due balance shown below will be processed upon reactivation to bring your account up-to-date. Please make sure the payment card you enter has enough credit or balance available before proceeding.
                
                </p>
            </div>

            <div class="p-5 mt-4  bg-white  border-bottom  font-weight-medium">
            <form method="POST">
<script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_AyQEbE5XyzHTiSVThnnLYNdG0050ofkTiP"
    data-amount=""
    data-name=""
    data-description="Leads"
    data-locale="auto">
</script>
</form>
<?php 
require('./vendor/autoload.php');
if (isset($_POST['stripeToken'])){
    \Stripe\Stripe::setApikey("sk_test_MHxIGxKa0vhapvQYINWUDVhE00iuM1upCl");
    $token=$_POST['stripeToken'];
    
   
    $email = $_SESSION['Lawyerlogin'];
    // $email=$_POST['stripeEmail'];
    $charge=\Stripe\Charge::create([
        'amount'=>$totalmoneys,
        'currency'=>'usd',
        'description'=>'Leads',
        'source'=>$token,
    ]);
    echo "<pre>";
    
$database=new Database();
$db = $database->getConnection();
    $total_Leads=0;
    $DummyLeads=0;
    $sql="update lawyer_profile set total_Leads=:total_Leads,DummyLeads=:DummyLeads where id=:id ";
$query = $db->prepare($sql);
$query->bindParam(':total_Leads',$total_Leads);

$query->bindParam(':DummyLeads',$DummyLeads);

$query->bindParam(':id',$id);
$query->execute();

}
?>
            <div class="p-5 bg-light  border-bottom  font-weight-medium">
            	<label class="pr-5">
                	Pending Balance:
                </label>
                <label class="pl-5 ">$</label><?php echo $total_Leads?>
            </div>
            <div class="p-5 bg-light  border-bottom  font-weight-medium">
            	<label class="pr-5">
                	Total Leads:
                </label>
                <label class="pl-5 "></label><?php echo $lead ;?>
            </div>
        </div>
    </section>
    
<?php include_once "dashboard_footer.php"; ?>
    
</body>
</html>

<?php }?>