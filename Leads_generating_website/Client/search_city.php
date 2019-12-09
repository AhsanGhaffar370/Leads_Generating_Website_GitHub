<?php 
session_start();
error_reporting(0);
include_once "config/database.php"; 
include_once "object/login.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />   -->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Affordable Legal Help | Find Affordable Legal Help with us </title>

<link rel="shortcut icon" type="image/x-icon" href="favicon.png" />
<!--#####################################Libraries file##########################################-->
<?php include "libs.php"; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
<script>
$(document).ready(function () {
      $('select').selectize({
          sortField: 'text'
      });
	  
  });
</script>

<script src="client_validate.js"></script>

<style>

ul {
    margin-top: 0px;
    margin-bottom: 1rem;
    background-color: white;
}


li {
    border-bottom: 1px solid rgba(39, 40, 41, 0.2);
    padding: 20px;
}

li:hover {
    background-color:rgba(0,78,103,.2);
}
</style>


</head>
<body>
    
<?php include_once "header.php"; ?>


<?php if(isset($_REQUEST['submitbtn']))
{
$_SESSION['cato']=$_GET['submitbtn'];
$o=$_SESSION['cato'];
// $status="2";
// $sql = "UPDATE tblbooking SET Status=:status WHERE  id=:eid";
// $query = $dbh->prepare($sql);
// $query -> bindParam(':status',$status, PDO::PARAM_STR);
// $query-> bindParam(':eid',$eid, PDO::PARAM_STR);
// $query -> execute();
// echo "$o";

}?>
<center>
<section class="ser_top" id="fill">
    <div class="container-fluid "><!--div 0 -->
    	<br />
        <h1 class="pt-5 mb-3 search_heading_settings font-weight-normal jl1_heading" style="font-family:Helvetica Neue,Helvetica,Arial,sans-serif;">Affordable Legal Help Without Paying Thousands Up Front</h1>
        <h1 class="mt-2 mb-3 search_heading_settings text-dark xl_heading font-weight-normal" style="width:80%;">With Affordable Legal Help, You Can Hire a Lawyer to Help You With Your Case For As Low As Between $500‑1500.</h1>
        <h1 class="mt-5 mb-3 search_heading_settings text-dark xl_heading font-weight-normal">Where Do You Need an Attorney?</h1>
        <h1 class="mb-3 search_heading_settings text-dark heading font-weight-normal"><em>We will instantly connect you with a lawyer for free consultation.</em></h1>
        <?php 
        	if (isset($_POST['submitbtn'])){}
        ?>
        
        <form class="ser_state mt-5" method="post" ><!--form a -->
        
                <div class="col-10 pr-0 pl-0"><!--div a -->
                	
                	<div class="row ser_border">
                    
                        <div class="col-12 col-lg-7 col-md-7 col-sm-12  pr-0 pl-0">
                            <input type="text" name="country" id="country" class="form-control heading ser_box"  placeholder="Enter Your City Or Zipcode" autocomplete="off"/>
                        </div>
                        
                        <div class="col-12 col-lg-5 col-md-5 col-sm-12 pr-0 pl-0 ">
                            <div  id="btnconnect"><!--div c -->
                                <input type="submit" name="submitbtn" value="Connect With Lawyer" class="btn font-weight-bold button_size ser_btn"/>
                            </div><!--div c -->
                        </div>
                        
                    </div>
                    
                    <div class="row">
                    
                        <div class="col-12 col-lg-7 col-md-6 col-sm-12  pr-0 pl-0">
                            <div id="countryList" class="heading text-left bg-transparent" style="line-height:1.429;" >
                            </div>
                             <?php ?>
                             <?php
                             if (isset($_POST['submitbtn'])){
                                $_SESSION['city']=$_POST['country'];
                                $i=$_SESSION['city'];
                                
                                echo "<script type='text/javascript'> document.location = 'Complete-your-request'; </script>";
                              }
                             ?>
                        </div>
                        <div class="col-12 col-lg-5 col-md-12 col-sm-12 pr-0 pl-0 "></div>
                        
                    </div>
                    
                    
                </div><!--div a -->
                
                
                
                
        </form><!--form a -->
         
    </div><!--div 0 -->
