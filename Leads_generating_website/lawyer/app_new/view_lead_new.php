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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lead Info | Affordable Attorney Leads </title>
<link rel="shortcut icon" type="image/x-icon" href="https://affordableattorneyleads.com/site_icon.png" />
</head>
    <?php include "libs.php"; ?>
    
<body class="bg-light">

<?php include_once "dashboard_header.php"; ?>
<?php
$database=new Database();
    $db = $database->getConnection();
    // $_SESSION['iddd']=$_GET['id'];
    // $ii=$_SESSION['iddd'];
    // $id=$_GET['id'];
    // $i=$_GET['id'];
    if ($iii!=''){
      $id=$iii;
    }
    else{
      $id=$_GET['id'];
    }
    
// if(isset($_POST['save2']))
// {
    
//     $note=$_POST['note'];

//     $sql="update customer_info set note=:note where id=:id";
//     $query = $db->prepare($sql);
//     $query->bindParam(':note',$note);
//     $query->bindParam(':id',$id);
    
    
//     if ($query->execute()){
//         // echo " update ";
//     }
//     else{
//         // echo "not ";
//     }


// }
if(isset($_POST['save']))
{
    
    $note=$_POST['note'];
    $dt = new DateTime('now', new DateTimezone('America/New_York'));
    $da=$dt->format('F j, Y, g:i a');
  
    $date=$da;
    $id_fk=$id;

    $sql="insert into customer_info_notes set id_fk=:id_fk,date=:date,note=:note ";
    $query = $db->prepare($sql);
    $query->bindParam(':id_fk',$id_fk);
    $query->bindParam(':date',$date);
    
    $query->bindParam(':note',$note);
    // $query->bindParam(':id',$id);
    
    
    if ($query->execute()){

        echo " update ";
    }
    else{
        echo "not ";
    }


}
if(isset($_GET['del']))
{
$id=$_GET['del'];

$s = "SELECT id_fk from  customer_info_notes where id = $id ";
	$q = $db -> prepare($s);
	$q->execute();
    $r=$q->fetchAll(PDO::FETCH_OBJ);
    $iii="";
    
	// $cnt=1;
	// $opt="";
	if($q->rowCount() > 0)
	{
        foreach($r as $res)
        {	$iii=htmlentities($res->id_fk);
        }
    }

$sql = "delete from customer_info_notes  WHERE id=:id";
$query = $db->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> execute();
// $iddd=204;
echo "<script type='text/javascript'> document.location = 'view_lead_new.php?id=$iii'; </script>";
}
?>
<?php
    
    $sql = "SELECT * from  customer_info where id = $id ";
	$query = $db -> prepare($sql);
	$query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $name="";
    $email="";
    $phone="";
    $cat="";
    $matter="";
    $city="";
    $note="";
    
	// $cnt=1;
	// $opt="";
	if($query->rowCount() > 0)
	{
        foreach($results as $result)
        {	$idd=htmlentities($result->ID);	
            $name=htmlentities($result->Name);
            $email=htmlentities($result->Email);
            $phone=htmlentities($result->PhoneNo);
            $city=htmlentities($result->State);
            $cat=htmlentities($result->Lawyer_category);
            $matter=htmlentities($result->legal_matter);
            $status=htmlentities($result->status);
            $note=htmlentities($result->note);

        }
    }
    
    ?>
