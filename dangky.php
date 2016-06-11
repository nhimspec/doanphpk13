<?php 
session_start();
require 'database/database.php';
$tontai = "";
$dangky = "";
if ( !empty($_POST)) {
	// keep track post values
	$hoten			=$_POST['hoten'];
	$username		=$_POST['username'];
	$password		=md5($_POST['password']);
	// insert data
	$conn = database::connect();
	$sql = "SELECT * FROM nguoidung WHERE username = '$username'";
	$results = mysqli_query($conn, $sql);
	if ($results->num_rows > 0) {
		$tontai = "Username đã có người sử dụng";
	}
	else
	{
		$sql = "INSERT INTO nguoidung (hoten,username,password) values('$hoten','$username','$password')";
		$conn->query($sql);
		$dangky="Đăng ký thành công";
	}
	database::disconnect();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TKP Store</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.dangky.css">
	<script src="js/js1.12.4.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }		
        }
    </script>
</head>
<body>
	<div class="container-fluid fix">
		<?php include('view/header.php'); ?>
		<div class="container">			
			<?php include('view/mid-header.php'); ?>
			<div class="content row">
				<?php include('view/content-top.php'); ?>
				<?php include('view/site/content-dangky.php'); ?>
			</div>
		</div>
		<?php include('view/footer.php'); ?>
	</div>
</body>
</html>