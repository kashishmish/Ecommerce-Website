<?php
session_start();
include("connection.php");
error_reporting(0);
$email=$_SESSION['email'];
$cart=$_SESSION['cart'];
if($email==true and $cart==false)
{
  $ko="SELECT * FROM cart WHERE email_user='$email'";
  $lo=mysqli_query($connect,$ko);
  $res=mysqli_num_rows($lo);
  if($res==0)
  {
  $_SESSION['cart']=$res;
  }
  else
  {
  $_SESSION['cart']=$res;
  header("Refresh: 0; url=index.php");
  }
}
?>
<!doctype html>
<html lang="en">
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
    <style>
    .chlo{
      text-decoration:none;
    }
    .checked {
  color: orange;
}
    </style>
    
  </head>
  <body class="bg-light">

    <!-- this is for navbar -->
    <nav class="navbar navbar-expand navbar-light bg-dark">
      <!-- this is for curtain menu -->
      <div id="myNav" class="overlay">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="overlay-content">
        <?php
        if($email==true)
        {
          echo "<a style='font-size:20px;' href='welcomeuser.php' >".$_SESSION['email']."</a>";
        }
        else
        {
          echo "<a href='user_login.php'>Login</a>";
          echo "<a href='user_registration.php'>Sign up</a>";
        }
        ?>
          <a href="index.php">Home</a>
          <a href="about.php">About Us</a>
          <a href="shopbycat.php">Shop by Category</a>
          <a href="viewcart.php">My Cart</a>
          <a href="vieworder.php">Your Order</a>
          <a href="setting.php">Settings</a>
          <a href="contact.php">Contact Us</a>
          <a href="welcomeuser.php">My Account</a>
        </div>
      </div>
      <a class="navbar-brand" href="#" style="font-size: 40px;"><span class="navbar-brand" style="font-size:36px;cursor:pointer;color: white;" onclick="openNav()">&#9776;</span></a>
      <script>
        /* Open when someone clicks on the span element */
          function openNav() {
            document.getElementById("myNav").style.width = "300px";
          }

          /* Close when someone clicks on the "x" symbol inside the overlay */
          function closeNav() {
            document.getElementById("myNav").style.width = "0%";
          }
 
      </script>
      <a class="navbar-brand" href="#" style="font-size: 40px;color: white;">Shopify.com</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
          <?php
          if($cart==true)
          {
            ?>
            <a class="nav-link" href="viewcart.php"><i class="fa fa-shopping-cart"(current) style="font-size: 40px;position: absolute;right:10px;top:30px;color: white;"><?php 
    echo $cart;

    ?></i></a>
          <?php }
          else
          {
            ?>
            <a class="nav-link" href="viewcart.php"><i class="fa fa-shopping-cart"(current) style="font-size: 40px;position: absolute;right:10px;top:30px;color: white;"><?php 
    echo "0";

    ?></i></a>
         <?php } ?>
          </li>
          
        </ul>
      </div>
    </nav>
    <!-- this is for search bar -->
        <form action="" method="post" enctype="multipart/form-data" class="form-group">
          <div class="input-group">
            <input type="text" class="form-control"style="padding:25px;font-size:20px;background-color:#202a3f;" placeholder="search your wishlist here!!!" name="search_text" id="search_text">
            <div class="input-group-btn">
              <input class="btn btn-default" style="background: orange;width: 100px;padding: 12.5px;" type="submit" name="submit" value="Search">
            </div>
          </div>
        </form>
        <?php
        if($_POST["submit"])
        {
        $search=$_POST["search_text"];
        $_SESSION["search"]=$search;
        header("location:productdetails.php");
        }
        ?>
      <br>
      <div  style=" 
            position: sticky;
            z-index: 1;
            width:100%;
            margin-top: -38px;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0, 1);
            overflow-x: hidden;
            transition: 0.5s;">
        <div id="result" class="list-group">
        </div>
    </div>
    <div>
    
    <!-- this is for electronics slider -->
        <h1 class="text-center" style="background-color:rgb(205,92,92)">Electronics</h1><br>
        <?php
        $sqll="SELECT * FROM product WHERE category_id='1' LIMIT 0,12";
        $query7=mysqli_query($connect,$sqll);
        

  ?>
      <div id="carouselExampleControls" class="carousel slide"  id="slider" data-ride="carousel" >
          <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row">
                <?php
                for($bo=1;$bo<=4;$bo++)
                {
                $data7=mysqli_fetch_array($query7);
                
				?>
                <div class="col-3"> <a href="viewproduct.php?im=<?php echo $data7['mdim1']; ?>"><img src="<?php echo $data7['image1']; ?>" width="250px"height="250px" class="d-block w-100" alt="...">
                </a>
				
                <center><h5 class="text-dark chlo"><?php echo $data7['proname']; ?></h5></center>
                <center><h5 class="text-dark chlo"><?php echo "Rs.".$data7['price']."/-"; ?></h5></center>
                <center><h5 class="text-dark chlo"><?php echo $data7['offers']; ?></h5></center>
                <center>
                <?php 
                for($po=1;$po<=5;$po++)
                {
                  if($po<=$data7['rating'])
                  { ?>
                  <span class="fa fa-star checked"></span>
                  <?php }
                  else
                  { ?>
                    <span class="fa fa-star"></span>
                  <?php }
                } ?>
                </center>
                </div>
                
                <?php
                }
                ?>
                    
                </div>
            </div>
            
            <div class="carousel-item">
              <div class="row">
              <?php
                for($bo=1;$bo<=4;$bo++)
                {
                $data7=mysqli_fetch_array($query7); ?>
                <div class="col-3"> <a href="viewproduct.php?im=<?php echo $data7['mdim1']; ?>"><img src="<?php echo $data7['image1']; ?>" width="250px"height="250px" class="d-block w-100" alt="...">
                </a>
                <center><h5 class="text-dark chlo"><?php echo $data7['proname']; ?></h5></center>
                <center><h5 class="text-dark chlo"><?php echo "Rs.".$data7['price']."/-"; ?></h5></center>
                <center><h5 class="text-dark chlo"><?php echo $data7['offers']; ?></h5></center>
                <center>
                <?php 
                for($po=1;$po<=5;$po++)
                {
                  if($po<=$data7['rating'])
                  { ?>
                  <span class="fa fa-star checked"></span>
                  <?php }
                  else
                  { ?>
                    <span class="fa fa-star"></span>
                  <?php }
                } ?>
                </center>
                </div>
                 
                <?php
                }
                ?>
              </div>
            </div>
            </div>
      </div>
     <a href="allproducts.php?se=1"> <button class="btn btn-primary" style="float:right">View More</button></a>
          <!-- <a class="carousel-control-prev bg-dark"  href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next bg-dark" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a> -->
        
    <br>

    <br>

        <!-- this is for clothing slider -->
        <h1 class="text-center" style="background-color:rgb(205,92,92)">Clothing</h1><br>
        <?php
        $sqll2="SELECT * FROM product WHERE category_id='2' LIMIT 0,12";
        $query8=mysqli_query($connect,$sqll2);
        

  ?>
      <div id="carouselExampleControls" class="carousel slide"  id="slider" data-ride="carousel" >
          <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row">
                <?php
                for($bp=1;$bp<=4;$bp++)
                {
                $data8=mysqli_fetch_array($query8); ?>
                <div class="col-3"> <a href="viewproduct.php?im=<?php echo $data8['mdim1']; ?>"><img src="<?php echo $data8['image1']; ?>" width="250px"height="250px" class="d-block w-100" alt="...">
                </a>
                <center><h5 class="text-dark chlo"><?php echo $data8['proname']; ?></h5></center>
                <center><h5 class="text-dark chlo"><?php echo "Rs.".$data8['price']."/-"; ?></h5></center>
                <center><h5 class="text-dark chlo"><?php echo $data8['offers']; ?></h5></center>
                <center>
                <?php 
                for($mo=1;$mo<=5;$mo++)
                {
                  if($mo<=$data8['rating'])
                  { ?>
                  <span class="fa fa-star checked"></span>
                  <?php }
                  else
                  { ?>
                    <span class="fa fa-star"></span>
                  <?php }
                } ?>
                </center>
                </div>
                
                <?php
                }
                ?>
                    
                </div>
            </div>
            
            <div class="carousel-item">
              <div class="row">
              <?php
                for($bp=1;$bp<=4;$bp++)
                {
                $data8=mysqli_fetch_array($query8); ?>
                <div class="col-3"> <a href="viewproduct.php?im=<?php echo $data8['mdim1']; ?>"><img src="<?php echo $data8['image1']; ?>" width="250px"height="250px" class="d-block w-100" alt="...">
                </a>
                <center><h5 class="text-dark chlo"><?php echo $data8['proname']; ?></h5></center>
                <center><h5 class="text-dark chlo"><?php echo "Rs.".$data8['price']."/-"; ?></h5></center>
                <center><h5 class="text-dark chlo"><?php echo $data8['offers']; ?></h5></center>
                <center>
                <?php 
                for($mo=1;$mo<=5;$mo++)
                {
                  if($mo<=$data8['rating'])
                  { ?>
                  <span class="fa fa-star checked"></span>
                  <?php }
                  else
                  { ?>
                    <span class="fa fa-star"></span>
                  <?php }
                } ?>
                </center>
                </div>
                 
                <?php
                }
                ?>
              </div>
            </div>
            
          </div>
      </div>
      <a href="allproducts.php?se=2"><button class="btn btn-primary" style="float:right">View More</button></a>
      <br>
        
    <br>


        <!-- this is for cards -->
          <h1 style="text-align: center;background-color: rgb(205,92,92);">Categories</h1>
          <div class="row">
          <a href="sub_electronics.php" class="text-dark">
            <div class="col-md-6">
            
              <div class="card">
              
                <!-- <div class="card-body bg-light"style="height:275px;"> -->
                  <!-- <h1 class="card-title bg-light" align="center">ELECTRONICS</h1> -->
                  <center><img src="images/electronics.jpg" width="100%" height="100%"></center>
              </a>    
                <!-- </div> -->
              </div>
            </div>
            <a href="sub_clothing.php" class="text-dark">
            <div class="col-md-6">
            
              <div class="card">
              
                <!-- <div class="card-body bg-light"style="height:275px;" > -->
                <center><img src="images/clothing.jpg" height="248px"></center>
              </a>  
                <!-- </div> -->
              </div>
            </div>
          </div>
          
        <br>


        <!-- this is for top models electronics -->
          <h1 style="background-color:rgb(205,92,92);text-align:center;border:2px" >Top Model Electronics</h1>
          <div class="card-group">
          <?php
          for($vo=1;$vo<=4;$vo++)
                {
                $data7=mysqli_fetch_array($query7); ?>
            <div class="card">
               <center><a href="viewproduct.php?im=<?php echo $data7['mdim1']; ?>"><img src="<?php echo $data7['image1']; ?>" width="250px"height="250px" alt="..."></center>
                <center><h5 class="text-dark chlo"><?php echo $data7['proname']; ?></h5></center>
                <center><h5 class="text-dark chlo"><?php echo "Rs.".$data7['price']."/-"; ?></h5></center></a>
                <center><h5 class="text-dark chlo"><?php echo $data7['offers']; ?></h5></center>
                <center>
                <?php 
                for($mo=1;$mo<=5;$mo++)
                {
                  if($mo<=$data7['rating'])
                  { ?>
                  <span class="fa fa-star checked"></span>
                  <?php }
                  else
                  { ?>
                    <span class="fa fa-star"></span>
                  <?php }
                } ?>
                </center>
             </div>
             <?php
                } ?>
          </div>
          
          <br>

          <!-- this is for clothing  -->
          <h1 style="background-color:rgb(205,92,92);text-align:center;border:2px" >Top Brand Clothing</h1>
          <div class="card-group">
          <?php
          for($lo=1;$lo<=4;$lo++)
                {
                $data8=mysqli_fetch_array($query8); ?>
            <div class="card">
               <center><a href="viewproduct.php?im=<?php echo $data8['mdim1']; ?>"><img src="<?php echo $data8['image1']; ?>" width="250px"height="250px" alt="..."></center>
                <center><h5 class="text-dark chlo"><?php echo $data8['proname']; ?></h5></center>
                <center><h5 class="text-dark chlo"><?php echo "Rs.".$data8['price']."/-"; ?></h5></center></a>
                <center><h5 class="text-dark chlo"><?php echo $data8['offers']; ?></h5></center>
                <center>
                <?php 
                for($mo=1;$mo<=5;$mo++)
                {
                  if($mo<=$data8['rating'])
                  { ?>
                  <span class="fa fa-star checked"></span>
                  <?php }
                  else
                  { ?>
                    <span class="fa fa-star"></span>
                  <?php }
                } ?>
                </center>
             </div>
             <?php
                } ?>
          
          </div>
          <a href="allproducts.php?se=3" class="list-group-item bg-light"><button class="btn btn-primary" style="width:100%">View All Products</button></a>
          <br>
    <!-- this is for footer     -->
    <footer style="background-color:black;color:white;">
      <h2 style="text-align:right">©2020,Shopify.com, Inc. or its affiliates</h2>
      <h2 style="text-align:left">Email:shopify345@gmail.com</h2>
      <h2  style="text-align:left">Address: xyz,ABES Engineering College Ghaziabad </h2>
    </footer>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    </body>
</html>
<script>
$(document).ready(function(){
    $('#search_text').keyup(function(){
        var txt=$(this).val();
        if(txt!='')
        {
            $('#result').html('');
            $.ajax({
                url:"fetch.php",
                method:"post",
                data:{search:txt},
                dataType:"text",
                success:function(data)
                {
                    $('#result').html(data);
                }
            });
            
        }
        else
        {
            $('#result').html('');
        }
    });
    $(document).on('click','a',function(){
        $('#search_text').val($(this).text());
        $('#result').html('');
    });
});

</script>