<br><br><br>
<section class="container bg-white text-center text-black pt-2 mt-5 mb-5 border-light border-right border-left border-top border-bottom">
    <?php include_once"balance_status.php" ?>      
    <h4 class="text-left pl-5 font-weight-bold p-3" style="background-color:#d1ecf1; color:#0c5460;">Lead Details </h4>
    
    
    <div class="container">
            <div class="mt-2  bg-white  font-weight-medium col-lg-10 col-md-10 col-sm-12">
            	
            	<table class="dashboard_table mt-5  mb-5">
                  <tr class=" bg-white">
                    <td class="table_data xs_texts font-weight-bold border-0">ID:</td>
                    <td class="table_data xs_texts font-weight-normal border-0"> <?php echo $idd; ?> </td>
                  </tr>
                  <tr class=" bg-white">
                    <td class="table_data xs_texts font-weight-bold border-0">Leads Type:</td>
                    <td class="table_data xs_texts font-weight-normal border-0">Family Law Leads</td>
                  </tr>
                  <tr class=" bg-white">
                    <td class="table_data xs_texts font-weight-bold border-0">Name:</td>
                    <td class="table_data xs_texts font-weight-normal border-0"><?php echo $name; ?></td>
                  </tr>
                  <tr class=" bg-white">
                    <td class="table_data xs_texts font-weight-bold border-0">Email:</td>
                    <td class="table_data xs_texts font-weight-normal border-0"><?php echo $email; ?></td>
                  </tr>
                  <tr class=" bg-white">
                    <td class="table_data xs_texts font-weight-bold border-0">Phone No:</td>
                    <td class="table_data xs_texts font-weight-normal border-0"><?php echo $phone; ?></td>
                  </tr>
                  <!-- <tr class=" bg-white">
                    <td class="table_data xs_texts font-weight-bold border-0">Status:</td>
                    <td class="table_data xs_texts font-weight-normal border-0"><?php echo $status; ?></td>
                  </tr> -->
                  
                  <tr class=" bg-white">
                    <td class="table_data xs_texts font-weight-bold border-0">City:</td>
                    <td class="table_data xs_texts font-weight-normal border-0"><?php echo $city; ?></td>
                  </tr>
                  <tr class=" bg-white">
                    <td class="table_data xs_texts font-weight-bold border-0">Legal Issue:</td>
                    <td class="table_data xs_texts font-weight-normal border-0"><?php echo $cat; ?></td>
                  </tr>
                 
                  
                  <tr class=" bg-white">
                    <td class="table_data xs_texts font-weight-bold border-0">Summary:</td>
                    <td class="table_data xs_texts font-weight-normal border-0"><?php echo $matter; ?></td>
                  </tr>
                  
                  
                  
                  
                </table>
                <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
    							<th>Date</th>
    						    <th>Note</th>
    						</tr>
    					</thead>
                <tbody>
                            <?php 
                            
                                // $id_fk=$_GET['id'];
                                $id_fk=$_GET['id'];
                                // echo $id_fk;
                                $sqlss = "SELECT * from  customer_info_notes where id_fk=:id_fk ";
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
                                    <td><?php echo htmlentities($re->date);?></td>
                                    <td><?php echo htmlentities($re->note);?></td>
                                    
                                    <td>
                                    <a href="view_lead_new.php?del=<?php echo $re->id;?> " onclick="return confirm('Do you want to delete');"><i class="fa fa-close"></i></a> </td>
    							</tr>
    								<?php $cnt=$cnt+1; }} ?>
    										
    					</tbody>
    				</table>
               
                
			</div>
            
		</div>      
    
     <div class="col-lg-8 col-md-8 col-sm-8 col-12 d-block mt-5">
        <form class="contact-form12" method="post" >
            <div class="form-group text-left">
                <label class="mt-3 font-weight-bold">Add Notes:</label><br />
                
            </div> 
            <div class="form-group text-left">
                <textarea class="form-control p-4" name="note" id="msg" rows="8" cols="60"><?php echo $note; ?></textarea>
            </div>
            
            <div class="form-group text-left">
                <input type="submit" name="save" id="submitform" class="btn pt-2 pb-2 pl-5 pr-5 btn-sm mb-5 buttons font-weight-bold" value="Add" />
            </div>
            <br />
    	</form>
    </div>
    
    
</section>



<?php include_once"tidio_chat.php";
$iddd=$_GET['id'];
?> 
</body>
</html>
<?php }?>

