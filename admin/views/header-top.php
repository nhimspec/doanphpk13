<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php"><span>TKP-Store </span>Admin</a>
			<ul class="user-menu">
				<li class="dropdown pull-right">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> <?php echo $username;?> <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="profile.php?id=<?php echo $userid;?>"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Thông Tin Cá Nhân</a></li>
						<li><a href="changepassword.php"><svg class="glyph stroked lock"><use xlink:href="#stroked-lock"/></svg> Đổi Mật Khẩu</a></li>
						<li><a href="logout.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Đăng Xuất</a></li>
					</ul>
				</li>
			</ul>
		</div>
						
	</div><!-- /.container-fluid -->
</nav>