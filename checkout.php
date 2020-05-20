
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
	if($_POST['agree'] == true){
	$country=filter_var($_POST['country'], FILTER_SANITIZE_STRING);
	$first=filter_var($_POST['first'], FILTER_SANITIZE_STRING);
	$last=filter_var($_POST['last'], FILTER_SANITIZE_STRING);
	$company=filter_var($_POST['company'], FILTER_SANITIZE_STRING);
	$address1=filter_var($_POST['address1'], FILTER_SANITIZE_STRING);
	$address2=filter_var($_POST['address2'], FILTER_SANITIZE_STRING);
	$city=filter_var($_POST['city'], FILTER_SANITIZE_STRING);
	$state=filter_var($_POST['state'], FILTER_SANITIZE_STRING);
	$zip=filter_var($_POST['zip'], FILTER_SANITIZE_NUMBER_INT);
	$mobile=filter_var($_POST['mobile'], FILTER_SANITIZE_NUMBER_INT);
	$payment=filter_var($_POST['payment'], FILTER_SANITIZE_STRING);
	// echo"<pre>";
	// print_r($_POST);
	
	// echo"</pre>";
	$sql="SELECT * FROM user_meta WHERE uid='$uid' ";
	$res=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($res);
	$count=mysqli_num_rows($res);
	if($count == 1){
		// update user data
		 $usql="UPDATE user_meta SET country='$country', first='$first', last='$last', company='$company', address1='$address1', address2='$address2', city='$city', state='$state', zip='$zip', mobile='$mobile' WHERE uid=$uid";
		 $ures=mysqli_query($conn,$usql);
		if($ures){
			$total=0;
			foreach ($cart as $key => $value) {
			// echo "<br>".$key." : ".$value['quantity']."<br>";
			$ordsql="SELECT * FROM products where id =$key";
			$ordres=mysqli_query($conn,$ordsql);
			$ordrow=mysqli_fetch_assoc($ordres);
			$total=$total+($ordrow['price'] * $value['quantity']);
			}
			$iosql="INSERT INTO orders (uid,totalprice,orderstatus,paymentmode) VALUES('$uid','$total','Order Placed','$payment')";
			$iores=mysqli_query($conn,$iosql)or die(mysqli_error($conn));
			if($iores){
				// echo"order inserted and redirect to my account";
				 $orderid=mysqli_insert_id($conn);
				foreach ($cart as $key => $value) {
				// echo "<br>".$key." : ".$value['quantity']."<br>";
				$ordsql="SELECT * FROM products where id =$key";
				$ordres=mysqli_query($conn,$ordsql);
				$ordrow=mysqli_fetch_assoc($ordres);
				$pid=$ordrow['id'];
				$productprice=$ordrow['price'];
				$pquantity=$value['quantity'];


				$orditmsql="INSERT INTO orderitems (pid,orderid,productprice,pquantity) VALUES('$pid','$orderid','$productprice','$pquantity')";
				$orditmres=mysqli_query($conn,$orditmsql)or die(mysqli_error($conn));
				// if($orditmres){
				// 	// echo"    order items inserted and redirect to my account";
				// }
			}
			}
			unset($_SESSION['cart']);
			header('location:my-account.php');
		} 
		// if($ures){
		// 	print_r($cart);
		// 	echo "do";
		// }
		// 	$total=0;
		// 	foreach ($cart as $key => $value) {
		// 	// echo "<br>".$key." : ".$value['quantity']."<br>";
		// 	$ordersql="SELECT * FROM products where id =$key";
		// 	$orderres=mysqli_query($conn,$ordersql);
		// 	$orderrow=mysqli_fetch_assoc($orderres);
		// 	echo $total=$total+($urow['price']*$value['quantity']);
			
		// }
		// echo $iosql="INSERT INTO orders (uid,totalprice,orderstatus,paymentmode) VALUES('$uid','$total','Order Placed','$payment')";
		// $ores=mysqli_query($conn,$iosql) or die(mysqli_error($conn));
	// 	if($ores){
	// 		echo"Order inserted into orders and orderitems ";
	// 		$orderid=mysqli_insert_id($conn);
	// 		foreach ($cart as $key => $value) {
	// 		// echo "<br>".$key." : ".$value['quantity']."<br>";
	// 		$ordersql="SELECT * FROM products where id =$key";
	// 		$orderres=mysqli_query($conn,$ordersql);
	// 		$orderrow=mysqli_fetch_assoc($orderres);
	// 		$pid=$orderrow['id'];
	// 		$productprice=$orderrow['price'];
	// 		$orditm="INSERT INTO orderitems(pid,orderid,productprice) VALUES('$pid','$orderid','$productprice')";
	// 		$orditmres=mysqli_query($conn,$orditm);
	// 		if($orditmres){
	// 			echo"order itm directly insert to my account";
	// 		}
	// 	}
	}else{
		// insert user data
		$isql="INSERT INTO user_meta(country,first,last,company,address1,address2,city,state,zip,mobile,uid)VALUES('$country','$first','$last','$company','$address1','$address2' ,'$city','$state','$zip','$mobile','$uid')";
		$ires=mysqli_query($conn,$isql);
		if($ires){
			$total=0;
			foreach ($cart as $key => $value) {
			// echo "<br>".$key." : ".$value['quantity']."<br>";
			$ordsql="SELECT * FROM products where id =$key";
			$ordres=mysqli_query($conn,$ordsql);
			$ordrow=mysqli_fetch_assoc($ordres);
			$total=$total+($ordrow['price'] * $value['quantity']);
			}
			$iosql="INSERT INTO orders (uid,totalprice,orderstatus,paymentmode) VALUES('$uid','$total','Order Placed','$payment')";
			$iores=mysqli_query($conn,$iosql)or die(mysqli_error($conn));
			if($iores){
				// echo"order inserted and redirect to my account";
				 $orderid=mysqli_insert_id($conn);
				foreach ($cart as $key => $value) {
				// echo "<br>".$key." : ".$value['quantity']."<br>";
				$ordsql="SELECT * FROM products where id =$key";
				$ordres=mysqli_query($conn,$ordsql);
				$ordrow=mysqli_fetch_assoc($ordres);
				$pid=$ordrow['id'];
				$productprice=$ordrow['price'];
				$pquantity=$value['quantity'];


				$orditmsql="INSERT INTO orderitems (pid,orderid,productprice,pquantity) VALUES('$pid','$orderid','$productprice','$pquantity')";
				$orditmres=mysqli_query($conn,$orditmsql)or die(mysqli_error($conn));
				// if($orditmres){
				// 	// echo"    order items inserted and redirect to my account";
				// }
			}
			}
			unset($_SESSION['cart']);
			header('location:my-account.php');
		}
	}
}
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
						<h2>Shop - Checkout</h2>
						<p>Get the best kit for smooth shave</p>
					</div>
