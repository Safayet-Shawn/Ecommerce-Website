<?php
session_start();
require_once('../config/connect.php');
if(!isset($_SESSION['email'])& empty($_SESSION['email'])){
	header('location:login.php');
}
if(isset($_POST)& !empty($_POST)){
	$pname=mysqli_real_escape_string($conn,$_POST['product_name']);
	$pdes=mysqli_real_escape_string($conn,$_POST['product_des']);
	$pcat=mysqli_real_escape_string($conn,$_POST['product_category']);
	$pprice=mysqli_real_escape_string($conn,$_POST['product_price']);
	if(isset($_FILES)& !empty($_FILES)){
		$file_name=$_FILES['product_image']['name'];
		$file_type=$_FILES['product_image']['type'];
		$file_size=$_FILES['product_image']['size'];
		$file_tmp=$_FILES['product_image']['tmp_name'];
		$max_size=10000000;
		$extention=substr($file_name, strpos($file_name,'.') +1);
		if(isset($file_name)& !empty($file_name)){
		if(($extention=="jpg" || $extention=="jpeg") & $file_type=="image/jpeg" & $file_size<=$max_size){
			$location="product/";
			if(move_uploaded_file($file_tmp,$location.$file_name)){
				// $s="file uploaded";
				$sql="INSERT INTO products(name,cid,price,thumb,des)VALUES('$pname','$pcat','$pprice','$location$file_name','$pdes')";
				$query=mysqli_query($conn,$sql);
				if($query){
					// $ps="Product Added Successfully";
					header("location:products.php");
				}else{
					$ng="Something Wrong";
				}
			}else{
				$s="File not Uploader";
			}
		}else{
				$s="Only jpg files are allowed and should be less than 1MB";
		}
	}else{
		$s="Please select a product image";
	}
	}else{
		$sql="INSERT INTO products(name,cid,price,des)VALUES('$pname','$pcat','$pprice','$pdes')";
		$query=mysqli_query($conn,$sql);
		if($query){
			// $ps="Product Added Successfully";
			header("location:products.php");
		}else{
			$ng="Something Wrong";
		}
	}
}
?>
<?php include'inc/header.php';?>
<?php include'inc/nav.php';?>	
	<div class="close-btn fa fa-times"></div>

	
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog">
			<div class="container">
				<?php
					if(isset($ps)){ ?>
						<div class="alert alert-success"><?php echo $ps ;?></div>
				<?php
					}elseif(isset($ng)){ ?>
						<div class="alert alert-danger"><?php echo $ng ;?></div>
				<?php
					}
				?>
				<form action=""method="post"enctype="multipart/form-data">
					<div class="form-group">
						<label for="Productname">Product Name</label>
						<input type="text"class="form-control"name="product_name"placeholder="Product Name">
					</div>
					<div class="form-group">
						<label for="Product-des">Product Description</label>
						<textarea type="text"class="form-control"name="product_des"placeholder="Product Description"row="3"></textarea>
					</div>
					<div class="form-group">
						<label for="categoryname">Product Category</label>
						<select name="product_category"class="form-control" id="product_category">
							<option value=""><====Select Category====></option>
							<?php

								$sql="SELECT * FROM category";
								$res=mysqli_query($conn,$sql);
								while($row=mysqli_fetch_assoc($res)){
									?>
								<option value="<?php echo $row['id'];?>"><?php echo $row['cname'];?></option>
							<?php
								}
							?>
						</select>
						
					</div>
					<div class="form-group">
						<label for="Productprice">Product Price</label>
						<input type="text"class="form-control"name="product_price"placeholder="Product Price">
					</div>
					<div class="form-group">
						<?php
					if(isset($s)){ ?>
						<div class="alert alert-success"><?php echo $s ;?></div> <?php } ?>
						<label for="Productname">Product Image</label>
						<input type="file"class="form-control"name="product_image">
						<p class="help-blog">Only JPG/PNG imagese are supported</p>
					</div>
					<button type="submit"class="btn btn-default">Submit</button>
				</form>
			</div>
		</div>
	</section>
	

<?php include'inc/footer.php';?>