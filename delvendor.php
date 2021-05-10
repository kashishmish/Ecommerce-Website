<?php
include("connection.php");
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
	echo "<script>alert('Product Deleted')</script>";
	?>
	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/shopify/vendor_deleteproducts.php">
	<?php 
}
else{
	echo "<script>alert('Product not Deleted')</script>";
	
}
?>