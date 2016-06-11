<?php 
session_start();
require 'database/database.php';
// Check username available
if ( !empty($_SESSION))
{
	$username	=$_SESSION["username"];
	$conn 		= database::connect();
	$sql 		= "SELECT * FROM nguoidung WHERE username='$username'";
	$result= mysqli_query($conn, $sql);
		// Check result return 0
		if ($result->num_rows == 0) {
			header("Location:index.php");
		}
	}
else
	{
		header("Location:index.php");
	}
// Check post
if ( !empty($_POST)) {
	// keep track post values
	$ten				=$_POST['ten'];
	$gia				=$_POST['gia'];
	$khuyenmai			=$_POST['khuyenmai'];
	$dinhkem			=$_POST['dinhkem'];
	$baohanh			=$_POST['baohanh'];
	$manhinh			=$_POST['manhinh'];
	$hdh				=$_POST['hdh'];
	$cmrtruoc			=$_POST['cmrtruoc'];
	$cmrsau				=$_POST['cmrsau'];
	$cpu				=$_POST['cpu'];
	$ram				=$_POST['ram'];
	$bonhotrong			=$_POST['bonhotrong'];
	$hotrothenho		=$_POST['hotrothenho'];
	$thesim				=$_POST['thesim'];
	$ketnoi				=$_POST['ketnoi'];
	$dungluongpin		=$_POST['dungluongpin'];
	$chucnangdacbiet	=$_POST['chucnangdacbiet'];
	$image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); //SQL Injection defence!
	$imagename = addslashes($_FILES['image']['name']);
	// insert data
	$conn = database::connect();
		$sql = "INSERT INTO sanpham(ten,gia,khuyenmai,dinhkem,baohanh,manhinh,hdh,cmrtruoc,cmrsau,cpu,ram,bonhotrong,hotrothenho,thesim,ketnoi,dungluongpin,chucnangdacbiet,img,imgname) values('$ten','$gia','$khuyenmai','$dinhkem','$baohanh','$manhinh','$hdh','$cmrtruoc','$cmrsau','$cpu','$ram','$bonhotrong','$hotrothenho','$thesim','$ketnoi','$dungluongpin','$chucnangdacbiet','$image','$imagename')";
	$conn->query($sql);
	database::disconnect();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TKP Store</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.user.css">
	<script src="js/js1.12.4.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
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
				<?php include('view/site/content-user.php'); ?>
			</div>
		</div>
		<?php include('view/footer.php'); ?>
	</div>
</body>
</html>