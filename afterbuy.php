<?php
require 'connection.php';
$output='';
$output .="<a href=confirmation.php?id=$_POST[itemId]&quant=$_POST[search]><button class='btn btn-danger'>Place Order For Rs.$_POST[linepr].00/-</button></a>";
echo $output;


