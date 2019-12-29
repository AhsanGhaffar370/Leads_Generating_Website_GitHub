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
<html lang="en-US">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Update Profile</title>
<link rel="shortcut icon" type="image/x-icon" href="https://affordableattorneyleads.com/site_icon.png" />
        
<!--#####################################Libraries file##########################################-->
<?php include "libs.php"; ?>

<script src="client_validate.js"></script>
</head>
<body class="bg-light">

<?php include_once "dashboard_header.php" ; ?>


<?php

$database=new Database();
$db = $database->getConnection();
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
                               $Descriptio=htmlentities($result->Description);
                               $nam=htmlentities($result->Name);
                               $organizatio=htmlentities($result->Organization);
                               $emai=htmlentities($result->Email);
                               $contac=htmlentities($result->Contact);
                               $time=htmlentities($result->timezone);
                               
    						}
    					}

if(isset($_POST['update']))
{
$Picture=$_FILES["img1"]["name"];
if ($Picture!=""){
$id=$_SESSION['id'];
$Picture_ext=pathinfo($Picture,PATHINFO_EXTENSION);
$Picture=pathinfo($Picture,PATHINFO_FILENAME);
$Picture=$Picture."_".date("mjYHis").".".$Picture_ext;

// $Catogory = $_POST['Catogary'];
move_uploaded_file($_FILES["img1"]["tmp_name"],"../img/Lawyer/".$Picture);
$sql="update lawyer_profile set Picture=:Picture where id=:id";
$query = $db->prepare($sql);
$query->bindParam(':Picture',$Picture,PDO::PARAM_STR);
// $query->bindParam(':Catogory',$Catogory,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();
}
$Description=$_POST['desciption'];
$Catogory=$_POST['law1'];

$Name=$_POST['fname'];
$Organization=$_POST['organ'];
$Email=$_POST['email'];
$Contact=$_POST['mob'];

$timezone=$_POST['state'];



$sq="update lawyer_profile set Name=:Name,Organization=:Organization,Email=:Email,Contact=:Contact,Catogory=:Catogory,Description=:Description,timezone=:timezone where id=:id ";
$que = $db->prepare($sq);

$que->bindParam(':Name',$Name,PDO::PARAM_STR);
$que->bindParam(':Organization',$Organization,PDO::PARAM_STR);
$que->bindParam(':Email',$Email,PDO::PARAM_STR);
$que->bindParam(':Contact',$Contact,PDO::PARAM_STR);
$que->bindParam(':Catogory',$Catogory,PDO::PARAM_STR);

$que->bindParam(':Description',$Description,PDO::PARAM_STR);


$que->bindParam(':timezone',$timezone,PDO::PARAM_STR);

$que->bindParam(':id',$id,PDO::PARAM_STR);
if ($que->execute()){


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
                               $Descriptio=htmlentities($result->Description);
                               $nam=htmlentities($result->Name);
                               $organizatio=htmlentities($result->Organization);
                               $emai=htmlentities($result->Email);
                               $contac=htmlentities($result->Contact);
                               $time=htmlentities($result->timezone);
                               
    						}
    					}
    				
    echo "<script type='text/javascript'>
            
            document.location = 'dashboard'; </script>";
}
else{
    $msg= "Cannot update";
}
// $msg="Data updated successfully";
$_SESSION['Catogory']=$Catogory;
// $_SESSION['Catogory2']=$Catogory2;
// $_SESSION['Catogory3']=$Catogory3;
// $_SESSION['Catogory4']=$Catogory4;


}
?>
<br><br><br>
<section class="container bg-white text-left text-black dash pt-2 mt-5 mb-5 border-light border-right border-left border-top border-bottom">
    <div class="">
        <?php include_once"balance_status.php" ?>   
        <h4 class="text-left pl-5 font-weight-bold p-3" style="background-color:#d1ecf1; color:#0c5460;">Update Profile </h4>
        <div class="alert alert-primary text-left mb-4 xs_texts container font-weight-normal text-secondary">
            <i class="fas fa-info-circle text-info"> </i>
            Fill your personal information below. The information you provide will be shown to those people who are searching for an attorney in your local area
        </div>
        
        <div class="container">

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
            	<?php
    					// $id=$_SESSION['id'];
    					// $sql ="SELECT * FROM lawyer_profile WHERE id=:id";
    					// $query= $db->prepare($sql);
    					// $opt="";
    					// // // posted values
    					// $query->bindParam(":id", $id);
    					// $query->execute();
    					// $results=$query->fetchAll(PDO::FETCH_OBJ);
    					// $row = $query->fetch(PDO::FETCH_ASSOC);
    					// if($query->rowCount() > 0)
    					// {
    					// 	foreach($results as $result){
    
                        //        $opt=htmlentities($result->Catogory);
                        //        $Descriptio=htmlentities($result->Description);
                        //     //    $nam=htmlentities($result->Name);
                        //     //    $organizatio=htmlentities($result->Organization);
                        //     //    $emai=htmlentities($result->Email);
                        //     //    $contac=htmlentities($result->Contact);
                        //     //    $time=htmlentities($result->timezone);
                               
    					// 	}
    					// }
    				?>
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
                    
                    
                    <div class="form-group ">
                        <label>Full Name:</label>
                        <input type="text" class="form-control p-4" name="fname" id="fname" value="<?php echo $nam; ?>"  placeholder="Full Name"/> 
                    </div>
                    <div class="form-group ">
                        <label>Organization</label>
                        <input type="text" class="form-control p-4" name="organ" id="organ" value="<?php echo $organizatio; ?>" placeholder="Organization"/> 
                    </div>
                    
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="text" class="form-control p-4" name="email" id="email" value="<?php echo $emai; ?>" placeholder="Email Address"/>
                    </div>
                    
                    <div class="form-group">
                        <label>Phone:</label>
                        <input type="tel" class="form-control p-4" name="mob" id="mob" value="<?php echo $contac; ?>" placeholder="Phone"/>
                    </div>
                    
                    <div class="form-group">
                        <label>Timezone:</label>
                        <select name="state" class="form-control" id="state" required>
                                <option value="-1" selected="selected" disabled="disabled">-Select-</option>
                                <option value="America/Adak" formula_val="" <?php if($time=="America/Adak") echo 'selected';?>>Adak</option>
                                <option value="America/Anchorage" formula_val="" <?php if($time=="America/Anchorage") echo 'selected';?>>Anchorage</option>
                                <option value="America/Anguilla" formula_val=""<?php if($time=="America/Anguilla") echo 'selected';?>>Anguilla</option>
                                <option value="America/Antigua" formula_val=""<?php if($time=="America/Antigua") echo 'selected';?>>Antigua</option>
                                <option value="America/Araguaina" formula_val="" <?php if($time=="America/Araguaina") echo 'selected';?>>Araguaina</option>
                                <option value="America/Argentina/Buenos_Aires" formula_val="" <?php if($time=="America/Argentina/Buenos_Aires") echo 'selected';?>>Argentina/Buenos_Aires</option>
                                <option value="America/Argentina/Catamarca" formula_val="" <?php if($time=="America/Argentina/Catamarca") echo 'selected';?>>Argentina/Catamarca</option>
                                <option value="America/Argentina/Cordoba" formula_val="" <?php if($time=="America/Argentina/Cordoba") echo 'selected';?>>Argentina/Cordoba</option>
                                <option value="America/Argentina/Jujuy" formula_val="" <?php if($time=="America/Argentina/Jujuy") echo 'selected';?>>Argentina/Jujuy</option>
                                <option value="America/Argentina/La_Rioja" formula_val="" <?php if($time=="America/Argentina/La_Rioja") echo 'selected';?>>Argentina/La_Rioja</option>
                                <option value="America/Argentina/Mendoza" formula_val="" <?php if($time=="America/Argentina/Mendoza") echo 'selected';?>>Argentina/Mendoza</option>
                                <option value="America/Argentina/Rio_Gallegos" formula_val="" <?php if($time=="America/Argentina/Rio_Gallegos") echo 'selected';?>>Argentina/Rio_Gallegos</option>
                                <option value="America/Argentina/Salta" formula_val="" <?php if($time=="America/Argentina/Salta") echo 'selected';?>>Argentina/Salta</option>
                                <option value="America/Argentina/San_Juan" formula_val="" <?php if($time=="America/Argentina/San_Juan") echo 'selected';?>>Argentina/San_Juan</option>
                                <option value="America/Argentina/San_Luis" formula_val="" <?php if($time=="America/Argentina/San_Luis") echo 'selected';?>>Argentina/San_Luis</option>
                                <option value="America/Argentina/Tucuman" formula_val="" <?php if($time=="America/Argentina/Tucuman") echo 'selected';?>>Argentina/Tucuman</option>
                                <option value="America/Argentina/Ushuaia" formula_val="" <?php if($time=="America/Argentina/Ushuaia") echo 'selected';?>>Argentina/Ushuaia</option>
                                <option value="America/Aruba" formula_val="" <?php if($time=="America/Anchorage") echo 'selected';?>>Aruba</option>
                                <option value="America/Asuncion" formula_val="" <?php if($time=="America/Asuncion") echo 'selected';?>>Asuncion</option>
                                <option value="America/Atikokan" formula_val="" <?php if($time=="America/Atikokan") echo 'selected';?>>Atikokan</option>
                                <option value="America/Bahia" formula_val="" <?php if($time=="America/Bahia") echo 'selected';?>>Bahia</option>
                                <option value="America/Bahia_Banderas" formula_val="" <?php if($time=="America/Bahia_Banderas") echo 'selected';?>>Bahia_Banderas</option>
                                <option value="America/Barbados" formula_val="" <?php if($time=="America/Barbados") echo 'selected';?>>Barbados</option>
                                <option value="America/Belem" formula_val="" <?php if($time=="America/Belem") echo 'selected';?>>Belem</option>
                                <option value="America/Belize" formula_val="" <?php if($time=="America/Belize") echo 'selected';?>>Belize</option>
                                <option value="America/Blanc-Sablon" formula_val="" <?php if($time=="America/Blanc-Sablon") echo 'selected';?>>Blanc-Sablon</option>
                                <option value="America/Boa_Vista" formula_val="" <?php if($time=="America/Boa_Vista") echo 'selected';?>>Boa_Vista</option>
                                <option value="America/Bogota" formula_val="" <?php if($time=="America/Bogota") echo 'selected';?>>Bogota</option>
                                <option value="America/Boise" formula_val="" <?php if($time=="America/Boise") echo 'selected';?>>Boise</option>
                                <option value="America/Cambridge_Bay" formula_val="" <?php if($time=="America/Cambridge_Bay") echo 'selected';?>>Cambridge_Bay</option>
                                <option value="America/Campo_Grande" formula_val="" <?php if($time=="America/Campo_Grande") echo 'selected';?>>Campo_Grande</option>
                                <option value="America/Cancun" formula_val="" <?php if($time=="America/Cancun") echo 'selected';?>>Cancun</option>
                                <option value="America/Caracas" formula_val="" <?php if($time=="America/Caracas") echo 'selected';?>>Caracas</option>
                                <option value="America/Cayenne" formula_val="" <?php if($time=="America/Cayenne") echo 'selected';?>>Cayenne</option>
                                <option value="America/Cayman" formula_val="" <?php if($time=="America/Cayman") echo 'selected';?>>Cayman</option>
                                <option value="America/Chicago" formula_val="" <?php if($time=="America/Chicago") echo 'selected';?>>Chicago</option>
                                <option value="America/Chihuahua" formula_val="" <?php if($time=="America/Chihuahua") echo 'selected';?>>Chihuahua</option>
                                <option value="America/Costa_Rica" formula_val="" <?php if($time=="America/Costa_Rica") echo 'selected';?>>Costa_Rica</option>
                                <option value="America/Creston" formula_val="" <?php if($time=="America/Creston") echo 'selected';?>>Creston</option>
                                <option value="America/Cuiaba" formula_val="" <?php if($time=="America/Cuiaba") echo 'selected';?>>Cuiaba</option>
                                <option value="America/Curacao" formula_val="" <?php if($time=="America/Curacao") echo 'selected';?>>Curacao</option>
                                <option value="America/Danmarkshavn" formula_val="" <?php if($time=="America/Danmarkshavn") echo 'selected';?>>Danmarkshavn</option>
                                <option value="America/Dawson" formula_val="" <?php if($time=="America/Dawson") echo 'selected';?>>Dawson</option>
                                <option value="America/Dawson_Creek" formula_val="" <?php if($time=="America/Dawson_Creek") echo 'selected';?>>Dawson_Creek</option>
                                <option value="America/Denver" formula_val="" <?php if($time=="America/Denver") echo 'selected';?>>Denver</option>
                                <option value="America/Detroit" formula_val="" <?php if($time=="America/Detroit") echo 'selected';?>>Detroit</option>
                                <option value="America/Dominica" formula_val="" <?php if($time=="America/Dominica") echo 'selected';?>> Dominica</option>
                                <option value="America/Edmonton" formula_val="" <?php if($time=="America/Edmonton") echo 'selected';?>>Edmonton</option>
                                <option value="America/Eirunepe" formula_val="" <?php if($time=="America/Eirunepe") echo 'selected';?>>Eirunepe</option>
                                <option value="America/El_Salvador" formula_val="" <?php if($time=="America/El_Salvador") echo 'selected';?>>El_Salvador</option>
                                <option value="America/Fort_Nelson" formula_val="" <?php if($time=="America/Fort_Nelson") echo 'selected';?>>Fort_Nelson</option>
                                <option value="America/Fortaleza" formula_val="" <?php if($time=="America/Fortaleza") echo 'selected';?>>Fortaleza</option>
                                <option value="America/Glace_Bay" formula_val="" <?php if($time=="America/Glace_Bay") echo 'selected';?>>Glace_Bay</option>
                                <option value="America/Godthab" formula_val="" <?php if($time=="America/Godthab") echo 'selected';?>>Godthab</option>
                                <option value="America/Goose_Bay" formula_val="" <?php if($time=="America/Goose_Bay") echo 'selected';?>>Goose_Bay</option>
                                <option value="America/Grand_Turk" formula_val="" <?php if($time=="America/Grand_Turk") echo 'selected';?>>Grand_Turk</option>
                                <option value="America/Grenada" formula_val="" <?php if($time=="America/Grenada") echo 'selected';?>>Grenada</option>
                                <option value="America/Guadeloupe" formula_val="" <?php if($time=="America/Guadeloupe") echo 'selected';?>>Guadeloupe</option>
                                <option value="America/Guatemala" formula_val="" <?php if($time=="America/Guatemala") echo 'selected';?>>Guatemala</option>
                                <option value="America/Guayaquil" formula_val="" <?php if($time=="America/Guayaquil") echo 'selected';?>>Guayaquil</option>
                                <option value="America/Guyana" formula_val="" <?php if($time=="America/Guyana") echo 'selected';?>>Guyana</option>
                                <option value="America/Halifax" formula_val="" <?php if($time=="America/Halifax") echo 'selected';?>>Halifax</option>
                                <option value="America/Havana" formula_val="" <?php if($time=="America/Havana") echo 'selected';?>>Havana</option>
                                <option value="America/Hermosillo" formula_val="" <?php if($time=="America/Hermosillo") echo 'selected';?>>Hermosillo</option>
                                <option value="America/Indiana/Indianapolis" formula_val="" <?php if($time=="America/Indiana/Indianapolis") echo 'selected';?>>Indiana/Indianapolis</option>
                                <option value="America/Indiana/Knox" formula_val="" <?php if($time=="America/Indiana/Knox") echo 'selected';?>>Indiana/Knox</option>
                                <option value="America/Indiana/Marengo" formula_val="" <?php if($time=="America/Indiana/Marengo") echo 'selected';?>>Indiana/Marengo</option>
                                <option value="America/Indiana/Petersburg" formula_val="" <?php if($time=="America/Indiana/Petersburg") echo 'selected';?>>Indiana/Petersburg</option>
                                <option value="America/Indiana/Tell_City" formula_val="" <?php if($time=="America/Indiana/Tell_City") echo 'selected';?>>Indiana/Tell_City</option>
                                <option value="America/Indiana/Vevay" formula_val="" <?php if($time=="America/Indiana/Vevay") echo 'selected';?>>Indiana/Vevay</option>
                                <option value="America/Indiana/Vincennes" formula_val="" <?php if($time=="America/Indiana/Vincennes") echo 'selected';?>>Indiana/Vincennes</option>
                                <option value="America/Indiana/Winamac" formula_val="" <?php if($time=="America/Indiana/Winamac") echo 'selected';?>>Indiana/Winamac</option>
                                <option value="America/Inuvik" formula_val="" <?php if($time=="America/Inuvik") echo 'selected';?>>Inuvik</option>
                                <option value="America/Iqaluit" formula_val="" <?php if($time=="America/Iqaluit") echo 'selected';?>>Iqaluit</option>
                                <option value="America/Jamaica" formula_val="" <?php if($time=="America/Jamaica") echo 'selected';?>>Jamaica</option>
                                <option value="America/Juneau" formula_val="" <?php if($time=="America/Juneau") echo 'selected';?>>Juneau</option>
                                <option value="America/Kentucky/Louisville" formula_val="" <?php if($time=="America/Kentucky/Louisville") echo 'selected';?>>Kentucky/Louisville</option>
                                <option value="America/Kentucky/Monticello" formula_val="" <?php if($time=="America/Kentucky/Monticello") echo 'selected';?>>Kentucky/Monticello</option>
                                <option value="America/Kralendijk" formula_val="" <?php if($time=="America/Kralendijk") echo 'selected';?>>Kralendijk</option>
                                <option value="America/La_Paz" formula_val="" <?php if($time=="America/La_Paz") echo 'selected';?>>La_Paz</option>
                                <option value="America/Lima" formula_val="" <?php if($time=="America/Lima") echo 'selected';?>>Lima</option>
                                <option value="America/Los_Angeles" formula_val="" <?php if($time=="America/Los_Angeles") echo 'selected';?>>Los_Angeles</option>
                                <option value="America/Lower_Princes" formula_val="" <?php if($time=="America/Lower_Princes") echo 'selected';?>>Lower_Princes</option>
                                <option value="America/Maceio" formula_val="" <?php if($time=="America/Maceio") echo 'selected';?>>Maceio</option>
                                <option value="America/Managua" formula_val="" <?php if($time=="America/Managua") echo 'selected';?>>Managua</option>
                                <option value="America/Manaus" formula_val="" <?php if($time=="America/Manaus") echo 'selected';?>>Manaus</option>
                                <option value="America/Marigot" formula_val="" <?php if($time=="America/Marigot") echo 'selected';?>>Marigot</option>
                                <option value="America/Martinique" formula_val="" <?php if($time=="America/Martinique") echo 'selected';?>>Martinique</option>
                                <option value="America/Matamoros" formula_val="" <?php if($time=="America/Matamoros") echo 'selected';?>>Matamoros</option>
                                <option value="America/Mazatlan" formula_val="" <?php if($time=="America/Mazatlan") echo 'selected';?>>Mazatlan</option>
                                <option value="America/Menominee" formula_val="" <?php if($time=="America/Menominee") echo 'selected';?>>Menominee</option>
                                <option value="America/Merida" formula_val="" <?php if($time=="America/Merida") echo 'selected';?>>Merida</option>
                                <option value="America/Metlakatla" formula_val="" <?php if($time=="America/Metlakatla") echo 'selected';?>>Metlakatla</option>
                                <option value="America/Mexico_City" formula_val="" <?php if($time=="America/Mexico_City") echo 'selected';?>>Mexico_City</option>
                                <option value="America/Miquelon" formula_val="" <?php if($time=="America/Miquelon") echo 'selected';?>>Miquelon</option>
                                <option value="America/Moncton" formula_val=""<?php if($time=="America/Moncton") echo 'selected';?>>Moncton</option>
                                <option value="America/Monterrey" formula_val="" <?php if($time=="America/Monterrey") echo 'selected';?>>Monterrey</option>
                                <option value="America/Montevideo" formula_val="" <?php if($time=="America/Montevideo") echo 'selected';?>>Montevideo</option>
                                <option value="America/Montserrat" formula_val="" <?php if($time=="America/Montserrat") echo 'selected';?>>Montserrat</option>
                                <option value="America/Nassau" formula_val="" <?php if($time=="America/Nassau") echo 'selected';?>>Nassau</option>
                                <option value="America/New_York" formula_val="" <?php if($time=="America/New_York") echo 'selected';?>>New_York</option>
                                <option value="America/Nipigon" formula_val="" <?php if($time=="America/Nipigon") echo 'selected';?>>Nipigon</option>
                                <option value="America/Nome" formula_val="" <?php if($time=="America/Nome") echo 'selected';?>>Nome</option>
                                <option value="America/Noronha" formula_val="" <?php if($time=="America/Noronha") echo 'selected';?>>Noronha</option>
                                <option value="America/North_Dakota/Beulah" formula_val="" <?php if($time=="America/North_Dakota/Beulah") echo 'selected';?>>North_Dakota/Beulah</option>
                                <option value="America/North_Dakota/Center" formula_val="" <?php if($time=="America/North_Dakota/Center") echo 'selected';?>>North_Dakota/Center</option>
                                <option value="America/North_Dakota/New_Salem" formula_val="" <?php if($time=="America/North_Dakota/New_Salem") echo 'selected';?>>North_Dakota/New_Salem</option>
                                <option value="America/Ojinaga" formula_val="" <?php if($time=="America/Ojinaga") echo 'selected';?>>Ojinaga</option>
                                <option value="America/Panama" formula_val="" <?php if($time=="America/Panama") echo 'selected';?>>Panama</option>
                                <option value="America/Pangnirtung" formula_val="" <?php if($time=="America/Pangnirtung") echo 'selected';?>>Pangnirtung</option>
                                <option value="America/Paramaribo" formula_val="" <?php if($time=="America/Paramaribo") echo 'selected';?>>Paramaribo</option>
                                <option value="America/Phoenix" formula_val="" <?php if($time=="America/Phoenix") echo 'selected';?>>Phoenix</option>
                                <option value="America/Port-au-Prince" formula_val="" <?php if($time=="America/Port-au-Prince") echo 'selected';?>>Port-au-Prince</option>
                                <option value="America/Port_of_Spain" formula_val="" <?php if($time=="America/Port_of_Spain") echo 'selected';?>>Port_of_Spain</option>
                                <option value="America/Porto_Velho" formula_val="" <?php if($time=="America/Porto_Velho") echo 'selected';?>>Porto_Velho</option>
                                <option value="America/Puerto_Rico" formula_val="" <?php if($time=="America/Puerto_Rico") echo 'selected';?>>Puerto_Rico</option>
                                <option value="America/Punta_Arenas" formula_val="" <?php if($time=="America/Punta_Arenas") echo 'selected';?>>Punta_Arenas</option>
                                <option value="America/Rainy_River" formula_val="" <?php if($time=="America/Rainy_River") echo 'selected';?>>Rainy_River</option>
                                <option value="America/Rankin_Inlet" formula_val="" <?php if($time=="America/Rankin_Inlet") echo 'selected';?>>Rankin_Inlet</option>
                                <option value="America/Recife" formula_val="" <?php if($time=="America/Recife") echo 'selected';?>>Recife</option>
                                <option value="America/Regina" formula_val="" <?php if($time=="America/Regina") echo 'selected';?>>Regina</option>
                                <option value="America/Resolute" formula_val="" <?php if($time=="America/Resolute") echo 'selected';?>>Resolute</option>
                                <option value="America/Rio_Branco" formula_val="" <?php if($time=="America/Rio_Branco") echo 'selected';?>>Rio_Branco</option>
                                <option value="America/Santarem" formula_val="" <?php if($time=="America/Santarem") echo 'selected';?>>Santarem</option>
                                <option value="America/Santiago" formula_val="" <?php if($time=="America/Santiago") echo 'selected';?>>Santiago</option>
                                <option value="America/Santo_Domingo" formula_val="" <?php if($time=="America/Santo_Domingo") echo 'selected';?>>Santo_Domingo</option>
                                <option value="America/Sao_Paulo" formula_val="" <?php if($time=="America/Sao_Paulo") echo 'selected';?>>Sao_Paulo</option>
                                <option value="America/Scoresbysund" formula_val="" <?php if($time=="America/Anchorage") echo 'selected';?>>Scoresbysund</option>
                                <option value="America/Sitka" formula_val="" <?php if($time=="America/Sitka") echo 'selected';?>>Sitka</option>
                                <option value="America/St_Barthelemy" formula_val="" <?php if($time=="America/St_Barthelemy") echo 'selected';?>>St_Barthelemy</option>
                                <option value="America/St_Johns" formula_val="" <?php if($time=="America/St_Johns") echo 'selected';?>>St_Johns</option>
                                <option value="America/St_Kitts" formula_val="" <?php if($time=="America/St_Kitts") echo 'selected';?>>St_Kitts</option>
                                <option value="America/St_Lucia" formula_val="" <?php if($time=="America/St_Lucia") echo 'selected';?>>St_Lucia</option>
                                <option value="America/St_Thomas" formula_val="" <?php if($time=="America/St_Thomas") echo 'selected';?>>St_Thomas</option>
                                <option value="America/St_Vincent" formula_val="" <?php if($time=="America/St_Vincent") echo 'selected';?>>St_Vincent</option>
                                <option value="America/Swift_Current" formula_val=""<?php if($time=="America/Swift_Current") echo 'selected';?>>Swift_Current</option>
                                <option value="America/Tegucigalpa" formula_val="" <?php if($time=="America/Tegucigalpa") echo 'selected';?>>Tegucigalpa</option>
                                <option value="America/Thule" formula_val="" <?php if($time=="America/Thule") echo 'selected';?>>Thule</option>
                                <option value="America/Thunder_Bay" formula_val="" <?php if($time=="America/Thunder_Bay") echo 'selected';?>>Thunder_Bay</option>
                                <option value="America/Tijuana" formula_val="" <?php if($time=="America/Tijuana") echo 'selected';?>>Tijuana</option>
                                <option value="America/Toronto" formula_val="" <?php if($time=="America/Toronto") echo 'selected';?>>Toronto</option>
                                <option value="America/Tortola" formula_val="" <?php if($time=="America/Tortola") echo 'selected';?>>Tortola</option>
                                <option value="America/Vancouver" formula_val="" <?php if($time=="America/Vancouver") echo 'selected';?>>Vancouver</option>
                                <option value="America/Whitehorse" formula_val="" <?php if($time=="America/Whitehorse") echo 'selected';?>>Whitehorse</option>
                                <option value="America/Winnipeg" formula_val="" <?php if($time=="America/Winnipeg") echo 'selected';?>>Winnipeg</option>
                                <option value="America/Yakutat" formula_val="" <?php if($time=="America/Yakutat") echo 'selected';?>>Yakutat</option>
                                <option value="America/Yellowknife" formula_val="" <?php if($time=="America/Yellowknife") echo 'selected';?>>Yellowknife</option>
        
                         </select>
                    </div>
                    
                    <!-- <div class="form-group">
                        <label>Timezone: <?php 
                        $r='America/Chihuahua';
                        $dt = new DateTime('now', new DateTimezone($r));
             $da=$dt->format('F j, Y, g:i a');
             echo $da;
             ?></label>
                    </div> -->
                    
                    
                
                    <div class="form-group text-left">
                    
                        <label class="mt-3 font-weight-bold">Profile Image:</label><br>
                        <img src="https://affordableattorneyleads.com/img/Lawyer/<?php echo htmlentities($result->Picture);?>" width="300" height="200" style="border:solid 1px #000" id="image">
                        
                    </div>
                    
                    <?php }} ?>
    				
                    
                    <div class="form-group text-left">
                        <input type="file" name="img1" id="profile-img" >
                        <script type="text/javascript">
                        function readURL(input) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();
                                
                                reader.onload = function (e) {
                                    $('#image').attr('src', e.target.result);
                                }
                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                        $("#profile-img").change(function(){
                            readURL(this);
                        });
                    </script>
                    </div>
                    
                    <div class="form-group text-left pb-0 mb-0">
                        <label class="mt-3 font-weight-bold">Category:</label>
                    </div>
                    
                    <div class="form-group p-2 text-left border-top border-bottom border-left border-right col-lg-6 col-md-8 col-sm-10 col-12">
                        
                        <input type="checkbox" name="law1" value="Family" <?php if($opt=="Family") echo 'Checked';?>>Family Law<br>
                        <!--
                        <input type="checkbox" name="law2" value="Bankruptcy" <?php if($Catogory2=="Bankruptcy") echo 'Checked';?>> Bankruptcy <br>
                        <input type="checkbox" name="law3" value="Immigration" <?php if($Catogory3=="Immigration") echo 'Checked';?>> Immigration <br>
                        <input type="checkbox" name="law4" value="Estate" <?php if($Catogory4=="Estate") echo 'Checked';?>> Estate Planning <br>
                        
                        
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
                        -->
                        
                    </div>
                    
                    <div class="form-group text-left">
                   
                        <label class="mt-3 font-weight-bold">Description:</label>
                        <textarea class="form-control" placeholder="This description will appear on your profile page" name="desciption" rows="5" ><?php echo $Descriptio ;?></textarea>
                    </div>   
                     <hr />
                    <div class="form-group">
                            <input type="submit" name="update" id="update" class="btn p-2 btn-sm mb-5 buttons font-weight-bold button_size2" value="Update"  onclick="window.location.href='dashboard'"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include_once"tidio_chat.php" ?> 
</body>
</html>

<?php }?>