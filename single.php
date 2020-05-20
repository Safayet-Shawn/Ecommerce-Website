<?php 
ob_start();
session_start();
include'inc/header.php';
require_once('config/connect.php');
 include'inc/nav.php';

 	 $uid=$_SESSION['customerid'];
 ?>	
	<div class="close-btn fa fa-times"></div>
	<?php
	if(isset($_GET['id']) &! empty($_GET['id'])){
		$id=$_GET['id'];
		$sql="SELECT * FROM products where id=$id";
		$res=mysqli_query($conn,$sql);
		$row=mysqli_fetch_assoc($res);

	}
	
	
		if(isset($_POST) &!empty($_POST)){
			$review=filter_var($_POST['review'], FILTER_SANITIZE_STRING);
			 $sss="INSERT INTO reviews(pid,uid,review) VALUES('$id','$uid','$review')";
			$rrr=mysqli_query($conn,$sss)or die(mysqli_error($conn));
			if($rrr){
				$smsg= "Review Submitted Successfully";
			}else{

				$fmsg= "Failed to Submit Review ";
			}

		}
	?>
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog">
			<div class="container">
				<div class="row">
					<div class="page_header text-center">
						<h2>Shop</h2>
						<p>Get the best kit for smooth shave</p>
					</div>

				
					<div class="col-md-10 col-md-offset-1">
					<!-- 	<?php
						if(isset($smsg)&!empty($smsg) ){ ?>
						<div class="alert alert-success"><?php echo $smsg ; ?></div>
					<?php }else{ ?>
						<div class="alert alert-danger"><?php echo $fmsg ; ?></div>
					<?php } ?> -->
					<div class="row">
						<div class="col-md-5">
							<div class="gal-wrap">
								<div id="gal-slider" class="flexslider">
									<ul class="slides">
										<li><img src="admin/<?php echo $row['thumb'];?>" class="img-responsive" alt=""/></li>
										
									</ul>
								</div>
								<ul class="gal-nav">
									<li>
										<div>
											<img src="admin/<?php echo $row['thumb'];?>" class="img-responsive" alt=""/>
										</div>
									</li>
									
								</ul>
								<div class="clearfix"></div>
							
							</div>
						</div>
						<div class="col-md-7 product-single">
							<h2 class="product-single-title no-margin"><?php echo $row['name'];?></h2>
							<div class="space10"></div>
							<div class="p-price"><?php echo $row['price'];?></div>
							<p><?php echo $row['des'];?></p>
							<form method="get" action="addto_cart.php">
								<div class="product-quantity">
									<span>Quantity:</span> 
										<input type="hidden"name="id" value="<?php echo $row['id'];?>">
										<input type="text" name="quant" placeholder="1">
									
								</div>
								<div class="shop-btn-wrap "style="margin-bottom: 18px;">
									<input type="submit"class="button btn-small" value="Add to Cart">
								</div>
							</form>
							<a href="addto_wishlist.php?id=<?php echo $row['id'];?>" style="margin-top:10px;padding: 10px 15px;border-radius: 2px;border:1px solid #000;"class="space20"> <i class="fa fa-heart"></i>Add to Wishlist<i class="fa fa-heart"></i></a>
							<div class="product-meta">
								<span>Categories:
								<?php 
								$idd=$row['cid'];
								$sqlcat="SELECT * FROM category where id= $idd ";
								$resu=mysqli_query($conn,$sqlcat);
								$r=mysqli_fetch_assoc($resu);
								?>
								 <a href="index.php?id=<?php echo $r['id']; ?>"><?php echo $r['cname'];?></a></span><br>
								
							</div>
						</div>
					</div>
					<div class="clearfix space30"></div>
					<div class="tab-style3">
						<!-- Nav Tabs -->
						<div class="align-center mb-40 mb-xs-30">
							<ul class="nav nav-tabs tpl-minimal-tabs animate">
								<li class="active col-md-6">
									<a aria-expanded="true" href="#mini-one" data-toggle="tab">Overview</a>
								</li>
								<!-- <li class="col-md-4">
									<a aria-expanded="false" href="#mini-two" data-toggle="tab">Product Info</a>
								</li> -->
								<li class="col-md-6">
									<a aria-expanded="false" href="#mini-three" data-toggle="tab">Reviews</a>
								</li>
							</ul>
						</div>
						<!-- End Nav Tabs -->
						<!-- Tab panes -->
						<div style="height: auto;" class="tab-content tpl-minimal-tabs-cont align-center section-text">
							<div style="" class="tab-pane fade active in" id="mini-one">
								<p><?php echo $row['des'];?></p>
								
							</div>
							<!-- <div style="" class="tab-pane fade" id="mini-two">
								<table class="table tba2">
									<tbody>
										<tr>
											<td>Sizes</td>
											<td>M, L, XL, XXL</td>
										</tr>
										<tr>
											<td>Prodused in</td>
											<td>USA</td>
										</tr>
										<tr>
											<td>Material</td>
											<td>plastic, textile</td>
										</tr>
										<tr>
											<td>Colors</td>
											<td>red, black, grey</td>
										</tr>
										<tr>
											<td>Dimension</td>
											<td>20x40x33</td>
										</tr>
										<tr>
											<td>Type</td>
											<td>bag</td>
										</tr>
										<tr>
											<td>Weight</td>
											<td>0.35kg</td>
										</tr>
									</tbody>
								</table>
							</div> -->
							<div style="" class="tab-pane fade" id="mini-three">
								<div class="col-md-12">
									 <?php
									$ssqqll="SELECT * FROM reviews WHERE pid=$id ";
									$rreess=mysqli_query($conn,$ssqqll);
									$countt=mysqli_num_rows($rreess);
									?> 
									<h4 class="uppercase space35"><?php echo $countt; ?> Reviews for <?php echo substr($row['name'], 0, 20)."...";?></h4>
									<ul class="comment-list">
										<?php

										 $sqqq=" SELECT * FROM reviews LEFT JOIN user_meta ON reviews.uid=user_meta.uid where reviews.pid=$id ORDER BY reviews.id DESC";
										 $srrr=mysqli_query($conn,$sqqq);
										 while($rrrow=mysqli_fetch_assoc($srrr)){
										?>
										<li>
											<a class="pull-left" href="#"><img class="comment-avatar" src="images/quote/1.jpg" alt="" height="50" width="50"></a>
											<div class="comment-meta">
												<a href="#"><?php echo $rrrow['first']." "; echo $rrrow['last'];?></a>
												<span>
												<em><?php  echo $rrrow['timestamp']; ?></em>
												</span>
											</div>
											<div class="rating2">
												<span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span>
											</div>
											<p>
												<?php echo $rrrow['review'];?>
											</p>
										</li>
										<?php
											}
										?>
									</ul>
									<?php 
										$uid=$_SESSION['customerid'];
										 $revsql="SELECT * FROM reviews where pid=$id and uid=$uid";
										$revres=mysqli_query($conn,$revsql);
										 $revcount=mysqli_num_rows($revres);
										if($revcount >=1){
											echo"<h4 class='space20'>You have already reviewed this product , cann't review more than once !!</h4>";
										}else{
									?>
									<h4 class="uppercase space20">Add a review</h4>
									<form id="form" class="review-form"method="post">
										<?php
										 $ssqq=" SELECT * FROM user LEFT JOIN user_meta ON user.id=user_meta.uid where user.id=$uid";
										 $ssres=mysqli_query($conn,$ssqq);
										 $ssrow=mysqli_fetch_assoc($ssres);
										?>
										<div class="row">
											<div class="col-md-6 space20">
												<input name="name" class="input-md form-control" placeholder="Name *" maxlength="100" required="" type="text"value="<?php echo $ssrow['first']." "; echo $ssrow['last'];?> "disabled >
											</div>
											<div class="col-md-6 space20">
												<input name="email" class="input-md form-control" placeholder="Email *" maxlength="100" required="" type="email"value="<?php echo $ssrow['email'];?>" disabled >
											</div>
										</div>
									<!-- 	<div class="space20">
											<span>Your Ratings</span>
											<div class="clearfix"></div>
											<div class="rating3">
												<span>&#9734;</span><span>&#9734;</span><span>&#9734;</span><span>&#9734;</span><span>&#9734;</span>
											</div>
											<div class="clearfix space20"></div>
										</div> -->
										<div class="space20">
											<textarea name="review" id="text" class="input-md form-control" rows="6" placeholder="Add review.." maxlength="400"></textarea>
										</div>
										<button type="submit" class="button btn-small">
										Submit Review
										</button>
									</form>
								<?php
								 }

								?>
								</div>
								<div class="clearfix space30"></div>
							</div>
						</div>
					</div>
					<div class="space30"></div>
					<div class="related-products">
						<h4 class="heading">Related Products</h4>
						<hr>
						<div class="row">
							<div id="shop-mason" class="shop-mason-3col">
								
								<?php
									$s="SELECT * FROM products where cid={$row['cid']} AND id !={$row['id']} ORDER BY rand() LIMIT 3";
									$rrr=mysqli_query($conn,$s);
									while($f=mysqli_fetch_assoc($rrr)){
								?>
								<div class="sm-item isotope-item">
									<div class="product">
										<div class="product-thumb">
											<img src="admin/<?php echo $f['thumb'];?>" class="img-responsive" alt="">
											<div class="product-overlay">
												<span>
												<a href="single.php?id=<?php echo $f['id'];?>" class="fa fa-link"></a>
												<a href="addto_cart.php?id=<?php echo $f['id'];?>" class="fa fa-shopping-cart"></a>
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
										<h2 class="product-title"><a href="#"><?php echo $f['name'];?></a></h2>
										<div class="product-price"><?php echo $f['price'];?></div>
									</div>
								</div>
								<?php
									}
								?>
							</div>
					
						</div>
					</div>
					
					</div>
				</div>
			</div>
		</div>
	</section>
	
<?php include'inc/footer.php';?>