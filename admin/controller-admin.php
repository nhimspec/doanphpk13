<?php 
session_start();
require 'database/database.php';
$conn = database::connect();
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
	}
else
	{
		header("Location:login.php");
	}
if ( !empty($_GET['id_delete'])) {
	$id_delete = $_REQUEST['id_delete'];
}
if ( !empty($_GET['id_admin'])) {
	$id_admin = $_REQUEST['id_admin'];
	$sql="SELECT * FROM admin_account WHERE id=$id_admin";
	$result_admin = $conn->query($sql);
	if ($result_admin->num_rows > 0) {
		$data_admin = $result_admin->fetch_array();
	}
}
if (isset($_POST['delete']))
{
	$sql = "DELETE FROM admin_account WHERE id=$id_delete";
	$result_delete = $conn->query($sql);
	if ($result_delete == TRUE) {
		header('location:controller-admin.php');
	}
}
if (isset($_POST['edit-admin']))
{
	$username		=$_POST['username'];	
	$fullname		=$_POST['fullname'];
	$address		=$_POST['address'];
	$phonenumber	=$_POST['phonenumber'];
	$sql = "UPDATE admin_account SET username='$username',fullname='$fullname',address='$address',phonenumber='$phonenumber' WHERE id=$id_admin";
	$result = $conn->query($sql);
	if ($result == TRUE) {
		header('location:controller-admin.php');
	}
}
if (isset($_POST['add-admin'])){
	$username_add		=$_POST['username'];	
	$fullname		=$_POST['fullname'];
	$address		=$_POST['address'];
	$phonenumber	=$_POST['phonenumber'];
	$password		=md5($_POST['password']);
	$sql	="INSERT INTO admin_account(username,fullname,address,phonenumber,password) values('$username_add','$fullname','$address','$phonenumber','$password')";
	$conn->query($sql);
}
$sql="SELECT * FROM admin_account";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>TKP-STORE</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
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
				<h1 class="page-header">Quản Lý Admin</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<button class="btn btn-success" onclick="showhide()"><i class="glyphicon glyphicon-plus"></i>Admin</button>
					</div>
					<div class="panel-body">
						<div class="col-md-6" id="add-admin" style="display:none;">	
							<form method="post">
								<div class="form-group">
									<label>Username:</label>
									<input type="text" class="form-control" placeholder="Username" name="username">
								</div>
								<div class="form-group">
									<label>Họ Và Tên:</label>
									<input type="text" class="form-control" placeholder="Họ và tên" name="fullname">
								</div>
								<div class="form-group">
									<label>Địa Chỉ:</label>
									<input type="text" class="form-control" placeholder="Địa Chỉ" name="address">
								</div>
								<div class="form-group">
									<label>Số Điện Thoại:</label>
									<input type="text" class="form-control" placeholder="Số điện thoại" name="phonenumber">
								</div>
								<div class="form-group">
									<label>Password:</label>
									<input type="password" class="form-control" placeholder="Password" name="password">
								</div>	
								<button type="submit" class="btn btn-primary" name="add-admin">Thêm</button>
								<button type="reset" class="btn btn-default">Xóa</button>
							</form>
						</div>
						<?php 
						if ( empty($id_delete) && empty($id_admin))
						{
						?>
						<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" >
						    <thead>
						    <tr>
						        <th>Admin</th>
						        <th>Username</th>
						        <th>Số Điện Thoại</th>
						        <th>Hành Động</th>
						    </tr>
						    </thead>
						    <tbody>
						    <?php 
							if ($result->num_rows > 0) {
							// output data of each row
							while($data = $result->fetch_array()) {
							?>	
						    	<tr>
							        <td><?php echo $data["fullname"]; ?></td>
							        <td><?php echo $data["username"]; ?></td>
							        <td><?php echo $data["phonenumber"]; ?></td>
							        <td>
							        	<a href="controller-admin.php?id_admin=<?php echo $data["id"]?>" class="btn btn-default"><i class="glyphicon glyphicon-wrench"></i></a>
								    	<a href="controller-admin.php?id_delete=<?php echo $data["id"]?>" class="btn btn-default"><i class="glyphicon glyphicon-trash"></i></a>
								    </td>
						    	</tr>	
						    <?php
							} 
							}
							?>
						    </tbody>
						</table>
						<?php 
						}
						elseif(empty($id_admin))
						{
						?>
						<form method="post">
							<div class="delete-items">
								<h3>Xóa admin này?</h3>
								<button type="submit" class="btn btn-primary" name="delete">Đồng ý</button>
								<a href="controller-admin.php" class="btn btn-default">Trở lui</a>
							</div>
						</form>
						<?php 
						}
						else
						{
						?>
						<div class="col-md-6">	
							<form method="post">
								<div class="form-group">
									<label>Username:</label>
									<input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $data_admin['username']?>">
								</div>
								<div class="form-group">
									<label>Họ Và Tên:</label>
									<input type="text" class="form-control" placeholder="Họ và tên" name="fullname" value="<?php echo $data_admin['fullname']?>">
								</div>
								<div class="form-group">
									<label>Địa Chỉ:</label>
									<input type="text" class="form-control" placeholder="Địa Chỉ" name="address" value="<?php echo $data_admin['address']?>">
								</div>
								<div class="form-group">
									<label>Số Điện Thoại:</label>
									<input type="text" class="form-control" placeholder="Số điện thoại" name="phonenumber" value="<?php echo $data_admin['phonenumber']?>">
								</div>
								<button type="submit" class="btn btn-primary" name="edit-admin">Chỉnh Sửa</button>
								<a href="controller-admin.php" class="btn btn-default">Trở Về</a>
							</form>
						</div>
						<?php
						}
						database::disconnect();
						?>
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
		function showhide(){
       		var div = document.getElementById("add-admin");
			if (div.style.display != "none") {
			    div.style.display = "none";
			}
			else {
			    div.style.display = "block";
			}
		};
	</script>	
</body>

</html>
	