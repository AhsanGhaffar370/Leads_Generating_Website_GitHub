<?php
// require_once("maintenance.php");
// maintenance(TRUE);
?>
<?php 
session_start();
error_reporting(0);
 include_once "config/database.php"; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="msvalidate.01" content="8B265896C88DF7D5ADC560D97D5B8052" />
<title>Requesting</title>

    <meta name="robots" content="noindex,nofollow" />
<link rel="shortcut icon" type="image/x-icon" href="/favicon.png" />
   
    <meta name="description" content="At Affordable Legal Help, we believe that your privacy is important to accessing quality legal care and comprehensive services at low cost.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--yandex-->
    <meta name="yandex-verification" content="0beccc11dc0dc9cb" />
<!--#####################################Libraries file##########################################-->
<?php include "libs.php"; ?>

<?php $id=md5($_SESSION['ID1']);
?>



</head>

<body  onload="setTimeout('redirect()',5000)">


<center>
<div class="d-flex align-items-center justify-content-center"  style="width:100%; height:600px;">
<div class="col-xl-4 col-lg-4  col-md-6 col-sm-12 col-12  p-3 ">
    <div class="card bg-light border-0 " style="border-radius:0;" >
        <a href="https://affordablelegalhelp.com/"><img class="logo img-fluid pt-3" src="/Image/legalHelp.png" alt="Affordable Legal Help" ></a>
        <center><hr class=" col-6 col-lg-4 col-md-4 col-sm-4" style="border: 2px solid rgba(0, 81, 152); border-radius: 2px;" /></center>
        <div class="card-body">
            
            <h5 class="card-title font-weight-normal text-dark" style="font-size:31px;"><div class="spinner-border text-muted"></div>Thank You<div class="spinner-border text-light"></div></h5>
            <p class="card-text text-dark" style="font-size:20px;">Just a moment while we connect you with family law attorney that serve your local area...</p>
            <p class="mb-5" style="font-size:13px">If the page does not redirect automatically then click<a href="assigned_lawyer/<?php echo $id;?>"> here</a> to view profile of your lawyer.</p>                      
        </div>
    </div>
</div>
</div>
</center>


<?php include "libs2.php"; ?>


<script type="text/javascript">
	function redirect(){
		window.location="assigned_lawyer/<?php echo $id;?>";         //////////////////yha link dedo kha jana he
	}
</script>



</body>
</html>