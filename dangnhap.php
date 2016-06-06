<?php 
session_start();
require 'database.php';
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
	<link rel="stylesheet" href="css/style.index.css">
	<script src="js/js1.12.4.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container-fluid fix">
			<div class="top-header">
				<?php if ( !empty($_SESSION))
				{
				?>
				<div class="dropdown taikhoan">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $_SESSION["username"]; ?>
					<span class="caret"></span></a>
					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="#">Thông tin cá nhân</a></li>
					  	<li><a href="user.php">Thêm Sản Phẩm</a></li>
					  	<li><a href="#">Đổi mật khẩu</a></li>
					  	<li><a href="dangxuat.php">Đăng Xuất</a></li>
					</ul>
				</div>
				<?php 
				}
				else
				{
				?>
				<div class="taikhoan"><a href="dangky.php"><span><img src="img/login/user.png" alt=""></span>Đăng kí</a></div>
				<div class="taikhoan"><a href="dangnhap.php"><span><img src="img/login/avatar.png" alt=""></span>Đăng nhập</a></div>
				<div class="taikhoan"><a href=""><span><img src="img/login/cart.png" alt=""></span>Sản phẩm</a></div>
				<?php
				}
				?>
		</div>
		<div class="container">			
			<div class="mid-header row">
				<div class="col-md-3 logo"><a href="index.php"><img src="img/logo/logo1.png" alt="logo"></a></div>
				<div class="col-md-7 find-info">		
					<div class="row form1">
						<table >
							<form action="find.php" method="get">
									<tr>
										<td>
											<input type="text" placeholder="Tìm kiếm tên sản phẩm" name="find">
										</td>
										<td id="fix-td">
											<input type="submit" value="Tìm kiếm" id="find-tk">
										</td>
									</tr>							
							</form>
						</table>
					</div>
					<div class="row menu">
						<ul>
							<li><a href="">Trang chủ</a></li>
							<li><a href="">Sản phẩm</a></li>
							<li><a href="">Tin tức</a></li>
							<li><a href="">Liên hệ</a></li>
							<li><a href="">Khuyến mãi</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-2">
					<table id="t2">
						<tr id="good">
							<td><a href=""><img src="img/login/add.png" alt=""></a></td>
							<td><a href="">0 sản phẩm</a></td>
						</tr>
					</table>
				</div>
			</div>
			<div class="content row">
				<div class="tintuc">
					<div class="danhmuc">
						<ul>
							<a href="#"><li class="active">Điện Thoại</li></a>
							<a href="#"><li>Tablet</li></a>
							<a href="#"><li>Laptop</li></a>
							<a href="#"><li>Phụ Kiện</li></a>
						</ul>
					</div>
					<div class="move">
						<div id="myCarousel" class="carousel slide" data-ride="carousel">
						    <ol class="carousel-indicators">
						      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						      <li data-target="#myCarousel" data-slide-to="1"></li>
						      <li data-target="#myCarousel" data-slide-to="2"></li>							      
						    </ol>	
						    <div class="carousel-inner" role="listbox">		
							    <div class="item active">
							        <img src="img/banner/iphone.jpg" alt="" >
							        <div class="carousel-caption">  
							        </div>
							    </div>
							    <div class="item">
							        <img src="img/banner/oppo.jpg" alt="" >
							        <div class="carousel-caption">  
							        </div>
							    </div>
							    <div class="item">
							        <img src="img/banner/quaonline.jpg" alt="">
							        <div class="carousel-caption">
							          
							        </div>
							    </div>
						    </div>
							    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
							      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
							      <span class="sr-only">Previous</span>
							    </a>
							    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
							      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							      <span class="sr-only">Next</span>
							    </a>
		 				</div>
					</div>
					<div class="tincongnghe">
						<div class="tit-info"><h3><a href="">Tin công nghệ</a></h3></div>
						<div class="content-info">
							<ul>
								<a href=""><li>tin 1</li></a>
								<a href=""><li>tin 2</li></a>
								<a href=""><li>tin 3</li></a>
								<a href=""><li>tin 4</li></a>								
							</ul>
						</div>
					</div>
				</div>
				<div class="content-bot col-md-12">
						<div class="container-fluid">		
							<form class="form-horizontal" role="form" method="POST" style="padding-top:20px;">
								<div class="form-group">
									<label class="col-sm-3 control-label" class="format">Username</label>
									<div class="col-sm-4">
				        				<input class="form-control" name="username" placeholder="Username" type="text">
				     				</div>	
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label" class="format">Password</label>
									<div class="col-sm-4">
				        				<input class="form-control" name="password" placeholder="Password" type="password">
				     				</div>	
								</div>
								<div class="form-group">
									<?php
											echo $saithongtin;
									?>
								</div>
								<div class="form-group" style="text-align:center">
									<div class="well well-lg">
										<button type="submit" class="btn btn-success">Đăng nhập</button>
										<a href="index.php" class="btn btn-default" role="button">Trở lui</a>
									</div>
								</div>
							</form>
						</div>
				</div>
			</div>
		</div>
		<div class="footer">
			<div class="">
				<p>copyright &copy; 2016</p>
			</div>
		</div>
	</div>
</body>
</html>