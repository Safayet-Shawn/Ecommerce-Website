<?php
session_start();
require_once('../config/connect.php');
if(!isset($_SESSION['email'])& empty($_SESSION['email'])){
	header('location:login.php');
}
if(isset($_GET) && !empty($_GET)){
	$id=$_GET['id'];
	$sql="SELECT thumb from products where id=$id";
	$res=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($res);
	if(!empty($row['thumb'])){
		if(unlink($row['thumb'])){
			$delsql="DELETE from products  where id=$id";
			if(mysqli_query($conn,$delsql)){
				header("location:products.php");
			}
		}
	}else{
		$delsql="DELETE from products  where id=$id";
			if(mysqli_query($conn,$delsql)){
				header("location:products.php");
			}
	}
}else{
	header("location:products.php");
}
?>