<?php
include_once "config/database.php";
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['Lawyerlogin'])==0)
	{	
header('location:login');
}
else{
?>
<?php include_once "config/database.php"; 

// include_once "object/login.php";
// session_start();
// error_reporting(0);
// include('includes/config.php');
// if(strlen($_SESSION['alogin'])==0)
// 	{	
// header('location:index.php');
// }
// else{ 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="msvalidate.01" content="8B265896C88DF7D5ADC560D97D5B8052" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Profile image</title>
        
<!--#####################################Libraries file##########################################-->
<?php include "libs.php"; ?>

<script async src="client_validate.js"></script>
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


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-142213622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-142213622-3');
</script>


</head>
<body>

<?php include_once "dashboard_header.php" ; ?>


<?php

$database=new Database();
$db = $database->getConnection();
if(isset($_POST['update']))
{
$Picture=$_FILES["img1"]["name"];
$id=$_SESSION['id'];

// $Catogory = $_POST['Catogary'];
move_uploaded_file($_FILES["img1"]["tmp_name"],"img/Lawyer/".$_FILES["img1"]["name"]);
$sql="update lawyer_profile set Picture=:Picture,Catogory=:Catogory where id=:id";
$query = $db->prepare($sql);
$query->bindParam(':Picture',$Picture,PDO::PARAM_STR);
$query->bindParam(':Catogory',$Catogory,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();

$msg="Image updated successfully";



}
?>
<br/><br/><br/><br/>
<section class="container mt-5">
<div class="ts-main-content">
<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title font-weight-bold" style="font-size:24px;">Change Profile Image </h2>

						<div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
									<div class="panel-heading"></div>
									<div class="panel-body">
									<?php if($error)
                {?>
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
                    <strong>SUCCESS</strong>:
                    <?php echo htmlentities($msg);
                     ?> 
                     </div>
                     <?php }?>
										<form method="post" class="form-horizontal" enctype="multipart/form-data">
										
											
					


<!-- <div class="form-group">
												<label class="col-sm-4 control-label">Current Image</label> -->
<?php 
$id=$_SESSION['id'];//intval($_GET['imgid']);
$sql ="SELECT Picture from lawyer_profile where lawyer_profile.id=:id";
$query = $db -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	
    ?>

<div class="col-sm-8">
<img src="img/Lawyer/<?php echo htmlentities($result->Picture);?>" width="300" height="200" style="border:solid 1px #000">
</div>
<?php 
}}
?>
</div>

											<div class="form-group">
												<label class="col-sm-4 control-label">Upload New Image <span style="color:red">*</span></label>
												<div class="col-sm-8">
											<input type="file" name="img1" required>
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-8">
												
												</div>
											</div>


											<div class="hr-dashed"></div>
											
											
								
											
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">
								
													<button class="btn btn-primary" name="update" type="submit">Update</button>
												</div>
											</div>

										</form>
										
										<!-- <form class="ser-city" method="post" >
										<select name="Catogary" id="Catogary" >
												<option value="">Select a Catogory...</option>
												<option value="Family">Family Law</option>
												<option value="Estate">Estate Planning</option>
												<option value="Immigration">Immigration</option>
												
												<option value="Bankruptchy">Bankruptchy</option>
												
												</select>
												<button class="btn btn-primary" name="update" type="submit">Update</button>
												
</form> -->

									</div>
								</div>
							</div>
							
						</div>
						
					

					</div>
				</div>
				
			
			</div>
		</div>
	</div>
</div>
</section>
<?php include_once "dashboard_footer.php" ; ?>
</body>
</html>

<?php }?>