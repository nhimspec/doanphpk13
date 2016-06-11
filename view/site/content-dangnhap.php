<div class="content-bot col-md-12">
	<div class="container-fluid">		
		<form class="form-horizontal dangnhap" role="form" method="POST">
			<div class="form-group">
				<label class="col-sm-3 control-label">Username</label>
				<div class="col-sm-4">
    				<input class="form-control" name="username" placeholder="Username" type="text">
 				</div>	
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Password</label>
				<div class="col-sm-4">
    				<input class="form-control" name="password" placeholder="Password" type="password">
 				</div>	
			</div>
			<div class="form-group">
				<?php
						echo $saithongtin;
				?>
			</div>
			<div class="form-group submit">
				<div class="well well-lg">
					<button type="submit" class="btn btn-success">Đăng nhập</button>
					<a href="index.php" class="btn btn-default" role="button">Trở lui</a>
				</div>
			</div>
		</form>
	</div>
</div>