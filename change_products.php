<?php
session_start();
include("connection.php");
$userprofile=$_SESSION['uname'];
if($userprofile==true)
{
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"></link>
  <?php
   echo "<h3 class='list-group-item bg-dark text-light text-center'>Products present are: </h3>";
   $sql1="SELECT * FROM product";
   $res1=mysqli_query($connect,$sql1);
   $row=mysqli_num_rows($res1);
   $k=5;
   $x=ceil($row/$k);
   
   if(isset($_GET["page"]))
   {
     $page=$_GET["page"];
   }
   else
   {
     $page="";
   }
   
   if($page=="" || $page=="1")
   {
       $page1=0;
       $page=1;
   }
   else
   {
       $page1=($page*$k)-$k;
   }
   $sql="SELECT * FROM product LIMIT $page1,$k";
   $result=mysqli_query($connect,$sql);
   $l=mysqli_num_rows($result);
   $j=1;

   echo "<h5 class='list-group-item'style='width:100%'>Results: ".($page1+1)." to ".($page1+$l)." out of ".$row."</h5>";
   echo "<br>";
     ?>
     <div class="container">
     <div class="row justify-content-center">
       <div class="col-md-12 mb-5">
     <table class="table table-bordered table-striped table-center">
     <tr class="bg-dark text-light"><th>Product Name</th><th>Vendor Email</th><th>Price</th><th><center>Image</center></th><th><center>Change Product</center></th></tr>
     <?php
     
     if($l>0)
     {
         while($rop=mysqli_fetch_array($result))
         {
             $count=0;
             ?>
           <tr>
           <td><?php echo $rop['proname'];  ?></td>
           <td><?php  echo $rop['vemail']; ?></td>
           <td><?php echo $rop['price']; ?></td>
           <td><center><img src="<?php echo $rop['image1'];?>" width="100px"height="100px"></center></td>
           <?php
            $spd="SELECT * FROM buyproduct";
            $pqr=mysqli_query($connect,$spd);
            $abc=mysqli_num_rows($pqr);
            if($abc>0)
            {
                while($dec=mysqli_fetch_array($pqr))
                {
                    if($dec['productid']==$rop['productid'])
                    {
                        $count=1;
                    }
                }
            }
            if($count==1)
            { ?>
                <td><a><button class="btn btn-danger disabled">Send Email</button></a></td>
            <?php }
            else
            { ?>
                <td><a href="change_mail.php?em=<?php  echo $rop['vemail']; ?>&id=<?php  echo $rop['productid']; ?>"><button class="btn btn-danger">Send Email</button></a></td>
            <?php }
             ?>
           </tr>
           <?php
         }
     }
     ?>
     </table>
     </div>
     </div>
     </div>
     <hr>
   <br>
   <a href="admin_view_products.php"><button class="btn btn-secondary" style="float:right;">go-back</button></a>
   <ul class="pagination">
   <a href="change_products.php?page=<?php if($page!=1){$g=$page-1;} else{$g=1;} echo $g; ?>&x=3"><button class="btn btn-danger">&laquo;Previous</button></a>
   <a href="change_products.php?page=1&x=3"><button class="btn btn-primary">First</button></a>
   <a href="change_products.php?page=<?php echo $x; ?>&x=3"><button class="btn btn-primary">Last</button></a>
   <a href="change_products.php?page=<?php if($page!=$x){$o=$page+1;}else{ $o=$x;} echo $o; ?>&x=3"><button class="btn btn-danger">Next&raquo;</button</a>
   </ul>
     <?php

}
else
{
   header("location:admin_login.php");
}
 ?>