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
        <div class="container" style="height:500px;">
          <h1 align="center">Change Password</h1>
          <hr>
          <input type="text" placeholder="Enter the OTP Send on your email id" name="OTP" id="OTP" required>
		  <input type="password" placeholder="Enter New Password " name="password" value="" required>
      
          <input type="submit" name="submit" value="CHANGE"class="registerbtn">
          
      </form>
        
      </div>
      <?php
      $otp=$_POST['OTP'];
      
      if($_POST['submit'])
      {
            $pass=$_POST['password'];
            $pas=md5($pass);
            if($otp==$_SESSION['ran'])
            {
             $query="UPDATE VENDOR SET  password='$pas' WHERE email='$_SESSION[email]'";
	         $data=mysqli_query($connect,$query);
	         if (!$data){
		            echo "Not inserted";
	         }
	         else{
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
                    $mail->addAddress($_SESSION['email']);     // Add a recipient

                    $mail->Subject = 'Change Password';
                    $mail->Body    = 'Dear'." ".$_SESSION['email']." ".'Password Has Been Successfully Changed';
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    if(!$mail->send()) {
                    echo "<script>alert('Message could not be sent.')". $mail->ErrorInfo."</script>";
                    } else {
                    echo "<script>alert('Message sent.')</script>";
                    }
		            header('location:vendor_login.php');
	           }

        }
}
?>
</body>
</html>
