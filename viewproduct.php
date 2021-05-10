<?php
include('connection.php');
session_start();
error_reporting(0);
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
 <style>
.card:hover{
  background-color: #ddd;
  border-radius: 5px;
}
.card{
  border-width:solid;
}
.card a{
  text-decoration:none;
}
#xz{
	margin-top:50px;
	
}
.checked {
  color: orange;
}
 
 
 </style>
  </head>
 <body>
 <?php
  include "addition.php";
  ?>
    <!-- this is for search bar -->
        <form action="" method="post" enctype="multipart/form-data" class="form-group">
          <div class="input-group">
            <input type="text" class="form-control"style="padding:25px;font-size:20px;background-color:#202a3f;" placeholder="search your wishlist here!!!" name="search_text" id="search_text">
            <div class="input-group-btn">
              <input class="btn btn-default" style="background: orange;width: 100px;padding: 12.5px;" type="submit" name="submit" value="Search">
            </div>
          </div>
        </form>
        <?php
        if($_POST["submit"])
        {
        session_start();
        $search=$_POST["search_text"];
        $_SESSION["search"]=$search;
        header("location:productdetails.php");
        }
        ?>
      <br>
      <div  style=" 
            position: sticky;
            z-index: 1;
            width:100%;
            margin-top: -38px;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0, 1);
            overflow-x: hidden;
            transition: 0.5s;">
        <div id="result" clas="list-group">
        </div>
    </div>

    <?php
	$em=$_GET["im"];
    $sql="SELECT * FROM product WHERE mdim1='$em'";
    $result=mysqli_query($connect,$sql);
    $data=mysqli_fetch_array($result);
	$_SESSION['productid']=$data['productid'];
	
	?>
          
           <center>
			 <div class="card" id="xz" style="width:50%;">
            <h4 class="card-title list-group-item bg-dark text-light nav-item" ><?php echo $data['proname']; ?></h4>
			<div id="carouselExampleControls" class="carousel slide"  id="slider" data-interval="false">
               <div class="carousel-inner">
                  <div class="carousel-item active">
				    <center><img class="card-img-left border" src="<?php echo $data['image1'];?>"  height='60%' width='60%' hspace='20' alt="Card image"></center>
				  </div>
				  <div class="carousel-item">
				    <center><img class="card-img-left border" src="<?php echo $data['image2'];?>"  height='60%' width='60%' hspace='20' alt="Card image"></center>
				  </div>
				  <div class="carousel-item">
				    <center><img class="card-img-left border" src="<?php echo $data['image3'];?>"  height='60%' width='60%' hspace='20' alt="Card image"></center>
				  </div>
				  <div class="carousel-item">
				    <center><img class="card-img-left border" src="<?php echo $data['image4'];?>"  height='60%' width='60%' hspace='20' alt="Card image"></center>
				  </div>
				  
				  
			   <a class="carousel-control-prev"  href="#carouselExampleControls" role="button" data-slide="prev">
                 <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                 <span class="sr-only">Previous</span>
               </a>
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
			 </div>
			 </div>
			
            </div>
            <div class="card" style="width:50%">
            <?php if($data['quantity']<=20)
              { ?>
                <p class="card-text text-dark"><h5 class="text-danger">Hurry only <?php echo $data['quantity']." items left!!!</h3>";?></p>
              <?php } ?>
              <p class="card-text text-dark"><?php echo "<h3>".$data['prodesc']."<br>".$data['keyword']."</h3>";?></p>
              <p class="card-text text-dark"><h3>Price: Rs.</h3><?php echo "<h3>".$data['price']."</h3>";?></p>
              
              <center><h5 class="text-dark chlo"><?php echo $data['offers']; ?></h5></center>
                    <center>
                    <?php 
                    for($mo=1;$mo<=5;$mo++)
                    {
                      if($mo<=$data['rating'])
                      { ?>
                      <span class="fa fa-star checked"></span>
                      <?php }
                      else
                      { ?>
                        <span class="fa fa-star"></span>
                      <?php }
                    } ?>
                </center>
             
			  <div class="card-body-right border rounded" style="display:table-cell">
        <?php
        $ka1=0;
        
        
        $query9="SELECT * FROM cart WHERE email_user='$email'";
                  $result9=mysqli_query($connect,$query9);
                  $row9=mysqli_num_rows($result9);
                  while($data9=mysqli_fetch_array($result9)[2])
                  {
                  if($data9==$data['mdim1'])
                  {
                  $ka1=1;
                  
                  break;
                  }
                }
                  if($ka1==1)
                  {
                    ?><a href="addcart.php>im=<?php echo $data['mdim1']; ?>" class="btn btn-primary rounded disabled" style="float:left;width:50%;">Added to cart</a><a href="buynow.php?id=<?php echo $data['productid']; ?>" class="btn btn-primary rounded" style="float:right;width:50%;">Buy Now</a>
                  <?php
                  }
                  else
                  {
                    ?><a href="addcart.php?im=<?php echo $data['mdim1']; ?>" class="btn btn-primary rounded" style="float:left;width:50%;">Add to Cart</a><a href="buynow.php?id=<?php echo $data['productid']; ?>" class="btn btn-primary rounded" style="float:right;width:50%;">Buy Now</a>
                  <?php
                  }
                
                
                  ?>
            </div>
			</div>
            
           </center>
		    
			
			
            
 
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
 </body>
 </html>
 <script>
$(document).ready(function(){
    $('#search_text').keyup(function(){
        var txt=$(this).val();
        if(txt!='')
        {
            $('#result').html('');
            $.ajax({
                url:"fetch.php",
                method:"post",
                data:{search:txt},
                datType:"text",
                success:function(data)
                {
                    $('#result').html(data);
                }
            });
            
        }
        else
        {
            $('#result').html('');
        }
    });
    $(document).on('click','a',function(){
        $('#search_text').val($(this).text());
        $('#result').html('');
    });
});

</script>