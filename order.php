<?php
include('connection.php');
session_start();
$em=$_SESSION['email'];
if ($em==true){
error_reporting(0);
if (isset($_GET['id'])){
	$id=$_GET['id'];
	$sql="SELECT * FROM product WHERE productid='$id'";
	$result=mysqli_query($connect,$sql);
	$row=mysqli_fetch_array($result);
	$pname=$row['proname'];
	$pprice=$row['price'];
	$quantity=$row['quantity'];
	$del_charge=50;
	$total_price=$pprice+$del_charge;
	$pimage=$row['image1'];
}
else{
	echo "No Product Found!!";
}
?>
<!DOCTYPE html>
 <html>
 <head><title></title>
 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"></link>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/stylesheet.css"></link>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 
<style>
h4{
	font-family:cursive;
}
h2{
	font-family:cursive;
}
h3{
	font-family:cursive;
}
</style>

</head>
<body>
<?php
$qu="SELECT address FROM users WHERE email='$em'";
$z=mysqli_query($connect,$qu);
$v=mysqli_fetch_array($z);
$add=$v[0];
include "addition.php";
?>
  <div class="container">
      <div class="row justify-content-center">
	    <div class="col-md-10 mb-5">
		  <h2 class="text-center p-2 text-primary">Fill the details to complete your order</h2>
		  <h3>Product Details : </h3>
		  <table class="table table-bordered item" width="500px">
		  <tr>
		    <th>Product Name :</th>
			<td><?php echo $pname;  ?></td>
			<td rowspan="5" class="text-center"><img src="<?php echo $pimage;?>" width="200"></td>
			</tr>
		  <tr>
		    <th>Product Price :</th>
			<td>Rs.<?php  echo number_format($pprice); ?>/-</td>
		  </tr>
		  <tr>
		   <th>Delivery Charge :</th>
		   <td>Rs. <?php echo number_format($del_charge); ?></td>
		  </tr>
		<tr>
		<th>Quantity:<br><br><br><br>
		Total Price:</th>
		<td>
        <div class="product-price d-none"><?php echo $pprice; ?></div>
        <div class="pass-quantity ">
          <label for="pass-quantity" class="pass-quantity">Quantity</label>
          <input class="form-control" type="number" name="quantity" id="quant_var" value="0" min="1" max="<?php echo $quantity; ?>" >
        </div>
		<br>
        
          <span class="product-line-price">Rs. 00/-
          </span>
      </div>
	  </td>
	  </tr>
	</table>




		   <h4>Enter your details :</h4><br>
		   <form action="" method="post" accept-charset="utf-8">
		     <input type="hidden" name="proname" value="<?php echo $pname; ?>">
			 <input type="hidden" name="price" value="<?php echo $pprice; ?>">
			  <div class="form-group">
				<label for="tel"><h5>Deliver To:</h5></label>
			    <input type="tel" name="address" class="form-control" placeholder="Enter your address here..." value="<?php  echo $add; ?>" required>
			  </div>
			
			 <div class="form-group" style="float:right;">
			 <input type="submit" name="change" value="Change Address"class="btn btn-primary">
			 </div>
			</form>
			<div id="result"></div>
			  
			
			  </div>
		    </div>
		  </div>
	    </div>
</body>
<?php
      
      if($_POST['change'])
      {
			 $ad=$_POST['address'];
             $query="UPDATE USERS SET  address='$ad' WHERE email='$_SESSION[email]'";
	         $data=mysqli_query($connect,$query);
	         if (!$data){
		            echo "Not inserted";
	         }
	         else{
				 $refreshAfter = 1;
				 header('Refresh: ' . $refreshAfter);
				 
		         }

        }
	
 

?>


</html>
<script>
 $(document).ready(function() {

   /* Set rates */
   var taxRate = 0.05;
   var fadeTime = 300;
   

   /* Assign actions */
   $('.pass-quantity input').change(function() {
     updateQuantity(this);
   });
  


   /* Recalculate cart */
   function recalculateCart() {
     var subtotal = 0;

     /* Sum up row totals */
     $('.item').each(function() {
       subtotal += parseFloat($(this).children('.product-line-price').text());
     });

     /* Calculate totals */
     var tax = subtotal * taxRate;
     var total = subtotal + tax;

    
   }
   var count=0

   /* Update quantity */
   function updateQuantity(quantityInput) {
     /* Calculate line price */
     var productRow = $(quantityInput).parent().parent();
     var price = parseFloat(productRow.children('.product-price').text());
     var quantity = $(quantityInput).val();
     var linePrice = (price * quantity)+50;
     var itemid=<?php echo $id; ?>;
     var emailId="<?php echo $em; ?>";
     

     /* Update line price display and recalc cart totals */
     productRow.children('.product-line-price').each(function() {
       $(this).fadeOut(fadeTime, function() {
         $(this).text("Rs. "+linePrice.toFixed(2)+"/-");
         recalculateCart();
         $(this).fadeIn(fadeTime);
       });
     });
     $.ajax({
                url:"afterbuy.php",
                method:"post",
                data:{search:quantity,linepr:linePrice,itemId:itemid,email:emailId},
                dataType:"text",
                success:function(data)
                {
                    $('#result').html(data);
                }
            });
   }

 });
 
 </script>
<?php
}
else{
	header('location:buynow.php');
}