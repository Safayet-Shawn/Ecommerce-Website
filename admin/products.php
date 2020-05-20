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
							<td>Product Name</td>
							<td>Category Name</td>
							<td>Thubmnail</td>
							<td>Operation</td>
						</tr>
					</thead>
					<?php 
					$sql="SELECT * FROM products";
					$res=mysqli_query($conn,$sql);
					$sl=0;
					while($row=mysqli_fetch_assoc($res)){
						$sl++;
					?>
						<tbody>
						<tr>
							<td><?php echo $sl;?></td>
							<td><?php echo $row['name']?></td>
							<td><?php echo $row['cid']?></td>
							<td><?php if($row['thumb']){echo"YES";}else{echo"NO";} ?></td>
							<td><a href="product_edit.php?id=<?php echo $row['id']; ?>">Edit</a> | <a href="product_delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
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