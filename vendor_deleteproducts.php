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
include('connection.php');
error_reporting(0);
session_start();
$em=$_SESSION['email_vendor'];
if($em==true)
{   $sql1="SELECT * FROM product WHERE vemail='$em'";
    $res1=mysqli_query($connect,$sql1);
    $row=mysqli_num_rows($res1);
    $k=5;
    $x=ceil($row/$k);
    
    
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
    
    $sql="SELECT * FROM product WHERE vemail='$em' LIMIT $page1,$k";
    $result=mysqli_query($connect,$sql);
    $l=mysqli_num_rows($result);
    $j=1;
    echo "<h5 class='list-group-item'style='width:100%'>Results: ".($page1+1)." to ".($page1+$l)." out of ".$row."</h5>";
    if(mysqli_num_rows($result)>0)
    {
        while($data=mysqli_fetch_array($result))
        {
            $p=$j+(($page-1)*$k);
            ?>
            <hr>
            <?php
            // echo "<h1> ".$p."</h1> ";
            ?>
            <center>
            <div class="card" style="width:50%;">
            <h4 class="card-title list-group-item bg-dark text-light nav-item" ><?php echo $data['proname']; ?></h4>
            <center><img class="card-img-left border" src="<?php echo $data['image1'];?>"  height='40%' width='40%' hspace='20' alt="Card image"></center>
            <div class="card-body-right border rounded" style="display:table-cell">
              <h4 class="card-title text-dark"><?php echo $data['proname']; ?></h4>
              <hr>
              <p class="card-text text-dark"><?php echo $data['prodesc']."<br>".$data['keyword'];?></p>
              <p class="card-text text-dark">Price: Rs.<?php echo $data['price']."<br>";?></p>
			 
			 <?php
                  $ka1=0;
				          $s=$data['productid'];
                  $query9="SELECT * FROM buyproduct WHERE productid='$s'";
                  $result9=mysqli_query($connect,$query9);
                  $row9=mysqli_num_rows($result9);
                  while($data9=mysqli_fetch_array($result9)[1])
                  {
                  if($data9==$data['productid'])
                  {
                  $ka1=1;
                  
                  break;
                  }
                }
                  if($ka1==1)
                  {
                    ?><a href="#" onclick="return checkdelete()"><button class="btn btn-primary rounded disabled" style="float:left;width:100%;">Delete Product</button></a>
                  <?php 
				 }
				  else
                  {
                    ?><a href="delvendor.php?id=<?php echo $data['productid']; ?>" onclick="return confirmdelete()"><button class="btn btn-primary rounded" style="float:left;width:100%;">Delete Product</button></a>
                  <?php
                  }
                
             ?>
			  
             </div>
            </div>
            
            </center>
            <br>
            <?php
            $j++;
        }
		
    }
	?>
	
    <hr>
    <br><br>
    <a href="welcomevendor.php"><button class="btn btn-secondary" style="float:right;">go-back</button></a>
    <ul class="pagination">
    <a href="vendor_deleteproducts.php?page=<?php if($page!=1){$g=$page-1;} else{$g=1;} echo $g; ?>"><button class="btn btn-danger">&laquo;Previous</button></a>
    <a href="vendor_deleteproducts.php?page=1"><button class="btn btn-primary">First</button></a>
    <a href="vendor_deleteproducts.php?page=<?php echo $x; ?>"><button class="btn btn-primary">Last</button></a>
    
    <!-- <?php
    for($i=1;$i<=$x;$i++)
    {
        if($page==$i)
        {
        ?><a href="vendor_deleteproducts.php?page=<?php echo $i; ?>" style="text-decoration:none; font-size:20px;" class="active"><?php echo $i." ";?></a>
        <?php
        }
        else{
            ?><a href="vendor_deleteproducts.php?page=<?php echo $i; ?>" style="text-decoration:none; font-size:20px;"><?php echo $i." ";?></a>
            <?php
        }
        
    }
    
    ?> -->
    
    <a href="vendor_deleteproducts.php?page=<?php if($page!=$x){$o=$page+1;}else{ $o=$x;} echo $o; ?>"><button class="btn btn-danger">Next&raquo;</button</a>
    </ul>

    
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<script>
function confirmdelete(){
	return confirm("Are you sure you want to delete this???");
}
</script>
<script>
function checkdelete(){
	return alert("Product Cannot be deleted");
}
</script>

</body>
</html>
<?php
}
  else
  {
    
    header("location:vendor_login.php");
  }
?>