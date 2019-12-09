<?php 
include_once "config/database.php";
$database=new Database();
$db = $database->getConnection();
$lead=0;
$total_Leads=0;
$DummyLeads=0;
$active=0;
$id=$_SESSION['id'];
 $sql ="SELECT * FROM lawyer_profile WHERE  id=:id";
 
 $query = $db->prepare($sql);
 // bind values 
$query-> bindParam(':id', $id, PDO::PARAM_STR);
 $query->execute();
 $results=$query->fetchAll(PDO::FETCH_OBJ);
 $row = $query->fetch(PDO::FETCH_ASSOC);
 if($query->rowCount() > 0)
 {
     foreach($results as $result){
         $lead=htmlentities($result->Leads);
         $total_Leads=htmlentities($result->total_Leads);
         $DummyLeads=htmlentities($result->DummyLeads);
         $pending=htmlentities($result->PendingBalance);
        $active=htmlentities($result->active);
     }
 }

$totalmoneys=$total_Leads*100;
?>
<div class="text-right font-weight-bold" style="color:#0c5460;">
    <p class=" m-0">
        Pending Balance: <b class="text-success font-weight-normal">$<?php echo $pending?></b> <br />
    </p>
    <p class=" m-0">
        Status:&nbsp; 
        <b class="font-weight-normal text-success"  id="color1">
            <?php 
                echo "Active";
            ?>
        </b>
    </p>
</div>