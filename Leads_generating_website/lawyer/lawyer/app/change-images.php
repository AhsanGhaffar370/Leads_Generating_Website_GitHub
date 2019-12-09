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

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Update Profile</title>
<link rel="shortcut icon" type="image/x-icon" href="https://affordableattorneyleads.com/growth.png" />
        
<!--#####################################Libraries file##########################################-->
<?php include "libs.php"; ?>

<script src="client_validate.js"></script>
</head>
<body class="bg-light">

<?php include_once "dashboard_header.php" ; ?>


<?php

$database=new Database();
$db = $database->getConnection();
if(isset($_POST['update']))
{
$Picture=$_FILES["img1"]["name"];
if ($Picture!=""){
$id=$_SESSION['id'];
$Picture_ext=pathinfo($Picture,PATHINFO_EXTENSION);
$Picture=pathinfo($Picture,PATHINFO_FILENAME);
$Picture=$Picture."_".date("mjYHis").".".$Picture_ext;

// $Catogory = $_POST['Catogary'];
move_uploaded_file($_FILES["img1"]["tmp_name"],"../img/Lawyer/".$Picture);
$sql="update lawyer_profile set Picture=:Picture where id=:id";
$query = $db->prepare($sql);
$query->bindParam(':Picture',$Picture,PDO::PARAM_STR);
// $query->bindParam(':Catogory',$Catogory,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();
}
$Description=$_POST['desciption'];
$Catogory=$_POST['law1'];
$Catogory2=$_POST['law2'];
$Catogory3=$_POST['law3'];
$Catogory4=$_POST['law4'];



$sq="update lawyer_profile set Catogory=:Catogory,Catogory2=:Catogory2,Catogory3=:Catogory3,Catogory4=:Catogory4,Description=:Description where id=:id ";
$que = $db->prepare($sq);
$que->bindParam(':Catogory',$Catogory,PDO::PARAM_STR);
$que->bindParam(':Catogory2',$Catogory2,PDO::PARAM_STR);
$que->bindParam(':Catogory3',$Catogory3,PDO::PARAM_STR);
$que->bindParam(':Catogory4',$Catogory4,PDO::PARAM_STR);

$que->bindParam(':Description',$Description,PDO::PARAM_STR);

$que->bindParam(':id',$id,PDO::PARAM_STR);
$que->execute();
// $msg="Data updated successfully";
$_SESSION['Catogory']=$Catogory;
$_SESSION['Catogory2']=$Catogory2;
$_SESSION['Catogory3']=$Catogory3;
$_SESSION['Catogory4']=$Catogory4;
$msg="Updated successfully";
echo "<script type='text/javascript'>
        
        document.location = 'dashboard'; </script>";


}
?>
<br><br>
<section class="container bg-white text-center text-black dash pt-2 mt-5 mb-5 border-light border-right border-left border-top border-bottom">
    <div class="">
          
        <h4 class="text-left pl-5 font-weight-bold p-3 mt-5" style="background-color:#d1ecf1; color:#0c5460;">Update Profile </h4>
        <div class="alert alert-primary text-left mb-4 xs_texts container font-weight-normal text-secondary">
            <i class="fas fa-info-circle text-info"> </i>
            Fill your personal information below. The information you provide will be shown to those people who are searching for an attorney in your local area
        </div>
        
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
            	
                <form class="payment-form1" method="POST"  enctype="multipart/form-data">
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
                
                    <div class="form-group text-left">
                    
                        <label class="mt-3 font-weight-bold">Profile Image:</label><br>
                        <img src="https://affordableattorneyleads.com/img/Lawyer/<?php echo htmlentities($result->Picture);?>" width="300" height="200" style="border:solid 1px #000">
                        
                    </div>
                    
                    <?php }} ?>
    				<?php
    					$id=$_SESSION['id'];
    					$sql ="SELECT * FROM lawyer_profile WHERE id=:id";
    					$query= $db->prepare($sql);
    					$opt="";
    					// // posted values
    					$query->bindParam(":id", $id);
    					$query->execute();
    					$results=$query->fetchAll(PDO::FETCH_OBJ);
    					$row = $query->fetch(PDO::FETCH_ASSOC);
    					if($query->rowCount() > 0)
    					{
    						foreach($results as $result){
    
                               $opt=htmlentities($result->Catogory);
                               $Catogory2=htmlentities($result->Catogory2);
                               $Catogory3=htmlentities($result->Catogory3);
                               $Catogory4=htmlentities($result->Catogory4);
                               $Descriptio=htmlentities($result->Description);
    						}
    					}
    				?>
                    
                    <div class="form-group text-left">
                        <input type="file" name="img1" >
                    </div>
                    
                    <div class="form-group text-left pb-0 mb-0">
                        <label class="mt-3 font-weight-bold">Category:</label>
                    </div>
                    
                    <div class="form-group p-2 text-left border-top border-bottom border-left border-right col-lg-6 col-md-8 col-sm-10 col-12">
                        
                        <input type="checkbox" name="law1" value="Family" <?php if($opt=="Family") echo 'Checked';?>>Family Law<br>
                        <input type="checkbox" name="law2" value="Bankruptcy" <?php if($Catogory2=="Bankruptcy") echo 'Checked';?>> Bankruptcy <br>
                        <input type="checkbox" name="law3" value="Immigration" <?php if($Catogory3=="Immigration") echo 'Checked';?>> Immigration <br>
                        <input type="checkbox" name="law4" value="Estate" <?php if($Catogory4=="Estate") echo 'Checked';?>> Estate Planning <br>
                        
                        <!--
                        <select name="cat" id="cat" class="form-control" placeholder="Choose Category.." >
                            <option value="">
                            	Select category...
                            </option>
                            <option value="Family"<?php if($opt=="Family") echo 'selected="selected"';?> class="opt1">
                            	Family Law
                            </option>
                            <option value="State" <?php if($opt=="State") echo 'selected="selected"'; ?>>
                            	State Law
                            </option>
                            <option value="Immigiration" <?php if($opt=="Immigiration") echo 'selected="selected"'; ?>>
                            	Immigiration Law
                            </option>
                            <option value="Bankruptcy" <?php if($opt=="Bankruptcy") echo 'selected="selected"'; ?>>
                            	Bankruptcy
                            </option>
                        </select>
                        -->
                        
                    </div>
                    
                    <div class="form-group text-left">
                   
                        <label class="mt-3 font-weight-bold">Description:</label>
                        <textarea class="form-control" placeholder="This description will appear on your profile page" name="desciption" rows="5" ><?php echo $Descriptio ;?></textarea>
                    </div>   
                     <hr />
                    <div class="form-group">
                            <input type="submit" name="update" id="update" class="btn p-2 btn-sm mb-5 buttons font-weight-bold button_size2" value="Update"  onclick="window.location.href='dashboard'"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include_once"tidio_chat.php" ?> 
</body>
</html>

<?php }?>