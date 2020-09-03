<?php
// require_once("maintenance.php");
// maintenance(TRUE);
?>
<?php

session_start();
error_reporting(0);

include_once "config/database.php"; 
$database=new Database();
 $db = $database->getConnection();
$title="";
$meta_desc="";


// $data = "SELECT * FROM `meta_data` WHERE page_name like 'home'";
// $run = mysqli_query($con,$data);
// while($row=mysqli_fetch_array($run)){
//     $title = $row['title']; 
//     $meta_desc = $row['meta_desc'];
// } 
$sqq ="SELECT * FROM meta_data WHERE page_name = 'lawyerdemo' ";
                
                $quey= $db->prepare($sqq);

                // // posted values
              
                // $query->bindParam(":id", $this->state);
                // $query->bindParam(":Catogory", $this->Catogory);
                $quey->execute();
                $resu=$quey->fetchAll(PDO::FETCH_OBJ);
                $row = $quey->fetch(PDO::FETCH_ASSOC);
                if($quey->rowCount() > 0)
                {
                    foreach($resu as $resul){
                       $title =htmlentities($resul->title);
                       $meta_desc = htmlentities($resul->meta_desc);
                       
                    }
                }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="msvalidate.01" content="8B265896C88DF7D5ADC560D97D5B8052" />
    <!--yandex-->
    <meta name="yandex-verification" content="0beccc11dc0dc9cb" />

<title><?php echo $title; ?> </title>

<link rel="shortcut icon" type="image/x-icon" href="/favicon.png" />
<base href="https://affordablelegalhelp.com/lawyer_democopy.php">


    <meta name="robots" content="noindex,nofollow" />
    <!--<meta name="googlebot" content="noindex" />-->
    
    
<meta name="viewport" content="width=device-wdth, initial-scale=1.0" />
<!--#Libraries file#-->
<?php include "libs.php"; ?>


</head>

<body class="font1 bg-light">

<?php include_once "header.php"; ?>

<section class="bg-white container text-center mb-5 mt-5">
	<br />
    <div class="alert text-secondary alert-success mb-5 texts container-fluid font-weight-normal size15">
    
        Great news, we have successfully connected you with National Legal Help. For immediate assistance with your case, contact the provider listed below.
    </div>
    
    <div class="col-12 pb-5">

    <div class="row">
    <?php 
                $database=new Database();
                $db = $database->getConnection();
                $idhash=$_GET['idhash'];      
                // echo $idhash;                                    
                $sql ="SELECT * from lawyer_profile where lawyer_profile.idhash=:idhash";
                $query = $db -> prepare($sql);
                $query-> bindParam(':idhash', $idhash, PDO::PARAM_STR);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                $cnt=1;
                if($query->rowCount() > 0)
                {
                foreach($results as $result)
                {	
            ?>
        <div class="card col-11 col-lg-4 col-md-4 col-sm-12 p-0 m-3">
            <img src="https://affordableattorneyleads.com/img/Lawyer/<?php echo htmlentities($result->Picture);?>" alt="Family Law img" class="img-fluid images" />
            <?php 
					$Name=htmlentities($result->Name);
					$or=htmlentities($result->Organization);
					$Emai=htmlentities($result->Email);
					$pa=htmlentities($result->Password);
					$Contac=htmlentities($result->Contact);
					$stat=htmlentities($result->state);
					$Zipcod=htmlentities($result->Zipcode);
					$Descrip=htmlentities($result->Description);
					$Cat=htmlentities($result->Catogory);
					}
				}?>
            <div class="card-body text-left">
                <h2 class="font-weight-normal card-title fontb text-dark size42"><?php echo "$Name";?></h2>
                <p class="text-secondary font-weight-normal size15"> <?php echo "$or";?></p>
                <p class="text-secondary font-weight-normal size15"><?php echo "$Emai";?></p>
                <p class="text-secondary font-weight-normal size15"><?php echo "$Contac";?> </p>
                <p class="text-secondary font-weight-normal size15"><?php echo "$Zipcod";?></p>
                <p class="font-weight-normal text-dark heading">Servicing Areas </p>
                <p class="text-secondary font-weight-normal size15"><?php echo $Cat ." ";?></p>
                
            </div>
        </div>
        
        <div class="mb-5 col-12 col-lg-7 col-md-7 col-sm-12">
            <div class="text-left m-1 mt-2">
                <h1 class="font-weight-normal fontb text-dark" style="font-size:42px;"><?php echo $Cat ." ";?> Legal Help</h1><hr />
                <p class="text-secondary font-weight-normal size15 decor">
                <?php echo $Descrip?>
                </p>
            </div>
        </div>
        
    </div>
    </div>
</section>
<?php 
$_SESSION = array();
if (ini_get("session.use_cookies"))
{
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 60*60,
    $params["path"], $params["domain"],
    $params["secure"], $params["httponly"]
    );
}
    unset($_SESSION['city']);
    unset($_SESSION['cato']);
    unset( $_SESSION['Namess']);
    unset( $_SESSION['organization1']);
    unset( $_SESSION['catog']);
    unset( $_SESSION['Email1']);
    unset( $_SESSION['PhoneNo1']);
    unset( $_SESSION['ZipCode1']);
    unset( $_SESSION['des']);
    unset( $_SESSION['total']);
    unset( $_SESSION['leads']);
    unset( $_SESSION['dummy']);
?>

<?php include_once "footer.php"; ?>



<?php include "libs2.php"; ?>


</body>
</html>