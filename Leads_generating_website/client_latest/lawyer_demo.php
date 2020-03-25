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
<base href="https://affordablelegalhelp.com/lawyer_demo.php">

<meta name="viewport" content="width=device-wdth, initial-scale=1.0" />
    <!--yandex-->
    <meta name="yandex-verification" content="0beccc11dc0dc9cb" />
<!--#Libraries file#-->
<?php include "libs.php"; ?>

<script async src="client_validate.js"></script>

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

<section class="bg-white container text-center mb-5 mt-5">
	<br />
    <div class="alert text-dark alert-success mb-5 texts container-fluid font-weight-normal">
        Great news, we have successfully connected you with National Legal Help. For immediate assistance with your case, contact the provider listed below.
    </div>
    
    <div class="col-12 pb-5">
    <div class="row">
        <div class="card col-12 col-lg-4 col-md-4 col-sm-12 border-0">
            <img src="Image/default.PNG" alt="family law img" class="img-fluid images" />
            <div class="card-body text-left">
                <h2 class="font-weight-bold card-title home_heading_settings text-dark"  style="font-size:42px;">Michael Parker</h2>
                <p class="text-dark font-weight-normal" style="font-size:16px;">800.577.4626 ext 110 </p>
                <p class="text-dark font-weight-normal" style="font-size:16px;">support@legalhelpservices.net </p>
                <p class="font-weight-bold text-dark" style="font-size:24px;">Servicing Areas </p>
                <p class="text-dark font-weight-normal" style="font-size:16px;">Family Law, Divorce, Child Custody, Child Support</p>
                <p class="text-dark font-weight-normal" style="font-size:16px;">Grandparents Rights and Adoptions.</p>
            </div>
        </div>
        
        <div class="mb-5 col-12 col-lg-8 col-md-8 col-sm-12">
            <div class="text-left m-1 mt-2">
                <h1 class="font-weight-bold home_heading_settings text-dark" style="font-size:42px;">National Legal Help</h1><hr />
                <p style="text-align:justify; font-size:17px;" class="text-dark font-weight-normal">
                
                    We thank you for taking the first step in rectifying your legal issue. We here at National Legal Help understand the hardship of coming up with expensive retainers. Therefore, we have a solution for just about anyone’s budget.<br /><br />
                    
                    We offer affordable unbundled services ranging from <b>$500</b> to <b>$1500</b> depending on the nature of your case. In many cases we can break up the fees into a few payments. We have helped thousands of clients nationwide with all aspects of their family law issues.<br /><br />
                    
                    We handle a wide variety of Family Law matters including Child Custody, Child Custody Modifications, Child Custody Establish, Divorces with or without children, Child Support Establish or Modify, Grandparents Rights, and Adoptions including Guardianship.<br /><br />
                    
                    Call the number below to speak with a legal consultant now to discuss your case and find the right solution for you and your family. If for any reason you receive our voicemail, please leave your name and phone number and one of our consultants will contact you as quickly as possible.<br /><br />
                    
                    Thank you for reaching out to National Legal Help.<br />
                    
                    800.577.4626 ext 110

                </p>
            </div>
        </div>
        
    </div>
    </div>
</section>


<?php include_once "footer.php"; ?>
</body>
</html>