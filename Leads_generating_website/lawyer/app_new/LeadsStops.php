<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />

<!--#####################################Libraries file##########################################-->
<?php include "libs.php"; ?>
    <title>Document</title>
<link rel="shortcut icon" type="image/x-icon" href="https://affordableattorneyleads.com/growth.png" />
</head>
<body>
<form method=post>


    <input type=submit id="Playbtn1" name="playbtn" value="Play">
    <input type=submit id="Pausebtn1" name="pausebtn" value="Pause">
</form>
<?php
include_once "config/database.php";

if (isset($_POST['playbtn'])){
    $database=new Database();
    $db = $database->getConnection();
    $Play=1;
    $id=1;
    $sql="update lawyer_profile set Play=:Play where id=:id";
    $query = $db->prepare($sql);
    $query->bindParam(':Play',$Play);
    $query->bindParam(':id',$id);
    
    
    if ($query->execute()){
        echo " update ";
    }
    else{
        echo "not ";
    }
}
if (isset($_POST['pausebtn'])){
    $database=new Database();
    $db = $database->getConnection();
    $Play=0;
    $id=1;
    $sql="update lawyer_profile set Play=:Play where id=:id";
    $query = $db->prepare($sql);
    $query->bindParam(':Play',$Play);
    $query->bindParam(':id',$id);
    if ($query->execute()){
        echo " update ";
    }
    else{
        echo "not ";
    }
}


?>
<div style="text-align:center"> 
  <button id="vidbutton">Play</button> 
  <br><br>
  <video id="myvid" width="420">
    <source src="vid.mp4" type="video/mp4">
    <source src="vid.ogg" type="video/ogg">
    Your browser does not support HTML5 video.
  </video>
</div> 


    <!-- <button id="Playbtn">Play</button>
    <button id="Pausebtn" value="pause"></button> -->
</body>
</html>
<script> 
var ppbutton = document.getElementById("Playb");
ppbutton.addEventListener("click", playPause);
myVideo = document.getElementById("myvid");
function playPause() { 
    // if (myVideo.paused) {
    //     myVideo.play();
    alert("hello");
        ppbutton.innerHTML = "Play";
        alert(ppbutton.innerHTML);
    //     }
    // else  {
    //     myVideo.pause(); 
        // ppbutton.innerHTML = "Play";
        // }
} 
</script>
<!-- <script>
$(document).ready(function(){
    var pau=document.getElementById("Pausebtn1");
    alert(pau);
    alert("he");

$('#Pausebtn1').on('click',function(){
    // Pausebtn1.innerHTML="Pause" : "Play";
//     alert("hello1");
//     $('#Playbtn').toggle();
//     $("#Playbtn").attr('value', 'Pause');
//     alert("hello1");
    pau.innerHTML="Pause":"Play";
//     alert("hello");

});
// pau.onclick=function(){
//     pau.innerHTML="Pause":"Play";
// }
// $('#Pausebtn').on('click',function(){
    
//     $('#Playbtn').hide();
// });
});

</script> -->