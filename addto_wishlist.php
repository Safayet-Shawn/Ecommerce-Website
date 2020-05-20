<?php
ob_start();
session_start();
require_once('config/connect.php');
$uid=$_SESSION['customerid'];
if(!isset($_SESSION['customerid'])& empty($_SESSION['customerid'])){
	header('location:login.php');
}
if(isset($_GET['id']) &!empty($_GET['id'])){
$id=$_GET['id'];
echo $sql="INSERT INTO wishlist (pid,uid)VALUES('$id','$uid')";
$res=mysqli_query($conn,$sql);
if($res){
	header('location:wishlist.php');
}
}else{
	// echo"not inserted";
	
	header('location:wishlist.php');
}
?>