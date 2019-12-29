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
<?php 
include_once "config/database.php"; 
        
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Profile</title>
<link rel="shortcut icon" type="image/x-icon" href="https://affordableattorneyleads.com/site_icon.png" />

<!--#####################################Libraries file##########################################-->
<?php include "libs.php"; ?>

<script src="client_validate.js"></script>

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
<body>
<!-- <?php include_once "dashboard_header.php" ; ?> -->

<?php 

$database=new Database();
$db = $database->getConnection();

if(isset($_POST['submit']))
{
$Description=$_POST['desciption'];
$Catogory=$_POST['cat'];
$cit=$_POST['city'];
// $id=$_SESSION['id'];//intval($_GET['id']);
$id=1;

    
                        $sql = "SELECT `city` 
                                FROM `city` 
                                WHERE `id` = '" . $id. "' 
                                 
                                ORDER BY `id` ASC";

                        $stmt = $db -> prepare($sql);
                        $stmt -> execute();
                        $array = $stmt -> fetchAll(PDO::FETCH_ASSOC);
$count=0;
                        foreach($array as $row) {
                            // $category[] =$row['city'];
                            
                        $c = explode(',', $row['city']);
                        echo $c[0]."<br>";
                        $count++;
                            // echo $row['city'];
                        }
                        $co=count($c);
                        echo $co;
                        // echo $count;
                        for ($i=0;$i<$co;$i++){
                            echo $c[$i]."<br>";
                        }
                        
                        // $subcategory = implode(',', $category);
                        // echo $subcategory;
    

// echo $cit;
// $city=implode(",",$cit);
// echo $city;
// // $sql=mysql_query("insert into flatdetails(city) value ('$r')")
// $sql="update city set city=:city where id=:id";
// $query = $db->prepare($sql);
// $query->bindParam(':city',$Catogory,PDO::PARAM_STR);

// // $query->bindParam(':Description',$Description,PDO::PARAM_STR);

// $query->bindParam(':id',$id,PDO::PARAM_STR);
// $query->execute();

// $msg="Data updated successfully";



// $_SESSION['Catogory']=$Catogory;

}
?>

<br/><br/><br/><br/>
<section class="container con_services11 bg-light text-center text-white-50 mt-5 font-weight-bold" style="font-size:24px;">
    <h1 class="text-dark">Update Profile</h1>
    
    <div class="row rowsetting1">
    
        <div class="col-lg-10 col-md-10 col-sm-10 col-12 d-block m-auto text-left">
            <div class="d-block m-auto text-left">
                <div class="contact-form1" >
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
                    <?php
                    //  echo htmlentities($msg);
                        echo htmlentities($msg)
                     ?> 
                     </div>
                     <?php }?>
                    <div class="form-group ">
                        
<label class="mt-4 text-dark font-weight-bold">Lawyer Category</label><br/>
<a href="change-images" ><input type="button" class="btn btn-info  text-black btn-md" value="Select Img" /></a>
                    
<form name="cats" method="post">
<label class="mt-4 text-dark font-weight-bold">City</label><br/>
<input type="text" name="city"/>
<label class="mt-4 text-dark font-weight-bold">Lawyer Category</label><br/>
<select name="cat" id="cat" placeholder="Choose Category.." >
                      
                            <option value="">Select category...</option>
                            <option value="Family" <?php if($opt=="Family") echo 'selected="selected"'; ?> class="opt1">Family Law</option>
                            <option value="State" <?php if($opt=="State") echo 'selected="selected"'; ?>>State Law</option>
                            <option value="Immigiration" <?php if($opt=="Immigiration") echo 'selected="selected"'; ?>>Immigiration Law</option>
                            <option value="Bankruptcy" <?php if($opt=="Bankruptcy") echo 'selected="selected"'; ?>>Bankruptcy</option>
                            
                         </select>

                         
                         <div class="hr-dashed">
                         </div>

                         <div class="form-group">
<div>
<label class="mt-4 text-dark font-weight-bold mt-3">Description</label><br/>
<textarea class="form-control" name="desciption" rows="5" ><?php echo htmlentities($result->Description);?></textarea>
</div>
</div>
<button class="btn btn-primary" name="submit" type="submit" >Save changes</button>

</form>
                    </div>
                    
                    <br />
                
                </div>
            <hr />
        </div>
        
    </div>
</section>




<?php include_once"tidio_chat.php" ?> 
</body>
</html>

<?php }?>