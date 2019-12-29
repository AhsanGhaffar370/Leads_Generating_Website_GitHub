<?php 
include_once "config/database.php"; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="msvalidate.01" content="8B265896C88DF7D5ADC560D97D5B8052" />
    <title>Contact Us</title>
    
    <link rel="shortcut icon" type="image/x-icon" href="favicon.png" />    
        
    <meta name="description" content="Our team is standing by and ready to hear about the ways we can support you with our legal services. Affordable lawyers ARE out there! Reach out today.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--#####################################Libraries file##########################################-->
<?php include "libs.php"; ?>

<script async src="client_validate.js?v=2"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-142213622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-142213622-3');
</script>


</head>

<body class=" bg-light">

<?php include_once "header.php"; ?>
<?php 
$database=new Database();

$db = $database->getConnection();
            
if (isset($_POST['submitbtn']))
{
    $Name=$_POST['fname'];
    $Email=$_POST['email'];
    $Phone=$_POST['mob'];
    $Subject=$_POST['lname'];
    $Message=$_POST['msg'];
     //write query
     $query = "INSERT INTO
            contact_us
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
        
          }else{

    }
}
    
    ?>
<div class="contactUs_bg">
	<h1 class="jl_heading font-weight-bold text-white text-center" style="padding-top:120px;">CONTACT US</h1>
    <h5 class="heading text-white text-center" style="padding-bottom:120px;">We are dedicated to provide the highest <br />level of legal services in the US</h5>
</div>


<section class="container-fluid text-left text-dark mt-5">
    <div class="row">
    	
        <div class="col-lg-8 col-md-12 col-sm-12 col-12 d-block">
        	<h1 class="text-dark font-weight-bold xl_heading">CONTACT US</h1>
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
                    <input type="button" class="btn btn-lg headerbtn buttons button_size" value="Submit Form"  data-target="#modal1" data-toggle="modal"/>
                     <div class="modal fade" id="modal1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-success">
                                    <h3 class="text-dark font-weight-bold m-auto xl_heading">Thank You<br /> For Contacting Us</h3>
                                </div>
                                
                                <div class="modal-body">
                                    <div class="container ">
                                        <h6 class="text-dark p-4 font-weight-normal heading">One of our representatives will be in contact with you shortly regarding your inquiry. If you ever have any questions that require immediate assistance, please call us at<br /> <b>844 944 5342</b></h6>                      
                                    </div>
                                </div>
                                
                                <div class="modal-footer bg-light">
                                    <input type="submit" name="submitbtn" class="btn btn-lg font-weight-normal bg-secondary buttons m-auto" value="Close" />
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    </center>
                </div>
                <br />
            
            </form>
        </div>
        
        <div class="child_block col-lg-4 col-md-12 col-sm-12 col-12 d-block m-auto text-left">
        <div class="contactUs_bg1">
            <div class="d-block text-white m-auto xl_heading"><i class="fas fa-info-circle"> Contact Info</i></div>
            <hr style="background-color:cadetblue;"/>
            <dl>
                <dt class="texts text-white font-weight-bold"><i class="fa fa-envelope mr-4"></i>Email:</dt>
                <dd><a class="text-success xs_texts font-weight-normal" style="margin-left:44px;" href="mailto:info@affordablelegalhelp.com">info@affordablelegalhelp.com</a></dd>
            </dl>
            <dl>
                <dt class="texts text-white font-weight-bold"><i class="fa fa-phone mr-4"></i> Phone:</dt>
                <dd><a class="text-success xs_texts font-weight-normal" style="margin-left:45px;"  href="tel:844 944 5342">844 944 5342</a></dd>
            </dl>
        </div>
        </div>
        
    </div>
</section>

<?php include_once "footer.php"; ?>
</body>
</html>