<?php
include("connection.php");
session_start();
$email=$_SESSION['email'];
error_reporting(0);
if ($email==true){
	$query3="SELECT * FROM buyproduct WHERE email='$email' and delivered='0'";
	$data3=mysqli_query($connect,$query3);
	$count3=mysqli_num_rows($data3);
	if($count3==0)
	{
		$query1="DELETE FROM cart WHERE email_user='$email'";
		$data1=mysqli_query($connect,$query1);
		$query="DELETE FROM users WHERE email='$email'";
		$data=mysqli_query($connect,$query);
		if($data and $data1){
			echo "<script>alert('Account Deleted')</script>";
			header('location:index.php');
		}
		else{
			echo "<font color='red'>Sorry,Delete process failed";
			
		}
	}
	else
	{
		echo "<script>alert('You cant delete your account because some products you have ordered')</script>";
		header("Refresh: 1; url=setting.php");
	}

}
	
else{
	header('location:user_login.php');
}
?>