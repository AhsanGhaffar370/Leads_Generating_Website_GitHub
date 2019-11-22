<?php

session_start();
error_reporting(0);

include_once "config/database.php"; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Assigned lawyer</title>

<link rel="shortcut icon" type="image/x-icon" href="favicon.png" />
<base href="http://localhost/final/Leads_generating_website/lawyer_assign.php">

<!--#####################################Libraries file##########################################-->
<?php include "libs.php"; ?>
<script src="client_validate.js"></script>

</head>

<body>

<?php include_once "header.php"; ?>



<section class="container bg-light  law_services text-center text-dark">
    
    <div class="row rowsetting1">
    <div class="alert alert-success mt-4 xs_texts">Great news, we have successfully connected you with a family Law attorney that serves your local area. For immediate assistance with your case, contact the provider listed below.
  </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-12 d-block mb-3">	
            <div class="card  bg-light set_img">
                <div class="row">
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

                               
                                        <img src="img/Lawyer/<?php echo htmlentities($result->Picture);?>" class="images" width="100%" height="50%" >

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
                                        }
                                        ?>
                            </div>
                        </div>
                        <div class="card-body text-left text-dark texts">
                            <?php 
                            // $ID=$_SESSION['ID1'];
                            //     $Names=$_SESSION['Namess'];
                            //     $orga=$_SESSION['organization1'];
                            //     $ca=$_SESSION['catog'];
                            //     $email=$_SESSION['Email1'];
                            //     $phon=$_SESSION['PhoneNo1'];
                            //     $zip=$_SESSION['ZipCode1'];
                            //     $des=$_SESSION['des'];


                                echo "$Name"."<br/>"."$or"."<br/>"."$Emai"."<br/>"."$Contac"."<br/>"."$Zipcod";
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
                    <div class="d-block"><h1 class="search_heading_settings xl_heading"><?php echo $Cat ." ";?>Legal Help</h1></div>
                <hr />
                    <p><?php echo $Descrip?></p>
                </div></form>
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