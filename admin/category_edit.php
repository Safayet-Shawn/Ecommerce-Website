
<?php
session_start();
require_once('../config/connect.php');
if(!isset($_SESSION['email'])& empty($_SESSION['email'])){
	header('location:login.php');
}
if(isset($_POST)& !empty($_POST)){
	if(isset($_GET['id'])){
		$id=$_GET['id'];
	$categoryname=mysqli_real_escape_string($conn,$_POST['categoryname']);
	$sql="UPDATE category SET cname='$categoryname' WHERE id='$id'";
	$query=mysqli_query($conn,$sql);
	if($query){
	$success="Category updated Successfully";
	}else{
	$error="Something going wrong,category not updated";
}
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
					<?php
					require_once('../config/connect.php');
					if(isset($_GET['id'])){
						$id=$_GET['id'];
						$sql="SELECT * FROM category WHERE id='$id'";
						$query=mysqli_query($conn,$sql);

					}
					while ($row=mysqli_fetch_assoc($query)) {
						$category=$row['cname'];
					}

					?>
				<input type="text"class="form-control"name="categoryname"value="<?php echo $category ; ?>" placeholder="Add Category Name">
				</div>
				<button type="submit"class="btn btn-default">Update</button>
			</form>
		</div>
	</div>
</section>
	

<?php include'inc/footer.php';?>