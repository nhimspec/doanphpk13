<?php
session_start();
require 'database/database.php';
	$conn = Database::connect();
	if ( !empty($_GET['id'])) {
	$id = $_REQUEST['id'];
}
//check info id
	$conn = Database::connect();
	$sql = "SELECT * FROM sanpham ";
	$results = mysqli_query($conn, $sql);
	if ($results->num_rows > 0) {
		$data = $results->fetch_array();
	
	Database::disconnect();
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>chitiet</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.index.css">
		<link rel="stylesheet" href="css/style.chitiet.css">
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
					
				</div>

				<div class="row tit-ct" >
					<p>Điện thoại ></p>
				</div>
				<h2><?php echo $data['ten'];?></h2>
				<div class="row">
					<div class="col-md-4 img-sp">
					<img src="action/showimg.php?id=<?php echo $row["id"]; ?>" alt="">
						
					</div>
					<div class="col-md-5 buy-sp">
						<h2 style="color:red"><?php echo $data['gia']?>₫</h2><br>
						<div class="sale-chitiet">
							<p>Khuyến mãi:  <?php echo $data['khuyenmai']; ?></p>
							
						</div>
						<div class="text-chitiet">
							<p>Trong hộp có:  <?php echo $data['dinhkem'] ;?></p>
							<p>
								Bảo hành chính hãng:  <?php echo $data['baohanh']; ?>
							</p>
							<p>Giao hàng trong 30 phút, đổi trả 1 tháng (nếu có lỗi).</p>
						</div>
						<div class="btn">
							<a href="dathang.php"><button type="button" class="btn btn-primary btn-md">Mua hàng</button></a>
							<a href="dathang.php"><button type="button" class="btn btn-warning btn-md">Giỏ</button></a>
						</div>

					</div>
					<div class="col-md-3 phukien">
						<div class="tit-ct">
							<p>phụ kiện</p>

						</div>
						<ul>
							<li>pk1</li>
							<li>pk2</li>
							<li>phk3</li>
						</ul>
					</div>
					
				</div>
				<div class="row">
					<div class="col-md-4 inf-sp">
						<strong>Thông số kỹ thuật</strong>
						<p>Màn hình: <?php echo $data['manhinh'] ?></p>
						<p>Hệ điều hành: <?php echo $data['hdh'] ?></p>
						<p>Camera sau: <?php echo $data['cmrsau'] ?></p>
						<p>Camera trước: <?php echo $data['cmrtruoc'] ?></p>
						<p>CPU: <?php echo $data['cpu'] ?></p>
						<p>RAM: <?php echo $data['ram'] ?></p>
						<p>Bộ nhớ trong: <?php echo $data['bonhotrong'] ?></p>
						<p>Hỗ trợ thẻ nhớ: <?php echo $data['hotrothenho'] ?></p>
						<p>Thẻ sim: <?php echo $data['thesim'] ?></p>
						<p>Kết nối: <?php echo $data['ketnoi'] ?></p>
						<p>Dung lượng pin: <?php echo $data['dungluongpin'] ?></p>
						<p>Chức năng đặc biệt: <?php echo $data['chucnangdacbiet'] ?></p>
						

					</div>
					<div class="col-md-8 text-sp">
						<strong>Điểm nổi bật</strong>

					</div>
				</div>
			</div>
			<?php include('view/footer.php'); ?>
		</div>
		
	</body>
</html>