<div class="content-bot col-md-12">
	<div class="container-fluid">		
		<form class="form-horizontal dangky" role="form" method="POST" onsubmit="return confirm('Xác nhận tạo mới tài khoản!!')">				
			<h3><?php echo $dangky; ?></h3>
			<div class="form-group">
				<label class="col-sm-3 control-label">Họ Tên</label>
				<div class="col-sm-4">
					<input class="form-control" name="hoten" placeholder="Họ Tên" type="text">
				</div>	
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Username</label>
				<div class="col-sm-4">
					<input class="form-control" name="username" placeholder="username" type="text">
				</div>	
				<?php echo $tontai; ?>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Password</label>
				<div class="col-sm-4">
					<input class="form-control" name="password" placeholder="password" type="password">
				</div>	
			</div>
			<div class="form-group submit">
				<div class="well well-lg">
					<button type="submit" class="btn btn-success">Đăng ký</button>
					<a href="index.php" class="btn btn-default" role="button">Trở lui</a>
				</div>
			</div>
		</form>
	</div>
</div>