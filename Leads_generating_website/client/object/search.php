<?php
//fetch.php
$connect = mysqli_connect("localhost", "u728873214_lead", "123456", "u728873214_leads_generate");
$request = mysqli_real_escape_string($connect, $_POST["query"]);
if (isset($_POST["query"]))
{
    $output = '';
    $query="SELECT Distinct(City),Zipcode,State FROM city WHERE City LIKE '".$_POST["query"]."%' OR Zipcode LIKE '%".$_POST['query']."%'  LIMIT 4";
    $result=mysqli_query($connect,$query);
    $output='<ul class="list-unstyled">';
    if (mysqli_num_rows($result)>0)
    {
        while($row=mysqli_fetch_array($result)){
            $output .='<li>'.$row["City"].",".$row['State'].'</li>';
        }
    }

else{
    // $output .="<span style= class='error ml-5'>Please Enter Valid City</span>";
}
$output .='</ul>';
echo $output;
}

?>