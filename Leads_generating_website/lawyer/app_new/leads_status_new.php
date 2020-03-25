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
    if ((strlen($_SESSION['Catogory'])==0) && (strlen($_SESSION['Catogory2'])==0) && (strlen($_SESSION['Catogory3'])==0) && (strlen($_SESSION['Catogory4'])==0) ){
        header('location:update-profile');
    }
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add city</title>
<link rel="shortcut icon" type="image/x-icon" href="https://affordableattorneyleads.com/site_icon.png" />
</head>
<?php include_once "libs.php"; ?>


<body class="bg-light">
    
<?php include_once "dashboard_header.php"; ?>
<?php

if (isset($_POST['playbtn'])){
    $database=new Database();
    $db = $database->getConnection();
    $activ=1;
    // $id=1;
    $sql="update lawyer_profile set active=:activ where id=:id";
    $query = $db->prepare($sql);
    $query->bindParam(':activ',$activ);
    $query->bindParam(':id',$id);
    
    
    if ($query->execute()){
        echo " update ";
    }
    else{
        echo "not ";
    }
}
if (isset($_POST['pausebtn'])){
    $database=new Database();
    $db = $database->getConnection();
    $activ=0;
    // $id=1;
    $sql="update lawyer_profile set active=:activ where id=:id";
    $query = $db->prepare($sql);
    $query->bindParam(':activ',$activ);
    $query->bindParam(':id',$id);
    if ($query->execute()){
        echo " update ";
    }
    else{
        echo "not ";
    }
}



?>
<?php 
$database=new Database();
$db = $database->getConnection();
$lead=0;
$total_Leads=0;
$DummyLeads=0;
$active=0;
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
         $pending=htmlentities($result->PendingBalance);
        $active=htmlentities($result->active);
     }
 }
$totalmoneys=$total_Leads*100;
?>
<br><br><br>    
<section class="pl-2 pr-2">
    <div class="container bg-white text-center text-black dash pt-2 mt-5 mb-5 border-light border-right border-left border-top border-bottom">
        <?php include_once"balance_status.php" ?>   
        <h4 class="text-left pl-5 font-weight-bold p-3" style="background-color:#d1ecf1; color:#0c5460;">Add cities </h4>
        
        <div class="container">
            <form method="post" class="">
                <input type="submit" name="playbtn" id="Playbtn1" class="btn btn-sm text-white bg-success pr-5 pl-5 pt-3 pb-3 " value="PLAY" /><br />
                <input type="submit" name="pausebtn" id="Pausebtn1" class="btn btn-sm text-white bg-warning mt-1  pr-5 pl-5 pt-3 pb-3" value="PAUSE" />
            </form>
        </div>
    </div>
</section>

<?php include_once"tidio_chat.php" ?> 
</body>
</html>

<?php }?>