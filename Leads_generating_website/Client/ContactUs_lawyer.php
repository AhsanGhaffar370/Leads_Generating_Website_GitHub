<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Contact Us</title>

<link rel="shortcut icon" type="image/x-icon" href="favicon.png" />

<!--#####################################Libraries file##########################################-->
<?php include "libs.php"; ?>

<script src="client_validate.js"></script>
<!--#####################################Libraries file##########################################-->

</head>

<body class=" bg-light">

<?php include_once "lawyer_header.php"; ?>

<section class="container text-center text-white-50 mt-5" style="background-color:#12447A;">
    <h1 class="text-white font-weight-bold xl_heading">CONTACT US</h1>
    <h5 class="texts">We are dedicated to provide the highest level of<br />legal services in the US</h5><hr />
    
    <div class="row rowsetting1">
    
        <div class="col-lg-8 col-md-8 col-sm-8 col-12 d-block">
            <div class="m-auto text-left xl_heading"><i class="fas fa-phone"> Contact Form</i></div><br />
                <form class="contact-form1" method="post" >
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
                        <input type="text" class="form-control p-4" name="subject" id="subject" placeholder="subject"/>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control p-4" name="msg" id="msg" placeholder="Message" rows="8" cols="60"></textarea>
                </div>
                   <hr />
                    <div class="form-group">
                        <center><input type="submit" name="submitbtn" class="btn btn-lg headerbtn buttons" value="Submit Form" /></center>
                    </div>
                    <br />
                
                </form>
            <hr />
        </div>
        
        <div class="child_block col-lg-4 col-md-4 col-sm-4 col-12 d-block m-auto text-left">
            <div class="d-block m-auto xl_heading"><i class="fas fa-info-circle"> Contact Info</i></div>
            <hr />
            <dl>
                <dt class="texts font-weight-bold">Address:</dt>
                <dd class="text-white xs_texts" >2182 Hewitt Ave Kettering, Ohio 45440</dd>
            </dl>
            <dl>
                <dt class="texts font-weight-bold">Email:</dt>
                <dd><a class="text-white xs_texts" href="mailto:info@affordablelegalhelp.com">info@affordablelegalhelp.com</a></dd>
            </dl>
            <dl>
                <dt class="texts font-weight-bold">Phone:</dt>
                <dd><a class="text-white xs_texts"  href="tel:844 944 5342">844 944 5342</a></dd>
            </dl>
        </div>
        
    </div>
</section>
    

<?php include_once "lawyer_footer.php"; ?>
</body>
</html>