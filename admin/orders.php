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
				<table class="table table-striped">
					<thead>
						<tr>
							<td>SL</td>
							<td>Customer Name</td>
							<td>Total Price</td>
							<td>Order Status</td>
							<td>Payment Mode</td>
							<td>Order Placed on</td>
							<td>Operation</td>
						</tr>
					</thead>
					<?php 
					$sql="SELECT * FROM orders LEFT JOIN user_meta ON orders.uid=user_meta.uid ORDER BY orders.id DESC";
					$res=mysqli_query($conn,$sql);
					$sl=0;
					while($row=mysqli_fetch_assoc($res)){ 
						$sl++;
					?>
						<tbody>
						<tr>
							<td><?php echo $sl;?></td>
							<td><?php echo $row['first']." ";echo$row['first']; ?></td>
							<td><?php echo $row['totalprice']?></td>
							<td><?php echo $row['orderstatus']?></td>
							<td><?php echo $row['paymentmode'] ; ?></td>
							<td><?php echo $row['timestamp'] ; ?></td>
							<td><a href="order-process.php?id=<?php echo $row['id']; ?>">Process Order</a> </td>
						</tr>
					</tbody>
					<?php
						}
					?>
				</table>
			</div>
		</div>
	</section>
	

<?php include'inc/footer.php';?>