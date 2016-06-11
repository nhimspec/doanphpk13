<?php 
session_start();
require 'database/database.php';
	$saithongtin="";
	if ( !empty($_POST)) {
	// keep track post values
	$username		=$_POST['username'];
	$password		=md5($_POST['password']);
	// insert data
	$conn = database::connect();
	$sql = "SELECT * FROM nguoidung WHERE username='$username' and password='$password'";
	$results = mysqli_query($conn, $sql);
	if ($results->num_rows == 0) {
		$saithongtin="Username hoặc Password không chính xác";
	}
	else
	{
		$row = $results->fetch_assoc();
		$_SESSION["userid"] 		= 	$row['id'];
		$_SESSION["username"]	=	$row['username'];
		}
		database::disconnect();
		header("Location:index.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TKP Store</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.dangnhap.css">
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
				<?php include('view/site/content-dangnhap.php'); ?>
			</div>
		</div>
		<?php include('view/footer.php'); ?>
	</div>
</body>
</html>