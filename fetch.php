<?php
require 'connection.php';
$output='';
$sql="SELECT * FROM product WHERE keyword LIKE '%".$_POST["search"]."%'";
$result=mysqli_query($connect,$sql);
if(mysqli_num_rows($result)>0)
{
    while($row=mysqli_fetch_array($result))
    {
        $output .='
        <a href="#" class="list-group-item list-group-item-action border-1">'.$row["proname"].'</a>';
    }
    echo $output;
}
else
{
    echo 'data not found';
}
?>