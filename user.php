<?php 
session_start();
require 'database.php';
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
	<link rel="stylesheet" href="css/style.index.css">
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
					<form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" onsubmit="return confirm('Xác nhận bạn muốn tạo mới sản phẩm?')">
						<div class="row">	
							<div class="chung col-md-12">
								<h2 id="namephone"><input class="form-control" name="ten" placeholder="Tên sản phẩm" type="text"></h2>
								<div class="phoneimg">
									<img id="blah">
									<input type="file" name="image" onchange="readURL(this);">
								</div>
								<div class="phonesale">
									<h2 id="giaphone"><input class="form-control" name="gia" placeholder="Giá thành" type="text"></h2>
									<div>
											<h3>Khuyến mãi:</h3>
											<textarea id="editor1" name="khuyenmai">Khuyến mãi.....</textarea>
											<script type="text/javascript">
												CKEDITOR.replace( 'editor1' );
											</script>
									</div>
									<div class="col-md-12 chinhsach">
										<ul>
											<li>
												Trong hộp có: 
							        			<input class="form-control" name="dinhkem" placeholder="Đính kèm" type="text">
											</li>
											<li>
												Bảo hành:
												<input class="form-control" name="baohanh" placeholder="Bảo Hành" type="text">
											</li>
										</ul>
									</div>
								</div>
								<div class="phukien">
								</div>
							</div>
							<div class="phone-info col-md-12">
								<div class="thongso">
									<h2 style="margin-bottom:30px;">Thông số kỹ thuật</h2>
									<table class="table">
										<tr>
											<td>Màn hình:</td>
											<td><input class="form-control" name="manhinh" placeholder="Màn Hình" type="text"></td>
										</tr>
										<tr>
											<td>Hệ điều hành:</td>
											<td><input class="form-control" name="hdh" placeholder="Hệ điều hành" type="text"></td>
										</tr>
										<tr>
											<td>Camera sau:</td>
											<td><input class="form-control" name="cmrsau" placeholder="Camera sau" type="text"></td>
										</tr>
										<tr>
											<td>Camera trước:</td>
											<td><input class="form-control" name="cmrtruoc" placeholder="Camera trước" type="text"></td>
										</tr>
										<tr>
											<td>CPU:</td>
											<td><input class="form-control" name="cpu" placeholder="CPU" type="text"></td>
										</tr>
										<tr>
											<td>RAM:</td>
											<td><input class="form-control" name="ram" placeholder="Ram" type="text"></td>
										</tr>
										<tr>
											<td>Bộ nhớ trong:</td>
											<td><input class="form-control" name="bonhotrong" placeholder="Bộ nhớ trong" type="text"></td>
										</tr>
										<tr>
											<td>Hỗ trợ thẻ nhớ:</td>
											<td><input class="form-control" name="hotrothenho" placeholder="Hỗ trợ thẻ nhớ" type="text"></td>
										</tr>
										<tr>
											<td>Thẻ SIM:</td>
											<td><input class="form-control" name="thesim" placeholder="Thẻ SIM" type="text"></td>
										</tr>
										<tr>
											<td>Kết nối:</td>
											<td><input class="form-control" name="ketnoi" placeholder="Kết nối" type="text"></td>
										</tr>
										<tr>
											<td>Dung lượng pin:</td>
											<td><input class="form-control" name="dungluongpin" placeholder="Dung lượng pin" type="text"></td>
										</tr>
										<tr>
											<td>Chức năng đặc biệt:</td>
											<td><input class="form-control" name="chucnangdacbiet" placeholder="Chức năng đặc biệt" type="text"></td>
										</tr>
									</table>
									<div class="form-group">
										<div class="well well-lg">
											<button type="submit" class="btn btn-success">Thêm</button>
											<a href="index.php" class="btn btn-default" role="button">Trở lui</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
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