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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lawyer Dashboard</title>

<!--#####################################Libraries file##########################################-->
<?php include "libs.php"; ?>
<script src="client_validate.js"></script>
</head>

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
<section class="container bg-white law_services text-center text-black pt-1 pb-5" style="margin-top:130px;">
	<?php include_once "balance_status.php" ?>
    
	<h4 class="text-left pl-5 font-weight-bold p-3" style="background-color:#d1ecf1; color:#0c5460;">
    	DASHBOARD 
    </h4>
    <div class="container  ">
        <div class="row">
        
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 d-block mb-3">
            	<a href="dashboard" class="nav-link">
                <div class="card set_img card h-100">
                    <div class="m-4">
                        <img src="Image/home1.png" alt="home img" class="img-fluid rounded-circle" />
                      <p class="text-dark text-center font-weight-bold m-0">Home</p>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 d-block mb-3">
            	<a href="display-leads" class="nav-link">
                <div class="card set_img card h-100">
                    <div class="m-4">
                        <img src="Image/leads.png" alt="leads img" class="img-fluid rounded-circle" />
                        <p class="text-dark text-center font-weight-bold m-0">My Leads</p>
                    </div>
                </div>
                </a>
            </div>
            <!--
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 d-block mb-3">
            	<a href="pause_leads.php" class="nav-link">
                <div class="card set_img card h-100">
                    <div class="m-4">
                        <img src="Image/leads_per.jpg" alt="leads_per img" class="img-fluid rounded-circle" />
                        <p class="text-dark text-center font-weight-bold m-0">Leads Status</p>
                    </div>
                </div>
                </a>
            </div>
            -->
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 d-block mb-3">
            	<a href="leadsperday" class="nav-link">
                <div class="card set_img card h-100">
                    <div class="m-4">
                        <img src="Image/leads_per.jpg" alt="leads_per img" class="img-fluid rounded-circle" />
                        <p class="text-dark text-center font-weight-bold m-0">Leads Per Week</p>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 d-block mb-3">
            	<a href="add-cities" class="nav-link">
                <div class="card set_img card h-100">
                    <div class="m-4">
                        <img src="Image/state.jpg" alt="state img" class="img-fluid rounded-circle" />
                        <p class="text-dark text-center font-weight-bold m-0">Add Zipcode</p>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 d-block mb-3">
            	<a href="report-issue" class="nav-link">
                <div class="card set_img card h-100">
                    <div class="m-4">
                        <img src="Image/replace.png" alt="report img" class="img-fluid rounded-circle" />
                        <p class="text-dark text-center font-weight-bold m-0">Report Leads</p>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 d-block mb-3">
            	<a href="change-images" class="nav-link">
                <div class="card set_img">
                    <div class="m-4">
                        <img src="Image/edit_profile.jpg" alt="edit_profile img" class="img-fluid rounded-circle" />
                        <h6 class="text-dark text-center font-weight-bold m-0">Edit Profile</h6>
                    </div>
                </div>
                </a>
            </div>
            
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 d-block mb-3">
            	<a href="payment-form" class="nav-link">
                <div class="card set_img">
                    <div class="m-4">
                        <img src="Image/pay3.png" alt="payment img" class="img-fluid rounded-circle" />
                        <h6 class="text-dark text-center font-weight-bold m-0">Add Fund</h6>
                    </div>
                </div>
                </a>
            </div>
            
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 d-block mb-3">
            	<a href="add-feature" class="nav-link">
                <div class="card set_img">
                    <div class="m-4">
                        <img src="Image/feature.jpg" alt="add feature img" class="img-fluid rounded-circle" />
                        <h6 class="text-dark text-center font-weight-bold m-0">Add Feature</h6>
                    </div>
                </div>
                </a>
            </div>
            
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 d-block mb-3">
            	<a href="payment-form" class="nav-link">
                <div class="card set_img">
                    <div class="m-4">
                        <img src="Image/autores.png" alt="auto responder img" class="img-fluid rounded-circle" />
                        <h6 class="text-dark text-center font-weight-bold m-0">Auto Responder</h6>
                    </div>
                </div>
                </a>
            </div>
            
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 d-block mb-3">
            	<a href="payment-form" class="nav-link">
                <div class="card set_img">
                    <div class="m-4">
                        <img src="Image/cont4.png" alt="auto responder img" class="img-fluid rounded-circle" />
                        <h6 class="text-dark text-center font-weight-bold m-0">Contact Us</h6>
                    </div>
                </div>
                </a>
            </div>
            
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 d-block mb-3">
            	<a href="payment-form" class="nav-link">
                <div class="card set_img">
                    <div class="m-4">
                        <img src="Image/testimonial5.png" alt="testimonial icon img" class="img-fluid rounded-circle" />
                        <h6 class="text-dark text-center font-weight-bold m-0">Write testimonial</h6>
                    </div>
                </div>
                </a>
            </div>
            
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 d-block mb-3">
            	<a href="logout" class="nav-link">
                <div class="card set_img">
                    <div class="m-4">
                        <img src="Image/logout.jpg" alt="logout img" class="img-fluid rounded-circle" />
                        <h6 class="text-dark text-center font-weight-bold m-0">Logout</h6>
                    </div>
                </div>
                </a>
            </div>
           
            <!--
            <div class="col-lg-2 col-md-4 col-sm-12 col-12 d-block mb-3">
            	<a href="#" class="nav-link">
                <div class="card set_img">
                    <div class="m-3">
                        <img src="Image/handshake.PNG" alt="home img" class="img-fluid rounded-circle" />
                        <p class="text-dark text-center xxs_texts font-weight-bold m-0">Home</p>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-12 col-12 d-block mb-3">
            	<a href="#" class="nav-link">
                <div class="card set_img">
                    <div class="m-3">
                        <img src="Image/handshake.PNG" alt="home img" class="img-fluid rounded-circle" />
                        <p class="text-dark text-center xxs_texts font-weight-bold m-0">Home</p>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-12 col-12 d-block mb-3">
            	<a href="#" class="nav-link">
                <div class="card set_img">
                    <div class="m-3">
                        <img src="Image/handshake.PNG" alt="home img" class="img-fluid rounded-circle" />
                        <p class="text-dark text-center xxs_texts font-weight-bold m-0">Home</p>
                    </div>
                </div>
                </a>
            </div> -->
            
            
            
        </div>
    </div>

    
</section>
</body>
</html>

<?php }?>