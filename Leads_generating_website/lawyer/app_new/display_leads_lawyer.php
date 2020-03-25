<?php 
include_once "config/database.php";
if (isset($_GET['page']))
{
    $pag=$_GET['page'];
}
else{
    $pag =1;
}
session_start();
error_reporting(0);
include('includes/config.php');
// $idd=$_SESSION['id'];
$id=$_SESSION['id'];
$count=1;
if (strlen($_SESSION['Catogory'])==0){
    header('location:login');
}
if(strlen($_SESSION['Lawyerlogin'])==0)
	{	
header('location:login');
}
else{
    
    if ((strlen($_SESSION['Catogory'])==0) && (strlen($_SESSION['Catogory2'])==0) && (strlen($_SESSION['Catogory3'])==0) && (strlen($_SESSION['Catogory4'])==0) ){
        header('location:update-profile');
    }
    ?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <!--<style>-->
    <!--    select option[value="Parker"] {-->
    <!--      background: rgb(0, 0, 255);-->
    <!--      background-color:rgb(0, 0, 255);-->
    <!--    }-->
        
    <!--    select option[value="Nabors"] {-->
    <!--      background: #ff0000;-->
          
    <!--      background-color:#ff0000;-->
    <!--    }-->
        
    <!--    select option[value="Carter"] {-->
    <!--      background: #008000;-->
          
          
    <!--      background-color:#008000;-->
    <!--    }-->
        
    <!--    select option[value="Law"] {-->
    <!--      background: #ffc0cb;-->
          
    <!--      background-color:#ffc0cb;-->
    <!--    }-->
    <!--</style>-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Leads | Affordable Attorney Leads </title>
    
<link href="pagination/css/pagination.css" rel="stylesheet" type="text/css" />
<link href="pagination/css/A_green.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" type="image/x-icon" href="https://affordableattorneyleads.com/site_icon.png" />
<!--	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<link href="style sheet/pagination.css" rel="stylesheet" type="text/css" />
 <link href="style sheet/A_green.css" rel="stylesheet" type="text/css" /> -->
<!--#Libraries file##-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" >
<?php include "libs.php"; ?>
<style>
/*    #pagingg ul.pagination{*/
/*	margin:0px;*/
/*	padding:0px;*/
/*	height:100%;*/
/*	overflow:hidden;*/
/*	font:12px 'Tahoma';*/
/*	list-style-type:none;	*/
/*}*/

/*#pagingg ul.pagination li.details{*/
/*    padding:7px 10px 7px 10px;*/
/*    font-size:14px;*/
/*}*/



/*#pagingg ul.pagination li{*/
/*	float:left;*/
/*	margin:0px;*/
/*	padding:0px;*/
/*	margin-left:5px;*/
	
	
/*}*/

/*#pagingg ul.pagination li:first-child{*/
/*	margin-left:0px;*/
/*}*/

/*#pagingg ul.pagination li a{*/
/*	color:black;*/
/*	display:block;*/
/*	text-decoration:none;*/
/*	padding:7px 10px 7px 10px;*/
	
/*}*/

/*#pagingg ul.pagination li a img{*/
/*	border:none;*/
/*}*/
/*	ul.pagination li.details{*/
/*	   color:#699613;*/
	
/*	}*/
    
/*    ul.pagination li a*/
/*	{*/
/*		border-radius:3px;	*/
/*		-moz-border-radius:3px;*/
/*		-webkit-border-radius:3px;*/
/*		padding:6px 9px;*/
/*	}*/

/*	ul.pagination li a*/
/*	{*/
/*        color: #fff;*/
/*		background:#007bff;*/
/*		background:-moz-linear-gradient(top,#87AB19,#699613);	*/
/*	}	*/
	
/*	ul.pagination li a:hover,*/
/*	ul.pagination li a.current*/
/*	{*/
/*		color:#4F7119;*/
/*		background:#ADD8E6;*/
/*	}*/
/*ul.pagination {*/
/*    list-style-type: none;*/
/*    margin: 0;*/
/*    padding: 0;*/
/*    overflow: hidden;*/
/*    background-color: #333333;*/
/*}*/

/*li.pagination {*/
/*    float: left;*/
/*}*/

/*li a {*/
/*    display: block;*/
/*    color: white;*/
/*    text-align: center;*/
/*    padding: 16px;*/
/*    text-decoration: none;*/
/*}*/

/*li a:hover {*/
/*    background-color: #111111;*/
/*}*/
.navbar-right li a {
  text-align: right;
}
li.active {
    display: block;
    background-color: #007bff;
    color: white;
    text-align: center;
    text-decoration: none;
}
/*li.dot {*/
/*    display: block;*/
/*    color: white;*/
/*    text-align: center;*/
/*    padding: 16px;*/
/*    text-decoration: none;*/
/*}*/
</style>
</head>
<body class="bg-white text-left">

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



 
 

<section class="container-fluid text-left text-black pt-1 pb-5" style="margin-top:120px;">
    <?php include_once"balance_status.php" ?>       
	
    <span class=" d-block p-3" style="background-color:#d1ecf1; color:#0c5460;">
        <h4 class="text-left font-weight-bold">LEADS </h4>
    </span>   
    
        <div class="mt-4 font-weight-medium">
            <form method="post" action="export.php" class="text-right mb-2">  
                   <input type="submit" name="export" value="Download Leads" class="btn btn-success" />  
            </form> 
            <div class="table-responsive-xl">
            <table id="zctb" class="dashboard_table mt-5 border-bottom mb-5 table-hover">
                <thead>
                    <tr style="background-color:#5ba5f5;">
                        <th class="pb-3 pt-3 font-weight-bold xs_texts"> #</th>
                        <th class="pb-3 pt-3 font-weight-bold xs_texts">ID</th>
                        <th class="pb-3 pt-3 font-weight-bold xs_texts">Type</th>
                        <th class="pb-3 pt-3 font-weight-bold xs_texts">Full Name</th>
                        <th class="pb-3 pt-3 font-weight-bold xs_texts">Email</th>
                        <th class="pb-3 pt-3 font-weight-bold xs_texts">PhoneNo</th>
                        <th class="pb-3 pt-3 font-weight-bold xs_texts">Date</th>
                        <th class="pb-3 pt-3 font-weight-bold xs_texts">Status</th>
                        <th class="pb-3 pt-3 font-weight-bold xs_texts">Action</th>
                    </tr>
                </thead>
                <tbody>
                
                	 <?php
						 $database=new Database();
						 $db = $database->getConnection();
						 $id=$_SESSION['id'];
						 $sql = "SELECT * from  lawyer_invoice where LawyerID = $id order by id desc limit {$starting_limit},{$limit}";
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
                        <td class="table_data xs_texts"><?php echo htmlentities($cnt);?></td>
                        <td class="table_data xs_texts"><?php echo htmlentities($result->ClientID);?></td>
                        <td class="table_data xs_texts"><?php echo htmlentities($result->EntityType);?></td>
                        <td class="table_data xs_texts"><?php echo htmlentities($result->Name);?></td>
                        <td class="table_data xs_myid xs_texts"><?php echo htmlentities($result->Email);?></td>
                        <td class="table_data xs_texts"><?php echo htmlentities($result->Phone);?></td>
                        <td class="table_data mydate xs_texts"><?php echo htmlentities($result->Created);?></td>
                        
                        <td class="table_data">
                        	<!--<select onchange="this.className=this.options[this.selectedIndex].className" class="status form-control xxs_texts" >-->
                    	    <select class="status form-control xxs_texts" >
                                <option  value="New" <?php if($opt=="New") echo 'selected="selected"'; ?> >
                                	<span class="text-success"></span>New
                                </option>
                                <option  value="NoDeal" <?php if($opt=="NoDeal") echo 'selected="selected"'; ?> >
                                	No-Deal
                                </option>
                                <option  value="FollowUp" <?php if($opt=="FollowUp") echo 'selected="selected"'; ?>>
                                	Follow-Up
                                </option>
                                <option value="CallBack"  <?php if($opt=="CallBack") echo 'selected="selected"'; ?>>
                                	Call-Back
                                </option>
                                <option value="Sold"<?php if($opt=="Sold") echo 'selected="selected"'; ?>>
                                	Sold
                                </option>
                                
                                <?php
                                if ($_SESSION['Lawyerlogin']=="support@legalhelpservices.net"){
                                ?>
                                <option class="bg-primary text-white" value="Parker"
                                <?php if($opt=="Parker") echo 'selected="selected"'; ?>
                                >
                                	M.Parker
                                </option>
                                <option class="bg-danger text-white" value="Nabors"
                                <?php if($opt=="Nabors") echo 'selected="selected"'; ?>
                                >
                                	S.Nabors
                                </option>
                                <option class="bg-success text-white" value="Carter"
                                <?php if($opt=="Carter") echo 'selected="selected"'; ?>
                                >
                                	S.Carter
                                </option>
                            <option class="bg-secondary text-white" value="Law"
                                <?php if($opt=="Law") echo 'selected="selected"'; ?>
                                >
                                	A.Law
                                </option>
                                </option>
                                <option class="bg-success text-white" value="Garrett"
                                <?php if($opt=="Garrett") echo 'selected="selected"'; ?>
                                >
                                	Garrett W
                                </option>
                                <option class="bg-secondary text-white" value="Ayjay"
                                <?php if($opt=="Ayjay") echo 'selected="selected"'; ?>
                                >
                                	AyJay M
                                </option>
                            
                                <?php } ?>
                                
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
            </div>
<?php	
//  if ($pag>1)
//         {
//             echo "<a href='?page=".($pag-1)."' class='btn btn-danger'>Previous</a>";
      
//         }
        
        //   for ($page=1; $page <= $total_pages ; $page++):
   ?>
			<!--<div id='pagingg' >							-->
   <!--             <ul class="pagination"> -->
   <!--                 <li class="detail">-->
   <!--                 </li>-->
   <!--                 <li class="current">-->
   <!--                     <a href='<?php echo "?page=$page"; ?>' class="link" >-->
   <!--                         <?php  echo $page; ?>-->
   <!--                     </a>-->
   <!--                 </li>-->
               <?php 
//   endfor;
   ?>
   <!--             </ul>-->
   <!--         </div>-->
   <?php
//   for ($i=1;$i<$total_pages;$i++){
       
//             echo "<a href='?page=".$i."' class='btn btn-primary'>$i</a>";
//         }
   ?>
    <?php  if ($i>$pag)
        // {
        //     echo "<a href='?page=".($pag+1)."' class='btn btn-danger'>Next</a>";
      
        // }
        ?>
        <?php
        echo "<ul class='pagination'style='float:right'>";
if ($page > 1)
echo "<li class='page-item'><a class='page-link' href='?page=".($page - 1)."' class='button'>PREVIOUS</a></li>"; 

$show = 0;
for ($i = $page; $i <= $total_pages; $i++) {
  $show++;
  if ($page == $i) 
    echo "<li class='active page-link'>".$i."</li>";
  else if (($show < 5) || ($total_pages == $i))
    echo "<li class='page-item'><a class='page-link' href='?page=".$i."'>".$i."</a></li>";
  else
    {
    
    echo "<li class='dot page-item'>.</li>";
    
        
    }
}

if ($total_pages > $page)
echo "<li class='page-item'><a class='page-link' href='?page=".($page + 1)."' class='button'>NEXT</a></li>";
echo "</ul>";  
        ?>
        </div>
    
</section>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

<script>
$(document).ready(function() {
    $('#zctb').DataTable({
        "paging": false,
		"pagingType":"full_numbers",
		"lengthMenu":[[-1,15,25,50],['All',15,25,50]],
		responsive:true,
		stateSave: true
	});
	
});

// $(document).ready( function () {
//   $('#zctb').DataTable(
//     { language: {
//         searchPlaceholder: "Search records",
//         search: "",
//       }
//     })
  
  
// } );

</script>

</body>
</html>

<?php } ?>

<script>
$(document).ready(function(){
	$('select.status').on('change',function(){
	 
	})
	$('select.status').on('change',function () {
		var currow=$(this).closest('tr');
		var col5= currow.find('td:eq(1)').html();
		var col6=currow.find('td:eq(6)').html();
		var decision = $(this).val();
		
		var id = $('td.myid').html();
	
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