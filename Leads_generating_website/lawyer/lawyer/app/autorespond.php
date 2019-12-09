
<?php 
include_once "config/database.php";
session_start();
error_reporting(0);
include('includes/config.php');
// $idd=$_SESSION['id'];
$id=$_SESSION['id'];
$count=1;
if (strlen($_SESSION['Catogory'])==0){
    header('location:login');
}
if(strlen($_SESSION['Lawyerlogin'])==0)
	{	
header('location:login');
}
else{
    
    if ((strlen($_SESSION['Catogory'])==0) && (strlen($_SESSION['Catogory2'])==0) && (strlen($_SESSION['Catogory3'])==0) && (strlen($_SESSION['Catogory4'])==0) ){
        header('location:update-profile');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Auto Responder | Affordable Attorney Leads</title>
<link rel="shortcut icon" type="image/x-icon" href="https://affordableattorneyleads.com/growth.png" />
    <?php include "libs.php"; ?>
    <script src="ckeditor/ckeditor.js"></script>
</head>
<body class="bg-light">
<?php include_once "dashboard_header.php"; ?>
    <?php
     $database=new Database();
     $db = $database->getConnection();
if(isset($_POST['submitbtn']))
{
    // $from_name="Muhammad Faraz";
    // $from_email="faraz@legalhelpservice.com";
    // $headers  = "MIME-Version: 1.0\r\n";
    // $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
    // $headers .= "From: {$from_name} <{$from_email}> \n";
    // $send_to_email="muhammadfaraz991@gmail.com";
    // $subject=$_POST['subject'];
    // $body=$_POST['editor'];
    // if(mail($send_to_email, $subject, $body, $headers)){
    //     echo "send ";
    // }
    // else{
    //     echo "not send";
    // }
    $subject=$_POST['subject'];
    $detail=$_POST['editor'];
    $email="muhammadfaraz991@gmail.com";
    $active=$_POST['active'];
$sql = "UPDATE lawyer_profile SET detail=:detail,subject=:subject,active=:active where id=:id";
$query = $db->prepare($sql);
$query-> bindParam(':detail',$detail, PDO::PARAM_STR);
$query-> bindParam(':subject',$subject, PDO::PARAM_STR);
$query-> bindParam(':active',$active, PDO::PARAM_STR);
$query-> bindParam(':id',$id, PDO::PARAM_STR);
$query -> execute();
$msg="Page data updated  successfully";

}
?>


<br><br><br>
<section class="pl-2 pr-2">
    <div class="container bg-white text-center text-black dash pt-2 mt-5 mb-5 border-light border-right border-left border-top border-bottom">
        <?php include_once "balance_status.php" ?>        
        <h4 class="text-left pl-5 font-weight-bold p-3" style="background-color:#d1ecf1; color:#0c5460;">Auto Responder </h4>
        <div class="container-fluid p-0">
            <div class="col-12 col-lg-10  col-md-10 col-sm-12">
            
                <form class="payment-form1" method="post">
					 <?php $sql = "SELECT subject,detail,active from lawyer_profile where id=:id";
                    $query = $db -> prepare($sql);
                    $query->bindParam(':id',$id,PDO::PARAM_STR);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    $cnt=1;
                    if($query->rowCount() > 0)
                    {
                    foreach($results as $result)
                    {
                    $detail = htmlentities($result->detail);
                    $sub= htmlentities($result->subject);
                    $act= htmlentities($result->active);
                    
                    }}?>
                    
                    <div class="form-group text-left">
                        <label class="mt-3 font-weight-bold">Auto Responder Message:</label><br>
                        
                        <input type="radio" name="active" <?php echo ($act =='1')? 'checked':''?> value="1"> 
                        <span class="font-weight-bold text-black-50" style="font-size: 19px;">ON</span>&nbsp;&nbsp;
                        
                        <input type="radio" name="active" <?php echo ($act =='0')? 'checked':''?> value="0" >
                        <span class="font-weight-bold text-black-50" style="font-size: 19px;">OFF</span>
                    </div>

                    <div class="form-group text-left">
                        <label class="mt-3 font-weight-bold ">Email Subject:</label>
                        <input type="text" class="form-control col-lg-4 col-md-6 col-sm-10 col-12" name="subject" placeholder="Write Subject line" value="<?php echo $sub?>" >
                    </div> 
                      
                    <div class="form-group text-left">
                        <textarea class="ckeditor form-control" placeholder="Write Message" name="editor"><?php echo $detail?></textarea>
                    </div>  
                    
                    <div class="form-group text-left">
                            <input type="submit" name="submitbtn" class="btn pt-2 pb-2 pr-4 pl-4 mb-5 buttons" value=" Save " />
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php include_once"tidio_chat.php" ?> 
</body>
</html>
<?php }?>


