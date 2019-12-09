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

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report Lead</title>
<link rel="shortcut icon" type="image/x-icon" href="https://affordableattorneyleads.com/growth.png" />
    <?php include "libs.php"; ?>
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
<body class="bg-light">
<?php include_once "dashboard_header.php"; ?>

<?php

$database=new Database();
$db = $database->getConnection();
if(isset($_POST['update']))
{
// $Report=$_FILES["img1"]["name"];
// $Report=preg_replace("/\s+/","_",$Report);

// $Problem=$_POST['text'];
// $Name = $_POST['name'];
// // $id=$_SESSION['id'];
// // $LawyerID=1;
// // // $Catogory = $_POST['Catogary'];
// // $LawyerEmail="farazmuhammad1998@gmail.com";
// $Report_ext=pathinfo($Report,PATHINFO_EXTENSION);
// $Report=pathinfo($Report,PATHINFO_FILENAME);
// $Report=$Report."_".date("mjYHis").".".$Report_ext;
// move_uploaded_file($_FILES["img1"]["tmp_name"],"img/Reports/".$Report);
// $sq = "INSERT INTO report    
//                 SET
//                 LawyerID=:LawyerID,Name=:Name,LawyerEmail=:LawyerEmail,Problem=:Problem";
 
//         $stmt = $db->prepare($sq);
        
//         // bind values 
//         $stmt->bindParam(":LawyerID", $LawyerID);
//         $stmt->bindParam(":Name", $Name);
        
//         $stmt->bindParam(":LawyerEmail", $LawyerEmail);
//         $stmt->bindParam(":Problem", $Problem);
        
//         if($stmt->execute()){
//         $id= $db->lastInsertId();
//         // echo "Send";
            
//         }else{
//             // echo "Send nai hua";
            
//         }
 
// $sql="update report set Report=:Report where id=:id";
// $query = $db->prepare($sql);
// $query->bindParam(':Report',$Report,PDO::PARAM_STR);
// $query->bindParam(':id',$id,PDO::PARAM_STR);
// $query->execute();


// $msg="Successfully Report";
$Lawyer_Name =$_SESSION['Name'];
$Lead_ID=$_POST['name'];
$Reason=$_POST['reason'];
$Addition_Note=$_POST['text'];
$sq = "INSERT INTO report    
                 SET
                 Lead_ID=:Lead_ID,LawyerID=:LawyerID,Lawyer_Name=:Lawyer_Name,LawyerEmail=:LawyerEmail,Reason=:Reason,Addition_Note=:Addition_Note";
 
        $stmt = $db->prepare($sq);
        
        // bind values 
        $stmt->bindParam(":LawyerID", $LawyerID);
        $stmt->bindParam(":Lawyer_Name", $Lawyer_Name);
        $stmt->bindParam(":Lead_ID", $Lead_ID);
        
        $stmt->bindParam(":LawyerEmail", $LawyerEmail);
        $stmt->bindParam(":Reason", $Reason);
        $stmt->bindParam(":Addition_Note", $Addition_Note);
        
        
        if($stmt->execute()){
        // $id= $db->lastInsertId();
        // echo "Send";
        
        $msg="Successfully Report";
            
        }else{
            // echo "Send nai hua";
            $msg="Not succesfully";
            
        }

}
?>
<br><br><br>
<section class="pl-2 pr-2">
    <div class="container bg-white text-center text-black dash pt-2 mt-5 mb-5 border-light border-right border-left border-top border-bottom">
        <?php include_once "balance_status.php" ?>        
        <h4 class="text-left pl-5 font-weight-bold p-3" style="background-color:#d1ecf1; color:#0c5460;">REPORT LEAD </h4>
        
        <div class="alert alert-primary text-left mb-4 xs_texts container font-weight-normal text-secondary">
            <i class="fas fa-info-circle text-info"> </i>
            It can take up to 48 hours to review a bogus lead. After review, your money will added to your wallet.
        </div>
        <div class="container-fluid p-0">
            <center>
                <div class="col-12 col-lg-7  col-md-10 col-sm-12">
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
    					<!-- <strong>SUCCESS</strong>: -->
    					<?php echo htmlentities($msg);
    					?> 
    					</div>
    				<?php }?>
                    <form class="payment-form1" method="POST"  enctype="multipart/form-data">
                    	<!--
                        <div class="form-group text-left">
                            <label class="mt-3">Name:</label>
                            <input type="text" name="name" id="name"  value="<?php $na=$_SESSION['Name'];
                            echo $na;?>" class="form-control p-4"/>
                        </div>
                        <div class="form-group text-left">
                            <label class="mt-3">Email:</label>
                            
                            <input type="text" name="mail" id="mail" placeholder="Email Address" value="<?php $em=$_SESSION['Lawyerlogin'];
                            echo $em;?>" class="form-control p-4"/>
                        </div>
                        <div class="form-group text-left">
                            <label class="mt-3 pb-2">Attach SS of issue:</label><br>
                            <input type="file" name="img1" required>
                        </div>
                        -->
                        <div class="form-group text-left">
                            <label class="mt-3">Lead ID:</label>
                            <input type="text" name="name" id="name" class="form-control p-4"/>
                        </div>
                        <div class="form-group text-left">
                            <label class="mt-3">Reason:</label>
                            <select name="reason" class="form-control" id="reason">
                                <option value="-1" selected="selected">Select Reason</option>
                                <option value="Disconnected Phone Number">Disconnected Phone Number</option>
                                <option value="Wrong Phone Number">Wrong Phone Number</option>
                                <option value="Person is in Jail">Person is in Jail</option>
                                <option value="Already a Legal Plan Member">Already a Legal Plan Member</option>
                                <option value="Spam Lead">Spam Lead</option>
                                <option value="Other Reason">Other Reason</option>
                            </select>
                        </div>
                        <div class="form-group text-left">
                            <label class="mt-3">Additional Note:</label>
                            <textarea class="form-control p-4" name="text" id="text" placeholder="" rows="8" cols="60"></textarea>
                        </div>   
                         <hr />
                        <div class="form-group">
                                <input type="submit" name="update" id="update" class="btn p-2 btn-sm mb-5 buttons font-weight-bold button_size2" value="Submit" />
                        </div>
                    </form>
                </div>
            </center>
        </div>
    </div>
</section>

<?php include_once"tidio_chat.php" ?> 
</body>
</html>
<?php }?>