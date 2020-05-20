<?php
session_start();
require_once('../config/connect.php');
if(!isset($_SESSION['email'])& empty($_SESSION['email'])){
	header('location:login.php');
}
?>
<?php include'inc/header.php';?>
<?php include'inc/nav.php';?>	
	<div class="close-btn fa fa-times"></div>

	
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog">
			<div class="container">
				<div class="row">
					<div class="page_header text-center">
						<h2>Admin Deshboard</h2>
						<p>You can create and manage  products & categories from here</p>
					</div>
					<div class="col-md-12">
							<div class="row">
							<div id="shop-mason" class="shop-mason-4col">
								<?php 
								$sqlll="SELECT * FROM products";

								$resss=mysqli_query($conn,$sqlll);
								 $pro_per_page=4;
								 $total_pro=mysqli_num_rows($resss);
								 $total_page=ceil($total_pro/$pro_per_page);
								if(isset($_GET['page']) &!empty($_GET['page'])){
									$page_id=$_GET['page'];
									$prostr_in_page=($page_id-1)*$pro_per_page;
								}else{
									$page_id=1;
								}
								$prostr_in_page=($page_id-1)*$pro_per_page;
									$sql="SELECT * FROM products LIMIT $prostr_in_page,$pro_per_page";
									// if(isset($_GET['cid']) & !empty($_GET['cid'])){
									// 	$id = $_GET['cid'];
									// 	$sql .=" WHERE cid= $id ";
									// 	// if(isset($_GET['page']) &!empty($_GET['page'])){
									// 	// 	$page_id=$_GET['page'];
									// 	// 	$prostr_in_page=($page_id-1)*$pro_per_page;
									// 	// 	$sql .="LIMIT $prostr_in_page,$pro_per_page";
									// 	// }

									// }
									$res=mysqli_query($conn,$sql);
									
									while($row=mysqli_fetch_assoc($res)){
								?>
								<div class="sm-item isotope-item">
									<div class="product">
										<div class="product-thumb">
											<img src="<?php echo $row['thumb']; ?>" class="img-responsive" alt="">
											<div class="product-overlay">
												<!-- <span>
												<a href="single.php?id=<?php echo $row['id']; ?>" class="fa fa-link"></a>
												<a href="addto_cart.php?id=<?php echo $row['id']; ?>" class="fa fa-shopping-cart"></a>
												</span>					 -->
											</div>
										</div>
										<div class="rating">
											<span class="fa fa-star act"></span>
											<span class="fa fa-star act"></span>
											<span class="fa fa-star act"></span>
											<span class="fa fa-star act"></span>
											<span class="fa fa-star act"></span>
										</div>
										<h2 class="product-title"><a href="#"><?php echo $row['name'];?></a></h2>
										<div class="product-price"><?php echo $row['price'];?><!-- <span><?php echo $row['price'];?></span> --></div>
									</div>
								</div>
								<?php
									}
								?>
							</div>
						</div>
						<div class="clearfix"></div>
						<!-- Pagination -->
						
						<div class="page_nav">
							<!-- <a href=""><i class="fa fa-angle-left"></i></a> -->
							<!-- <a href="" class="active">1</a> -->
							<?php
							for ($page=1; $page <=$total_page ; $page++) { 
								
							?>
							<a href="index.php?page=<?php echo $page; ?>"style="display: inline-block;"><?php echo $page; ?></a>
							<!-- <a href="">3</a> --><!-- 
							<a class="no-active">...</a> -->
							<!-- <a href="">9</a> -->
							<!-- <a href=""><i class="fa fa-angle-right"></i></a> -->
						
						<!-- End Pagination -->
					<?php } ?>
					</div>
					
						<!-- End Pagination -->
					</div>
				</div>
			</div>
		</div>
	</section>
	

<?php include'inc/footer.php';?>