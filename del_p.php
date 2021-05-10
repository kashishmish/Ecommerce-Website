<?php
include("connection.php");
session_start();
$buyid=$_GET['buyid'];
$email=$_SESSION['email_vendor'];
if ($email==true){
$query="UPDATE buyproduct SET delivered='1' WHERE buyid='$buyid'";
$res=mysqli_query($connect,$query);
if($res){
	header('location:deliver_product.php');
}
else{
	echo "<font color='red'>Sorry,Delete process failed";
	
}

}
	
else{
	header('vendor_login.php');
}
?>