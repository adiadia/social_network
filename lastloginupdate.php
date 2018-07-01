<?php
session_start();
if(!isset($_SESSION['user_email'])){
    echo "<script>window.open('index.php','_self')</script>";
}


$user_email=$_SESSION['user_email'];
$con=mysqli_connect("localhost","adityaaditya","Aditya","aditya_media");
$update="update users set  user_last_login=NOW() where user_email='$user_email'";
$result=mysqli_query($con,$update);
if($result)
{
	echo "<script>window.open('home.php','_self')</script>";
}
else
{
	echo "<script>alert('connection error')</script>";
	echo "<script>window.open('index.php','_self')</script>";
}

?>