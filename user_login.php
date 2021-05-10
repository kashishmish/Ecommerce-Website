<?php
session_start();
include("connection.php");
error_reporting(0);
?>
<!DOCTYPE>
  <html>
      <head> 
	  <meta charset="utf-8">
	 </head>
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link rel="stylesheet" href="css/stylesheet2.css">
      </head>
	  <body>
	    <div class="wrapper">
		   <h1 style="color:black">Log in</h1>
		   <form action="" method="post" enctype="multipart/form-data">
		     <input type="text" placeholder="Email" name="email" value="" required>
			 <input type="password" placeholder="Password" name="password" value="" required>
			 <input type="submit"  name="submit" value="LOGIN">
		   </form>
<?php
if(isset($_POST['submit'])){
    $email=$_POST['email'];
	$pass=$_POST['password'];
	$pas=md5($pass);
	$query="SELECT * FROM USERS WHERE email='$email' && psw='$pas'";
	$data=mysqli_query($connect,$query);
	$total=mysqli_num_rows($data);
	if ($total==1){
	    $_SESSION['email']=$email;
		header('location:index.php');
	}
	else{
		echo '<script>alert("Invalid Login credentials")</script>'; 
    }
}
?>
		   <div class="bottom-text">
		     <input type="checkbox" name="remember" checked="checked"><font color="black">Remember me</font>
			 <a href="user_forgot.php" style="color:black">Forgot Password?</a>
			 
			</div>
			<p class="w">Don't Have an Account?<a href="user_registration.php" style="color:blue">Register Here</a></p>
			<p style="position:absolute;bottom:0px;left:20%">Continue without login?<a href="index.php" style="color:blue">Go to Home</a></p>
			
	</div>
	<div id="overlay-area"></div>	
	</body>
	</html>	  