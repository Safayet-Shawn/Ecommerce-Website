<?php
$conn=mysqli_connect('localhost','root','','ecomphp');
if(!$conn){
	echo"Error: Mysqli connection error".PHP_EOL."<br>";
	echo"Debugging errorno : ".mysqli_connect_errno().PHP_EOL."<br>";
	echo"Debugging error : ".mysqli_connect_error().PHP_EOL;
	exit;
}
?>