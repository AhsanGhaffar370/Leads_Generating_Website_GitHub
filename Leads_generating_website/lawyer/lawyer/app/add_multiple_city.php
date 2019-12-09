<?php include_once "config/database.php";
include_once "object/login.php";
?>
<?php
// include_once "config/database.php";
session_start();
error_reporting(0);
include('includes/config.php');
// $idd=$_SESSION['id'];
$id=$_SESSION['id'];
$count=1;
if (strlen($_SESSION['Catogory'])==0){
    header('location:login');
}
if(strlen($_SESSION['Lawyerlogin'])==0)
	{	
header('location:login');
}
else{
    
    if ((strlen($_SESSION['Catogory'])==0) && (strlen($_SESSION['Catogory2'])==0) && (strlen($_SESSION['Catogory3'])==0) && (strlen($_SESSION['Catogory4'])==0) ){
        header('location:update-profile');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add city</title>
<link rel="shortcut icon" type="image/x-icon" href="https://affordableattorneyleads.com/growth.png" />
  <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>-->
		<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />-->
		<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
        
<style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    color:rgb(0,0,0);
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>
        
  
</head>
<?php include_once "libs.php"; ?>

<script src="client_validate.js"></script>

<?php 

$database=new Database();
$db = $database->getConnection();
$sign=new Signup($db);
if (isset($_POST['submitbtn']) ){
    $sign->city=$_POST['country'];
    $sign->id_fk=$id;
    $id_fk=$id;
    
    $city=$_POST['country'];
$sqll="INSERT into lawyer_city SET city=:city,id_fk=:id_fk";
$que = $db->prepare($sqll);
$que->bindParam(':city',$city);
$que->bindParam(':id_fk',$id_fk);
if ($sign->lawyercityExist()){
    
    $msg="City Already Inserted";
}
else{
    if ($que->execute()){
        $msg= "City Updated";
    }
  
}

}
if(isset($_GET['del']))
{
$id=$_GET['del'];
$sql = "delete from lawyer_city  WHERE id=:id";
$query = $db->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> execute();

}
?>
<body class="bg-light">
    
<?php include_once "dashboard_header.php"; ?>
    
<br><br><br>    
<section class="pl-2 pr-2">
    <div class="container bg-white text-center text-black dash pt-2 mt-5 mb-5 border-light border-right border-left border-top border-bottom">
        
        <?php include_once "balance_status.php" ?>   
        <h4 class="text-left pl-5 font-weight-bold p-3" style="background-color:#d1ecf1; color:#0c5460;">Add cities/zipcodes </h4>
        <center>
        <div class="container">
            	
                <div class="col-12 col-lg-7  col-md-10 col-sm-12">
                <?php if($error){?>
    				<div class="errorWrap">
    				<strong>ERROR</strong>:
    				<?php
    				echo htmlentities($error);
    				?>
    				</div>
    				<?php } 
    				else if($msg){
    					?>
    					<div class="succWrap">
    					<!-- <strong>SUCCESS</strong>: -->
    					<?php echo htmlentities($msg);
    					?> 
    					</div>
    				<?php }?>
                    <form class="form1"  method="post" >
                    
                       
                        
                            <div class="form-group text-left">
                            <label class="mt-3 font-weight-bold" id="add">Add City</label>
                            <div class="row">
                                <div class="col-12 col-lg-11 col-md-11 col-sm-12  pr-0 pl-0">
                                    <input type="text" name="country" id="country" class="form-control heading font-weight-normal ser_box"  placeholder="Enter City Or Zipcode" autocomplete="off"/>
                                </div>
                            
                                <!-- <div class="col-12 col-lg-1 col-md-1 col-sm-12 pr-0 pl-0 text-right ">
                                    <input type="button" name="b" id="b" class="btn pt-2 pb-2 btn-lg mb-5 ml-1 btn-info font-weight-bold" value="+" />
                           
                                </div> -->
                                <div id="countryList" class="heading text-left bg-transparent" style="line-height:1.429;" >
                                </div>
                            </div>
                        </div>
                         <hr />
                        <div class="form-group">
                                <input type="submit" name="submitbtn" id="submitbtn" class="btn p-2 btn-sm mb-5 buttons font-weight-bold button_size2" value="Add" />
                        </div>
                    </form>
                    <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
    							<th>City</th>
    						    <th>Action</th>
    						</tr>
    					</thead>
    					<tbody>
                            <?php 
                                $id_fk=$id;
                                $sqlss = "SELECT * from  lawyer_city where id_fk=:id_fk ";
                                $q = $db -> prepare($sqlss);
    
                                $q->bindParam(":id_fk", $id_fk);
                                $q->execute();
                                $r=$q->fetchAll(PDO::FETCH_OBJ);
                                $cnt=1;
                                if($q->rowCount() > 0)
                                {
                                foreach($r as $re)
                                {				
                            ?>	
    						    <tr>
                                    <td><?php echo htmlentities($cnt);?></td>
                                    <td><?php echo htmlentities($re->city);?></td>
                                    <td>
                                    <a href="add_multiple_city.php?del=<?php echo $re->id;?>" onclick="return confirm('Do you want to delete');"><i class="fa fa-close"></i></a></td>
    							</tr>
    								<?php $cnt=$cnt+1; }} ?>
    										
    					</tbody>
    				</table>
    
                    
                </div>
            	
        </div>
        </center>
    </div>
</section>

<?php include_once"tidio_chat.php" ?> 
</body>
</html>
<?php }?>
<script>

$(document).ready(function(){

$('#country').keyup(function(){
   var typingTimer; 
    var query=$('#country').val();
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
