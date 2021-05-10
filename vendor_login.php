<?php
session_start();
include("connection.php");
error_reporting(0);
?>
<!DOCTYPE>
  <html>
      <head> 
		  <title>Vendor Login</title>
	  <meta charset="utf-8">
	 </head>
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link rel="stylesheet" href="css/stylesheet2.css">
      </head>
	  <body>
	    <div class="wrapper">
		   <h1 style="color:black">Log in</h1>
		   <form action="" method="post" enctype="multipart/form-data">
		     <input type="text" placeholder="Email" name="email_vendor" value="">
			 <input type="password" placeholder="Password" name="password" value="">
			 <a href="welcomevendor.php"><input type="submit" value="LOGIN" name="submit"></a>
		   </form>
		   <?php
if(isset($_POST['submit'])){
    $email_vendor=$_POST['email_vendor'];
	$pass=$_POST['password'];
	$pas=md5($pass);
	$query="SELECT * FROM VENDOR WHERE email='$email_vendor' && password='$pas'";
	$data=mysqli_query($connect,$query);
	$total=mysqli_num_rows($data);
	if ($total==1){
	    $_SESSION['email_vendor']=$email_vendor;
		header('location:welcomevendor.php');
	}
	else{
		echo '<script>alert("Invalid Login Credentials")</script>'; 
	}
	
}
?>
		   <div class="bottom-text">
		     <input type="checkbox" name="remember" checked="checked"><font color="black">Remember me</font>
			 <a href="vendor_forgot.php" style="color:black">Forgot Password?</a>
			 
			</div>
			<p class="w">Don't Have an Account?<a href="vendor_register.php" style="color:blue">Register Here</a></p>
			
	</div>
	<div id="overlay-area"></div>
	
	</body>
	</html>
			 
	 
	  
	  