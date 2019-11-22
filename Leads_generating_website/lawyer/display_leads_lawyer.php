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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Leads</title>
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<link href="style sheet/pagination.css" rel="stylesheet" type="text/css" />
<!-- <link href="style sheet/A_green.css" rel="stylesheet" type="text/css" /> -->
<!--#####################################Libraries file##########################################-->
<?php include "libs.php"; ?>

</head>
<body class="bg-light">

<?php include_once "dashboard_header.php";
$id=$_SESSION['id'];
$database=new Database();
$db = $database->getConnection();
$limit = 50;
$qu = "SELECT * from  lawyer_invoice where LawyerID = $id";

$s = $db->prepare($qu);
$s->execute();
$total_results = $s->rowCount();
$total_pages = ceil($total_results/$limit);

if (!isset($_GET['page'])) {
    $page = 1;
} else{
    $page = $_GET['page'];
}

$starting_limit = ($page-1)*$limit;
?>

<section class="container-fluid bg-light  text-center text-black pt-1 pb-5" style="margin-top:100px;">
    <?php include_once"balance_status.php" ?>       
	<h4 class="text-left font-weight-bold p-3" style="background-color:#d1ecf1; color:#0c5460;">LEADS </h4>
        
        <center>
        <div class="mt-4  bg-white  font-weight-medium">
            
            <table id="zctb" class="dashboard_table mt-5 border-bottom mb-5 table-hover">
                <thead>
                    <tr style="background-color:#5ba5f5;">
                        <th class="pb-3 pt-3"> #</th>
                        <th class="pb-3 pt-3">ID</th>
                        <th class="pb-3 pt-3">Type</th>
                        <th class="pb-3 pt-3">Full Name</th>
                        <th class="pb-3 pt-3">Email</th>
                        <th class="pb-3 pt-3">PhoneNo</th>
                        <th class="pb-3 pt-3">Date</th>
                        
                        <th class="pb-3 pt-3">Status</th>
                        <th class="pb-3 pt-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                
                	 <?php
						 $database=new Database();
						 $db = $database->getConnection();
						 $id=$_SESSION['id'];
						 $sql = "SELECT * from  lawyer_invoice where LawyerID = $id order by id desc";
						 $query = $db -> prepare($sql);
						 $query->execute();
						 $results=$query->fetchAll(PDO::FETCH_OBJ);
						 $cnt=1;
						 $opt="";
						 if($query->rowCount() > 0)
						 {
							 foreach($results as $result)
							 {		
								$opt=htmlentities($result->status);
					?>	
                    
                    <tr>              
                        <td class="table_data"><?php echo htmlentities($cnt);?></td>
                        <td class="table_data"><?php echo htmlentities($result->ClientID);?></td>
                        <td class="table_data"><?php echo htmlentities($result->EntityType);?></td>
                        <td class="table_data"><?php echo htmlentities($result->Name);?></td>
                        <td class="table_data myid"><?php echo htmlentities($result->Email);?></td>
                        <td class="table_data"><?php echo htmlentities($result->Phone);?></td>
                        <td class="table_data mydate"><?php echo htmlentities($result->Created);?></td>
                        
                    
                        <td class="table_data">
                        	<select class="status form-control">
                                <option value="New" <?php if($opt=="New") echo 'selected="selected"'; ?> class="opt1 ">
                                	New
                                </option>
                                <option value="NoDeal" <?php if($opt=="NoDeal") echo 'selected="selected"'; ?> >
                                	No-Deal
                                </option>
                                <option value="FollowUp" <?php if($opt=="FollowUp") echo 'selected="selected"'; ?>>
                                	Follow-Up
                                </option>
                                <option value="CallBack" <?php if($opt=="CallBack") echo 'selected="selected"'; ?>>
                                	Call-Back
                                </option>
                                <option value="Sold"<?php if($opt=="Sold") echo 'selected="selected"'; ?>>
                                	Sold
                                </option>
							</select>
                        </td>
                        <td class="table_data">
                        	<button class=" btn bg-light xxs_texts p-0" style="border-radius:45px; border-color:#0099FF;">
                            	<a class="nav-link p-2" href="view_lead_new.php?id=<?php echo htmlentities($result->ClientID);?>">View lead</a>
                            </button>
                        </td>
                    
                    </tr>
                    <?php $cnt=$cnt+1; }} ?>
                </tbody>
            </table>
            <?php	
            for ($page=1; $page <= $total_pages ; $page++):?>
			<div id='pagingg' >							
            <ul class="pagination"> 
            <li class="detail">
            </li>
            <li class="current">
            <a href='<?php echo "?page=$page"; ?>' class="link" >
            <?php  echo $page; ?>
 
            </a>
            </li>


<?php endfor; ?>
</ul>
</div>
        </div>
        </center>
    
</section>

</body>
</html>

<?php } ?>
<script>
 $(document).ready(function(){
	 $('select.status').on('change',function(){
		 
	 })
$('select.status').on('change',function () {
	//    for (var i = 1 ; i < zctb.rows.length ; i++){
	// 	   zctb.row[i].onclick=function()
	// 	   {
			//    rIndex=this.rowIndex;
			//   o=this.cell[3].innerHTML; 
		//    }
	//    }
	var currow=$(this).closest('tr');
		//  var col1= currow.find('td:eq(0)').html();
		//  var col2= currow.find('td:eq(1)').text();
		//  var col3= currow.find('td:eq(2)').text();
		//  var col4= currow.find('td:eq(3)').html();
		 var col5= currow.find('td:eq(1)').html();
         var col6=currow.find('td:eq(6)').html();
		 
		//  var result=col1+'\n'+col2+'\n'+col3+'\n'+col4+'\n'+col5;
		//  alert(result);
	//    var a=this.cell[3].innerHTML;
	    var decision = $(this).val();

        var id = $('td.myid').html();

        // var date = $('td.mydate').html();

		// alert(result);
	
        $.ajax({
                 type: "POST",
                 url: "update2.php",
                 data: {decision: decision, id: col5},
                 success: function(msg) {
                     $('#autosavenotify').text(msg);
                 }
      })
  });
});
</script>