
<?php 
session_start();
include'inc/header.php';
require_once('config/connect.php');
include'inc/nav.php';
 ?>	
	<div class="close-btn fa fa-times"></div>
	<!-- SHOP CONTENT -->
	<section id="content" >
		<div class="content-blog">
			<div class="container">
				<div class="row">
					
					<div class="col-md-12 ">
						<div id="myCarousel" class="carousel slide" data-ride="carousel">
						  <!-- Indicators -->
						  <ol class="carousel-indicators">
						    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						    <li data-target="#myCarousel" data-slide-to="1"></li>
						    <li data-target="#myCarousel" data-slide-to="2"></li>
						    <li data-target="#myCarousel" data-slide-to="3"></li>
						    <li data-target="#myCarousel" data-slide-to="4"></li>
						  </ol>

						  <!-- Wrapper for slides -->
						  <div class="carousel-inner">
						    <div class="item active">
						      <img src="img/1.jpg" alt="Los Angeles"width="100%"height="450px">
						    </div>

						    <div class="item">
						      <img src="img/2.jpg" alt="Chicago"width="100%"height="450px">
						    </div>

						    <div class="item">
						      <img src="img/3.jpg" alt="New York"width="100%"height="450px">
						    </div>
						    <div class="item">
						      <img src="img/4.jpg" alt="New York"width="100%"height="450px">
						    </div>
						    <div class="item">
						      <img src="img/5.jpg" alt="New York"width="100%"height="450px">
						    </div>
						  </div>

						  <!-- Left and right controls -->
						  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
						    <span class="glyphicon glyphicon-chevron-left"></span>
						    <span class="sr-only">Previous</span>
						  </a>
						  <a class="right carousel-control" href="#myCarousel" data-slide="next">
						    <span class="glyphicon glyphicon-chevron-right"></span>
						    <span class="sr-only">Next</span>
						  </a>
						</div>
					</div>
					<div class="col-md-12">
						<div class="page_header text-center">
						<h2>Our Shop</h2>
						<p>You can order products from here</p>
					</div>
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
											<img src="admin/<?php echo $row['thumb']; ?>" class="img-responsive" alt="">
											<div class="product-overlay">
												<span>
												<a href="single.php?id=<?php echo $row['id']; ?>" class="fa fa-link"></a>
												<a href="addto_cart.php?id=<?php echo $row['id']; ?>" class="fa fa-shopping-cart"></a>
												</span>					
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
					</div>
				</div>
			</div>
		</div>
	</section>
	

<?php include'inc/footer.php';?>