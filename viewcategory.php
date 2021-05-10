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
.checked {
  color: orange;
}
</style>
</head>
<body class="bg-light">

<?php
include('connection.php');
error_reporting(0);
session_start();
$category=$_GET['ca'];
$subcategory=$_GET['sca'];
$email=$_SESSION['email'];
$cart=$_SESSION['cart'];
include "addition.php";
  $sql1="SELECT * FROM product WHERE category_id='$category' and subcategory_id='$subcategory'";
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
    
    $sql="SELECT * FROM product WHERE category_id='$category' and subcategory_id='$subcategory' LIMIT $page1,$k";
    $result=mysqli_query($connect,$sql);
    $l=mysqli_num_rows($result);
    $j=1;
    echo "<h4 class='list-group-item bg-dark text-white text-center'>Search Results</h4>";
    echo "<h5 class='list-group-item'style='width:100%'>Results: ".($page1+1)." to ".($page1+$l)." out of ".$row."</h5>";
    
    $ka=0;
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
                <a href="viewproduct.php?im=<?php echo $data['mdim1']; ?>"><div class="card" style="width:50%;">
                <h4 class="card-title list-group-item bg-dark text-light nav-item" ><?php echo $data['proname']; ?></h4>
                <center><img class="card-img-left border" src="<?php echo $data['image1'];?>"  height='60%' width='60%' hspace='20' alt="Card image"></center>
                </a>
                <?php if($data['quantity']<=20)
              { ?>
                <p class="card-text text-dark"><h5 class="text-danger">Hurry only <?php echo $data['quantity']." items left!!!</h3>";?></p>
              <?php } ?>
                <div class="card-body-right border rounded" style="display:table-cell">
                  <h4 class="card-title text-dark"><?php echo $data['proname']; ?></h4>
                  <hr>
                  <p class="card-text text-dark"><?php echo $data['prodesc']."<br>".$data['keyword'];?></p>
                  <p class="card-text text-dark">Price: Rs.<?php echo $data['price']."<br>";?></p>
                  <center><h5 class="text-dark chlo"><?php echo $data['offers']; ?></h5></center>
                    <center>
                    <?php 
                    for($mo=1;$mo<=5;$mo++)
                    {
                      if($mo<=$data['rating'])
                      { ?>
                      <span class="fa fa-star checked"></span>
                      <?php }
                      else
                      { ?>
                        <span class="fa fa-star"></span>
                      <?php }
                    } ?>
                </center>
                  <?php
                  $query1="SELECT * FROM cart WHERE email_user='$email'";
                  $result1=mysqli_query($connect,$query1);
                  $row1=mysqli_num_rows($result1);
                  while($data1=mysqli_fetch_array($result1)[2])
                  {
                  if($data1==$data['mdim1'])
                  {
                  $ka=1;
                  
                  break;
                  }
                }
                  if($ka==1)
                  {
                    ?><a href="addcart.php?ca=<?php echo $category; ?>&sca=<?php echo $subcategory; ?>&wh=3&im=<?php echo $data['mdim1']; ?>" class="btn btn-primary rounded disabled" style="float:left;width:50%;">Added to cart</a><a href="buynow.php?id=<?php echo $data['productid']; ?>" class="btn btn-primary rounded" style="float:right;width:50%;">Buy Now</a>
                  <?php
                  }
                  else
                  {
                    ?><a href="addcart.php?ca=<?php echo $category; ?>&sca=<?php echo $subcategory; ?>&wh=3&im=<?php echo $data['mdim1']; ?>" class="btn btn-primary rounded" style="float:left;width:50%;">Add to Cart</a><a href="buynow.php?id=<?php echo $data['productid']; ?>" class="btn btn-primary rounded" style="float:right;width:50%;">Buy Now</a>
                  <?php
                  }
                  ?>
                  
                </div>
                </div>
                
                </center>
                <br>
                <?php
                $j++;
                $ka=0;
              
        }
      }
      
      
    
    ?>
    
    <hr>
    <br><br>
    <a href="index.php"><button class="btn btn-secondary" style="float:right;">go-back</button></a>
    <ul class="pagination">
    <a href="viewcategory.php?ca=<?php echo $category; ?>&sca=<?php echo $subcategory; ?>&page=<?php if($page!=1){$g=$page-1;} else{$g=1;} echo $g; ?>"><button class="btn btn-danger">&laquo;Previous</button></a>
    <a href="viewcategory.php?ca=<?php echo $category; ?>&sca=<?php echo $subcategory; ?>&page=1"><button class="btn btn-primary">First</button></a>
    <a href="viewcategory.php?ca=<?php echo $category; ?>&sca=<?php echo $subcategory; ?>&page=<?php echo $x; ?>"><button class="btn btn-primary">Last</button></a>    
    <a href="viewcategory.php?ca=<?php echo $category; ?>&sca=<?php echo $subcategory; ?>&page=<?php if($page!=$x){$o=$page+1;}else{ $o=$x;} echo $o; ?>"><button class="btn btn-danger">Next&raquo;</button</a>
    </ul>

    
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>
