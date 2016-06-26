<div class="content-bot col-md-12">
	<div class="header-dathang">
		<h2>Đặt hàng <?php echo $data["ten"]; ?></h2>
	</div>
	<div class="giohang">
		<div class="form-group">
			<form class="form-inline" role="form">
				<div>
					<div class="thongtin-datmua">
						<h3><?php echo $data["ten"]; ?></h3>
						<a href="sanpham.php?id=<?php echo $data["id"]; ?>">
							<img src="action/showimg.php?id=<?php echo $data["id"]; ?>" alt="<?php echo $data["ten"]; ?>">
						</a>
						<h4><?php echo $data['gia'] . '&#8363';?></h4>
						<div class="km"><?php echo $data['khuyenmai'];?></div>
					</div>
					<div class="soluong">
						<select class="form-control" id="sl">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
						</select>
						<button type="button" class="btn btn-default xoa" onclick="window.location.href='#'">Xóa</button>	
					</div>
				</div>
				<hr>
				<div class="form-mua">
						<input type="radio" name="gender">Anh
						<input type="radio" name="gender">Chị
						<input type="text" class="form-control" placeholder="Họ và tên" name="hoten" id="ht">
						<input type="text" class="form-control" placeholder="Số điện thoại" name="sdt">
				</div>
				<div class="form-group submit">
					<button type="submit" class="btn btn-primary">Mua</button>
					<a href="index.php" class="btn btn-default" role="button">Trở lui</a>
				</div>
			</form>
		</div>
	</div>
</div>