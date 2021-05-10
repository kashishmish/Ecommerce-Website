<?php
session_start();
include("connection.php");
error_reporting(0);
$email=$_SESSION['email_vendor'];
$id=$_GET['id'];
if($email==true)
{
    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Shopify.com</title>
    
    </head>
    <body class="bg-light">
    <?php
    $ql="SELECT * FROM product WHERE productid='$id'";
    $ata=mysqli_query($connect,$ql);
    $result=mysqli_fetch_array($ata);
    ?>
    <h1 class="bg-dark text-center text-light">Change Product Details Here</h1>
    <form action="" method="POST" style="margin-top:100px;">
    <div class="container">
        <label >Product Name :</label>
        <input class="form-control" type="text" name="proname" value="<?php echo $result['proname']; ?>"/><br><br>
        <label >Product Description :</label>
        <input class="form-control" type="text" name="prodesc" value="<?php echo $result['prodesc']; ?>"/><br><br>
        <label >Product Price :</label>
        <input  class="form-control" type="text" name="price" value="<?php echo $result['price']; ?>"/><br><br>
        <label >Product Quantity :</label>
        <input  class="form-control" type="text" name="quantity" value="<?php echo $result['quantity']; ?>"/><br><br>
        <input  class="form-control btn btn-primary"type="submit" name="submit" value="Change"/>
        
    </div>
    </form>
    <div class="container">
    <a href="vendor_changepro.php"><button  class="btn btn-secondary"style="width:100%;">Go-back</button></a>
    </div>
    <?php
    if($_POST['submit'])
    {
        $name=$_POST['proname'];
        $desc=$_POST['prodesc'];
        $pri=$_POST['price'];
		$quan=$_POST['quantity'];
		$query="UPDATE product SET proname='$name',prodesc='$desc',price='$pri',quantity='$quan' WHERE productid='$id'";
        $data=mysqli_query($connect,$query);
        if($data)
        {
            ?>
            <div class="alert alert-success alert-dismissible fade in" style="position:absolute;top:75px;width:100%">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> You have successfully changed product details.
            </div>
            <?php
            header("Refresh: 2; url=vendor_change_pro.php");
        }
        else	
        {
            ?>
            <div class="alert alert-danger alert-dismissible fade in" style="position:absolute;top:75px;width:100%">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             Profile not updated.
            </div>
            <?php
        }
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
    header("location:vendor_login.php");
}
?>