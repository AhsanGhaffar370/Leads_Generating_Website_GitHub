<?php include_once "config/database.php";?>
<?php
// include_once "config/database.php";
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['Catogory'])==0){
    header('location:login');
}
if(strlen($_SESSION['Lawyerlogin'])==0)
	{	
header('location:login');
}
else{
    $id=$_SESSION['id'];
    if (strlen($_SESSION['Catogory'])==0){
        header('location:change-images');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add city</title>
<link rel="shortcut icon" type="image/x-icon" href="growth.png" />
</head>
<?php include_once "libs.php"; ?>

<script src="client_validate.js"></script>

<?php 

$database=new Database();
$db = $database->getConnection();

if (isset($_POST['submitbtn'])){

    $cit1="";
    $cit2="";
    $cit3="";
    $cit4="";
    if (isset($_POST['city1'])){
        $cit1=$_POST['city1'];
    }
    if (isset($_POST['city2'])){
        $cit2=$_POST['city2'];
    }
     if (isset($_POST['city3'])){
        $cit3=$_POST['city3'];

    }
     if (isset($_POST['city4'])){
        $cit4=$_POST['city4'];
    }
   
   

    $sq="update lawyer_profile set state=:cit1,city2=:cit2,city3=:cit3,city4=:cit4 where id=:id";
    $que = $db->prepare($sq);
    $que->bindParam(':cit1',$cit1);
    $que->bindParam(':cit2',$cit2);
    $que->bindParam(':cit3',$cit3);
    $que->bindParam(':cit4',$cit4);
    $que->bindParam(':id',$id);
    if ($que->execute()){
        echo "Update City";
    }
    else{
       echo "City not update";
    }
}
//$_SESSION['id'];
    $sql ="SELECT * FROM lawyer_profile WHERE id=:id";
    $query= $db->prepare($sql);

    $state="";
    $city2="";
    $city3="";
    $city4="";
    $query->bindParam(":id", $id);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $row = $query->fetch(PDO::FETCH_ASSOC);
    if($query->rowCount() > 0)
    {
            foreach($results as $result)
            {
                $state=htmlentities($result->state);
                $city2=htmlentities($result->city2);
                $city3=htmlentities($result->city3);
                $city4=htmlentities($result->city4);
            }
    }
    ?>
<body class="bg-light">
    
<?php include_once "dashboard_header.php"; ?>
    
<br><br><br>    
<section class="container bg-white text-center text-black dash pt-2 mt-5 mb-5 border-light border-right border-left border-top border-bottom">
<?php include_once"balance_status.php" ?>   
    <h4 class="text-left pl-5 font-weight-bold p-3" style="background-color:#d1ecf1; color:#0c5460;">Add cities/zipcodes </h4>
    <center>
    <div class="container">
        	
            <div class="col-12 col-lg-7  col-md-10 col-sm-12">
            
                <form class="form1"  method="post" >
                
                    <div class="form-group text-left">
                        <label class="mt-3" id="add">Your City:</label>
                        <div class="row">
                            <div class="col-12 col-lg-11 col-md-11 col-sm-12  pr-0 pl-0">
                                <input type="text" name="country" id="country"  
                               	class="form-control heading font-weight-normal ser_box"  placeholder="Enter City Or Zipcode" autocomplete="off"/>
                            </div>
                        
                            <div class="col-12 col-lg-1 col-md-1 col-sm-12 pr-0 pl-0 text-right ">
                                <input type="button" name="b" id="b" class="btn pt-2 pb-2 btn-lg mb-5 ml-1 btn-info font-weight-bold" value="+" />
                       
                            </div>
                            <div id="countryList" class="heading text-left bg-transparent" style="line-height:1.429;" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-left div1 ">
                        <label class="mt-3">Add City1:</label>
                        
                        <div class="row">
                            <div class="col-12 col-lg-11 col-md-11 col-sm-12  pr-0 pl-0">
                                <input type="text" name="country1" id="country1" class="form-control heading font-weight-normal ser_box"  placeholder="Enter City Or Zipcode" autocomplete="off"/>
                            </div>
                        
                            <div class="col-12 col-lg-1 col-md-1 col-sm-12 pr-0 pl-0  text-right">
                                <input type="button" name="b1" id="b1" class="btn pt-2 pb-2 btn-lg mb-5 ml-1 btn-info font-weight-bolder" value="+" /> 
                            
                            </div>
                            <div id="countryList1" class="heading text-left bg-transparent" style="line-height:1.429;" >
                            </div>
                        </div>        
                    </div>
                    <!-- <div class="form-group text-left div2">
                        <label class="mt-3">Add City2:</label>
                        
                        <div class="row">
                    	    <div class="col-12 col-lg-11 col-md-11 col-sm-12  pr-0 pl-0">
                                <input type="text" name="country2" id="country2"  value="<?php if ($city3=="Dayton,OH"){
                                    echo "Dayton,OH";
                                }else if($city3=="Cleveland,OH"){
                                    echo "Cleveland,OH";
                                }
                                else if ($city3=="Cincinnati,OH"){
                                    echo "Cincinnati,OH";
                                }
                                else if($city3=="Columbus,OH"){
                                    echo "Columbus,OH";
                                }
                                 ?>"
                               
                                  class="form-control heading font-weight-normal ser_box"  placeholder="Enter City Or Zipcode" autocomplete="off"/>
                            </div>
                        
                            <div class="col-12 col-lg-1 col-md-1 col-sm-12 pr-0 pl-0  text-right">
                                <input type="button" name="b2" id="b2" class="btn pt-2 pb-2 btn-lg mb-5 ml-1 btn-info font-weight-bolder" value="+" />
                    	    
                            </div>
                            <div id="countryList2" class="heading text-left bg-transparent" style="line-height:1.429;" >
                            </div>
                        </div> 
                    </div> -->
                    
                    <!-- <div class="form-group text-left div3">
                        <label class="mt-3">Add City3:</label>
                        
                        <div class="row">
                            <div class="col-12 col-lg-11 col-md-11 col-sm-12  pr-0 pl-0">
                                <input type="text" name="country3" id="country3"  value="<?php if ($city4=="Dayton,OH"){
                                    echo "Dayton,OH";
                                }else if($city4=="Cleveland,OH"){
                                    echo "Cleveland,OH";
                                }
                                else if ($city4=="Cincinnati,OH"){
                                    echo "Cincinnati,OH";
                                }
                                else if($city4=="Columbus,OH"){
                                    echo "Columbus,OH";
                                }
                                 ?>"
                               
                                  class="form-control heading font-weight-normal ser_box"  placeholder="Enter City Or Zipcode" autocomplete="off"/>
                            </div>
       
                            <div id="countryList3" class="heading text-left bg-transparent" style="line-height:1.429;" >
                            </div>
                        </div> 
                    </div>    -->
                     <hr />
                    <div class="form-group">
                            <input type="submit" name="submitbtn" id="submitbtn" class="btn p-2 btn-sm mb-5 buttons font-weight-bold button_size2" value="Add" />
                    </div>
                </form>
            
            </div>
        	
    </div>
    </center>
