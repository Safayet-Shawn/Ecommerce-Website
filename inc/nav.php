<!-- <?php error_reporting(0); ?> -->
<div id="wrapper" class="wrapper">
	<!-- HEADER -->
	
	<header id="header2">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-xs-5 logo">
					<a href="http://localhost/ecomphp/index"><img src="img/logo.webp" class="img-responsive" alt=""/></a>
				</div>
				<div class="col-md-9 col-xs-7">
					<div class="top-bar">
						
					</div>
				</div>
			</div>
			<div class="menu-wrap">
				<div id="mobnav-btn">Menu <i class="fa fa-bars"></i></div>
				<ul class="sf-menu">
					<li>
						<a href="http://localhost/ecomphp/index.php">Home</a>
					</li>
					<li>
						<a href="http://localhost/ecomphp/index.php">Shop</a>
						<div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
						<ul>
							<?php
								$sql="SELECT * FROM category";
								$result=mysqli_query($conn,$sql);
								while($row=mysqli_fetch_assoc($result)){
							?>
							<li><a href="demu.php?cid=<?php echo $row['id']; ?>"><?php echo $row['cname']; ?></a></li>
							<?php
								}
							?>
						</ul>
					</li>
					<li>
						<a href="http://localhost/ecomphp/my-account.php">My Account</a>
						<div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
						<ul>
							<li><a href="http://localhost/ecomphp/my-account.php">My Orders</a></li>
							<li><a href="http://localhost/ecomphp/wishlist.php">My Wishlist</a></li>
							<li><a href="http://localhost/ecomphp/edit-address.php">Update Address</a></li>
							<li><a href="http://localhost/ecomphp/logout.php">Logout</a></li>
						</ul>
					</li>
					<li>
						<a href="#">Contact</a>
					</li>
				</ul>
				<?php

				if(isset($_SESSION['cart'])){

				?>
				<div class="header-xtra">
					<?php  $cart = $_SESSION['cart'];?>
					<div class="s-cart">
						<div class="sc-ico"><i class="fa fa-shopping-cart"></i><em><?php echo count($cart); ?></em></div>

						<div class="cart-info">
							<small>You have <em class="highlight"><?php echo count($cart); ?> item(s)</em> in your shopping bag</small>
							<br>
							<br>
							<?php 
						// 	print_r($cart);
							$total=0;
							foreach ($cart as $key => $value) {
							// echo "<br>".$key." : ".$value['quantity']."<br>";
							$sql="SELECT * FROM products where id =$key";
							$res=mysqli_query($conn,$sql);
							$row=mysqli_fetch_assoc($res);
						
							?>
							<div class="ci-item">
								<img src="admin/<?php echo $row['thumb']; ?>" width="70" alt=""/>
								<div class="ci-item-info">
									<h5><a href="single.php?id=<?php echo $row['id']; ?>" target="_blank"><?php echo substr($row['name'],0,30)."..."; ?></a></h5>
									<p><?php echo $value['quantity'];?> x <?php echo $row['price']; ?></p>
									<div class="ci-edit">
										<a href="cart_delete.php?id=<?php echo $key; ?>" class="edit fa fa-trash"></a>
									</div>
								</div>
							</div>
							<?php 
								$total=$total+($row['price'] * $value['quantity']);
								} 
							?>
							<div class="ci-total">Subtotal: <?php echo $total?></div>
							<div class="cart-btn">
								<a href="cart.php">View Bag</a>
								<a href="#">Checkout</a>
							</div>
						</div>
					</div>
					<div class="s-search">
						<div class="ss-ico"><i class="fa fa-search"></i></div>
						<div class="search-block">
							<div class="ssc-inner">
								<form>
									<input type="text" placeholder="Type Search text here...">
									<button type="submit"><i class="fa fa-search"></i></button>
								</form>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
			</div>
		</div>
	</header>