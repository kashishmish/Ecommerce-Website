<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"></link>
     </head>
<body class="bg-light">
<?php
include('connection.php');
error_reporting(0);
session_start();
$userprofile=$_SESSION['uname'];
if($userprofile==true)
{ 
    $email=$_GET['email'];
    $query="DELETE FROM vendor WHERE email='$email'";
    $data=mysqli_query($connect,$query);
    $query2="SELECT * FROM PRODUCT WHERE VEMAIL='$email'";
    $data2=mysqli_query($connect,$query2);
    $row2=mysqli_num_rows($data2);
    if($row2>0)
    {
        while($res2=mysqli_fetch_array($data2))
        {
            unlink($res2['image1']);
            unlink($res2['image2']);
            unlink($res2['image3']);
            unlink($res2['image4']);
        }
    }
    $query1="DELETE FROM product WHERE vemail='$email'";
    $data1=mysqli_query($connect,$query1);
    if($data and $data1)
    {
        header("location:delete_vendor.php");
    }
    else
    {
        echo "<script> alert ('not deleted'); </script>";
    }
}
else
{
    header("location:admin_login.php");
}
    ?>