<?php 
session_start();
require 'database/database.php';
$conn = database::connect();
$result_change	="";
if ( !empty($_SESSION))
{
	$username	=$_SESSION["username"];
	$userid		=$_SESSION["userid"];
	$sql 		= "SELECT * FROM admin_account WHERE username='$username'";
	$result		= $conn->query($sql);
		// Check result return 0
		if ($result->num_rows == 0) {
			header("Location:login.php");
		}
		if (isset($_POST['change']))
		{	
			if ( $_POST['password_new'] == $_POST['password_new_verify'] )
				{
					$password_new 	=md5($_POST['password_new']);
					$password_old	=md5($_POST['password_old']);
					$sql 		= "UPDATE admin_account SET password='$password_new' WHERE username='$username' and password=
					'$password_old'";

					// Check result return true or false
					if ($conn->query($sql) == TRUE) {
						$result_change	="Đổi mật khẩu thành công";
					}	
					else
					{
						$$result_change	="Mật khẩu cũ nhập sai";
					}				
				}
			else
			{
				$result_change	="Xác nhận mật khẩu không khớp";
			}
		}
	}
else
	{
		header("Location:login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>TKP-STORE</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<?php 
	include 'views/header-top.php';
	include 'views/side-bar.php'; ?>

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Đổi Mật Khẩu</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<form method="post" onsubmit="return confirm('Xác Nhận Đổi Mật Khẩu?')">
							<div class="col-md-6">
								<div class="form-group">
									<label>Mật Khẩu Cũ:</label>
									<input type="password" class="form-control" placeholder="Mật Khẩu Cũ" name="password_old">
								</div>	
								<div class="form-group">
									<label>Mật Khẩu Mới:</label>
									<input type="password" class="form-control" placeholder="Mật Khẩu Mới" name="password_new">
								</div>
								<div class="form-group">
									<label>Xác nhận Mật Khẩu:</label>
									<input type="password" class="form-control" placeholder="Mật Khẩu Mới" name="password_new_verify">
									<?php 
									echo "<h4>".$result_change."</h4>";
									?>
								</div>
								<button type="submit" class="btn btn-primary" name="change">Đổi</button>
								<a href="profile.php?id=<?php echo $userid;?>" class="btn btn-default">Trở Về</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div><!--/.row-->		
		
	</div><!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/bootstrap-table.js"></script>
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
