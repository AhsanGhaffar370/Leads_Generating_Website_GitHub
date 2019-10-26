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
    <title>Add Feature</title>
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
            
if (isset($_POST['submitform']))
{
    $Name=$_POST['fname'];
    $Email=$_POST['email'];
    $Phone=$_POST['mob'];
    $Subject=$_POST['lname'];
    $Message=$_POST['msg'];
     //write query
     $query = "INSERT INTO
            add_features
    SET
        Name=:Name, Email=:Email, Phone=:Phone, Subject=:Subject, Message=:Message";

    $stmt = $db->prepare($query);

    // posted values
    $Name=htmlspecialchars(strip_tags($Name));
    $Email=htmlspecialchars(strip_tags($Email));
    $Phone=htmlspecialchars(strip_tags($Phone));
    $Subject=htmlspecialchars(strip_tags($Subject));
    $Message=htmlspecialchars(strip_tags($Message));
    // bind values 
    $stmt->bindParam(":Name", $Name);
    $stmt->bindParam(":Email", $Email);
    $stmt->bindParam(":Phone", $Phone);
    $stmt->bindParam(":Subject", $Subject);
    $stmt->bindParam(":Message", $Message);
    if($stmt->execute()){
        // echo "succes";
        $msg="Succesfully Submit form";
          }else{
            // echo "nai hua ";
        $msg="Unable to submit";
    }
}
    
    ?>
<br><br><br>    
<section class="container bg-white text-center text-black dash pt-2 mt-5 mb-5 border-light border-right border-left border-top border-bottom">
<?php include_once"balance_status.php" ?>   
    <h4 class="text-left pl-5 font-weight-bold p-3" style="background-color:#d1ecf1; color:#0c5460;">Add Feature </h4>
    <center>
    <div class="col-lg-8 col-md-8 col-sm-8 col-12 d-block mt-5">
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
                <form class="contact-form12" method="post" >
                    <div class="form-group ">
                        <input type="text" class="form-control p-4" name="fname" id="fname"  placeholder="Full Name"/> 
                    </div>
                    
                    <div class="form-group">
                        <input type="text" class="form-control p-4" name="email" id="email" placeholder="Email Address"/>
                    </div>
                    
                    <div class="form-group">
                        <input type="tel" class="form-control p-4" name="mob" id="mob" placeholder="Phone No"/>
                    </div>
                    
                    <div class="form-group">
                        <input type="text" class="form-control p-4" name="lname" id="lname" placeholder="subject"/>
                    </div>
                    <div class="form-group">
                        
                        <textarea class="form-control p-4" name="msg" id="msg" placeholder="Message" rows="8" cols="60"></textarea>
                </div>
                   <hr />
                    <div class="form-group">
                        <center>
                        <input type="submit" name="submitform" class="btn btn-lg headerbtn buttons" value="Submit Form"  data-target="#modal1" data-toggle="modal"/>
                         <!-- <div class="modal fade" id="modal1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-success">
                                        <h3 class="text-white font-weight-bold m-auto xl_heading">Thank You<br /> For Contacting Us</h3>
                                    </div>
                                    
                                    <div class="modal-body">
                                        <div class="container ">
                                            <h6 class="text-black-50 p-4 font-weight-normal heading">One of our representatives will be in contact with you shortly regarding your inquiry. If you ever have any questions that require immediate assistance, please call us at<br /> <b>844 944 5342</b></h6>                      
                                        </div>
                                    </div>
                                    
                                    <div class="modal-footer bg-light">
                                        <input type="submit" name="submitbtn" class="btn btn-lg font-weight-normal bg-secondary buttons m-auto" value="Close" />
                                    </div>
                                </div>
                            </div>
                        </div>-->
                        
                        </center>
                    </div>
                    <br />
                
                </form>
        </div>
        </center>
</section>


</body>
</html>
<?php } ?>