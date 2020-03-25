
<?php include_once "config/database.php"; 
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
    $LawyerEmail=$_SESSION['Lawyerlogin'];
    $LawyerID=$_SESSION['id'];
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
    <title>Add leads Estimate | Affordable Attorney </title>
<link rel="shortcut icon" type="image/x-icon" href="https://affordableattorneyleads.com/site_icon.png" />
    <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #28a7458c;
    border-left: 4px solid #5cb85c;
    color:rgb(0,0,0);
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
</style>
</head>
<?php include_once "libs.php"; ?>


<body class="bg-light">
    
<?php include_once "dashboard_header.php"; ?>

<?php

$database=new Database();
$db = $database->getConnection();
$nolead="";
$Weeks="";
$sqq ="SELECT * FROM estimate WHERE LawyerID=$LawyerID ORDER BY id DESC LIMIT 1 ";
    $qu= $db->prepare($sqq);
    
    // $qu->bindParam(":LawyerID", $LayerID);
    $qu->execute();
    $resultt=$qu->fetchAll(PDO::FETCH_OBJ);
    $row = $qu->fetch(PDO::FETCH_ASSOC);
    if($qu->rowCount() > 0)
    {
            foreach($resultt as $resu)
            {
                $nolead=htmlentities($resu->noleads);
                // $Weeks=htmlentities($resu->Weeks);
                
            }
    }
if(isset($_POST['submitbtn']))
{
// $Report=$_FILES["img1"]["name"];
// $Problem=$_POST['text'];

$noleads=$_POST['est'];
// echo $noleads;
// $Weeks=$_POST['weeks'];
// move_uploaded_file($_FILES["img1"]["tmp_name"],"img/Lawyer/".$_FILES["img1"]["name"]);
$sq = "INSERT INTO estimate    
                SET
                LawyerID=:LawyerID,noleads=:noleads";
 
        $stmt = $db->prepare($sq);
        
        // bind values 
        $stmt->bindParam(":LawyerID", $LawyerID);
        $stmt->bindParam(":noleads", $noleads);
        // $stmt->bindParam(":Weeks", $Weeks);
        
        
        if($stmt->execute()){
        // $id= $db->lastInsertId();
        // echo "Send";
            $msg="Send Succesfully ";
            $sqq ="SELECT * FROM estimate WHERE LawyerID=$LawyerID ORDER BY id DESC LIMIT 1 ";
    $qu= $db->prepare($sqq);
    
    // $qu->bindParam(":LawyerID", $LayerID);
    $qu->execute();
    $resultt=$qu->fetchAll(PDO::FETCH_OBJ);
    $row = $qu->fetch(PDO::FETCH_ASSOC);
    if($qu->rowCount() > 0)
    {
            foreach($resultt as $resu)
            {
                $nolead=htmlentities($resu->noleads);
                
            }
    }
        }else{
            // echo "Send nai hua";
            
        }
 
// $sql="update report set Report=:Report where id=:id";
// $query = $db->prepare($sql);
// $query->bindParam(':Report',$Report,PDO::PARAM_STR);
// $query->bindParam(':id',$id,PDO::PARAM_STR);
// $query->execute();

// $msg="updated successfully";



}
?>
<br><br><br>
<section class="pl-2 pr-2">
    <div class="container bg-white text-center text-black dash pt-2 mt-5 mb-5 border-light border-right border-left border-top border-bottom" style="padding-bottom:10%;">
    
        <?php include_once "balance_status.php" ?>   
        <h4 class="text-left pl-5 font-weight-bold p-3" style="background-color:#d1ecf1; color:#0c5460;">
        Add Leads Estimate per Week : 
        </h4>
        
        <div class="container p-0" style="width:70%;">
        <?php if ($nolead != ""){?>
        <div class="alert alert-primary text-left mb-4 xs_texts container font-weight-normal text-secondary">
            <i class="fas fa-info-circle text-info"> </i>
            
           <?php echo "Desired leads for ".$Weeks." week is ".$nolead;
        } ?>
        </div>
        <!-- <label class="mt-3"><?php if ($nolead != ""){
            echo "Leads estimation for week is 1 have Selected ".$nolead. " leads ";
        } ?> </label> -->
        <?php if($error){?>
    				<div class="errorWrap">
    				<strong>ERROR</strong>:
    				<?php
    				echo htmlentities($error);
    				?>
    				</div>
    				<?php } 
    				else if($msg){
    					?>
    					<!--<div class="succWrap">-->
    				 	<?php 
    				// 	echo htmlentities($msg);
    				 	?> 
    					<!--</div>-->
    				<?php }?>
            <form class="form1"  method="post" >
            
                <div class="form-group text-left">
                    
                </div>
                <div class="form-group text-left">
                    <label class="mt-3">Number of Leads:</label>
                    <input type="number" name="est" id="est" placeholder="Minimum number of leads are 50 per week for Exclusive territory" class="form-control"/>
                </div>
                  
                <div class="form-group">
                <input type="submit" name="submitbtn" id="submitbtn" class="btn p-2 mt-4 buttons font-weight-bold button_size2" value="Add" />
                </div>
            </form>
        </div>
    </div>
</section>
           
<?php include_once"tidio_chat.php" ?> 
</body>
</html>
<?php } ?>