</section>
</center>

<section class="container-fluid text-center row p-4 ml-0" style="background-color:#e3e3e3;">

    <div class="col-lg-4 col-md-4 col-sm-12 col-12 mt-4" style="position: inherit;">
        <h3 class=" search_heading_settings heading">Instantly Connect With A Lawyer</h3>
        <p class="search_heading_settings text-dark texts">talk to a lawyer in minutes</p>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-12 mt-4" style="position: inherit;">
        <h3 class=" search_heading_settings heading">Save Up To 80% On Legal Fees</h3>
        <p class="search_heading_settings text-dark texts">only pay for the help you need</p>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-12 mt-4" style="position: inherit;">
        <h3 class=" search_heading_settings heading">Pay As You Go</h3>
        <p class="search_heading_settings text-dark texts">don't get locked into an expensive retainer</p>
    </div>
</section>



<section class="container-fluid text-center p-4 mt-5">
	<h1 class=" home_heading_settings xl_heading">How It Works</h1>

    <div class="row mt-3 text-center">
    
        <div class="col-lg-4 col-md-4 col-sm-12 col-12 mt-4">
        	<i class="fas fa-check-circle fa-4x"></i>
            <h3 class="mt-3 home_heading_settings heading">Complete Request</h3>
            <p class="search_heading_settings text-dark texts">Your Consultation is free and confidential</p>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-12 mt-4">
        	<i class="fas fa-link fa-4x"></i>
            <h3 class="mt-3 home_heading_settings heading">Instantly Connect</h3>
            <p class="search_heading_settings text-dark texts">Talk to an unbunduled attorney in minutes</p>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-12 mt-4">
        	<i class="fas fa-hand-holding-usd fa-4x"></i>
            <h3 class="mt-3 home_heading_settings heading">Save Money</h3>
            <p class="search_heading_settings text-dark texts">You Only Pay for the legal help you need</p>
        </div>
        
	</div>
    
    <p class="mt-4 search_heading_settings text-dark font-weight-bold  texts"><em>"We are grateful there are services like Affordable Legal Help for those of us who can't afford outrageous fees at a time when legal help may be needed on short notice."</em></p>    
       
</section>


<section class="container mt-5  container-fluid text-center">
    <h3 class=" search_heading_settings xl_heading">Watch Our Two Minute Video</h3>
</section>

<section class="container video1">
        	<iframe width="900" height="700" src="https://www.youtube.com/embed/L0B8f7WRW88" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="container video"></iframe>
        <br>
</section>


<!--
<section class="container-fluid row p-4 ml-0" style="background-color:#e4eff6;">

    <div class="container col-lg-4 col-md-4 col-sm-4 col-12 block_image">
        <img src="Image/serv.PNG" alt="divorce img" class="images card-img-top rounded-circle" />
    </div>
    <div class="container col-lg-8 col-md-8 col-sm-8 col-12 text-left">
        <h3 class=" home_heading_settings xl_heading">What is Affordable Legal Help?</h3>
        <p class="search_heading_settings texts">Millions of people each year are forced to face legal challenges on their own. Affordable Legal Help is a coalition of experienced and caring lawyers that want to see that problem end. We believe that you shouldn’t ever have to go without legal help simply because it is too expensive and that’s why the attorneys in our network have optimized their services and made them available individually to save you money and protect you from undeserved legal consequences.<br /> We will be at your side to face your case and provide you with quality legal assistance that almost anyone can afford. Call us today for help with your legal challenge and to start working with an attorney that cares about helping--not just money.</b></p>
    </div>
</section>




<center>
<section class="container-fluid text-center pt-3 pb-3 mt-5" style="background-color:#e3e3e3;">
	<h1 class="search_heading_settings mt-4 heading">To Connect With An Affordable Attorney in Your Local Area</h1>
    <input type="button" value="Complete your request now" class="btn p-3 mb-4 buttons font-weight-bold" onclick="document.getElementById('fill').scrollIntoView()"/>
