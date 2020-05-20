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

	
	<!-- add category -->
<section id="content">
	<div class="content-blog">
		<div class="container">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Category Name</th>
						<th>Operation</th>
					</tr>
				</thead>
				<?php
					$sql="SELECT * FROM category";
					$query=mysqli_query($conn,$sql);
					$id=0;
					while($row=mysqli_fetch_assoc($query)){
						$id++;
				?>
				<tbody>
					<tr>
						<th scope="row"><?php echo $id;?></th>
						<td><?php echo $row['cname'];?></td>
						<td><a href="category_edit.php?id=<?php echo $row['id']; ?>">Edit</a> | <a href="category_delete.php?id=<?php echo $row['id'];?>">Delete</a></td>
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