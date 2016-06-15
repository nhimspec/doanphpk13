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
	<link rel="stylesheet" href="css/style.index2.css">
	<script src="js/js1.12.4.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="fix"><?php include("view/cnt-menu.php") ?></div>
			<div class="container">

				<?php include("view/cnt-banner.php") ?>
				<div class="phone row">
					<div class="title"><img src="img/icon/smartphone.png" alt=""><span>Điện thoại</span></div>
					<?php include("view/site/content-find.php") ?>

				</div>
		<?php include('view/footer.php'); ?>
	</div>
</body>
</html>