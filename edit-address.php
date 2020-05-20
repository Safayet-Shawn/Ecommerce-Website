
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
	// echo"<pre>";
	// print_r($_POST);
	
	// echo"</pre>";
	// $sql="SELECT * FROM user_meta WHERE uid='$uid' ";
	// $res=mysqli_query($conn,$sql);
	// $row=mysqli_fetch_assoc($res);
	// $count=mysqli_num_rows($res);
	// if($count == 1){
		// update user data
		 $usql="UPDATE user_meta SET country='$country', first='$first', last='$last', company='$company', address1='$address1', address2='$address2', city='$city', state='$state', zip='$zip', mobile='$mobile' WHERE uid=$uid";
		 $ures=mysqli_query($conn,$usql);
		if($ures){
			
		 
		
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
						<h2>Shop - Checkout</h2>
						<p>Get the best kit for smooth shave</p>
					</div>
<form action=""method="post">
<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="billing-details">
						
						<h3 class="uppercase">Update My Address</h3>
						
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
									<input class="form-control" name="first"placeholder="" value="<?php if(!empty($row['first'])){echo $row['first']; }?>" type="text">
								</div>
								<div class="col-md-6">
									<label>Last Name </label>
									<input class="form-control" name="last"placeholder="" value="<?php if(!empty($row['last'])){echo $row['last']; }?>" type="text">
								</div>
							</div>
							<div class="clearfix space20"></div>
							<label>Company Name</label>
							<input class="form-control" name="company"placeholder="" value="<?php if(!empty($row['company'])){echo $row['company']; }?>" type="text">
							<div class="clearfix space20"></div>
							<label>Address </label>
							<input class="form-control" name="address1"placeholder="Street address" value="<?php if(!empty($row['address1'])){echo $row['address1']; }?>" type="text">
							<div class="clearfix space20"></div>
							<input class="form-control" name="address2"placeholder="Apartment, suite, unit etc. (optional)" value="<?php if(!empty($row['address2'])){echo $row['address2']; }?>" type="text">
							<div class="clearfix space20"></div>
							<div class="row">
								<div class="col-md-4">
									<label>Town / City </label>
									<input class="form-control" name="city"placeholder="Town / City" value="<?php if(!empty($row['city'])){echo $row['city']; }?>" type="text">
								</div>
								<div class="col-md-4">
									<label>State</label>
									<input class="form-control" value="<?php if(!empty($row['state'])){echo $row['state']; }?>" name="state"placeholder="State " type="text">
								</div>
								<div class="col-md-4">
									<label>Postcode </label>
									<input class="form-control" name="zip"placeholder="Postcode / Zip" value="<?php if(!empty($row['zip'])){echo $row['zip']; }?>" type="text">
								</div>
							</div>
							<div class="clearfix space20"></div>
							<label>Phone </label>
							<input class="form-control" id="billing_phone" name="mobile"placeholder="" value="<?php if(!empty($row['mobile'])){echo $row['mobile']; }?>" type="text">
							
							<div class="space30"></div>
							<input type="submit"class="button btn-lg" value="UPDATE ADDRESS">
					</div>
				</div>
				
			
			</div>
			
			
			
			
			
		</div>		
</form>		
		</div>
	</section>
	

<?php include'inc/footer.php';?>