<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"></link>
<style>
.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 2px 2px;
  text-decoration: none;
}

.pagination a.active {
  background-color: #4CAF50;
  color: white;
  border-radius: 5px;
}

.pagination a:hover:not(.active) {
  background-color: #ddd;
  border-radius: 5px;
}
.card:hover{
  background-color: #ddd;
  border-radius: 5px;
}
.card{
  border-width:solid;
}
.card a{
  text-decoration:none;
}
</style>
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
<a class="navbar-brand" style="color:white;font-size:40px">Shopify.com</a>
</nav>

<?php
session_start();
include("connection.php");
$userprofile=$_SESSION['uname'];
error_reporting(0);
if($userprofile==true)
{
    echo "<h3 class='list-group-item bg-dark text-light text-center'>Products present are: </h3>";
    $sql1="SELECT * FROM buyproduct WHERE delivered='0'";
    $res1=mysqli_query($connect,$sql1);
    $row=mysqli_num_rows($res1);
    $k=5;
    $x=ceil($row/$k);
    
    if(isset($_GET["page"]))
    {
      $page=$_GET["page"];
    }
    else
    {
      $page="";
    }
    
    if($page=="" || $page=="1")
    {
        $page1=0;
        $page=1;
    }
    else
    {
        $page1=($page*$k)-$k;
    }
    $sql="SELECT * FROM buyproduct WHERE delivered='0' LIMIT $page1,$k";
    $result=mysqli_query($connect,$sql);
    $l=mysqli_num_rows($result);
    $j=1;

    echo "<h5 class='list-group-item'style='width:100%'>Results: ".($page1+1)." to ".($page1+$l)." out of ".$row."</h5>";
    echo "<br>";
      ?>
      <div class="container">
      <div class="row justify-content-center">
	    <div class="col-md-12 mb-5">
      <table class="table table-bordered table-striped table-center">
      <tr class="bg-dark text-light"><th>Transaction Id</th><th>User Email</th><th>Vendor Email</th><th>Product Id</th></tr>
      <?php
      
      if($l>0)
      {
          while($rop=mysqli_fetch_array($result))
          {
              ?>
            <tr>
            <td><?php echo $rop['buyid'];  ?></td>
            <td><?php  echo $rop['email']; ?></td>
		    <td><?php echo $rop['vendor_email']; ?></td>
            <td><?php echo $rop['productid']; ?></td>
            </tr>
            <?php
          }
      }
      ?>
      </table>
      </div>
      </div>
      </div>
      <hr>
    <br>
    <a href="admin_view_products.php"><button class="btn btn-secondary" style="float:right;">go-back</button></a>
    <ul class="pagination">
    <a href="product_buy.php?page=<?php if($page!=1){$g=$page-1;} else{$g=1;} echo $g; ?>"><button class="btn btn-danger">&laquo;Previous</button></a>
    <a href="product_buy.php?page=1"><button class="btn btn-primary">First</button></a>
    <a href="product_buy.php?page=<?php echo $x; ?>"><button class="btn btn-primary">Last</button></a>
    <a href="product_buy.php?page=<?php if($page!=$x){$o=$page+1;}else{ $o=$x;} echo $o; ?>"><button class="btn btn-danger">Next&raquo;</button</a>
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
    
    header("location:admin_login.php");
  }
?>