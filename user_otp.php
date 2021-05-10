<?php
include("connection.php");
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylesheet1.css"></link>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>OTP Confirmation</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="container">
          <h1 align="center">Enter OTP</h1>
          <p align="center">Enter the OTP sent on your email ID.</p>
          <hr>
      
          <label for="otp"><b>OTP</b></label>
          <input type="text" placeholder="OTP" name="OTP" id="OTP" required>
      
          <hr>
      
          <input type="submit" name="submit" value="Register"class="registerbtn">
          
      </form>
      <a href="user_registration.php"><button type="button" class="registerbtn"><i class="fa fa-arrow-left" style="font-size: medium;"></i>&nbsp;Go back</button></a>
        
      </div>
      <?php
      $otp=$_POST['OTP'];
      $psw=md5($_SESSION['psw']);
      
      if($_POST['submit'])
      {
            if($otp==$_SESSION['random'])
            {
                $query="INSERT INTO USERS VALUES ('$_SESSION[name]','$_SESSION[username]','$_SESSION[email]','$psw','$_SESSION[address]')";
                $data=mysqli_query($connect,$query);
                if($data)
                {
                    echo "<script>alert('Registration Successful')</script>";
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
                    $mail->addAddress($_SESSION['email'], $_SESSION['name']);     // Add a recipient

                    $mail->Subject = 'Account Created';
                    $mail->Body    = 'Registration Successfull '.$_SESSION['name'];
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    if(!$mail->send()) {
                    echo "<script>alert('Message could not be sent.')". $mail->ErrorInfo."</script>";
                    } else {
                    echo "<script>alert('Message sent.')</script>";
                    header('location:index.php');
                    }
                    
                    
                }
                else
                {
                    echo "<script>alert('Registration Unsuccessful Because Email which you have entered already exists')</script>";
                }
            }
            else
            {
                echo "<script>alert('wrong otp')</script>";
            }
        }
        ?>
</body>
</html>
