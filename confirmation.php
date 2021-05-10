<?php
require_once 'connection.php';
session_start();
$em=$_SESSION['email'];
echo $em;
if ($em==true){
error_reporting(0);
if (isset($_GET['id'])){
    $idd=$_GET['id'];
    $quantityy=$_GET['quant'];
    $trans=rand(100000000,999999999);
    $sql="SELECT * FROM product WHERE productid='$idd'";
    $res=mysqli_query($connect,$sql);
    $data=mysqli_fetch_array($res);
    echo $trans;
    $kashish="INSERT INTO buyproduct VALUES ('$trans','$idd','$quantityy','$em','$data[vemail]',now(),'0')";
    $mishra=mysqli_query($connect,$kashish);
    $new_quantity=(int)$data['quantity']-(int)$quantityy;
    $abc="UPDATE product SET quantity='$new_quantity' WHERE productid='$idd'";
    $pqr=mysqli_query($connect,$abc);
    if($mishra==1 and $pqr)
    {
        header("location:congratulate.php?trans=$trans");
    }
    else
    {
        echo "<h1>Sorry could not place your order</h1>";
    }
}
else{
	echo "No Product Found!!";
}

}
else{
    header("location:buynow.php?id=$idd");
}
?>