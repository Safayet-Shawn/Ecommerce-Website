
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
						<h2>My Account</h2>
					</div>
					<div class="col-md-12">

			<h3>Recent Orders</h3>
			<br>
			<table class="cart-table account-table table table-bordered">
				<thead>
					<tr>
						<th>Order</th>
						<th>Date</th>
						<th>Status</th>
						<th>Payment Mode</th>
						<th>Total</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql="SELECT * FROM orders where uid=$uid";
					$res=mysqli_query($conn,$sql);
					while($row=mysqli_fetch_assoc($res)){
					?>
					<tr>
						<td>
							<?php echo $row['id'];?>
						</td>
						<td>
							
							<?php echo $row['timestamp'];?>
						</td>
						<td>
							
							<?php echo $row['orderstatus'];?>			
						</td>
						<td>
							
							<?php echo $row['paymentmode'];?>			
						</td>
						<td>
							
							<?php echo $row['totalprice'];?>			
						</td>
						<td>
							<a href="view-order.php?id=<?php echo $row['id']; ?> ">View</a> 
							<?php if($row['orderstatus'] !='Cancelled'){ ?>
							| <a href="cancel-order.php?id=<?php echo $row['id']; ?> ">Cancel</a>
						<?php } ?>
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

			<div class="ma-address">
						<h3>My Addresses</h3>
						<p>The following addresses will be used on the checkout page by default.</p>

			<div class="row">
				<div class="col-md-6">
								<h4>My Address <a href="edit-address.php">Edit</a></h4>
					<?php

						$csql="SELECT * FROM user LEFT JOIN user_meta ON user.id=user_meta.uid WHERE user.id=$uid";
						$cres=mysqli_query($conn,$csql);
						if(mysqli_num_rows($cres) == 1){
						$crow=mysqli_fetch_assoc($cres);
					?>
					<p>
						Name: <?php echo $crow['first']." ";  echo $crow['first'];?> 
					</p>
					<p>
						Address-1: <?php echo $crow['address1']." ";?> 
					</p>
					<p>
						Address-2: <?php echo $crow['address2']." ";?> 
					</p>

					<p>
						City: <?php echo $crow['city']." ";?> 
					</p>
					<p>
						State: <?php echo $crow['state']." ";?> 
					</p>
					<p>
						Country: <?php echo $crow['country']." ";?> 
					</p>
					<p>
						Company: <?php echo $crow['company']." ";?> 
					</p>
					<p>
						ZIP Code: <?php echo $crow['zip']." ";?> 
					</p>
					<p>
						Phone: <?php echo $crow['mobile']." ";?> 
					</p>
					<p>
						Email: <?php echo $crow['email']." ";?> 
					</p>
				<?php } ?>
				</div>
			</div>



			</div>

					</div>
				</div>
			</div>
		</div>
	</section>
	
<?php include'inc/footer.php';?>