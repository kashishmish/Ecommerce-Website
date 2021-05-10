<?php
session_start();
include("connection.php");
error_reporting(0);
?>
<!DOCTYPE>
<html>
<head><title></title>
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  width: 250px;
  text-align: center;
  font-family: arial;
  height:250px;
}
.card button:hover {
  opacity: 0.7;
}

</style>
<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
<?php
include "addition.php";
?>
<h1 style="text-align:center">Clothings</h1>
<h4 style="text-align:center">Shop Jeans,kurti,leggins,saree and more</h4>


<?php
    $sql="SELECT * FROM subcategory ORDER BY subcategory_name";
    $result=mysqli_query($connect,$sql);
	while($row=mysqli_fetch_array($result)){
		 $v=$row['category_id'];
	     if ($v==2){
		?>
		
		<a href="viewcategory.php?ca=2&sca=<?php echo $row['subcategory_id'];?>" class='list-group-item list-group-item-action bg-dark' style="text-align:center;color:white;font-size:20px;"><?php echo $row['subcategory_name']; ?></a>
		
		    
    <?php echo  "<center><a href='viewcategory.php?ca=2&sca=".$row['subcategory_id']."'><img src='".$row['subimage']."' height='250' width='250' style='margin-top:20px;margin-bottom:20px;' /></a></center>"; ?>
       
	<?php } ?>
	<?php } ?>
     

</body>
</html><?