<?php 
    
$con = mysqli_connect("localhost","root","","leads_generate_db");
if (!$con)
  {
  die('Could not connect: ' . mysqli_connect_error());
  }
?>