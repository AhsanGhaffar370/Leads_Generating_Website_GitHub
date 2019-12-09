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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SMS Status</title>
<link rel="shortcut icon" type="image/x-icon" href="https://affordableattorneyleads.com/growth.png" />

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
    
$sq = "UPDATE lawyer_profile SET smsstatus=:smsstatus where id=:id";
$quer = $db->prepare($sq);
$quer->bindParam(':smsstatus',$smsstatus, PDO::PARAM_STR);
$quer->bindParam(':id',$id, PDO::PARAM_STR);

$quer->execute();
// $msg="Page data updated  successfully";

}

?>
 <?php $sql = "SELECT smsstatus from lawyer_profile where id=:id";
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
                        
                        }}

                        ?>
<br><br><br>    
<section class="pl-2 pr-2">
    <div class="container bg-white text-center text-black dash pt-2 mt-5 mb-5 border-light border-right border-left border-top border-bottom">
        <?php include_once"balance_status.php" ?>   
        <h4 class="text-left pl-5 font-weight-bold p-3" style="background-color:#d1ecf1; color:#0c5460;">SMS/TEXT Leads </h4>
        
        <div class="col-lg-8 col-md-8 col-sm-8 col-12 d-block mt-5 mb-5">
            <form class="contact-form12" method="post" >
               
                
               <div class="form-group text-left">
                   
                    <input type="radio" name="active" <?php echo ($sms =='1')? 'checked':''?> value="1" >
                    <span class="font-weight-bold text-black-50" style="font-size: 19px;">ON</span>&nbsp;&nbsp;
                    
                    <input type="radio" name="active" <?php echo ($sms =='0')? 'checked':''?> value="0" > 
                    <span class="font-weight-bold text-black-50" style="font-size: 19px;">OFF</span>
                    
                </div>
                
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