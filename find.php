<?php 
session_start();
require 'database/database.php';
$conn = database::connect();
if ( !empty($_GET)) {
	$find=$_GET['find'];
	$sql="SELECT * FROM sanpham WHERE ten like '%$find%'";
	$result = $conn->query($sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TKP Store</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.find.css">
	<script src="js/js1.12.4.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container-fluid fix">
		<?php include('view/header.php'); ?>
		<div class="container">		
			<?php include('view/mid-header.php'); ?>
			<div class="content row">
				<?php include('view/content-top.php'); ?>
				<?php include('view/site/content-find.php'); ?>
			</div>
		</div>
		<?php include('view/footer.php'); ?>
	</div>
</body>
</html>