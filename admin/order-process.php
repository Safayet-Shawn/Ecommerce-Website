<?php
ob_start();
session_start();
require_once('../config/connect.php');
if(!isset($_SESSION['email'])& empty($_SESSION['email'])){
	header('location:login.php');
}

include'inc/header.php';
include'inc/nav.php';

if(isset($_POST) & !empty($_POST)){

	$orderid=filter_var($_POST['orderid'], FILTER_SANITIZE_NUMBER_INT);
	$status=filter_var($_POST['orderstatus'], FILTER_SANITIZE_STRING);


	$message=filter_var($_POST['message'], FILTER_SANITIZE_STRING);
	// echo"<pre>";
	// print_r($_POST);
	
	// echo"</pre>";
	// $sql="SELECT * FROM user_meta WHERE uid='$uid' ";
	// $res=mysqli_query($conn,$sql);
	// $row=mysqli_fetch_assoc($res);
	// $count=mysqli_num_rows($res);
	// if($count == 1){
		// update user data
		 $usql="INSERT INTO ordertracing (orderid,status,message) VALUES('$orderid','$status','$message')";
		 $ures=mysqli_query($conn,$usql);
		if($ures){
			$ordup="UPDATE orders SET orderstatus='$status' where id=$orderid";
			$ordrees=mysqli_query($conn,$ordup);
			if($ordrees){
				header('location:orders.php');
			}
		 
		
	}
// }
}
 ?>	

	
	<div class="close-btn fa fa-times"></div>
	
	
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog">
					<div class="page_header text-center">
						<h2>Admin Order Processing</h2>
						<!-- <p>Do you want to cancel order</p> -->
					</div>
<form action=""method="post">
<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="billing-details">
						<h3>Order Processing</h3><br>
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
						header('location:orders.php');
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
					<lavel>Order Status</lavel>
					<select name="orderstatus" class="form-control"id="">
						<option value=""><--Select Status--></option>
						<option value="In Process">In Process</option>
						<option value="Dispatched">Dispatched</option>
						<option value="Delivered">Delivered</option>
					</select>
					<div class="clearfix space20"></div>
						<label for="">Reason:</label>
						<textarea name="message"class="form-control" id="" cols="10" ></textarea>
						<input type="hidden" name="orderid"value="<?php echo $_GET['id'];?>">

					<div class="space30"></div>
					<input type="submit"class="button btn-lg" value="UPDATE ORDER STATUS">
					</div>
				</div>
				
			
			</div>
			
			
			
			
			
		</div>		
</form>		
		</div>
	</section>
	

<?php include'inc/footer.php';?>