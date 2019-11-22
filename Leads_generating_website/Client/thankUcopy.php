<?php 
session_start();
error_reporting(0);
 include_once "config/database.php"; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="favicon.png" />

<title>Requesting</title>

<!--#####################################Libraries file##########################################-->
<?php include "libs.php"; ?>

<?php
?>

<script src="client_validate.js"></script>
<script type="text/javascript">
	function redirect(){
		window.location="assigned-lawyer/c51ce410c124a10e0db5e4b97fc2af39";      
	}
</script>
</head>

<body  onload="setTimeout('redirect()',5000)">

<section class="cus-sec1">
	<div class=" margin_width container  bg-transparent"><br />
        <div class=" col-lg-7 m-auto d-block p-5">
            <div class=" margin_width mt-5 p-5 bg-light">
                <center><div class="col-lg-9 col-md-9 col-sm-9 col-12 ">
                    <a href="home"><img class="logo images" src="Image/legalHelp.png" alt="Affordable Legal Help" /></a><hr />
                </div></center>
                <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                <h4 class="text-dark text-center bg-transparent p-1 mb-3 heading">--Thank You <?php 
                
                $name = $_SESSION['userName'];
                echo $name; ?>--</h4>
                 <div class="container">
                 
                 	<h4 class="texts mb-3"> Just a moment while we connect you with family law attorney that serve your local area...</h4>
                
                    <h6 class="xs_texts mb-5">If the page does not redirect automatically the click<a href="assigned-lawyer/c51ce410c124a10e0db5e4b97fc2af39"> here</a> to view profile of your lawyer.</h6>                      
                </div>
           </div>
        </div>
	</div>
</section>
</body>
</html>