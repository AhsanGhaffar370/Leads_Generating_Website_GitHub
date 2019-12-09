<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Affordable Legal Help</title>

<link rel="shortcut icon" type="image/x-icon" href="favicon.png" />

<!--#####################################Libraries file##########################################-->
<?php include "libs.php"; ?>
<?php
// include "config/database.php"
?>


</head>

<body class="bg-white">
<?php 

//             $database=new Database();
//             $db = $database->getConnection();
//             $detail="";
// $sqlquery = "SELECT subject,detail,active from lawyer_profile where id=2";
//                                     $query1 = $db -> prepare($sqlquery);
//                                     $query1->bindParam(':id',$id,PDO::PARAM_STR);
//                                     $query1->execute();
//                                     $re=$query1->fetchAll(PDO::FETCH_OBJ);
//                                     $cnt=1;
//                                     if($query1->rowCount() > 0)
//                                     {
//                                     foreach($re as $ree)
//                                     {
//                                     // $detail = htmlentities($ree->detail);
//                                     $sub= htmlentities($ree->subject);
//                                     $act= htmlentities($ree->active);
                                    
//     // $to="muhammadfaraz991@gmail.com";
//     // $subject="Response from website";
//     // $msg="Hello World";
//     // $header="From: info@legalhelpservice.com";
//     // if (mail($to,$subject,$msg,$header)){
//     //     echo "Mail send successfully";
//     // }
//     // else{
//     //     "can not send email";
//     // }
//     $from_name="Muhammad";
    
//                                         $from_email="info@legalhelpservice.com";
                                    
//                                         $headers  = "MIME-Version: 1.0\r\n";
//                                         $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
//                                         $headers .= "From: {$from_name} <{$from_email}> \n";
//                                         $body=$ree->detail;
//                                         // $body.="Please click the following link to reset your password: {$home_url}reset_password/?access_code={$access_code}";
//                                         $subject="Hello";
//                                         $send_to_email="muhammadfaraz991@gmail.com";
                                    
//                                         mail($send_to_email, $subject, $body, $headers);
                                        
//                                     }}
?>

<!--<nav class="navbar navbar-expand-md" style="background:linear-gradient(180deg,#001b32 0,#234f6c); padding: 10px;"> -->
<nav class="navbar navbar-expand-md bg-white" style="box-shadow: 4px -2px 4px 4px #CCCCCC; padding:10px">
    <div class="container">
    	<div class=" col-lg-3 col-md-4 col-sm-3 col-6 ">
        	<a href="home"><img class="logo images" src="Image/legalHelp.png" alt="Affordable Legal Help" /></a>
        </div>	
        <div class="text-right text-white">
            
            <h5 class="home_heading_settings font-weight-bold" style="font-size:1.8vw;">Legal Help with You in Mind</h5>
        </div>
    </div>
