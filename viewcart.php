<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"></link>
<style>
.kash:hover{
  background-color:#24a0ed;
  border-radius: 5px;
}
.mish:hover{
  background-color:red;
  border-radius: 5px;
}
</style>
</head>
<body class="bg-light">
<?php
include('connection.php');
error_reporting(0);
session_start();
$email=$_SESSION['email'];
$cart=$_SESSION['cart'];
if($email==true)
{
  include "addition.php";
$sql="SELECT * FROM cart WHERE email_user='$email'";
$result=mysqli_query($connect,$sql);
$row=mysqli_num_rows($result);

echo "<h3 class='list-group-item bg-dark text-light text-center'>Carts of ".$email."</h3>";
if($row>0)
{
    ?>
    <table class="table table-bordered table-center">
	    <tr><th>Product Name :</th><th>Product Price :</th><th>Product Image :</th><th colspan="2" class="text-center">Operations:</th></tr>
        <?php
    while($data=mysqli_fetch_array($result))
    {
        $sql1="SELECT * FROM product WHERE mdim1='$data[image1]'";
        $result1=mysqli_query($connect,$sql1);
        $data1=mysqli_fetch_array($result1);
        ?>
        
			<tr><td><?php echo $data1['proname'];  ?></td><td>Rs.<?php  echo number_format($data1['price']); ?>/-</td>
			<td class="text-center"><a href="viewproduct.php?im=<?php echo $data1['mdim1']; ?>"><img src="<?php echo $data1['image1'];?>" width="50px" height="50px"></a></td>
            <td><center><a href="removecart.php?im=<?php echo $data1['mdim1']; ?>" class="btn btn-secondary mish">Remove</a></center></td>
            <td><center><a href="buynow.php?id=<?php echo $data1['productid'];?>" class="btn btn-primary kash">Buy Now</a></center></td>
			</tr>
		    
		   
           <?php
    }
    ?>
    </table>
    <?php
}
else
{
    echo "<h4 class='list-group-item bg-light'>No Products present<h4>";
}
?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>
<?php
}
else
{
    header("location:user_login.php");
}
?>
