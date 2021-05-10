<?php
include('connection.php');
error_reporting(0);
session_start();
$email=$_SESSION['email'];
$em=$_GET["im"];
$wh=$_GET["wh"];
if($email==true)
{
    
    $sql="INSERT INTO cart (email_user,image1) VALUES ('$email','$em')";
    $result=mysqli_query($connect,$sql);

    $sqllll="SELECT * FROM cart WHERE email_user='$email'";
    $resultttt=mysqli_query($connect,$sqllll);
    $answer=mysqli_num_rows($resultttt);
    $_SESSION['cart']=$answer;
    
    if($result)
    {
        if($wh==1)
        {
            header("location:productdetails.php");
        }
        else if($wh==2)
        {
            $se=$_GET['se'];
            header("location:allproducts.php?se=$se");
        }
        else if($wh==3)
        {
            $ca=$_GET['ca'];
            $sca=$_GET['sca'];
            header("location:viewcategory.php?ca=$ca&sca=$sca");
        }
        else
        {
            header("location:viewproduct.php?im=$em");
        }
       
    }
    else
    {
        echo("<script> alert('item not added to cart');</script>");
    }
}
else{
    header("location:user_login.php");
}
?>