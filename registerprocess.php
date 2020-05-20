<?php
session_start();
require_once('config/connect.php');
if(isset($_POST) &!empty($_POST)){
	$email=filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	$pass=password_hash($_POST['password'],PASSWORD_DEFAULT);
	$sql="INSERT INTO user(email,password)VALUES('$email','$pass')";
	$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
	// $count=mysqli_num_rows($res);
	if($result){
		$_SESSION['customer']=$email;

		$_SESSION['customerid']=mysqli_insert_id($conn);
		header('location:checkout.php');
	}else{

		header('location:login.php?message=2');
	}
}

?>