<?php
session_start();
require_once('config/connect.php');
if(isset($_POST) &!empty($_POST)){
	$email=filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	$pass=$_POST['password'];
	$sql="SELECT* FROM USER WHERE email='$email' ";
	$res=mysqli_query($conn,$sql) or die(mysqli_error($conn));
	$count=mysqli_num_rows($res);
	$row=mysqli_fetch_assoc($res);
if($count==1){	
	if(password_verify($pass, $row['password'])){
		$_SESSION['customer']=$email;
		$_SESSION['customerid']=$row['id'];
		header('location:checkout.php');
	}else{

		header('location:login.php?message=1');
	}
}else{
	header('location:login.php?message=1');
}
}

?>