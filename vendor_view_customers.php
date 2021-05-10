<?php
session_start();
include("connection.php");
error_reporting(0);
$email=$_SESSION['email_vendor'];
if($email==true)
{
?>
<!doctype html>
<html>
<head>
<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/stylesheet.css"></link>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Shopify.com</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    
<title>View Customers</title>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  margin-top:50px;
  background-color:#eee;
  margin-left:0px;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;	
  padding: 8px;
}

</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
<a class="navbar-brand" style="color:white;font-size:40px">Shopify.com</a>
</nav>
<div class="container">
<table class="table" style="border:1px solid black;">
<thead>
	    <tr>
		<td class="nav-item bg-dark" style="color:white;">Name</td>
		<td class="nav-item bg-dark" style="color:white;">Username</td>
		<td class="nav-item bg-dark" style="color:white;">Email-Id</td>
		<td class="nav-item bg-dark" style="color:white;">Address</td>
		</tr>
</thead>
<tbody>
<?php
$query="SELECT email FROM  buyproduct WHERE vendor_email='$email'";
$data=mysqli_query($connect,$query);
$total=mysqli_num_rows($data);

$ar=array();
for($i=1;$i<=$total;$i++)
{
    $res=mysqli_fetch_array($data);
    array_push($ar,$res["email"]);
}
$new_ar=array_unique($ar);
$tot=count($new_ar);
    $k=5;
    $x=ceil($tot/$k);
     $page=$_GET["page"];
    if($page=="" || $page=="1")
    {
        $page1=0;
        $page=1;
    }
    else
    {
        $page1=($page*$k)-$k;
    }
	$sql="SELECT email FROM buyproduct WHERE vendor_email='$email' LIMIT $page1,$k";
    $result=mysqli_query($connect,$sql);
    $l=mysqli_num_rows($result);
    $ar1=array();
    
    for($shi=1;$shi<=$l;$shi++)
    {
       $vani=mysqli_fetch_array($result);
       array_push($ar1,$vani["email"]);
    }
    $new_ar1=array_unique($ar1);
    $tot1=count($new_ar1);
    $j=1;
    echo "<h5 class='list-group-item'style='width:100%'>Results: ".($page1+1)." to ".($page1+$tot)." out of ".$tot."</h5>";
    $sql1="SELECT email FROM buyproduct WHERE vendor_email='$email' LIMIT $page1,$k";
    $result1=mysqli_query($connect,$sql1);
    $l=mysqli_num_rows($result1);
	if(mysqli_num_rows($result1)>0)
        {
            $arr=array();
            while($da=mysqli_fetch_array($result1))
              {
                    $p=$j+(($page-1)*$k);
                    ?>
                    <?php
                            $vu=$da['email'];
                            $sh="SELECT * FROM users WHERE email='$vu'";
                            $ve=mysqli_query($connect,$sh);
                            $line=mysqli_fetch_array($ve);
                            // array_push($arr,$line['email']);
                            if (in_array($line["email"], $arr))
                            {
                            
                            }
                            else
                            {
                                echo "<tr>
                                <td>".$line['name']."</td>
                                <td>".$line['username']."</td>
                                <td>".$line['email']."</td>
                                <td>".$line['address']."</td>
                                </tr>";
                            array_push($arr,$line["email"]);
                            
                            }
                            
                        }}
                    ?>
</tbody>
</table>
</div>
<br><br>
    <a href="welcomevendor.php"><button class="btn btn-secondary" style="float:right;">go-back</button></a>
    <ul class="pagination">
    <a href="vendor_view_customers.php?page=<?php if($page!=1){$g=$page-1;} else{$g=1;} echo $g; ?>"><button class="btn btn-danger">&laquo;Previous</button></a>
    <a href="vendor_view_customers.php?page=1"><button class="btn btn-primary">First</button></a>
    <a href="vendor_view_customers.php?page=<?php echo $x; ?>"><button class="btn btn-primary">Last</button></a>
	
	<!-- <?php
    for($i=1;$i<=$x;$i++)
    {
        if($page==$i)
        {
        ?><a href="vendor_view_customers.php?page=<?php echo $i; ?>" style="text-decoration:none; font-size:20px;" class="active"><?php echo $i." ";?></a>
        <?php
        }
        else{
            ?><a href="vendor_view_customers.php?page=<?php echo $i; ?>" style="text-decoration:none; font-size:20px;"><?php echo $i." ";?></a>
            <?php
        }
        
    }

    
    ?> -->
    
    <a href="vendor_view_customers.php?page=<?php if($page!=$x){$o=$page+1;}else{ $o=$x;} echo $o; ?>"><button class="btn btn-danger">Next&raquo;</button</a>
    </ul>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
<?php
}
else
{
    header("location:vendor_login.php");
}
?>