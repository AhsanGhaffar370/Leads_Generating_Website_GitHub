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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Leads</title>
</head>
<body>

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
        {		
            $name=htmlentities($result->Name);
            $email=htmlentities($result->Email);
            $phone=htmlentities($result->PhoneNo);
            $city=htmlentities($result->State);
            $cat=htmlentities($result->Lawyer_category);
            $matter=htmlentities($result->legal_matter);
        }
    }
    
    ?>
    <?php echo "Name :" .$name; ?> <br>
    <?php echo "Email :".$email; ?><br>
   <?php echo "Phone Number :".$phone;?><br>
   <?php echo "City :".$city;?><br>
   <?php echo "Legal issue :".$cat;?><br>
   <?php echo "Summary :".$matter;?><br>
   
    
</body>
</html>
<?php }?>