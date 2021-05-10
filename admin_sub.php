<?php
session_start();
include("connection.php");
error_reporting(0);
$userprofile=$_SESSION['uname'];
if($userprofile==true)
{
  ?>

<!DOCTYPE html>
<html>
<head>
<title>Add Subcategory</title>
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
</head>
<body>
  <h1>Add Subcategory Information</h1>
  <form action=""  method="post" enctype="multipart/form-data">
 <label for="lname">Category Id</label><br><br>
 <input type="text" id="lname" name="cid" placeholder="Enter Category Id.." required>
 <label for="lname">Subcategory Name</label><br><br>
 <input type="text" id="lname" name="subname" placeholder="Enter Subcategory Name .." required>
 <label for="lname">Subcategory Image</label><br><br>
 <input type="file" name="subimage" value="fileupload" id="fileupload5" required><br>
 <input type="submit" name="submit" value="Submit">
 </form>
 
	
<?php
if($_POST['submit'])
  {
    $ci=$_POST['cid'];
    $subn=$_POST['subname'];
	//subimage
	 $filename5=$_FILES["subimage"]["name"];
	 $tempname5=$_FILES["subimage"]["tmp_name"];
	 $folder5="subcategory_image/".$filename5;
	 move_uploaded_file($tempname5,$folder5);
	 $query="INSERT INTO SUBCATEGORY (category_id,subcategory_name,subimage) VALUES('$ci','$subn','$folder5')";
	 $data=mysqli_query($connect,$query);
     if($data)
		{
			echo "<script>alert('data inserted');</script>";
    }
    else
    {
      echo "<script>alert('data not inserted');</script>";
    }
	
  }
	 
?>
</body>
</html>
<?php
}
else
{
    
	header("location:admin_login.php");
}
?>
