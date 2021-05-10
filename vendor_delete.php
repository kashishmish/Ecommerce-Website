<?php
include("connection.php");
session_start();
$email=$_SESSION['email_vendor'];
error_reporting(0);
if ($email==true){
	$query3="SELECT * FROM buyproduct WHERE vendor_email='$email' and delivered='0'";
	$data3=mysqli_query($connect,$query3);
	$count3=mysqli_num_rows($data3);
	if($count3==0)
	{
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
		$query="DELETE FROM vendor WHERE email='$email'";
		$data=mysqli_query($connect,$query);
		if($data and $data1){
			echo "<script>alert('Account Deleted')</script>";
			header('location:vendor_index.php');
		}
		else{
			echo "<font color='red'>Sorry,Delete process failed";
			
		}
	}
	else
	{
		echo "<script>alert('You cant delete your account because some of your products customers have already bought so deliver them then only you can delete your account')</script>";
		header("Refresh: 1; url=vendor_settings.php");
	}

}
	
else{
	header('vendor_login.php');
}
?>