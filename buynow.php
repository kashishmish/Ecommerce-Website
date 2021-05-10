<?php
session_start();
include("connection.php");
error_reporting(0);
$id=$_GET['id'];
$email=$_SESSION['email'];
if($email!=true)
{
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
		   <h1 style="color:black">Buy your Product</h1>
		   <form action="" method="post" enctype="multipart/form-data">
		     <input type="text" placeholder="Enter your Email" name="email" value="" required>
			 <input type="password" placeholder="Password" name="password" value="" required>
			 <input type="submit"  name="submit" value="BUY">
		   </form>
<?php
if(isset($_POST['submit'])){
    $em=$_POST['email'];
	$pass=$_POST['password'];
	$query="SELECT * FROM USERS WHERE email='$em' && psw='$pass'";
	$data=mysqli_query($connect,$query);
	$total=mysqli_num_rows($data);
	if ($total==1){
		$_SESSION['email']=$em;
		header("location:order.php?id=$id");
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
			
	</div>
	<div id="overlay-area"></div>
	
	</body>
	</html>
	<?php
	}
	else
	{
		header("location:order.php?id=$id");
	}
	?>
			 
	 
	  
	  