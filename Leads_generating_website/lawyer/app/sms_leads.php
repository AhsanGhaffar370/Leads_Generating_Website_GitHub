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
        header('location:change-images');
    } 
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>sms | Affordable Attorney leads</title>
<link rel="shortcut icon" type="image/x-icon" href="https://affordableattorneyleads.com/site_icon.png" />

</head>
<?php include_once "libs.php"; ?>

<script src="client_validate.js"></script>


<body class="bg-light">
    
<?php include_once "dashboard_header.php"; ?>

<?php
     $database=new Database();
     $db = $database->getConnection();
     
     if(isset($_POST['submitform']))
{
    $smsstatus=$_POST['active'];
    $smsPhoneNumber=$_POST['mob'];
    
$sq = "UPDATE lawyer_profile SET smsstatus=:smsstatus,smsPhoneNumber=:smsPhoneNumber where id=:id";
$quer = $db->prepare($sq);
$quer->bindParam(':smsstatus',$smsstatus, PDO::PARAM_STR);
$quer->bindParam(':smsPhoneNumber',$smsPhoneNumber, PDO::PARAM_STR);

$quer->bindParam(':id',$id, PDO::PARAM_STR);

$quer->execute();
// $msg="Page data updated  successfully";

}

?>
 <?php $sql = "SELECT smsstatus,smsPhoneNumber from lawyer_profile where id=:id";
                        $query = $db -> prepare($sql);
                        $query->bindParam(':id',$id,PDO::PARAM_STR);
                        $query->execute();
                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                        $cnt=1;
                        if($query->rowCount() > 0)
                        {
                        foreach($results as $result)
                        {
                        $sms = htmlentities($result->smsstatus);
                        $smsph = htmlentities($result->smsPhoneNumber);
                        
                        
                        }}

                        ?>
<br><br><br>    
<section class="pl-2 pr-2">
    <div class="container bg-white text-center text-black dash pt-2 mt-5 mb-5 border-light border-right border-left border-top border-bottom">
        <?php include_once"balance_status.php" ?>   
        <h4 class="text-left pl-5 font-weight-bold p-3" style="background-color:#d1ecf1; color:#0c5460;">SMS/TEXT Leads </h4>
        <div class="alert alert-primary text-left mb-4 xs_texts container font-weight-normal text-secondary">
            <i class="fas fa-info-circle text-info"> </i>
            Please enter your SMS enabled phone number below and save to receive leads as a text message.<br> &nbsp&nbsp&nbsp&nbsp&nbspExample:555-555-5555
        </div>
        
        <div class="col-lg-8 col-md-8 col-sm-8 col-12 d-block mt-5 mb-5">
            <form class="sms-form1" method="post">
               
                <div class="form-group text-left col-8 col-lg-4 col-md-6 col-sm-8 pl-0">
                    <label class="font-weight-bold">Cell Phone#:</label>
                    <input type="tel" class="form-control" name="mob" value="<?php echo $smsph; ?>" id="mob" placeholder="xxx-xxx-xxxx"/>
                    <!--<div class="row col-8 col-lg-7 col-md-8 col-sm-6">-->
                    <!--    <div class="col-12 col-sm-3  col-lg-3 col-md-3 mr-1 pl-0 pr-0 pt-1">-->
                    <!--        <input type="tel" class="form-control p-3" name="mob1" id="mob1"/>-->
                    <!--    </div>-->
                    <!--    <div class="col-12 col-sm-3 col-lg-3 col-md-3 mr-1 pl-0 pr-0 pt-1">-->
                    <!--        <input type="tel" class="form-control p-3" name="mob2" id="mob2"/>-->
                    <!--    </div>-->
                    <!--    <div class="col-12 col-sm-4 col-lg-4 col-md-4 mr-1 pl-0 pr-0 pt-1">-->
                    <!--        <input type="tel" class="form-control p-3" name="mob3" id="mob3"/>-->
                    <!--    </div>-->
                    <!--</div>-->
                </div>
                    
                <div class="form-group text-left">
                    <input type="checkbox" name="active" value="1" <?php echo ($sms =='1')? 'checked':''?>> Receive leads via text message
                </div>
                
                <br><br>
                
                <div class="form-group text-left">
                     <input type="submit" name="submitform" id="submitform" class="btn pt-1 pb-1 pr-3 pl-3 mb-5 buttons" value=" Save " />
                </div>
                
            
            </form>
        </div>
    </div>
</section>




<?php include_once"tidio_chat.php" ?> 
</body>
</html>
<?php } ?>