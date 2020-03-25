<?php 
include_once "config/database.php";
session_start();
error_reporting(0);
include('includes/config.php');
$id=$_SESSION['id'];

?>

<?php  
 if(isset($_POST["export"]))  
 {  
 	  $id=$_SESSION['id'];
      $connect = mysqli_connect("localhost", "u728873214_lead", "123456", "u728873214_leads_generate");  
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=leads.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('ID', 'FullName', 'Email', 'PhoneNo', 'Date', 'Status'));  
      $query = "SELECT `ClientID`, `Name`, `Email`, `Phone`, `Created`, `status` FROM `lawyer_invoice` where LawyerID=$id";  
      $result = mysqli_query($connect, $query); 
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  
 ?>  