</section>


</body>
</html>
<?php }?>
<script>

$(document).ready(function(){

$('#country').keyup(function(){
   var typingTimer; 
    var query=$('#country').val();
    if (query>=44101 && query<=44199){
        query="Cleveland,OH";
    }
    else if ((query>=45401 &&query<=45406)||(query>=45409 && query<=45417)||(query>=45419 && query<=45420)||(query>=45422 && query<=45424)||(query>=45428 && query<=45435)||(query>=45439 && query<=45441)||(query>=45448 && query<=45449)||(query>=45458 && query<=45459)||(query>=45469 && query<=45470)||(query>=45481 && query<=45482)||query==45490||query==45479||query==45475||query==45437||query==45426||query==45390){
        query="Dayton,OH";
    }
    else if (query>=43201 && query<=43270){
        query="Columbus,OH";
    }
    else if (query>=45201 && query<=45299){
        query="Cincinnati,OH";
    }
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
    // event.preventDefault();
    
    $(document).on('click','li',function(evt){
        // event.stopImmediatePropagation();
        // evt.preventDefault();
        // document.getElementById('country').onkeyup = null;
        
    $("#country").val($(this).text());
    // $('#country').val($(this).text());
    $('#countryList').fadeOut();
    // $( "#country" ).unbind( "keyup", handler );
    // onkeyup: false;
    // clearTimeout(typingTimer);
    
});
});



$('#country1').keyup(function(){
   
   var query=$(this).val();
   if (query>=44101 && query<=44199){
       query="Cleveland,OH";
   }
   else if ((query>=45401 &&query<=45406)||(query>=45409 && query<=45417)||(query>=45419 && query<=45420)||(query>=45422 && query<=45424)||(query>=45428 && query<=45435)||(query>=45439 && query<=45441)||(query>=45448 && query<=45449)||(query>=45458 && query<=45459)||(query>=45469 && query<=45470)||(query>=45481 && query<=45482)||query==45490||query==45479||query==45475||query==45437||query==45426||query==45390){
       query="Dayton,OH";
   }
   else if (query>=43201 && query<=43270){
       query="Columbus,OH";
   }
   else if (query>=45201 && query<=45299){
       query="Cincinnati,OH";
   }
   if (query !=''){
      $.ajax({
  url:"object/search.php",
  method:"POST",
  data:{query:query},
  success:function(data){
      $('#countryList1').fadeIn();
      $('#countryList1').html(data);
      
      

  }
      });

   }
   else{
       $('#countryList1').fadeOut();
       $('#countryList1').html("");
   }
//    event.preventDefault();
//    $(document).write()
   $(document).on('click','li',function(){
    // .off( "keyup", "#country1" );
    
    // event.stopImmediatePropagation();
    // evt.preventDefault();
    
    // $('#add').val($("helo");
    
   $('#country1').val($(this).text());
//    document.getElementById('country1').onkeyup = null;
   $('#countryList1').fadeOut();
//    $( "#country1" ).unbind( "keyup", handler );
    
//    $.validator.defaults.onkeyup.apply(this,arguments);
});
});
// $('#country1').keyup(function(){
//             return false;
//         });
//         $('#country').keyup(function(){
//             return false;
//         });



// $('#country2').keyup(function(){
   
//    var query=$(this).val();
//    if (query>=44101 && query<=44199){
//        query="Cleveland,OH";
//    }
//    else if ((query>=45401 &&query<=45406)||(query>=45409 && query<=45417)||(query>=45419 && query<=45420)||(query>=45422 && query<=45424)||(query>=45428 && query<=45435)||(query>=45439 && query<=45441)||(query>=45448 && query<=45449)||(query>=45458 && query<=45459)||(query>=45469 && query<=45470)||(query>=45481 && query<=45482)||query==45490||query==45479||query==45475||query==45437||query==45426||query==45390){
//        query="Dayton,OH";
//    }
//    else if (query>=43201 && query<=43270){
//        query="Columbus,OH";
//    }
//    else if (query>=45201 && query<=45299){
//        query="Cincinnati,OH";
//    }
//    if (query !=''){
//       $.ajax({
//   url:"object/search.php",
//   method:"POST",
//   data:{query:query},
//   success:function(data){
//       $('#countryList2').fadeIn();
//       $('#countryList2').html(data);
//   }
//       });

//    }
//    else{
//        $('#countryList2').fadeOut();
//        $('#countryList2').html("");
//    }
// });
// $(document).on('click','li',function(){
//    $('#country2').val($(this).text());
//    $('#countryList2').fadeOut();
// });


// $('#country3').keyup(function(){
   
//    var query=$(this).val();
//    if (query>=44101 && query<=44199){
//        query="Cleveland,OH";
//    }
//    else if ((query>=45401 &&query<=45406)||(query>=45409 && query<=45417)||(query>=45419 && query<=45420)||(query>=45422 && query<=45424)||(query>=45428 && query<=45435)||(query>=45439 && query<=45441)||(query>=45448 && query<=45449)||(query>=45458 && query<=45459)||(query>=45469 && query<=45470)||(query>=45481 && query<=45482)||query==45490||query==45479||query==45475||query==45437||query==45426||query==45390){
//        query="Dayton,OH";
//    }
//    else if (query>=43201 && query<=43270){
//        query="Columbus,OH";
//    }
//    else if (query>=45201 && query<=45299){
//        query="Cincinnati,OH";
//    }
//    if (query !=''){
//       $.ajax({
//   url:"object/search.php",
//   method:"POST",
//   data:{query:query},
//   success:function(data){
//       $('#countryList3').fadeIn();
//       $('#countryList3').html(data);
//   }
//       });

//    }
//    else{
//        $('#countryList3').fadeOut();
//        $('#countryList3').html("");
//    }
// });
// $(document).on('click','li',function(){
//    $('#country3').val($(this).text());
//    $('#countryList3').fadeOut();
// });
});

</script>
