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
$id=$_SESSION['id'];
$Picture_ext=pathinfo($Picture,PATHINFO_EXTENSION);
$Picture=pathinfo($Picture,PATHINFO_FILENAME);
$Picture=$Picture."_".date("mjYHis").".".$Picture_ext;

// $Catogory = $_POST['Catogary'];
move_uploaded_file($_FILES["img1"]["tmp_name"],"img/Lawyer/".$Picture);
$sql="update lawyer_profile set Picture=:Picture where id=:id";
$query = $db->prepare($sql);
$query->bindParam(':Picture',$Picture,PDO::PARAM_STR);
// $query->bindParam(':Catogory',$Catogory,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();
$Description=$_POST['desciption'];
$Catogory=$_POST['cat'];


$sq="update lawyer_profile set Catogory=:Catogory,Description=:Description where id=:id ";
$que = $db->prepare($sq);
$que->bindParam(':Catogory',$Catogory,PDO::PARAM_STR);

$que->bindParam(':Description',$Description,PDO::PARAM_STR);

$que->bindParam(':id',$id,PDO::PARAM_STR);
$que->execute();
// $msg="Data updated successfully";
$_SESSION['Catogory']=$Catogory;

$msg="Updated successfully";

}
?>
<br><br>
<section class="container bg-white text-center text-black dash pt-2 mt-5 mb-5 border-light border-right border-left border-top border-bottom">
          
    <h4 class="text-left pl-5 font-weight-bold p-3 mt-5" style="background-color:#d1ecf1; color:#0c5460;">Update Profile </h4>
    
    <div class="container">
        <center>
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
                    
                        <label class="mt-3">Profile Image:</label><br>
                        <img src="img/Lawyer/<?php echo htmlentities($result->Picture);?>" width="300" height="200" style="border:solid 1px #000">
                        
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
							   $state=htmlentities($result->state);
							   $city2=htmlentities($result->city2);
							   $city3=htmlentities($result->city3);
							   $city4=htmlentities($result->city4);
							}
						}
					?>
                    
                    <div class="form-group text-left">
                        <input type="file" name="img1" required>
                    </div>
					<div class="form-group text-left">
						<label class="mt-3">City: </label>  
            
						<label class="mt-3"><?php echo $state .", ".$city2." ".$city3." ".$city4;  ?></label>  
                    </div>
                    <div class="form-group text-left">
                        <label class="mt-3 pb-2">Category:</label><br>
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
                        
                    </div>
                    
                    <div class="form-group text-left">
                        <label class="mt-3">Description:</label>
                        <textarea class="form-control" name="desciption" rows="5" ><?php echo htmlentities($result->Description);?></textarea>
                    </div>   
                     <hr />
                    <div class="form-group">
                            <input type="submit" name="update" id="update" class="btn p-2 btn-sm mb-5 buttons font-weight-bold button_size" value="Update" />
                    </div>
                </form>
            </div>
        	</center>
    </div>
</section>

</body>
</html>

<?php }?>