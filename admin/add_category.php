<?php
session_start();
require_once('../config/connect.php');
if(!isset($_SESSION['email'])& empty($_SESSION['email'])){
	header('location:login.php');
}
if(isset($_POST)& !empty($_POST)){
	$categoryname=mysqli_real_escape_string($conn,$_POST['categoryname']);
	$sql="INSERT INTO category(cname) VALUES('$categoryname')";
	$query=mysqli_query($conn,$sql);
	if($query){
	$success="Category Added Successfully";
	}else{
	$error="Something going wrong,category not added";
}
}

?>
<?php include'inc/header.php';?>
<?php include'inc/nav.php';?>	

	<div class="close-btn fa fa-times"></div>

	
<!-- add category -->
<section id="content">
	<div class="content-blog">
		<div class="container">
			<form action=""method="post">
				<div class="form-group">
					<?php
						if(isset($success)){ ?>
						<div class="alert alert-success"><?php echo $success; ?></div>
					<?php	
						}elseif(isset($error)){
					?>
					<div class="alert alert-danger"><?php echo $error; ?></div>
					<?php
					}
					?>
				<label for="categoryname">Category Name</label>
				<input type="text"class="form-control"name="categoryname"placeholder="Add Category Name">
				</div>
				<button type="submit"class="btn btn-default">Submit</button>
			</form>
		</div>
	</div>
</section>
	

<?php include'inc/footer.php';?>