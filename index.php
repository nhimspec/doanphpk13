<?php 
session_start();
require 'database/database.php';
$conn = database::connect();
$sql = "SELECT * FROM sanpham";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>TKP Store</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.index2.css">
		<script src="js/js1.12.4.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="contairner-fluid">
			<div class="fix"><?php include("view/cnt-menu.php") ?></div>
			<div class="container">

				<?php include("view/cnt-banner.php") ?>
				<div class="phone row">
					<div class="title"><img src="img/icon/smartphone.png" alt=""><span>Điện thoại</span></div>
					<?php include("view/site/content-index.php") ?>

				</div>
				<div class="row ads">
					<div >
						<img src="img/ads/ads1.jpg" alt="">
					</div>
				</div>
				<div class="tablet row">
					<div class="title"><img src="img/icon/tablet-icon.png" alt=""><span>Tablet</span></div>
					<?php include("view/site/content-index.php") ?>

				</div>
				<div class="row ads">
					<div >

						<img src="img/ads/ads1.jpg" alt="">
					</div>
				</div>
				
			</div>
			<footer>
				<?php include('view/footer.php') ?>
			</footer>
		</div>
	</body>
</html>