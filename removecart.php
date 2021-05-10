<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="
    sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"></link>
     </head>
<body class="bg-light">
<?php
include('connection.php');
error_reporting(0);
session_start();
$email=$_SESSION['email'];
$im=$_GET['im'];
$query="DELETE FROM cart WHERE image1='$im'";
$data=mysqli_query($connect,$query);
$queryyyy="SELECT * FROM cart WHERE email_user='$email'";
$dataaaa=mysqli_query($connect,$queryyyy);
$resultt=mysqli_num_rows($dataaaa);
$_SESSION['cart']=$resultt;
if($data)
{
	header("location:viewcart.php");
}
else
{
	echo "<script> alert ('not deleted'); </script>";
}
?>