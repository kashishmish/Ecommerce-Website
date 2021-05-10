<?php
session_start();
include("connection.php");
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head> 
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link rel="stylesheet" href="css/stylesheet2.css">
      </head>
	  <body>
	    <div class="wrapper">
		   <h1 style="color:black">Change Password</h1>
		   <form action="" method="post" enctype="multipart/form-data">
		     <input type="text" placeholder="Enter your Email" name="email" value="" required>
			 <input type="submit"  name="submit" value="CHANGE">
		   </form>
<?php
$em=$_POST['email'];
if(isset($_POST['submit'])){
	$em=$_POST['email'];
	$ran=rand(100000,999999);
    $_SESSION['ran'] = $ran;
	$_SESSION['email'] = $_POST['email'];
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
  $mail->addAddress($em);     // Add a recipient

  $mail->Subject = 'Change Password';
  $mail->Body    = 'OTP is:<br>'.$ran;
  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  if(!$mail->send()) {
  echo "<script>alert('Message could not be sent.')". $mail->ErrorInfo."</script>";
  } else {
    header("location:vendor_fotp.php");
  }
}
?>

    </div>
	<div id="overlay-area"></div>
</body>
</html>

























