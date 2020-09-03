<?php
// require_once("maintenance.php");
// maintenance(TRUE);
?>
<?php
// Required if your environment does not handle autoloading
require __DIR__ . '/vendor/autoload.php';

// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;


session_start();
error_reporting(0);
if (strlen($_SESSION['city'])==0){
    header('location:index');
}
 include_once "config/database.php"; 
include_once "object/user.php";

require_once "configs.php"; 
  include "vendors/autoload.php";
//   error_reporting(E_ALL); ini_set('display_errors', 1);
 $database=new Database();
 $db = $database->getConnection();
$title="";
$meta_desc="";


// $data = "SELECT * FROM `meta_data` WHERE page_name like 'home'";
// $run = mysqli_query($con,$data);
// while($row=mysqli_fetch_array($run)){
//     $title = $row['title']; 
//     $meta_desc = $row['meta_desc'];
// } 
$sqqq ="SELECT * FROM meta_data WHERE page_name = 'clientform' ";
                
                $queys= $db->prepare($sqqq);

                // // posted values
              
                // $query->bindParam(":id", $this->state);
                // $query->bindParam(":Catogory", $this->Catogory);
                $queys->execute();
                $resut=$queys->fetchAll(PDO::FETCH_OBJ);
                $row = $queys->fetch(PDO::FETCH_ASSOC);
                if($queys->rowCount() > 0)
                {
                    foreach($resut as $resul){
                       $title =htmlentities($resul->title);
                       $meta_desc = htmlentities($resul->meta_desc);
                       
                    }
                }


  ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="msvalidate.01" content="8B265896C88DF7D5ADC560D97D5B8052" />
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.png" />
    <title><?php echo $title; ?></title>
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
    <?php echo "<meta name='description' content='$meta_desc'>"?>

        <meta name="robots" content="noindex,nofollow" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--yandex-->
    <meta name="yandex-verification" content="0beccc11dc0dc9cb" />
<!--#Libraries file#-->
<?php include "libs.php"; ?>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-142213622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-142213622-3');
</script>

</head>

<body>

 <?php include_once "header.php"; ?>  


<section class="container" style="margin-top:80px;">
    <div class=" col-lg-6 m-auto d-block">
    	<h1 class="search_heading_settings text-center font-weight-normal xl_heading">Please provide your info to speak with a Family Attorney in <em><?php echo $_SESSION['city'] ?></em> immediately!<hr /></h1>
        
        <br />
        <form class="client-form1"  id="client-form1"  method="post" action=client.php onsubmit="if (formCheck(this)) { this.elements['submit'].disabled=true; } else { return false; }" >
            
            <div class="form-group text-left">
                <div class="row">
                    <div class="col-12 col-sm-12  col-lg-6 col-md-6">
                    <label class="mt-3">First Name:</label>
                    <input type="text" class="form-control p-4 mt-2" name="fname" id="fname"/>
                    </div>
                    <div class="col-12 col-sm-12 col-lg-6 col-md-6">
                    <label class="mt-3">Last Name:</label>
                    <input type="text" class="form-control p-4 mt-2" name="lname" id="lname"/>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label>Email: <?php
                        // $LawyerID=$_SESSION['city'];
                        // echo "$LawyerID";
						 ?></label>
                <input type="text" class="form-control p-4" name="email" id="email"/>
            </div>
            
            <div class="form-group">
                <label>Phone:</label>
                <input type="tel" class="form-control p-4" name="mob" id="mob"/>
            </div>
            
            <div class="form-group">
                <label>Subject:</label>
                <select class="form-control" id="law_cat" name="law_cat">
                		<option disabled="disabled" value="-1" selected="selected">Select Your Legal issue</option>
                        <option value="Uncontested Divorce">Uncontested Divorce</option>
                        <option value="Contested Divorce">Contested Divorce</option>
                        <option value="Divorce With Custody">Divorce With Custody</option>
                        <option value="Child Custody">Child Custody</option>
                        <option value="Child Support Modify">Child Support Modify</option>
                        <option value="Child Support Establish">Child Support Establish</option>
                        <option value="Adoption/Guardianship">Adoption/Guardianship</option>
                        <option value="Grandparents Rights">Grandparents Rights</option>
                        <option value="Other">Other</option>
                 </select>
            </div>
            
            <div class="form-group">
                <label>Message:</label>
                <textarea class="form-control p-4" name="msg" id="msg" placeholder="Describe your Legal Matter" rows="8" cols="60"></textarea>
            
           <hr />
            <div class="form-group">
                <!--<button disabled class="btn btn-primary" type=button id="btnverzenden2" style="display: none"><span class="glyphicon glyphicon-refresh"></span> Sending mail</button>   -->
<!--<button class="btn btn-primary" type=submit name=verzenden id="btnverzenden">Send</button>-->
                <center><input type="submit"  id="submit12" name="submitbtn" value="Submit Request" class="btn btn-lg p-3 mb-4 col-8  btn-danger"   /></center>
            </div>
            <br />
        
        </form>
    </div>
</section>

<?php include_once "footer.php"; ?>


<?php include_once "libs2.php"; ?>

<script async src="client_validate.js?v=10"></script>








</body>
</html>
