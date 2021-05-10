<?php
session_start();
include("connection.php");
error_reporting(0);
$email_vendor=$_SESSION['email_vendor'];
$userprofile=$_SESSION['uname'];
if($email_vendor==true or $userprofile==true )
{
?>
<!DOCTYPE html>
<html>
  <title>Add Products</title>
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
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $("#category").change(function(){
            var category_id=$(this).val();
            $.ajax({
                url:"action.php",
                method:"POST",
                data:{categoryID:category_id},
                success:function(data){
                    $("#subcategory").html(data);
                }
            });
        });
    });
</script>
</head>
<body>

<h3>Product Information</h3>

<div>
  <form action=""  method="post" enctype="multipart/form-data">
    <label for="fname">Product Name</label>
    <input type="text" id="fname" name="proname" placeholder="Product Name.." required>

    <label for="lname">Product Category</label>
    <select name="category" class="form-control form-control-lg" id="category" >
        <option value="" disabled selected>-select category-</option>
        <?php
            require_once 'connection.php';
            $sql="SELECT * FROM category ORDER BY category_name";
            $result=mysqli_query($connect,$sql);
            while($row=mysqli_fetch_array($result)){
            ?>
            <option value="<?= $row['category_id']; ?>"><?= $row['category_name']; ?></option>
            <?php
            }
            ?>
    </select>
    <label for="lname">Product Subcategory</label>
    <select name="subcategory" class="form-control form-control-lg" id="subcategory" >
        <option value="" disabled selected>-select subcategory-</option>

    </select>

    <label for="lname">Product Description</label>
    <input type="text" id="lname" name="prodesc" placeholder="Product Description.." required>

    <label for="lname">Product Price</label>
    <input type="text" id="lname" name="price" placeholder="Product Price.." required>
	
	<label for="lname">Product Quantity</label>
    <input type="text" id="lname" name="quantity" placeholder="Product Quantity.." required>

  <label for="lname">Product Images</label><br><br>
  <input type="file" name="image1" value="fileupload" id="fileupload1" required><br>
	<input type="file" name="image2" value="fileupload" id="fileupload2" required><br>
	<input type="file" name="image3" value="fileupload" id="fileupload3" required><br>
	<input type="file" name="image4" value="fileupload" id="fileupload4" required><br>

  <label for="lname">Product Keyword</label>
  <input type="text" id="fname" name="prokeyword" placeholder="Product Keyword.." required>
  <label for="lname">Product Rating</label>
  <input type="text" id="fname" name="rating" placeholder="Product Rating.." required>
  <label for="lname">Product Offers</label>
  <input type="text" id="fname" name="offers" placeholder="Product Offers.." required>
  <input type="submit" name="submit" value="Submit">
  </form>
</div>

</body>
</html>
<?php
  if($_POST['submit'])
  {
    $proname=$_POST['proname'];
    $prodesc=$_POST['prodesc'];
    $procat=$_POST['category'];
    $prosubcat=$_POST['subcategory'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];
    //image1
    $filename1=$_FILES["image1"]["name"];
    $tempname1=$_FILES["image1"]["tmp_name"];
    if($email_vendor==true)
    {
      $folder1="uploads/".$_SESSION['email_vendor'].$filename1;
    }
    else
    {
      $folder1="uploads/".$userprofile.$filename1; 
    }
    
    move_uploaded_file($tempname1,$folder1);

    //image2
    $filename2=$_FILES["image2"]["name"];
    $tempname2=$_FILES["image2"]["tmp_name"];
    if($email_vendor==true)
    {
      $folder2="uploads/".$_SESSION['email_vendor'].$filename2;
    }
    else
    {
      $folder2="uploads/".$userprofile.$filename2; 
    }
    move_uploaded_file($tempname2,$folder2);

    //image3
    $filename3=$_FILES["image3"]["name"];
    $tempname3=$_FILES["image3"]["tmp_name"];
    if($email_vendor==true)
    {
      $folder3="uploads/".$_SESSION['email_vendor'].$filename3;
    }
    else
    {
      $folder3="uploads/".$userprofile.$filename3; 
    }
    move_uploaded_file($tempname3,$folder3);

    //image4
    $filename4=$_FILES["image4"]["name"];
    $tempname4=$_FILES["image4"]["tmp_name"];
    if($email_vendor==true)
    {
      $folder4="uploads/".$_SESSION['email_vendor'].$filename4;
    }
    else
    {
      $folder4="uploads/".$userprofile.$filename4; 
    }
    move_uploaded_file($tempname4,$folder4);
    $prokeyword=$_POST['prokeyword'];
    $rating=$_POST['rating'];
    $offers=$_POST['offers'];
    $mdim=md5($folder1);
    if($email_vendor==true)
    {
    $query="INSERT INTO PRODUCT (vemail,category_id,subcategory_id,proname,prodesc,price,quantity,image1,image2,image3,image4,mdim1,keyword,rating,offers)VALUES ('$_SESSION[email_vendor]','$procat','$prosubcat','$proname','$prodesc','$price','$quantity','$folder1',
    '$folder2','$folder3','$folder4','$mdim','$prokeyword','$rating','$offers')";
    }
    else
    {
    $query="INSERT INTO PRODUCT (vemail,category_id,subcategory_id,proname,prodesc,price,quantity,image1,image2,image3,image4,mdim1,keyword,rating,offers)VALUES ('$userprofile','$procat','$prosubcat','$proname','$prodesc','$price','$quantity','$folder1',
    '$folder2','$folder3','$folder4','$mdim','$prokeyword','$rating','$offers')";
    }
    
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
  if($email_vendor==true)
    { ?>
      <a href="welcomevendor.php"><button class="btn btn-secondary">go-back</button></a>
     <?php }
    else
    {
      ?>
      <a href="admin_view_products.php"><button class="btn btn-secondary">go-back</button></a>
    <?php }

}
else
{
  header('location:vendor_login.php');
}
?>