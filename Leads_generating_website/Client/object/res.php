<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "leads_generate_db");
$request = mysqli_real_escape_string($connect, $_POST["quer"]);
if (isset($_POST["quer"]))
{
    $output = '';
    $query="SELECT Distinct(City),Zipcode,State FROM city WHERE City LIKE '%".$_POST["quer"]."%' OR Zipcode = '".$_POST['quer']."' Group by City LIMIT 4";
    $result=mysqli_query($connect,$query);
    // $output='<ul class="list-unstyled">';
    if (mysqli_num_rows($result)>0)
    {
        // while($row=mysqli_fetch_array($result)){
        //     // $output .='<li>'.$row["City"].",".$row['State'].'</li>';
            
        // }
         echo "<script type='text/javascript'> document.location = 'Complete-your-request'; </script>";
    }

else{
    // $output .='<li></li>';
}
// $output .='</ul>';
// echo $output;
}

?>