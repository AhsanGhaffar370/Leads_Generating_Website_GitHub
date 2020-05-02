<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="msvalidate.01" content="8B265896C88DF7D5ADC560D97D5B8052" />
<title>Assigned lawyer | Affordable legal Help </title>
<link rel="shortcut icon" type="image/x-icon" href="/favicon.png" />
<base href="https://affordablelegalhelp.com/lawyer_demo.php">
    <meta name="robots" content="noindex,nofollow" />

<meta name="viewport" content="width=device-wdth, initial-scale=1.0" />
    <!--yandex-->
    <meta name="yandex-verification" content="0beccc11dc0dc9cb" />
<!--#Libraries file#-->
<?php include "libs.php"; ?>



</head>

<body class=" bg-light fontb">

<?php include_once "header.php"; ?>
<?php $_SESSION = array();
if (ini_get("session.use_cookies"))
{
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 60*60,
    $params["path"], $params["domain"],
    $params["secure"], $params["httponly"]
    );
}
    unset($_SESSION['city']);
    ?>

<section class="bg-white container text-center mb-5 mt-5 p-2">
	<br />
    <div class="alert text-secondary alert-success mb-5 texts container-fluid font-weight-normal size15">
        Great news, we have successfully connected you with National Legal Help. For immediate assistance with your case, contact the provider listed below.
    </div>
    
    <div class="col-12 pb-5">
    <div class="row">
        
        <div class="mb-5 col-12 col-lg-7 col-md-6 col-sm-12  order-2 order-lg-1 order-md-1">
            <div class="text-left m-1 mt-2">
                <h1 class="font-weight-normal fontb text-dark size46">National Legal Help</h1><hr />
                <p class="text-secondary font-weight-normal size15 decor ">
                
                    We thank you for taking the first step in rectifying your legal issue. We here at National Legal Help understand the hardship of coming up with expensive retainers. Therefore, we have a solution for just about anyone’s budget.<br /><br />
                    
                    We offer affordable unbundled services ranging from <b>$500</b> to <b>$1500</b> depending on the nature of your case. In many cases we can break up the fees into a few payments. We have helped thousands of clients nationwide with all aspects of their family law issues.<br /><br />
                    
                    We handle a wide variety of Family Law matters including Child Custody, Child Custody Modifications, Child Custody Establish, Divorces with or without children, Child Support Establish or Modify, Grandparents Rights, and Adoptions including Guardianship.<br /><br />
                    
                    Call the number below to speak with a legal consultant now to discuss your case and find the right solution for you and your family. If for any reason you receive our voicemail, please leave your name and phone number and one of our consultants will contact you as quickly as possible.<br /><br />
                    
                    Thank you for reaching out to National Legal Help.<br />
                    
                    <b>800.577.4626 ext. 100</b>

                </p>
            </div>
        </div>
        
        <div class="col-12 col-lg-4 col-md-5 col-sm-12 p-3 ml-lg-5 order-1 order-lg-2 order-md-2 ">
        <div class="card   bg-mute ">
            <img src="/Image/law33.jpg" alt="family law img" class="img-fluid images" />
            <div class="card-body text-left">
                <h2 class="font-weight-normal card-title fontb text-dark size31">National Legal Help</h2>
                <p class="text-secondary font-weight-bold size15">800.577.4626 ext. 100</p>
                <p class="text-secondary font-weight-normal size15">support@legalhelpservices.net </p>
                <p class="font-weight-normal text-dark size25">Servicing Areas </p>
                <p class="text-secondary font-weight-normal size15">Family Law, Divorce, Child Custody, Child Support, Grandparents Rights and Adoptions.</p>
                <p class="text-secondary font-weight-normal size15"></p>
            </div>
        </div>
        </div>
        
    </div>
    </div>
</section>


<?php include_once "footer.php"; ?>



<?php include "libs2.php"; ?>

</body>
</html>