</section>
</center>
-->
<center>
<section class="p-5 text-center text-white-50 bg-secondary services_bg mt-5">

    <h1 class="text-dark pt-4 font-weight-bold xl_heading">FIELDS OF EXPERTISE</h1><hr />
    
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12 col-12 d-block m-auto">
            <div class="d-block text-dark m-auto"><i class="fas fa-heart-broken fa-4x"></i></div>
            <p class="xl_heading font-weight-normal text-dark">Divorce</p>
            <p class="container texts text-dark">Going through formal proceedings of filing a divorce is extremely frustrating. Highly skilled unbundled lawyers under Affordable legal Help will ensure that your goals and demands are met without breaking your bank.</p>
            <hr />
     	</div>
                
        <div class="col-lg-4 col-md-6 col-sm-12 col-12 d-block m-auto">
            <div class="d-block text-dark m-auto"><i class="fas fa-child fa-4x"></i></div>
            <p class="xl_heading font-weight-normal text-dark">Child Support</p>
            <p class="container texts text-dark">Paying and getting paid child support can be difficult and tiring. Our lawyers are committed to solving any child support issues as quickly as possible so that the financial future of your family is secured.</p>
           
            <hr />
        </div>
                
        <div class="col-lg-4 col-md-6 col-sm-12 col-12 d-block m-auto">
            <div class="d-block text-dark m-auto"><i class="fas fa-baby fa-4x"></i></div>
            <p class="xl_heading font-weight-normal text-dark">Child Adoption</p>
            <p class="container texts text-dark">Taking legal and parental rights over a child is an exciting but stressful process. The attorneys we partner with ensure that the specific legal details are taken care of so you can enjoy becoming a parent.</p>
            
            <hr />
        </div>
    	
        <div class="col-lg-2 col-md-0 col-sm-0 col-12 p-0"></div>
        
        <div class="col-lg-4 col-md-6 col-sm-12 col-12 d-block m-auto">
            <div class="d-block text-dark m-auto"><i class="fas fa-users fa-4x"></i></div>
            <p class="xl_heading font-weight-normal text-dark">Child Custody</p>
            <p class="container texts text-dark">Although children can choose for themselves, but the custody matter is usually decided in the courtroom. Our lawyers will help you inform the judge about the situation and determine the option that is best for your child.</p>
            
            <hr />
        </div>
        
        <div class="col-lg-4 col-md-6 col-sm-12 col-12 d-block m-auto">
            <div class="d-block text-dark m-auto"><i class="fas fa-fist-raised fa-4x"></i></div>
            <p class="xl_heading font-weight-normal text-dark">Grand Parent's Rights</p>
            <p class="container texts text-dark">As grandparents, you have certain rights that should not be taken away from you. With our attorneys, you can be sure that you won't lose these rights and that you will live a secure life.</p>
            
            <hr />
        </div>
        
        <div class="col-lg-2 col-md-0 col-sm-0 col-12 p-0"></div>
        
    </div>
     	
</section>
</center>
<hr class="m-0" />






<section class="container-fluid bg-light">
    <div class="container text-left bottom_padding p-5">
    	<h1 class="pt-2 mb-3 home_heading_settings xl_heading">Why Choose Our Lawyers?</h1>
        
        <h3 class="mt-2 home_heading_settings text-dark heading">Experienced</h3>
        <p class="text-dark texts" >Each of the attorneys and firms in our proven network has decades of experience serving other individuals in your area. They can serve a variety of needs and even address the most unique cases.</p>
        
        <h3 class="mt-2 home_heading_settings text-dark heading">Friendly</h3>
        <p class="text-dark texts" >The lawyers in our network really care about getting you the help that you need while treating you with dignity, respect, and communication every step of the way. If you want an attorney that you’ll like to work with, choose one in our network.</p>
        
        <h3 class="mt-2 home_heading_settings text-dark heading">Affordable</h3>
        <p class="text-dark texts" >The attorneys in the Affordable Legal Help network live up to their title and are happy to provide legal assistance that can be used by anyone--including those on a tight budget.</p>
      
        <h3 class="mt-2 home_heading_settings text-dark heading">Local</h3>
        <p class="text-dark texts" >Our network features thousands of attorneys and firms, and you’ll be able to easily connect with one in your area to make communication much easier and faster. </p>
        
        <h3 class="mt-2 home_heading_settings text-dark heading">Accessible</h3>
        <p class="text-dark texts" >You’ll always be able to get in touch with our attorneys. Our lawyers don’t believe in leaving clients in the dark and they’ll be there to answer your questions and address your concerns whenever the need arises.</p>
        
        <h3 class="mt-2 home_heading_settings text-dark heading">Hard-Working</h3>
        <p class="text-dark texts" >Our in-network attorneys care about results more than anything. They will fight hard to achieve your desired result and won’t rest until every avenue of legal recourse has been exhausted.</p>
        
        
    </div>
    
