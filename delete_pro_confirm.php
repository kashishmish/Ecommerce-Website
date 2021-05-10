<?php
session_start();
include("connection.php");
$userprofile=$_SESSION['uname'];
error_reporting(0);
if($userprofile==true)
{
	$i=$_GET['id'];
	$query1="SELECT * FROM PRODUCT WHERE PRODUCTID='$i'";
	$data1=mysqli_query($connect,$query1);
	$res1=mysqli_fetch_array($data1);
	unlink($res1['image1']);
	unlink($res1['image2']);
	unlink($res1['image3']);
	unlink($res1['image4']);

	$query="DELETE FROM product WHERE productid='$i'";
	$data=mysqli_query($connect,$query);
	if($data){
		header("location:delete_pro_admin.php");
	}
	else{
		echo "<script>alert('Product not Deleted')</script>";
		
	}
}
else
{
	header("location:admin_login.php");
}
?>