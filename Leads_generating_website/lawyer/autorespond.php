
<?php 
include_once "config/database.php";
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['Catogory'])==0){
    header('location:login');
}
if(strlen($_SESSION['Lawyerlogin'])==0)
	{	
header('location:login');
}
else{
    $id=$_SESSION['id'];
    if (strlen($_SESSION['Catogory'])==0){
        header('location:change-images');
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Autorespond</title>
    <script src="ckeditor/ckeditor.js"></script>
</head>
<body>
    <?php
     $database=new Database();
     $db = $database->getConnection();
if(isset($_POST['submitbtn']))
{
    // $from_name="Muhammad Faraz";
    // $from_email="faraz@legalhelpservice.com";
    // $headers  = "MIME-Version: 1.0\r\n";
    // $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
    // $headers .= "From: {$from_name} <{$from_email}> \n";
    // $send_to_email="muhammadfaraz991@gmail.com";
    // $subject=$_POST['subject'];
    // $body=$_POST['editor'];
    // if(mail($send_to_email, $subject, $body, $headers)){
    //     echo "send ";
    // }
    // else{
    //     echo "not send";
    // }
    $subject=$_POST['subject'];
    $detail=$_POST['editor'];
    $email="muhammadfaraz991@gmail.com";
    $active=$_POST['active'];
$sql = "UPDATE lawyer_profile SET detail=:detail,subject=:subject,active=:active where id=:id";
$query = $db->prepare($sql);
$query-> bindParam(':detail',$detail, PDO::PARAM_STR);
$query-> bindParam(':subject',$subject, PDO::PARAM_STR);
$query-> bindParam(':active',$active, PDO::PARAM_STR);
$query-> bindParam(':id',$id, PDO::PARAM_STR);
$query -> execute();
$msg="Page data updated  successfully";

}
?>
    <form class="lawyer-form1 p-4 text-left" method="post" >
    <?php $sql = "SELECT subject,detail,active from lawyer_profile where id=:id";
$query = $db -> prepare($sql);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{
$detail = htmlentities($result->detail);
$sub= htmlentities($result->subject);
$act= htmlentities($result->active);

}}?>
    <label>Message status</label><input type="radio" name="active" value="1" >ON
    <input type="radio" name="active" value="0" >OFF
    
    <label>Email Subject</label>
    
    <input type="text" name="subject" value="<?php echo $sub?>" >
      
     <textarea class="ckeditor" name="editor">
     <?php echo $detail?>
     </textarea>
     <input type="submit" name="submitbtn" value="Update" class="button_size btn p-3 btn-lg mb-3 btn-danger font-weight-bold"/>
           
    </form>
</body>

</html>
<?php }?>