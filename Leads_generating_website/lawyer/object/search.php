<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "leads_generate_db");
$request = mysqli_real_escape_string($connect, $_POST["query"]);
if (isset($_POST["query"]))
{
    $output = '';
    $query="SELECT * FROM cities WHERE city LIKE '%".$_POST["query"]."%' OR zipcode like '".$_POST['query']."' LIMIT 4";
    $result=mysqli_query($connect,$query);
    $output='<ul class="list-unstyled">';
    if (mysqli_num_rows($result)>0)
    {
        while($row=mysqli_fetch_array($result)){
            $output .='<li>'.$row["city"].'</li>';
        }
    }

else{
    $output .='<li>Country Not Found</li>';
}
$output .='</ul>';
echo $output;
}

?>