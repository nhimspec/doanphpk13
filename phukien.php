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
		<link rel="stylesheet" href="css/phukien.css">
		<script src="js/js1.12.4.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/owl.carousel.min.js"></script>
	</head>
	<body>
		<div class="contairner-fluid">
			<div class="fix"><?php include("view/cnt-menu.php") ?></div>
			<div class="container">
				<div class="title-menu">
					<ul>
						<li>
							<a href=""><i class="item0"></i></a>
							<label > Tất cả</label>
						</li>
						<li>
							<a href=""><i class="item1"></i></a>
							<label > Ốp lưng</label>
						</li>
						<li>
							<a href=""><i class="item2"></i></a>
							<label > Pin, sạc
							dự phòng</label>
						</li>
						<li>
							<a href=""><i class="item3"></i></a>
							<label > Sạc dây, cáp các loại</label>
						</li>
						<li>
							<a href=""><i class="item4"></i></a>
							<label > Thẻ nhớ</label>
						</li>
						<li>
							<a href=""><i class="item5"></i></a>
							<label > Tai nghe</label>
						</li>
						<li>
							<a href=""><i class="item6"></i></a>
							<label > Miếng dán màn hình</label>
						</li>
						<li>
							<a href=""><i class="item7"></i></a>
							<label > USB</label>
						</li>
						<li>
							<a href=""><i class="item8"></i></a>
							<label > Loa Laptop</label>
						</li>
						<li>
							<a href=""><i class="item9"></i></a>
							<label > Chuột máy tính</label>
						</li>
						<li>
							<a href=""><i class="item10"></i></a>
							<label > Phụ kiện khác</label>
						</li>

					</ul>
				</div>
				<script>
					$(document).ready(function() {
					
					$("#owl-demo").owlCarousel({
					
					autoPlay: 3000, //Set AutoPlay to 3 seconds
					
					items : 2,
					itemsDesktop : [1199,3],
					itemsDesktopSmall : [979,3]
					
					});
					
					});
				</script>
				<div id="owl-demo">
					
					<div class="item"><img src="img/banner-fone/1.jpg" alt="Owl Image"></div>
					<div class="item"><img src="img/banner-fone/2.jpg" alt="Owl Image"></div>
					<div class="item"><img src="img/banner-fone/3.jpg" alt="Owl Image"></div>
					<div class="item"><img src="img/banner-fone/4.jpg" alt="Owl Image"></div>
					<div class="item"><img src="img/banner-fone/5.jpg" alt="Owl Image"></div>
					<div class="item"><img src="img/banner-fone/6.jpg" alt="Owl Image"></div>
					<div class="item"><img src="img/banner-fone/7.jpg" alt="Owl Image"></div>
					<div class="item"><img src="img/banner-fone/8.jpg" alt="Owl Image"></div>
					<div class="item"><img src="img/banner-fone/9.jpg" alt="Owl Image"></div>
					<div class="item"><img src="img/banner-fone/10.jpg" alt="Owl Image"></div>
					
					
					
				</div>
				<div class="ctn-fone">
					<?php include("view/site/content-index.php") ?>
				</div>
				
			</div>
			<footer>
				<?php include('view/footer.php') ?>
			</footer>
		</div>
	</body>
</html>