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
		<link rel="stylesheet" href="css/tablet.css">
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
						<li><a href="">Trang chủ</a></li>
						<li><strong>></strong></li>
						<li><a href="">Tablet (69 sản phẩm)</a></li>
						<li>></li>
						<li class="sub-menu"><a href="">Mức giá <img style="width:10px" src="img/icon/drop-down.png" alt=""></a>
							<ul >
								<li><a href="">Tất cả</a></li>
								<li><a href="">Dưới 3 triệu</a></li>
								<li><a href="">Từ 3 đến 8 triệu</a></li>
								<li><a href="">Từ 8 đến 12 triệu</a></li>
								
								<li><a href="">Trên 12 triệu</a></li>

							</ul>
		
						</li>
						<li class="sub-menu"><a href="">Hãng sản xuất <img style="width:10px" src="img/icon/drop-down.png" alt=""></a>
							<ul >
								<li><a href="">Tất cả</a></li>
								<li><a href="">Apple</a></li>
								<li><a href="">ASUS</a></li>
								<li><a href="">ACER</a></li>
								<li><a href="">LENOVO</a></li>
								<li><a href="">Huawei</a></li>

							</ul>
						</li>
						<li><button class="btn-fone">Mới</button></li>
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
				          
				  <div class="item"><img src="img/banner-fone/4.jpg" alt="Owl Image"></div>
				  <div class="item"><img src="img/banner-fone/6.jpg" alt="Owl Image"></div>
				  <div class="item"><img src="img/banner-fone/3.jpg" alt="Owl Image"></div>
				  <div class="item"><img src="img/banner-fone/1.jpg" alt="Owl Image"></div>
				  <div class="item"><img src="img/banner-fone/5.jpg" alt="Owl Image"></div>
				  <div class="item"><img src="img/banner-fone/2.jpg" alt="Owl Image"></div>
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