<?php
session_start();
include("connection.php");
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sign Up Here</title>
<link rel="stylesheet" href="css/stylesheet1.css"></link> 
</head>
<script src="javascript/valid.js"></script>
<body>

<form action="" onsubmit="return validate();" method="post" enctype="multipart/form-data" class="register">
  <div class="container" style="height:800px;">
    <h1 align="center">Register</h1>
    <p align="center">Come lets shop with shopify.</p>
    <hr>

    <label for="name"><b onmouseover="name();"onmouseout="name1();">Name</b></label><br>
    <input type="text" placeholder="Enter Name" name="name"><label id="n"></label><br>
    

    <label for="uname"><b onmouseover="user();"onmouseout="user1();">Username</b></label><br>
    <input type="text" placeholder="Enter Username" name="username"><label id="u"></label><br>
    


    <label for="email"><b onmouseover="email();"onmouseout="email1();">Email</b></label><br>
    <input type="text" placeholder="Enter Email" name="email"><label id="e"></label><br>
    

    <label for="psw"><b onmouseover="pass();"onmouseout="pass1();">Password</b></label><br>
    <input type="password" placeholder="Enter Password" name="psw"><label id="p"></label><br>
    

    <label for="psw-repeat" ><b onmouseover="cpass();"onmouseout="cpass1();">Confirm Password</b></label><br>
    <input type="password" placeholder="Confirm Password" name="psw-repeat"><label id="c"></label><br>

    <label for="address" ><b onmouseover="address();"onmouseout="address1();">Address</b></label><br>
    <input type="text" placeholder="Address" name="address" ><label id="add"></label><br>
    <hr>
    <input type="submit" name="submit" value="Register"class="registerbtn">
    <p align="center">Already have an account? <a href="user_login.php">Login Here</a>.</p><br>
    <label id="na"></label><br>
  </div>
</form>
<?php
if($_POST['submit'])
{
  
  $random=rand(100000,999999);
  $_SESSION['random'] = $random;
  $_SESSION['name'] = $_POST['name'];
  $_SESSION['username'] = $_POST['username'];
  $_SESSION['email'] = $_POST['email'];
  $_SESSION['psw'] = $_POST['psw'];
  $_SESSION['address'] = $_POST['address'];

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
  $mail->addAddress($_POST['email'], $_POST['name']);     // Add a recipient

  $mail->Subject = 'Confirm Shopify Account';
  $mail->Body    = 'OTP is:<br>'.$random;
  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  if(!$mail->send()) {
  echo "<script>alert('Message could not be sent.')". $mail->ErrorInfo."</script>";
  } else {
    header("location:user_otp.php");
  }
  
}
?>

</body>
</html>