<?php

session_start();
error_reporting(0);

include_once "config/database.php"; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="msvalidate.01" content="8B265896C88DF7D5ADC560D97D5B8052" />
<title>Assigned lawyer | Affordable legal Help </title>

<link rel="shortcut icon" type="image/x-icon" href="favicon.png" />
<base href="https://affordablelegalhelp.com/lawyer_assign.php">
   
    <meta name="description" content="Our team is standing by and ready to hear about the ways we can support you with our legal services. Affordable lawyers ARE out there! Reach out today.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--#####################################Libraries file##########################################-->
<?php include "libs.php"; ?>
<script async src="client_validate.js"></script>

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

<?php include_once "header.php"; ?>

<section class="bg-white container text-center mb-5 mt-5">
	<br />
    <div class="alert alert-success mb-5 xs_texts container-fluid">
        Great news, we have successfully connected you with National Legal Help. For immediate assistance with your case, contact the provider listed below.
    </div>
    
    <div class="col-12 pb-5">
    <div class="row">
    	<form method="post" class="form-horizontal" enctype="multipart/form-data">
			<?php 
                $database=new Database();
                $db = $database->getConnection();
                $idhash=$_GET['idhash'];                                                 //1
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
            <div class="card col-12 col-lg-4 col-md-4 col-sm-12 border-0">
                <img src="https://affordableattorneyleads.com/img/Lawyer/<?php echo htmlentities($result->Picture);?>" alt="family law img" class="img-fluid images" >
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
                	
                        <!-- 2-->
                        
                    <h1 class="font-weight-bold card-title home_heading_settings xl_heading" >
                    	<?php echo "$Name";?>
                    </h1>
                    <p class="xxs_texts">
                    	 <?php echo "$or";?>
                    </p>
                    <p class="xxs_texts">
                    	 <?php echo "$Emai";?> 
                    </p>
                    <p class="xxs_texts">
                    	 <?php echo "$Contac";?> 
                    </p>
                    <p class="xxs_texts">
                    	 <?php echo "$Zipcod";?> 
                    </p>
                    <p class="texts font-weight-bold">Servicing Areas</p>
                    <p class="xxs_texts"><?php echo $Cat ." ";?></p>
                </div>
            </div>
            
            <div class="mb-5 col-12 col-lg-8 col-md-8 col-sm-12">
                <div class="text-left m-1 mt-2">
                    <h1 class="font-weight-bold home_heading_settings xl_heading"><?php echo $Cat ." ";?>Legal Help</h1><hr />
                    <p style="text-align:justify;" class="xs_texts">
                        <?php echo $Descrip?>
                    </p>
                </div>
            </div>
		</form>            
        
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
</body>
</html>


<!--


<section class="container bg-light  law_services text-center text-dark">
    <div class="alert alert-success mt-4 xs_texts">
        	Great news, we have successfully connected you with a Law attorney that serves your local area. For immediate assistance with your case, contact the provider listed below.
  	</div>
    <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-5 col-12 d-block mb-3">	
            <div class="card bg-light set_img">
            	<div class="col-md-12 ">
					<div class="panel panel-default">
						<div class="panel-body">
							<form method="post" class="form-horizontal" enctype="multipart/form-data">
								<?php 
                                    $database=new Database();
                                    $db = $database->getConnection();
                                    $idhash=$_GET['idhash'];
									// $ret="select * from lawyer_profile where id=:id";
                                    // $query= $db->prepare($ret);
                                    // $query->bindParam(':id',$id, PDO::PARAM_STR);
                                    // $query-> execute();
                                    // $results = $query -> fetchAll(PDO::FETCH_OBJ);
                                    // $id=$_SESSION['ID1'];//intval($_GET['imgid']);
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
								<img src="img/Lawyer/<?php echo htmlentities($result->Picture);?>" class="images" width="70%" height="50%">
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
                        <div class="card-body text-left text-dark texts">
                            <?php echo "$Name"."<br/>"."$or"."<br/>"."$Emai"."<br/>"."$Contac"."<br/>"."$Zipcod";
                            // $ID=$_SESSION['ID1'];
                            //     $Names=$_SESSION['Namess'];
                            //     $orga=$_SESSION['organization1'];
                            //     $ca=$_SESSION['catog'];
                            //     $email=$_SESSION['Email1'];
                            //     $phon=$_SESSION['PhoneNo1'];
                            //     $zip=$_SESSION['ZipCode1'];
                            //     $des=$_SESSION['des'];
							?>
                            <h3 class="text-danger"></h3>
                            <h4 class="heading">Practice Law</h4>
                            <p class="texts"><?php echo $Cat ." ";?>Lawyer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="child_block col-lg-7 col-md-7 col-sm-7 col-12 d-block text-left">
            <div class="d-block">
            	<h1 class="search_heading_settings xl_heading"><?php echo $Cat ." ";?>Legal Help</h1><hr />
            </div>
                
                    <p><?php echo $Descrip?></p>
                </div></form>
    </div>   
</section>
    -->