
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
						<th>Product Name</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Oder Info </th>
						<th>Total Price</th>
						
					</tr>
				</thead>
				<tbody>
					<?php
					if(isset($_GET['id']) & !empty($_GET['id'])){
						$id=$_GET['id'];
					}else{
						header('location:my-account.php');
					}
					$odrsql="SELECT * FROM orders where uid=$uid and id=$id";
					$odrres=mysqli_query($conn,$odrsql);
					$odrrow=mysqli_fetch_assoc($odrres);
					$odritmsql="SELECT * FROM orderitems 
              lEFT JOIN products ON orderitems.pid = products.id where orderid=$id";
					// echo $odritmsql="SELECT * FROM orderitems where orderid=$id";
					$odritmres=mysqli_query($conn,$odritmsql);
					while($odritmrow=mysqli_fetch_assoc($odritmres)){
					?>
					<tr>
						<td>
							<?php echo substr($odritmrow['name'],0,15);?>
						</td>
						<td>
							
							<?php echo $odritmrow['pquantity'];?>
						</td>
						<td>
							
							<?php echo $odritmrow['productprice'];?>			
						</td>
						<td>
						</td>
						<td>
							
							<?php echo $odritmrow['productprice']*$odritmrow['pquantity'];?>
							<!-- <?php echo $odritmrow['totalprice'];?>	 -->		
						</td>
						
					</tr>
					<?php
				}
					?>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td>Order Total </td>
						<td><?php echo $odrrow['totalprice'];?></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td>Order Status </td>
						<td><?php echo $odrrow['orderstatus'];?></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td>Order Placed ON </td>
						<td><?php echo $odrrow['timestamp'];?></td>
					</tr>
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