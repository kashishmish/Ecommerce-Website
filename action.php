<?php
    require 'connection.php';
    $output='';
    $sql="SELECT * FROM subcategory WHERE category_id='".$_POST['categoryID']."' ORDER BY subcategory_name";
    $result=mysqli_query($connect,$sql);
    $output .='<option value="" disabled  selected>-select subcategory-</option>';
    while($row=mysqli_fetch_array($result)){
        $output .='<option value="'.$row["subcategory_id"].'">'.$row["subcategory_name"].'</option>';
    }
    echo $output;
?>