</nav>
 
 
<section class="bg-transparent">
    <div class="container text-center">
        <h1 class="mt-5 mb-3 home_heading_settings xl_heading">Select The Area Of Law In Which You Need Help:</h1>
        
        <div class="col-lg-11 col-md-11 col-sm-11 col-11 d-block m-auto">
            <div class="card  bg-white mb-5">
            
                <img src="Image/grand.jpg" alt="family law img" class="img-fluid images" />
               
                <div class="card-body text-left m-4">
                    <h1 class="font-weight-bold card-title home_heading_settings xl_heading">Family Law</h1>
                    <p style="text-align:justify;" class="xs_texts font-weight-normal">
                        If you need help with a divorce, adoption, or other family-related matter, we are the right partner for you. We have some of the best family lawyers in the state ready to advise you and help you through any situation that you might be going through. We understand that these matters are often sensitive and emotional, and we’ll always treat your case with respect. 
                    </p>
                    
                    <form name="sas" method="get" action="search-city">
                    	<button type="submit" name=submitbtn value="Family" class="btn p-3 font-weight-bold button_size buttons">Get <b>Family</b> law help Now</button>
                                        
                        <!-- <input type="submit" name="submitbtn" value="family" class="btn p-3 font-weight-bold btn-lg block text-white"  style="font-size:2.3vw; background-color:#D9534F;"/> -->
                    </form>
                    
                </div>
            </div>
        </div>
        
        <div class="col-lg-11 col-md-11 col-sm-11 col-11 d-block m-auto">
            <div class="card  bg-white mb-5">
            
                <img src="Image/bankr.jpg" alt="family law img" class="img-fluid images" />
               
                <div class="card-body text-left m-4">
                    <h1 class="font-weight-bold card-title home_heading_settings xl_heading">Bankruptcy</h1>
                    <p style="text-align:justify;" class="xs_texts font-weight-normal">
                        Bankruptcy is the last resort, but if it does ever get to that point, give us a call. We have the knowledge and experience to help you navigate this tricky part of your life and ensure tha tyou get the fresh start that you seek. 
                    </p>
                    
                    <form name="sas" method="get" action="search-city">
                    <button type="submit" name=submitbtn value="Bankruptcy" class="btn p-3 font-weight-bold button_size buttons">Get<b> Bankruptcy</b> help Now</button>
                    
                        <!-- <input type="submit" name="submitbtn" value="Bankruptcy" class="btn p-3 font-weight-bold btn-lg block text-white"  style="font-size:2.3vw; background-color:#D9534F;"/> -->
                    </form>
                    
                </div>
            </div>
        </div>
        
        <div class="col-lg-11 col-md-11 col-sm-11 col-11 d-block m-auto">
            <div class="card  bg-white mb-5">
            
                <img src="Image/imig.jpg" alt="family law img" class="img-fluid images" />
               
                <div class="card-body text-left m-4">
                    <h1 class="font-weight-bold card-title home_heading_settings xl_heading">Immigration</h1>
                    <p style="text-align:justify;" class="xs_texts font-weight-normal">
                        If you find your legal status as a citizen in question or you need help gaining a path to citizenship, get in touch with our experienced legal team. We help you navigate the incredibly complex immigration system and help you understand United States laws that pertain to your status in this country.
                    </p>
                    
                    <form name="sas" method="get" action="search-city">
                    <button type="submit" name=submitbtn value="Immigration" class="btn p-3 font-weight-bold button_size buttons">Get<b> Immigration</b> help Now</button>
                    
                        <!-- <input type="submit" name="submitbtn" value="Immigration" class="btn p-3 font-weight-bold btn-lg block text-white"  style="font-size:2.3vw; background-color:#D9534F;"/> -->
                    </form>
                    
                </div>
            </div>
        </div>
        
        <div class="col-lg-11 col-md-11 col-sm-11 col-11 d-block m-auto">
            <div class="card  bg-white mb-5">
            
                <img src="Image/est1.jpg" alt="family law img" class="img-fluid images" />
               
                <div class="card-body text-left m-4">
                    <h1 class="font-weight-bold card-title home_heading_settings xl_heading">Estate Planning</h1>
                    <p style="text-align:justify;" class="xs_texts font-weight-normal">
                        Estate planning isn’t exactly the most joyous occasion, but it’s an incredibly important part of getting older. By planning your estate, you can leave your relatives in a much better situation and make your wishes clear. We help you make these crucial decisions and put your wishes into a legal document. 
                    </p>
                    
                    <form name="sas" method="get" action="search-city">
                    <!-- <input type="submit" name="submitbtn" value="Estate" class="btn p-3 font-weight-bold btn-lg block text-white"  style="font-size:2.3vw; background-color:#D9534F;"/> -->
                    
                    <button type="submit" name=submitbtn value="Estate" class="btn p-3 font-weight-bold button_size buttons" >Get<b> Estate Planning</b> help Now</button>
                    
                        <!-- <input type="submit" name="submitbtn" value="Estate" class="btn p-3 font-weight-bold btn-lg block text-white"  style="font-size:2.3vw; background-color:#D9534F;"/> -->
                    </form>
                    
                </div>
            </div>
        </div>
    </div> 
        `
</section>
    
<?php include_once "footer.php" ?>





</body>
</html>
