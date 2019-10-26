
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
    <title>Estimate</title>
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

<script src="client_validate.js"></script>


<body class="bg-light">
    
<?php include_once "dashboard_header.php"; ?>
<?php

$database=new Database();
$db = $database->getConnection();
if(isset($_POST['submitbtn']))
{
// $Report=$_FILES["img1"]["name"];
// $Problem=$_POST['text'];
$noleads=$_POST['est'];
$Weeks=$_POST['weeks'];
// move_uploaded_file($_FILES["img1"]["tmp_name"],"img/Lawyer/".$_FILES["img1"]["name"]);
$sq = "INSERT INTO estimate    
                SET
                LawyerID=:LawyerID,noleads=:noleads,Weeks=:Weeks";
 
        $stmt = $db->prepare($sq);
        
        // bind values 
        $stmt->bindParam(":LawyerID", $LawyerID);
        $stmt->bindParam(":noleads", $noleads);
        $stmt->bindParam(":Weeks", $Weeks);
        
        
        if($stmt->execute()){
        // $id= $db->lastInsertId();
        // echo "Send";
            $msg="Successfully Sent";
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
   
<section class="container bg-white text-center text-black dash pt-2 border-light border-right border-left border-top border-bottom" style="margin-top:10%; padding-bottom:10%;">
<?php include_once"balance_status.php" ?>   
    <h4 class="text-left pl-5 font-weight-bold p-3" style="background-color:#d1ecf1; color:#0c5460;">
    	Add estimate of leads per week
    </h4>
    
    <div class="container" style="width:70%;">
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
					<div class="succWrap">
					<strong>SUCCESS</strong>:
					<?php echo htmlentities($msg);
					?> 
					</div>
				<?php }?>
        <form class="form1"  method="post" >
        
            <div class="form-group text-left">
                <label class="mt-3">Select Weeks:</label>
                <select name="weeks" class="form-control" id="weeks">
                    <option value="one_week" selected="selected">1 week</option>
                    <option value="two_week">2 week</option>
                    <option value="three_week">3 week</option>
                    <option value="four_week">4 week</option>
                    <option value="five_week">5 week</option>
                    <option value="six_week">6 week</option>
                    <option value="seven_week">7 week</option>
                    <option value="eight_week">8 week</option>
                </select>
            </div>
            <div class="form-group text-left">
                <label class="mt-3">Number of Leads:</label>
                <input type="number" name="est" id="est" placeholder="Select Number of leads" class="form-control"/>
            </div>
              
            <div class="form-group">
            <input type="submit" name="submitbtn" id="submitbtn" class="btn p-2 mt-4 buttons font-weight-bold button_size2" value="Add" />
            </div>
        </form>
    </div>
</section>
           

</body>
</html>
<?php } ?>