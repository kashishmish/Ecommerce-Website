<?php
$servername="localhost";
$username="root";
$password="";
$dbname="shopify";
$connect = mysqli_connect($servername,$username,$password,$dbname);
if($connect)
{
	echo "";
}
else
{
	die("connection failed because ".mysqli_connect_error());
}
?>