<?php
session_start();
if(isset($_GET['id']) &!empty($_GET['id'])){
	$id=$_GET['id'];
	if(isset($_GET['quant']) & !empty($_GET['quant'])){
		$quant = $_GET['quant'];
	}else{
		$quant =1;
	}
	$_SESSION['cart'][$id]=array("quantity" => $quant);
	header('location:cart.php');
}else{
	header('location:index.php');
}
?>