</section>
<hr class="m-0" /> 



<section class="bg-white" style="margin: 10% 0% 10% 0%;">

    <h1 class="text-dark text-center font-weight-bold xl_heading">What people are saying</h1>
    <p class="container xs_texts text-center font-weight-normal text-black-50 mb-5">Fitst see how your businesses are performing.<br />
Then do more with insights from Webify team.</p>
	
    <center>
    <div class="container-fluid pt-3">
    <div class="carousel slide" id="myslide" data-ride="carousel">
    
    	<div class="carousel-inner">
            
            <div class="carousel-item active">
        		<!--<img src="Image/t1.PNG" alt="testimonial1 img" class="img-fluid" /> -->
                <p class="xs_texts text-black-50 font-weight-normal font-italic" style="width:60%;">
                	"This company rocks. Before them I was quoted over $3000.00 to take my case. "Affordable Legal Help" offered me a couple different programs where I ended up saving about $1000. Thank you for your help in finalizing my divorce."
                </p>
                <h4 class="font-weight-light texts mt-3">SEAN WALKER</h4>
       		</div>
            <div class="carousel-item">
                <p class="xs_texts text-black-50 font-weight-normal font-italic" style="width:60%;">
                	 “Affordable Legal Help’s unbundled attorneys were the only source of legal help that could help me immediately. I was worried that their service would cost me immensely in the longer term, but I was pleasantly surprised to find such great legal advice at such a reasonable rate. He went above and beyond and did everything he could to ensure a great outcome. I couldn’t have asked for a better law firm or attorney. Thanks guys!!!”
                </p>
                <h4 class="font-weight-light texts mt-3">JOHN HANNIGAN</h4>
       		</div>
            <div class="carousel-item">
                <p class="xs_texts text-black-50 font-weight-normal font-italic" style="width:60%;">
                	“At the suggestion of my sister, I contacted the Affordable Legal Help and scheduled a consultation so that I could start the child adoption procedure. They clarified the entire process and gave me all the information I needed to start the process on my own. I feel like I have gotten the best bang for my buck at Affordable Legal Help, and my adoption case is in court right now.”
                </p>
                <h4 class="font-weight-light texts mt-3">ANGELA COLLINS</h4>
       		</div>
            <div class="carousel-item">
                <p class="xs_texts text-black-50 font-weight-normal font-italic" style="width:60%;">
                	“As an entrepreneur, I have had my share of experience the legal world. I have seen law firms that exploit their customers just to make a quick buck. This made me a little hesitant when assessing my options in a fight for custody of my son. However, upon a few interactions with the unbundled lawyers I connected with through Affordable Legal Help, I knew that I had found the perfect fit for me.”
                </p>
                <h4 class="font-weight-light texts mt-3">NATHAN STARKS</h4>
       		</div>
            <div class="carousel-item">
                <p class="xs_texts text-black-50 font-weight-normal font-italic" style="width:60%;">
                	I am pleased with your firm’s service and everything has been answered in a timely manner. I appreciate having your firm handle my case; they have put my mind at ease. I would absolutely recommend your firm to family and friends.
                </p>
                <h4 class="font-weight-light texts mt-3">GINA TEAGUE</h4>
       		</div>
            <div class="carousel-item">
                <p class="xs_texts text-black-50 font-weight-normal font-italic" style="width:60%;">
                	Affordable legal Help" did an outstanding work on my case. They were very prompt in responding to my emails and phone calls. If I ever have another problem where I need legal service, I will be contacting your office for representation. Thanks for your help with everything."
                </p>
                <h4 class="font-weight-light texts mt-3">MICHAEL SMITH</h4>
       		</div>
            
        </div>
        
        <a href="#myslide" data-slide="prev" class="carousel-control-prev" style="width:6%; background-color: #cdd2d7 !important;">
        	<span class="carousel-control-prev-icon"></span>	
        </a>
        <a href="#myslide" data-slide="next" class="carousel-control-next" style="width:6%; background-color: #cdd2d7 !important;">
        	<span class="carousel-control-next-icon".></span>
        </a>
    
    
    </div>
    </div>
    </center>


