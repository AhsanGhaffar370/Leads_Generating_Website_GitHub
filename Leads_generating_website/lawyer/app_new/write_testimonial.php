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
    <title>Write Testimonial | Affordable Attorney leads</title>
<link rel="shortcut icon" type="image/x-icon" href="https://affordableattorneyleads.com/site_icon.png" />

</head>
<?php include_once "libs.php"; ?>


<body class="bg-light">
    
<?php include_once "dashboard_header.php"; ?>
<?php 
$database=new Database();

$db = $database->getConnection();
            
if (isset($_POST['submitform']))
{
    $LawyerID=$id;
    $name=$_POST['fname'];
    $email= $_SESSION['Lawyerlogin'];
    $state=$_POST['state'];
    $message=$_POST['msg'];
     //write query
     $query = "INSERT INTO
            lawyer_testimonial
    SET
    LawyerID=:LawyerID,name=:name, email=:email, state=:state, message=:message";

    $stmt = $db->prepare($query);

    // posted values
    
    $LawyerID=htmlspecialchars(strip_tags($LawyerID));
    $name=htmlspecialchars(strip_tags($name));
    $email=htmlspecialchars(strip_tags($email));
    $state=htmlspecialchars(strip_tags($state));
    
    $message=htmlspecialchars(strip_tags($message));
    // bind values 
    $stmt->bindParam(":LawyerID", $LawyerID);
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":state", $state);
    $stmt->bindParam(":message", $message);
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
<section class="pl-2 pr-2">
    <div class="container bg-white text-center text-black dash pt-2 mt-5 mb-5 border-light border-right border-left border-top border-bottom">
    
        <?php include_once"balance_status.php" ?>   
        <h4 class="text-left pl-5 font-weight-bold p-3" style="background-color:#d1ecf1; color:#0c5460;">Write Testimonial </h4>
        <div class="alert alert-primary text-left mb-4 xs_texts container font-weight-normal text-secondary">
            <i class="fas fa-info-circle text-info"> </i>
            We want your Testimonial! Tell us your experience with Affordable Attorney Leads.
        </div>
        <center>
        <div class="col-lg-8 col-md-8 col-sm-8 col-12 d-block mt-5">
            <form class="contact-form12" method="post" >
                
               <div class="form-group text-left">
                	<label class="mt-3">Name:</label>
                    <input type="text" class="form-control p-4" name="fname" id="fname"  placeholder="Full Name"/> 
                </div>
                
                <div class="form-group text-left">
                    <label>State:</label>
                    <select name="state" class="form-control" id="state">
                    		<option value="-1" selected="selected" disabled="disabled">-Select-</option>
                            <option value="Alabama" formula_val="">Alabama</option>
                            <option value="Alaska" formula_val="">Alaska</option>
                            <option value="Arizona" formula_val="">Arizona</option>
                            <option value="Arkansas" formula_val="">Arkansas</option>
                            <option value="California" formula_val="">California</option>
                            <option value="Colorado" formula_val="">Colorado</option>
                            <option value="Connecticut" formula_val="">Connecticut</option>
                            <option value="Delaware" formula_val="">Delaware</option>
                            <option value="Florida" formula_val="">Florida</option>
                            <option value="Georgia" formula_val="">Georgia</option>
                            <option value="Hawaii" formula_val="">Hawaii</option>
                            <option value="Idaho" formula_val="">Idaho</option>
                            <option value="Illinois" formula_val="">Illinois</option>
                            <option value="Indiana" formula_val="">Indiana</option>
                            <option value="Iowa" formula_val="">Iowa</option>
                            <option value="Kansas" formula_val="">Kansas</option>
                            <option value="Kentucky" formula_val="">Kentucky</option>
                            <option value="LouisianaMaine" formula_val="">LouisianaMaine</option>
                            <option value="Maryland" formula_val="">Maryland</option>
                            <option value="Massachusetts" formula_val="">Massachusetts</option>
                            <option value="Michigan" formula_val="">Michigan</option>
                            <option value="Minnesota" formula_val="">Minnesota</option>
                            <option value="Mississippi" formula_val="">Mississippi</option>
                            <option value="Missouri" formula_val="">Missouri</option>
                            <option value="Montana" formula_val="">Montana</option>
                            <option value="Nebraska" formula_val="">Nebraska</option>
                            <option value="Nevada" formula_val="">Nevada</option>
                            <option value="New Hampshire" formula_val="">New Hampshire</option>
                            <option value="New Jersey" formula_val="">New Jersey</option>
                            <option value="New Mexico" formula_val="">New Mexico</option>
                            <option value="New York" formula_val="">New York</option>
                            <option value="North Carolina" formula_val="">North Carolina</option>
                            <option value="North Dakota" formula_val="">North Dakota</option>
                            <option value="Ohio" formula_val="">Ohio</option>
                            <option value="Oklahoma" formula_val="">Oklahoma</option>
                            <option value="Oregon" formula_val="">Oregon</option>
                            <option value="Pennsylvania" formula_val="">Pennsylvania</option>
                            <option value="Rhode Island" formula_val="">Rhode Island</option>
                            <option value="South Carolina" formula_val="">South Carolina</option>
                            <option value="South Dakota" formula_val="">South Dakota</option>
                            <option value="Tennessee" formula_val="">Tennessee</option>
                            <option value="TexasUtah" formula_val="">TexasUtah</option>
                            <option value="Vermont" formula_val="">Vermont</option>
                            <option value="Virginia" formula_val="">Virginia</option>
                            <option value="Washington" formula_val="">Washington</option>
                            <option value="West Virginia" formula_val="">West Virginia</option>
                            <option value="Wisconsin" formula_val="">Wisconsin</option>
                            <option value="Wyoming" formula_val="">Wyoming</option>
                            <option value="Washington DC" formula_val="">Washington DC</option>
                            <option value="ARMED FORCES AFRICA  CANADA  EUROPE  MIDDLE EAST" formula_val="">ARMED FORCES AFRICA  CANADA  EUROPE  MIDDLE EAST</option>
                            <option value="ARMED FORCES AMERICA (EXCEPT CANADA)" formula_val="">ARMED FORCES AMERICA (EXCEPT CANADA)</option>
                            <option value="ARMED FORCES PACIFIC" formula_val="">ARMED FORCES PACIFIC</option>
    
                     </select>
                </div>
                
                <div class="form-group text-left">
                    <label class="mt-3">Your Testimonial:</label>
                    <textarea class="form-control p-4" name="msg" id="msg" rows="8" cols="60"></textarea>
            </div>
               <hr />
                <div class="form-group">
                    <center>
                     <input type="submit" name="submitform" id="submitform" class="btn p-2 btn-sm mb-5 buttons font-weight-bold button_size2" value="Submit" />
                    </center>
                </div>
                <br />
            
            </form>
        </div>
        </center>
    </div>
</section>

<?php include_once"tidio_chat.php" ?> 
</body>
</html>
<?php } ?>