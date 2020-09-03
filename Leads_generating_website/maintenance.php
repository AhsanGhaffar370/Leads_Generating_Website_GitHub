<?php
function maintenance($mode = FALSE){
if($mode){
header("Location: https://affordablelegalhelp.com/maintenance.php");
exit;
}else{
header("Location: https://affordablelegalhelp.com/");
exit;
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coming Soon | Affordable Lega Help</title>
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.png" />

    
    <?php include "libs.php"; ?>


<style>

  *{
    margin:0px;
    padding:0px;
  }
    .header_bg_img {
        background-image: linear-gradient(
            rgba(23, 26, 28, 0.7),
            rgba(20, 21, 21, 0.7)
            ),
            url("Image/maintain.jpg");
        width: 100%;
        height: 100%;
        /* margin: 0px 0px 30px 0px; */
        padding: 24% 1px 500px 1px;
        background-repeat: no-repeat !important;
        background-size: cover !important;
        /* background-position: center !important; */

        

}
</style>
</head>
<body class="header_bg_img">
    
  <section class="container text-center centre">

    <h1 class="text-white font-weight-bold size42">Maintenance mode is on</h1>
    <p class="text-white pt-1 pb-5">Website will be available soon. Thank you for your patience!</p>
    <img src="Image/legalHelp_footer.png" class="col-8 col-lg-3 col-md-6 col-sm-6" alt="affordable legal help">

  </section>


    
    <?php include "libs2.php"; ?>
</body>
</html>