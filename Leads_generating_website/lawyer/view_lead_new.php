<?php 
include_once "config/database.php";
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['Lawyerlogin'])==0)
	{	
header('location:login');
}
else{
    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Leads Info</title>
</head>
    <?php include "libs.php"; ?>
    
<body class="bg-light">

<?php include_once "dashboard_header.php"; ?>
<?php
    $database=new Database();
    $db = $database->getConnection();
    $id=$_GET['id'];
    $sql = "SELECT * from  customer_info where id = $id ";
	$query = $db -> prepare($sql);
	$query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $name="";
    $email="";
    $phone="";
    $cat="";
    $matter="";
    $city="";
    
	// $cnt=1;
	// $opt="";
	if($query->rowCount() > 0)
	{
        foreach($results as $result)
        {	$idd=htmlentities($result->ID);	
            $name=htmlentities($result->Name);
            $email=htmlentities($result->Email);
            $phone=htmlentities($result->PhoneNo);
            $city=htmlentities($result->State);
            $cat=htmlentities($result->Lawyer_category);
            $matter=htmlentities($result->legal_matter);
            $status=htmlentities($result->status);
        }
    }
    
    ?>
<br><br><br>
<section class="container bg-white text-center text-black pt-2 mt-5 mb-5 border-light border-right border-left border-top border-bottom">
    <?php include_once"balance_status.php" ?>      
    <h4 class="text-left pl-5 font-weight-bold p-3" style="background-color:#d1ecf1; color:#0c5460;">Lead Details </h4>
    
    
    <div class="container">
            <div class="mt-2  bg-white  font-weight-medium col-lg-10 col-md-10 col-sm-12">
            	
            	<table class="dashboard_table mt-5  mb-5">
                  <tr class=" bg-white">
                    <td class="table_data xs_texts font-weight-bold border-0">ID:</td>
                    <td class="table_data xs_texts font-weight-normal border-0"> <?php echo $idd; ?> </td>
                  </tr>
                  <tr class=" bg-white">
                    <td class="table_data xs_texts font-weight-bold border-0">Leads Type:</td>
                    <td class="table_data xs_texts font-weight-normal border-0">Family Law Leads</td>
                  </tr>
                  <tr class=" bg-white">
                    <td class="table_data xs_texts font-weight-bold border-0">Name:</td>
                    <td class="table_data xs_texts font-weight-normal border-0"><?php echo $name; ?></td>
                  </tr>
                  <tr class=" bg-white">
                    <td class="table_data xs_texts font-weight-bold border-0">Email:</td>
                    <td class="table_data xs_texts font-weight-normal border-0"><?php echo $email; ?></td>
                  </tr>
                  <tr class=" bg-white">
                    <td class="table_data xs_texts font-weight-bold border-0">Phone No:</td>
                    <td class="table_data xs_texts font-weight-normal border-0"><?php echo $phone; ?></td>
                  </tr>
                  <!-- <tr class=" bg-white">
                    <td class="table_data xs_texts font-weight-bold border-0">Status:</td>
                    <td class="table_data xs_texts font-weight-normal border-0"><?php echo $status; ?></td>
                  </tr> -->
                  
                  <tr class=" bg-white">
                    <td class="table_data xs_texts font-weight-bold border-0">City:</td>
                    <td class="table_data xs_texts font-weight-normal border-0"><?php echo $city; ?></td>
                  </tr>
                  <tr class=" bg-white">
                    <td class="table_data xs_texts font-weight-bold border-0">Legal Issue:</td>
                    <td class="table_data xs_texts font-weight-normal border-0"><?php echo $cat; ?></td>
                  </tr>
                 
                  
                  <tr class=" bg-white">
                    <td class="table_data xs_texts font-weight-bold border-0">Summary:</td>
                    <td class="table_data xs_texts font-weight-normal border-0"><?php echo $matter; ?></td>
                  </tr>
                  
                </table>
			</div>
		</div>      
    
    
    
    
    
</section>




</body>
</html>
<?php }?>


<!--
<div class="container mt-5">
            <div class="col-12 col-lg-7  col-md-10 col-sm-12">
                
                <div class="form-group text-left">
                    <div class="row">
                        <label class="ml-5 xs_texts font-weight-bold" style="margin-right:43%">ID:</label>
                        <label class="xs_texts font-weight-normal">222</label>
                    </div>
                </div>
                <div class="form-group text-left">
                    <div class="row">
                        <label class="ml-5 xs_texts font-weight-bold" style="margin-right:32%">Leads Type:</label>
                        <label class="xs_texts font-weight-normal">Leads</label>
                    </div>
                </div>
                <div class="form-group text-left">
                    <div class="row">
                        <label class="ml-5 xs_texts font-weight-bold" style="margin-right:38%">Name:</label>
                        <label class="xs_texts font-weight-normal">Ahsan Ghaffar</label>
                    </div>
                </div>
                <div class="form-group text-left">
                    <div class="row">
                        <label class="ml-5 xs_texts font-weight-bold" style="margin-right:38.5%">Email:</label>
                        <label class="xs_texts font-weight-normal">ahsanghaffar@gmail.com</label>
                    </div>
                </div>
                <div class="form-group text-left">
                    <div class="row">
                        <label class="ml-5 xs_texts font-weight-bold" style="margin-right:32.6%">Phone No:</label>
                        <label class="xs_texts font-weight-normal">123-123-1234</label>
                    </div>
                </div>
                <div class="form-group text-left">
                    <div class="row">
                        <label class="ml-5 xs_texts font-weight-bold" style="margin-right:37.7%">Status:</label>
                        <label class="xs_texts font-weight-normal">New</label>
                    </div>
                </div>
                
                
            </div>
    </div>
    
    
    -->