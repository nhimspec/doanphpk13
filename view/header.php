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
		  	<li><a href="action/dangxuat.php">Đăng Xuất</a></li>
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