</section>

<hr />


<center>
<section class="container bg-white text-center" style="background-color:#e3e3e3; margin: 7% 0% 7% 0%;">
	<h1 class="search_heading_settings mt-4 font-weight-bold jl_heading">Press Release</h1>
    <p class="" style="border:2px #000099;">______________________________</p>
    <p class="search_heading_settings text-center text-black font-weight-normal xs_texts">Although legal assistance solves one problem, it creates another, i.e. the financial issues. Legal assistance has always been one of the most expensive services in America to the extent that many people would rather forego a family matter rather than invest in hiring a good lawyer.</p>
    <input type="button" value="Read More" class="btn p-2 btn-md mb-4 buttons font-weight-normal"/>
</section>
</center>


<hr class="m-0" />
<center>
<section class="container-fluid text-center pt-5 pb-5" style="background-color:#eee;">
	<h1 class="search_heading_settings mt-4 heading">To Connect With An Affordable Attorney in Your Local Area</h1>
    <input type="button" value="Complete your request now" class="btn p-3 mb-4 buttons font-weight-bold" onclick="document.getElementById('fill').scrollIntoView()"/>
</section>
</center>

<?php include_once"footer.php"; ?>


</body>
</html>
<script>

$(document).ready(function(){

$('#country').keyup(function(){
   
    var query=$(this).val();
    // if (query>=44101 && query<=44199){
    //     query="Cleveland,OH";
    // }
    // else if ((query>=45401 &&query<=45406)||(query>=45409 && query<=45417)||(query>=45419 && query<=45420)||(query>=45422 && query<=45424)||(query>=45428 && query<=45435)||(query>=45439 && query<=45441)||(query>=45448 && query<=45449)||(query>=45458 && query<=45459)||(query>=45469 && query<=45470)||(query>=45481 && query<=45482)||query==45490||query==45479||query==45475||query==45437||query==45426||query==45390){
    //     query="Dayton,OH";
    // }
    // else if (query>=43201 && query<=43270){
    //     query="Columbus,OH";
    // }
    // else if (query>=45201 && query<=45299){
    //     query="Cincinnati,OH";
    // }
    if (query !=''){
       $.ajax({
   url:"object/search.php",
   method:"POST",
   data:{query:query},
   success:function(data){
       $('#countryList').fadeIn();
       $('#countryList').html(data);
       

   }
       });

    }
    else{
        $('#countryList').fadeOut();
        $('#countryList').html("");
    }
});
$(document).on('click','li',function(){
    $('#country').val($(this).text());
    $('#countryList').fadeOut();
});
});

</script>


<!--
<script>


var mq = window.matchMedia( "(min-width: 767px) and (max-width: 1295px)" );
var mq1 = window.matchMedia( "(min-width: 200px) and (max-width: 766px)" );

if(mq1.matches) {
    
	$("#country").keypress(function(){
		
		var c=$("#country").val();
		
        if(c.length>0){
			$("#btnconnect").hide();
		  }
		  else if(c.length<=0){
			$("#btnconnect").show();
		  }
		  else{
			  $("#btnconnect").css("background-color", "green");
		  }
    });
	
	
	
}



</script>-->