<?php
require_once('../config/connect.php');
if(isset($_GET['id'])){
	$dlt=$_GET['id'];
	$sql="DELETE FROM category where id='$dlt'";
	$query=mysqli_query($conn,$sql);
	header('location:categories.php');
}

?>