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
	
<link rel="shortcut icon" type="image/x-icon" href="favicon.png" />
    <title>Leads</title>

<!--#####################################Libraries file##########################################-->
<?php include "libs.php"; ?>

</head>
<body>
<?php include_once "dashboard_header.php"?>
<section class="container mt-5">
<div class="ts-main-content">
<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

                        <h2 class="page-title">Leads</h2>
                        <div class="panel panel-default">
							<div class="panel-heading">Listed Leads</div>
							<div class="panel-body">
                            <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										    <th>#</th>
											<th>Name</th>
											<th>Email</th>
											<th>Phone No</th>
										
										</tr>
                                    </thead>
                                    <tbody>

                                  
                                    <?php
                                      $database=new Database();
                                      $db = $database->getConnection();
                                      $id=$_SESSION['id'];
                                       $sql = "SELECT Name,Email,Phone from  lawyer_invoice where LawyerID = $id order by LawyerID asc ";
$query = $db -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>	
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($result->Name);?></td>
											<td><?php echo htmlentities($result->Email);?></td>
											<td><?php echo htmlentities($result->Phone);?></td>

										</tr>
										<?php $cnt=$cnt+1; }} ?>
										
									</tbody>
								</table>

						

							</div>
						</div>

</div>
</div>
					</div>
				</div>

			</div>
                                    
</section>


<?php include_once "dashboard_footer.php"?>
</body>
</html>
<?php } ?>