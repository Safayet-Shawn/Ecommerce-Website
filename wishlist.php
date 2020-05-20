
<?php
ob_start(); 
session_start();
require_once('config/connect.php');
if(!isset($_SESSION['customer']) & empty($_SESSION['customer'])){
	header('location:login.php');
}
include'inc/header.php';
include'inc/nav.php';
$uid=$_SESSION['customerid'];
$cart = $_SESSION['cart'];
?>
	
	<div class="close-btn fa fa-times"></div>
	
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog content-account">
			<div class="container">
				<div class="row">
					<div class="page_header text-center">
						<h2>My Wishlist</h2>
					</div>
					<div class="col-md-12">

			<h3>Recent Wishlist</h3>
			<br>
			<table class="cart-table account-table table table-bordered">
				<thead>
					<tr><th>SL</th>
						<th>Order</th>
						<th>Date</th>
						<th>Status</th>
						
					</tr>
				</thead>
				<tbody>
					<?php
					$wishsql="SELECT * FROM products Left join wishlist ON products.id=wishlist.pid where uid=$uid";
					$wishres=mysqli_query($conn,$wishsql);
					$sl=0;
					while($wishrow=mysqli_fetch_assoc($wishres)){
						$sl++;
					?>
					<tr>
						<td>
							<?php echo $sl;?>
						</td>
						<td>
							<a href="single.php?id=<?php echo $wishrow['pid'];?>"><?php echo substr($wishrow['name'],0,20)."...";?></a>
						</td>
						<td>
							
							<?php echo $wishrow['price'];?>
						</td>
						<td>
							
							<?php echo $wishrow['timestamp'];?>			
						</td>
						
					</tr>
					<?php
				}
					?>
				</tbody>
			</table>		

			<br>
			<br>
			<br>



					</div>
				</div>
			</div>
		</div>
	</section>
	
<?php include'inc/footer.php';?>