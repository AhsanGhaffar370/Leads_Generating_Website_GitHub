<?php 
include_once "config/database.php"; 
include_once "object/login.php";
?>
<?php
include_once "object/login.php";
include "config/database1.php";
?>
<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['Lawyerlogin'])!=0)
	{	
header('location:dashboard');
}
else{
    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sign up | Affordable Attorney Leads </title>
<link rel="shortcut icon" type="image/x-icon" href="https://affordableattorneyleads.com/site_icon.png" />

<!--#####################################Libraries file##########################################-->
<?php include "libs.php"; ?>

<script src="client_validate.js"></script>

</head>

<body>

<?php
    $database=new Database();
    $db = $database->getConnection();
    //pass connection to objects
    $sign_up = new Signup($db);

    if (isset($_POST['submitbtn']))
    {
        $sign_up->Name = $_POST['fname'];
        $sign_up->Organization = $_POST['organ'];
        $sign_up->Email = $_POST['email'];
        $sign_up->Password = md5($_POST['pass']);
        $sign_up->Contact = $_POST['mob'];
        $sign_up->Zipcode = $_POST['zip'];
        $sign_up->LawyerName = $_POST['fname'];
        $sign_up->state=$_POST['state'];
        // Insert lawyer
        if ($sign_up->emailExists()){
           echo "<div class='alert alert-success'>Email Already Exist.</div>";
        } 
         else{
            if($sign_up->lawyerSignup())
            {
                echo "<div class='alert alert-success'>Successfully Signup.</div> <script type='text/javascript'> document.location = 'login'; </script>";
            }
            else
            {
                echo "<div class='alert alert-danger'>Unable.</div>";
            }

         }
        

        // if unable to create the product, tell the user
       
        //////////////////////////////////////

    }
?>
<center>
<section class="pl-2 pr-2" style="margin-top:8%;margin-bottom:5%;">
	<div class="col-lg-6 col-md-8 col-sm-10 pt-2 pb-4 pl-3 pr-3 bg-light">
    
        <div class="col-lg-9 col-md-9 col-sm-9 col-12">
        	<a href="https://affordableattorneyleads.com/home"><img class="logo images" src="https://affordableattorneyleads.com/Image/attorney.png" alt="Affordable Attorney leads " /></a>
        </div>
        <hr />  
        <form class="lawyer-form1 text-left" method="post" >
            <div class="form-group ">
                <label class="mb-0">Full Name:</label>
                <input type="text" class="form-control p-4" name="fname" id="fname"  placeholder="Full Name"/> 
            </div>
            <div class="form-group ">
                <label class="mb-0">Organization</label>
                <input type="text" class="form-control p-4" name="organ" id="organ"  placeholder="Organization"/> 
            </div>
            
            <div class="form-group">
                <label class="mb-0">Email:</label>
                <input type="text" class="form-control p-4" name="email" id="email" placeholder="Email Address"/>
            </div>
            
            <div class="form-group">
                <label class="mb-0">Phone:</label>
                <input type="tel" class="form-control p-4" name="mob" id="mob" placeholder="Phone"/>
            </div>
            
            <div class="form-group">
                <label class="mb-0">Timezone:</label>
                <select name="state" class="form-control" id="state">
                        <option value="-1" selected="selected" disabled="disabled">-Select-</option>
                        <option value="America/Adak" formula_val="">Adak</option>
                        <option value="America/Anchorage" formula_val="">Anchorage</option>
                        <option value="America/Anguilla" formula_val="">Anguilla</option>
                        <option value="America/Antigua" formula_val="">Antigua</option>
                        <option value="America/Araguaina" formula_val="">Araguaina</option>
                        <option value="America/Argentina/Buenos_Aires" formula_val="">Argentina/Buenos_Aires</option>
                        <option value="America/Argentina/Catamarca" formula_val="">Argentina/Catamarca</option>
                        <option value="America/Argentina/Cordoba" formula_val="">Argentina/Cordoba</option>
                        <option value="America/Argentina/Jujuy" formula_val="">Argentina/Jujuy</option>
                        <option value="America/Argentina/La_Rioja" formula_val="">Argentina/La_Rioja</option>
                        <option value="America/Argentina/Mendoza" formula_val="">Argentina/Mendoza</option>
                        <option value="America/Argentina/Rio_Gallegos" formula_val="">Argentina/Rio_Gallegos</option>
                        <option value="America/Argentina/Salta" formula_val="">Argentina/Salta</option>
                        <option value="America/Argentina/San_Juan" formula_val="">Argentina/San_Juan</option>
                        <option value="America/Argentina/San_Luis" formula_val="">Argentina/San_Luis</option>
                        <option value="America/Argentina/Tucuman" formula_val="">Argentina/Tucuman</option>
                        <option value="America/Argentina/Ushuaia" formula_val="">Argentina/Ushuaia</option>
                        <option value="America/Aruba" formula_val="">Aruba</option>
                        <option value="America/Asuncion" formula_val="">Asuncion</option>
                        <option value="America/Atikokan" formula_val="">Atikokan</option>
                        <option value="America/Bahia" formula_val="">Bahia</option>
                        <option value="America/Bahia_Banderas" formula_val="">Bahia_Banderas</option>
                        <option value="America/Barbados" formula_val="">Barbados</option>
                        <option value="America/Belem" formula_val="">Belem</option>
                        <option value="America/Belize" formula_val="">Belize</option>
                        <option value="America/Blanc-Sablon" formula_val="">Blanc-Sablon</option>
                        <option value="America/Boa_Vista" formula_val="">Boa_Vista</option>
                        <option value="America/Bogota" formula_val="">Bogota</option>
                        <option value="America/Boise" formula_val="">Boise</option>
                        <option value="America/Cambridge_Bay" formula_val="">Cambridge_Bay</option>
                        <option value="America/Campo_Grande" formula_val="">Campo_Grande</option>
                        <option value="America/Cancun" formula_val="">Cancun</option>
                        <option value="America/Caracas" formula_val="">Caracas</option>
                        <option value="America/Cayenne" formula_val="">Cayenne</option>
                        <option value="America/Cayman" formula_val="">Cayman</option>
                        <option value="America/Chicago" formula_val="">Chicago</option>
                        <option value="America/Chihuahua" formula_val="">Chihuahua</option>
                        <option value="America/Costa_Rica" formula_val="">Costa_Rica</option>
                        <option value="America/Creston" formula_val="">Creston</option>
                        <option value="America/Cuiaba" formula_val="">Cuiaba</option>
                        <option value="America/Curacao" formula_val="">Curacao</option>
                        <option value="America/Danmarkshavn" formula_val="">Danmarkshavn</option>
                        <option value="America/Dawson" formula_val="">Dawson</option>
                        <option value="America/Dawson_Creek" formula_val="">Dawson_Creek</option>
                        <option value="America/Denver" formula_val="">Denver</option>
                        <option value="America/Detroit" formula_val="">Detroit</option>
                        <option value="America/Dominica" formula_val="">Dominica</option>
                        <option value="America/Edmonton" formula_val="">Edmonton</option>
                        <option value="America/Eirunepe" formula_val="">Eirunepe</option>
                        <option value="America/El_Salvador" formula_val="">El_Salvador</option>
                        <option value="America/Fort_Nelson" formula_val="">Fort_Nelson</option>
                        <option value="America/Fortaleza" formula_val="">Fortaleza</option>
                        <option value="America/Glace_Bay" formula_val="">Glace_Bay</option>
                        <option value="America/Godthab" formula_val="">Godthab</option>
                        <option value="America/Goose_Bay" formula_val="">Goose_Bay</option>
                        <option value="America/Grand_Turk" formula_val="">Grand_Turk</option>
                        <option value="America/Grenada" formula_val="">Grenada</option>
                        <option value="America/Guadeloupe" formula_val="">Guadeloupe</option>
                        <option value="America/Guatemala" formula_val="">Guatemala</option>
                        <option value="America/Guayaquil" formula_val="">Guayaquil</option>
                        <option value="America/Guyana" formula_val="">Guyana</option>
                        <option value="America/Halifax" formula_val="">Halifax</option>
                        <option value="America/Havana" formula_val="">Havana</option>
                        <option value="America/Hermosillo" formula_val="">Hermosillo</option>
                        <option value="America/Indiana/Indianapolis" formula_val="">Indiana/Indianapolis</option>
                        <option value="America/Indiana/Knox" formula_val="">Indiana/Knox</option>
                        <option value="America/Indiana/Marengo" formula_val="">Indiana/Marengo</option>
                        <option value="America/Indiana/Petersburg" formula_val="">Indiana/Petersburg</option>
                        <option value="America/Indiana/Tell_City" formula_val="">Indiana/Tell_City</option>
                        <option value="America/Indiana/Vevay" formula_val="">Indiana/Vevay</option>
                        <option value="America/Indiana/Vincennes" formula_val="">Indiana/Vincennes</option>
                        <option value="America/Indiana/Winamac" formula_val="">Indiana/Winamac</option>
                        <option value="America/Inuvik" formula_val="">Inuvik</option>
                        <option value="America/Iqaluit" formula_val="">Iqaluit</option>
                        <option value="America/Jamaica" formula_val="">Jamaica</option>
                        <option value="America/Juneau" formula_val="">Juneau</option>
                        <option value="America/Kentucky/Louisville" formula_val="">Kentucky/Louisville</option>
                        <option value="America/Kentucky/Monticello" formula_val="">Kentucky/Monticello</option>
                        <option value="America/Kralendijk" formula_val="">Kralendijk</option>
                        <option value="America/La_Paz" formula_val="">La_Paz</option>
                        <option value="America/Lima" formula_val="">Lima</option>
                        <option value="America/Los_Angeles" formula_val="">Los_Angeles</option>
                        <option value="America/Lower_Princes" formula_val="">Lower_Princes</option>
                        <option value="America/Maceio" formula_val="">Maceio</option>
                        <option value="America/Managua" formula_val="">Managua</option>
                        <option value="America/Manaus" formula_val="">Manaus</option>
                        <option value="America/Marigot" formula_val="">Marigot</option>
                        <option value="America/Martinique" formula_val="">Martinique</option>
                        <option value="America/Matamoros" formula_val="">Matamoros</option>
                        <option value="America/Mazatlan" formula_val="">Mazatlan</option>
                        <option value="America/Menominee" formula_val="">Menominee</option>
                        <option value="America/Merida" formula_val="">Merida</option>
                        <option value="America/Metlakatla" formula_val="">Metlakatla</option>
                        <option value="America/Mexico_City" formula_val="">Mexico_City</option>
                        <option value="America/Miquelon" formula_val="">Miquelon</option>
                        <option value="America/Moncton" formula_val="">Moncton</option>
                        <option value="America/Monterrey" formula_val="">Monterrey</option>
                        <option value="America/Montevideo" formula_val="">Montevideo</option>
                        <option value="America/Montserrat" formula_val="">Montserrat</option>
                        <option value="America/Nassau" formula_val="">Nassau</option>
                        <option value="America/New_York" formula_val="">New_York</option>
                        <option value="America/Nipigon" formula_val="">Nipigon</option>
                        <option value="America/Nome" formula_val="">Nome</option>
                        <option value="America/Noronha" formula_val="">Noronha</option>
                        <option value="America/North_Dakota/Beulah" formula_val="">North_Dakota/Beulah</option>
                        <option value="America/North_Dakota/Center" formula_val="">North_Dakota/Center</option>
                        <option value="America/North_Dakota/New_Salem" formula_val="">North_Dakota/New_Salem</option>
                        <option value="America/Ojinaga" formula_val="">Ojinaga</option>
                        <option value="America/Panama" formula_val="">Panama</option>
                        <option value="America/Pangnirtung" formula_val="">Pangnirtung</option>
                        <option value="America/Paramaribo" formula_val="">Paramaribo</option>
                        <option value="America/Phoenix" formula_val="">Phoenix</option>
                        <option value="America/Port-au-Prince" formula_val="">Port-au-Prince</option>
                        <option value="America/Port_of_Spain" formula_val="">Port_of_Spain</option>
                        <option value="America/Porto_Velho" formula_val="">Porto_Velho</option>
                        <option value="America/Puerto_Rico" formula_val="">Puerto_Rico</option>
                        <option value="America/Punta_Arenas" formula_val="">Punta_Arenas</option>
                        <option value="America/Rainy_River" formula_val="">Rainy_River</option>
                        <option value="America/Rankin_Inlet" formula_val="">Rankin_Inlet</option>
                        <option value="America/Recife" formula_val="">Recife</option>
                        <option value="America/Regina" formula_val="">Regina</option>
                        <option value="America/Resolute" formula_val="">Resolute</option>
                        <option value="America/Rio_Branco" formula_val="">Rio_Branco</option>
                        <option value="America/Santarem" formula_val="">Santarem</option>
                        <option value="America/Santiago" formula_val="">Santiago</option>
                        <option value="America/Santo_Domingo" formula_val="">Santo_Domingo</option>
                        <option value="America/Sao_Paulo" formula_val="">Sao_Paulo</option>
                        <option value="America/Scoresbysund" formula_val="">Scoresbysund</option>
                        <option value="America/Sitka" formula_val="">Sitka</option>
                        <option value="America/St_Barthelemy" formula_val="">St_Barthelemy</option>
                        <option value="America/St_Johns" formula_val="">St_Johns</option>
                        <option value="America/St_Kitts" formula_val="">St_Kitts</option>
                        <option value="America/St_Lucia" formula_val="">St_Lucia</option>
                        <option value="America/St_Thomas" formula_val="">St_Thomas</option>
                        <option value="America/St_Vincent" formula_val="">St_Vincent</option>
                        <option value="America/Swift_Current" formula_val="">Swift_Current</option>
                        <option value="America/Tegucigalpa" formula_val="">Tegucigalpa</option>
                        <option value="America/Thule" formula_val="">Thule</option>
                        <option value="America/Thunder_Bay" formula_val="">Thunder_Bay</option>
                        <option value="America/Tijuana" formula_val="">Tijuana</option>
                        <option value="America/Toronto" formula_val="">Toronto</option>
                        <option value="America/Tortola" formula_val="">Tortola</option>
                        <option value="America/Vancouver" formula_val="">Vancouver</option>
                        <option value="America/Whitehorse" formula_val="">Whitehorse</option>
                        <option value="America/Winnipeg" formula_val="">Winnipeg</option>
                        <option value="America/Yakutat" formula_val="">Yakutat</option>
                        <option value="America/Yellowknife" formula_val="">Yellowknife</option>

                 </select>
            </div>
            
            
            <div class="form-group">
                <label class="mb-0">State:</label>
                <select name="state" class="form-control" id="state">
                		<option value="-1" selected="selected" disabled="disabled">-Select-</option>
                        <option value="Alabama" formula_val="">Alabama</option>
                        <option value="Alaska" formula_val="">Alaska</option>
                        <option value="Arizona" formula_val="">Arizona</option>
                        <option value="Arkansas" formula_val="">Arkansas</option>
                        <option value="California" formula_val="">California</option>
                        <option value="Colorado" formula_val="">Colorado</option>
                        <option value="Connecticut" formula_val="">Connecticut</option>
                        <option value="Delaware" formula_val="">Delaware</option>
                        <option value="Florida" formula_val="">Florida</option>
                        <option value="Georgia" formula_val="">Georgia</option>
                        <option value="Hawaii" formula_val="">Hawaii</option>
                        <option value="Idaho" formula_val="">Idaho</option>
                        <option value="Illinois" formula_val="">Illinois</option>
                        <option value="Indiana" formula_val="">Indiana</option>
                        <option value="Iowa" formula_val="">Iowa</option>
                        <option value="Kansas" formula_val="">Kansas</option>
                        <option value="Kentucky" formula_val="">Kentucky</option>
                        <option value="LouisianaMaine" formula_val="">LouisianaMaine</option>
                        <option value="Maryland" formula_val="">Maryland</option>
                        <option value="Massachusetts" formula_val="">Massachusetts</option>
                        <option value="Michigan" formula_val="">Michigan</option>
                        <option value="Minnesota" formula_val="">Minnesota</option>
                        <option value="Mississippi" formula_val="">Mississippi</option>
                        <option value="Missouri" formula_val="">Missouri</option>
                        <option value="Montana" formula_val="">Montana</option>
                        <option value="Nebraska" formula_val="">Nebraska</option>
                        <option value="Nevada" formula_val="">Nevada</option>
                        <option value="New Hampshire" formula_val="">New Hampshire</option>
                        <option value="New Jersey" formula_val="">New Jersey</option>
                        <option value="New Mexico" formula_val="">New Mexico</option>
                        <option value="New York" formula_val="">New York</option>
                        <option value="North Carolina" formula_val="">North Carolina</option>
                        <option value="North Dakota" formula_val="">North Dakota</option>
                        <option value="Ohio" formula_val="">Ohio</option>
                        <option value="Oklahoma" formula_val="">Oklahoma</option>
                        <option value="Oregon" formula_val="">Oregon</option>
                        <option value="Pennsylvania" formula_val="">Pennsylvania</option>
                        <option value="Rhode Island" formula_val="">Rhode Island</option>
                        <option value="South Carolina" formula_val="">South Carolina</option>
                        <option value="South Dakota" formula_val="">South Dakota</option>
                        <option value="Tennessee" formula_val="">Tennessee</option>
                        <option value="TexasUtah" formula_val="">TexasUtah</option>
                        <option value="Vermont" formula_val="">Vermont</option>
                        <option value="Virginia" formula_val="">Virginia</option>
                        <option value="Washington" formula_val="">Washington</option>
                        <option value="West Virginia" formula_val="">West Virginia</option>
                        <option value="Wisconsin" formula_val="">Wisconsin</option>
                        <option value="Wyoming" formula_val="">Wyoming</option>
                        <option value="Washington DC" formula_val="">Washington DC</option>
                        <option value="ARMED FORCES AFRICA  CANADA  EUROPE  MIDDLE EAST" formula_val="">ARMED FORCES AFRICA  CANADA  EUROPE  MIDDLE EAST</option>
                        <option value="ARMED FORCES AMERICA (EXCEPT CANADA)" formula_val="">ARMED FORCES AMERICA (EXCEPT CANADA)</option>
                        <option value="ARMED FORCES PACIFIC" formula_val="">ARMED FORCES PACIFIC</option>

                 </select>
            </div>
            
            <div class="form-group">
                <label class="mb-0">Zip Code:</label>
                <input type="text" class="form-control p-4" name="zip" id="zip" placeholder="Zip Code"/>
            </div>
            
            
            
                    
            <div class="form-group">
                <label class="mb-0">Password:</label>
                <input type="password" class="form-control p-4" name="pass" id="pass" placeholder="Password"/>
            </div>
            
            <div class="form-group text-center">
            	<input type="submit" name="submitbtn" value="SIGNUP" class="button_size btn mt-5 p-3 btn-lg mb-3 btn-danger font-weight-bold"/>
            </div>
        
        </form>
        <div class="text-center">
        <p>Already have an account?<a href="login" > Login</a></p>
        </div>
    </div>
</section>
</center>

<?php include_once"tidio_chat.php" ?> 
</body>
</html>
<?php 
}
?>