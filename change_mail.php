<?php
session_start();
include("connection.php");
error_reporting(0);
$userprofile=$_SESSION['uname'];
if($userprofile==true)
{
    $ven_email=$_GET['em'];
    $pro_id=$_GET['id'];
    $sql="select * from product where productid='$pro_id'";
    $con=mysqli_query($connect,$sql);
    $res=mysqli_fetch_array($con);
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"></link>
    <style>
    .a{
        position:absolute;
        top:50%;
        left:50%;
        transform:translate(-50%,-50%);
    }
    </style>
</head>
<body class="bg-light">
<h1 class="list-group-item bg-dark text-light" style="text-align:center">Welcome!!! <?php echo $userprofile; ?> Can change products using this form</h1>
    <div class="container a">
    <h2 class="list-group-item bg-dark text-light" style="text-align:center">Type here whatever change you want in the product</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label class="list-group-item bg-secondary text-light">Message</label>
        <input type="text" class="form-control list-group-item" name="message" placeholder="type what you want vendor to change in this product" required><br><br>
        <input class="btn btn-danger"style="width:100%" type="submit" name="submit" value="Send Email">

    </form> 
    </div>
    <?php

    if($_POST["submit"])
      {
        $message=$_POST['message'];
        require_once 'PHPMailer/PHPMailer-5.2-stable/PHPMailerAutoload.php';

        $mail = new PHPMailer;

        //$mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com;';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'librarymanagementsystem786@gmail.com';                 // SMTP username
        $mail->Password = 'mishra@1234';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        $mail->setFrom('librarymanagementsystem786@gmail.com', 'Shopify');
        $mail->addAddress($ven_email);     // Add a recipient

        $mail->Subject = 'Some changes required in product';
        $mail->Body    = "Hello ".$ven_email." Hope you are doing well<br>Some of the changes are required in the product you uploaded please do it as soon as possible.<br>
                        We have given you the details of changes required in the following message <br>".$message."<br>
                        the product in which these changes must be made is<br>Product Name :".$res['proname']."<br>Product Price :".$res['price']."<br>
                        Product Quantity :".$res['quantity']."<br>";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if(!$mail->send()) {
        echo "<script>alert('Message could not be sent.')". $mail->ErrorInfo."</script>";
        } else {
            echo "<script>alert('Message sent.')</script>";
            header("Refresh: 2; url=change_products.php");
        }
        
        
    } ?>

<a href="admin_view_products.php"><button class="btn btn-secondary" style="float:right;">go-back</button></a>
</body>
</html>
<?php  
}
else
{
   header("location:admin_login.php");
}
 ?>
