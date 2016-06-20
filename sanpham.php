<?php 
session_start();
$id = null;
require 'database/database.php';
//check id null or not
if ( !empty($_GET['id'])) {
	$id = $_REQUEST['id'];
}
//check info id
if ( null==$id || !(is_numeric($id))) {
	header("Location: index.php");
} else {
   	$conn = Database::connect();
   	$sql = "SELECT * FROM sanpham WHERE id=$id";
	$results = mysqli_query($conn, $sql);
	if ($results->num_rows > 0) {
		$data = $results->fetch_array();
	}
	Database::disconnect();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TKP Store</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.index2.css">
	<link rel="stylesheet" href="css/style.sanpham.css">
	<script src="js/js1.12.4.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

</head>
<body>
	<div class="container-fluid set">
		<div class="fix"><?php include('view/cnt-menu.php'); ?></div>
		<div class="container">			
			
			<div class="content row">
				
				<?php include('view/site/content-sanpham.php'); ?>
			</div>
		</div>
		<?php include('view/footer.php'); ?>
	</div>
</body>
</html>