<form action=""method="post">
<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="billing-details">
						
						<h3 class="uppercase">Billing Details</h3>
						
						<div class="space30"></div>
						
							<label class="">Country </label>
							<select class="form-control"name="country">
								<option value="">Select Country</option>
								<option value="AX">Aland Islands</option>
								<option value="AF">Afghanistan</option>
								<option value="AL">Albania</option>
								<option value="DZ">Algeria</option>
								<option value="AD">Andorra</option>
								<option value="AO">Angola</option>
								<option value="AI">Anguilla</option>
								<option value="AQ">Antarctica</option>
								<option value="AG">Antigua and Barbuda</option>
								<option value="AR">Argentina</option>
								<option value="AM">Armenia</option>
								<option value="AW">Aruba</option>
								<option value="AU">Australia</option>
								<option value="AT">Austria</option>
								<option value="AZ">Azerbaijan</option>
								<option value="BS">Bahamas</option>
								<option value="BH">Bahrain</option>
								<option value="BD">Bangladesh</option>
								<option value="BB">Barbados</option>
							</select>
							<div class="clearfix space20"></div>
							<div class="row">
								<div class="col-md-6">
									<label>First Name </label>
									<input class="form-control" name="first"placeholder="" value="<?php if(!empty($row['first'])){echo $row['first']; }?>" type="text"required>
								</div>
								<div class="col-md-6">
									<label>Last Name </label>
									<input class="form-control" name="last"placeholder="" value="<?php if(!empty($row['last'])){echo $row['last']; }?>" type="text"required>
								</div>
							</div>
							<div class="clearfix space20"></div>
							<label>Company Name</label>
							<input class="form-control" name="company"placeholder="" value="<?php if(!empty($row['company'])){echo $row['company']; }?>" type="text"required>
							<div class="clearfix space20"></div>
							<label>Address </label>
							<input class="form-control" name="address1"placeholder="Street address" value="<?php if(!empty($row['address1'])){echo $row['address1']; }?>" type="text"required>
							<div class="clearfix space20"></div>
							<input class="form-control" name="address2"placeholder="Apartment, suite, unit etc. (optional)" value="<?php if(!empty($row['address2'])){echo $row['address2']; }?>" type="text"required>
							<div class="clearfix space20"></div>
							<div class="row">
								<div class="col-md-4">
									<label>Town / City </label>
									<input class="form-control" name="city"placeholder="Town / City" value="<?php if(!empty($row['city'])){echo $row['city']; }?>" type="text"required>
								</div>
								<div class="col-md-4">
									<label>State</label>
									<input class="form-control" value="<?php if(!empty($row['state'])){echo $row['state']; }?>" name="state"placeholder="State " type="text"required>
								</div>
								<div class="col-md-4">
									<label>Postcode </label>
									<input class="form-control" name="zip"placeholder="Postcode / Zip" value="<?php if(!empty($row['zip'])){echo $row['zip']; }?>" type="text"required>
								</div>
							</div>
							<div class="clearfix space20"></div>
							<label>Phone </label>
							<input class="form-control" id="billing_phone" name="mobile"placeholder="" value="<?php if(!empty($row['mobile'])){echo $row['mobile']; }?>" type="text"required>
						
					</div>
				</div>
				
			
			</div>
			
			<div class="space30"></div>
			<h4 class="heading">Your order</h4>
			
			<table class="table table-bordered extra-padding">
				<tbody>
					<tr>
						<th>Cart Subtotal</th>
						<td><span class="amount"><?php echo $total; ?></span></td>
					</tr>
					<tr>
						<th>Shipping and Handling</th>
						<td>
							Free Shipping				
						</td>
					</tr>
					<tr>
						<th>Order Total</th>
						<td><strong><span class="amount"><?php echo $total; ?></span></strong> </td>
					</tr>
				</tbody>
			</table>
			
			<div class="clearfix space30"></div>
			<h4 class="heading">Payment Method</h4>
			<div class="clearfix space20"></div>
			
			<div class="payment-method">
				<div class="row">
					
						<div class="col-md-4">
							<input name="payment" id="radio1" class="css-checkbox" name=""type="radio"value="cod"><span>Cash on Delivery</span>
							<div class="space20"></div>
							<p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won't be shipped until the funds have cleared in our account.</p>
						</div>
						<div class="col-md-4">
							<input name="payment" value="cheque"id="radio2" class="css-checkbox" name=""type="radio"><span>Cheque Payment</span>
							<div class="space20"></div>
							<p>Please send your cheque to BLVCK Fashion House, Oatland Rood, UK, LS71JR</p>
						</div>
						<div class="col-md-4">
							<input name="payment" value="paypal"id="radio3" class="css-checkbox" name=""type="radio"><span>Paypal</span>
							<div class="space20"></div>
							<p>Pay via PayPal; you can pay with your credit card if you don't have a PayPal account</p>
						</div>
					
				</div>
				<div class="space30"></div>
				
					<input name="agree" id="checkboxG2" class="css-checkbox"value="true" type="checkbox"name=""><span>I've read and accept the <a href="#">terms &amp; conditions</a></span>
				
				<div class="space30"></div>
				<input type="submit"class="button btn-lg" value="Pay Now">
			</div>
		</div>		
</form>		
		</div>
	</section>
	

<?php include'inc/footer.php';?>