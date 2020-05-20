
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

if(isset($_POST) & !empty($_POST)){

	$orderid=filter_var($_POST['orderid'], FILTER_SANITIZE_NUMBER_INT);

	$cancel=filter_var($_POST['cancel'], FILTER_SANITIZE_STRING);
	// echo"<pre>";
	// print_r($_POST);
	
	// echo"</pre>";
	// $sql="SELECT * FROM user_meta WHERE uid='$uid' ";
	// $res=mysqli_query($conn,$sql);
	// $row=mysqli_fetch_assoc($res);
	// $count=mysqli_num_rows($res);
	// if($count == 1){
		// update user data
		 $usql="INSERT INTO ordertracing (orderid,status,message) VALUES('$orderid','Cancelled','$cancel')";
		 $ures=mysqli_query($conn,$usql);
		if($ures){
			$ordup="UPDATE orders SET orderstatus='Cancelled' where id=$orderid";
			$ordrees=mysqli_query($conn,$ordup);
			if($ordrees){
				header('location:my-account.php');
			}
		 
		
	}
// }
}
 ?>	

	
	<div class="close-btn fa fa-times"></div>
	<?php
	$sql="SELECT * FROM user_meta WHERE uid='$uid' ";
	$res=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($res);

	?>
	
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog">
					<div class="page_header text-center">
						<h2>Shop - Cancel Order</h2>
						<p>Do you want to cancel order</p>
					</div>
<form action=""method="post">
<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="billing-details">
						<h3>Cancel Order</h3><br>
				<table class="cart-table account-table table table-bordered">
				<thead>
					<tr>
						<th>Order</th>
						<th>Date</th>
						<th>Status</th>
						<th>Payment Mode</th>
						<th>Total</th>
						
					</tr>
				</thead>
				<tbody>
					<?php
					if(isset($_GET['id']) & !empty($_GET['id'])){
						$id=$_GET['id'];
					}else{
						header('location:my-account.php');
					}
					$sql="SELECT * FROM orders where id=$id";
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
						
					</tr>
					<?php
				}
					?>
				</tbody>
			</table>
					<div class="space30"></div>
					<div class="clearfix space20"></div>
						<label for="">Reason:</label>
						<textarea name="cancel"class="form-control" id="" cols="10" ></textarea>
						<input type="hidden" name="orderid"value="<?php echo $_GET['id'];?>">

					<div class="space30"></div>
					<input type="submit"class="button btn-lg" value="CANCEL ORDER">
					</div>
				</div>
				
			
			</div>
			
			
			
			
			
		</div>		
</form>		
		</div>
	</section>
	

<?php include'inc/footer.php';?>