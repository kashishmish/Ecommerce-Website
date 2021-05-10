<!-- <?php
session_start();
include("connection.php");
error_reporting(0);
$email=$_SESSION['email'];
$cart=$_SESSION['cart'];
?> -->
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
          <a href="#">About Us</a>
          <a href="shopbycat.php">Shop by Category</a>
          <a href="viewcart.php">My Cart</a>
          <a href="vieworder.php">Your Order</a>
          <a href="setting.php">Settings</a>
          <a href="#">Contact Us</a>
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