<?php 
session_start();
require 'database/database.php';
$conn = database::connect();
//check sesion account
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
// check action
if ( !empty($_GET['id_delete'])) {
	$id_delete = $_REQUEST['id_delete'];
}
if ( !empty($_GET['id_promotion'])) {
	$id_promotion = $_REQUEST['id_promotion'];
	$sql="SELECT * FROM promotions WHERE id=$id_promotion";
	$result_promotion = $conn->query($sql);
	if ($result_promotion->num_rows > 0) {
		$data_promotion = $result_promotion->fetch_array();
	}
}
if (isset($_POST['delete']))
{
	$sql = "DELETE FROM promotions WHERE id=$id_delete";
	$result_delete = $conn->query($sql);
	if ($result_delete == TRUE) {
		header('location:promotions.php');
	}
}
// edit promotion
if (isset($_POST['edit-promotion']))
{
	$promotion 		=$_POST['promotion'];
	$category_id	=$_POST['category'];
	$sql = "UPDATE promotions SET promotion='$promotion',category_id='$category_id' WHERE id=$id_promotion";
	$result = $conn->query($sql);
	if ($result == TRUE) {
		header('location:promotions.php');
	}
}
//  click button add-promotions
if (isset($_POST['add-promotions'])){
	$promotion		=$_POST['promotion'];	
	$category_id	=$_POST['category'];
	$sql	="INSERT INTO promotions(promotion,category_id) values('$promotion','$category_id')";
	$conn->query($sql);
}
$sql="SELECT * FROM promotions";
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
				<h1 class="page-header">Khuyến Mãi</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<button class="btn btn-success" onclick="showhide()"><i class="glyphicon glyphicon-plus"></i>Khuyến Mãi</button>
					</div>
					<div class="panel-body">
						<div class="col-md-6" id="add-promotion" style="display:none;">	
							<form method="post">
								<div class="form-group">
									<label>Khuyến Mãi</label>
									<textarea class="form-control" placeholder="Khuyến Mãi" name="promotion"></textarea>
								</div>
								<div class="form-group">
									<label>Danh Mục:</label>
									<select class="form-control" name="category">
									<?php
									$sql="SELECT * FROM category WHERE parent_id=0";
									$result_cate = $conn->query($sql);
									if ($result_cate->num_rows > 0) {
									// output data of each row
									while($data_cate = $result_cate->fetch_array()) {
									?>	
										<option value="<?php echo $data_cate["id"]; ?>"><?php echo $data_cate["category_name"]; ?></option>
									<?php
									} 
									}
									?>
									</select>
								</div>
								<button type="submit" class="btn btn-primary" name="add-promotions">Thêm</button>
								<button type="reset" class="btn btn-default">Xóa</button>
							</form>
						</div>
						<?php 
						if ( empty($id_delete) && empty($id_promotion))
						{
						?>
						<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-detail-formatter="detailFormatter">
						    <thead>
						    <tr>
						        <th>Khuyến Mãi</th>
						        <th>Danh Mục</th>
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
							        <td><?php echo $data["promotion"]; ?></td>
							        <td>
							        <?php
							        $category_id = $data['category_id'];
									$sql="SELECT * FROM category WHERE id=$category_id";
									$result_cate = $conn->query($sql);
									if ($result_cate->num_rows > 0) {
										$data_cate = $result_cate->fetch_array();
									}
									echo $data_cate['category_name'];
							        ?>
							        </td>
							        <td>
							        	<a href="promotions.php?id_promotion=<?php echo $data["id"]?>" class="btn btn-default"><i class="glyphicon glyphicon-wrench"></i></a>
								    	<a href="promotions.php?id_delete=<?php echo $data["id"]?>" class="btn btn-default"><i class="glyphicon glyphicon-trash"></i></a>
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
						elseif(empty($id_promotion))
						{
						?>
						<form method="post">
							<div class="delete-items">
								<h3>Bạn có muốn xóa khuyến mãi này?</h3>
								<button type="submit" class="btn btn-primary" name="delete">Đồng ý</button>
								<a href="promotions.php" class="btn btn-default">Trở lui</a>
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
									<input class="form-control" placeholder="Khuyến Mãi" name="promotion" value="<?php echo $data_promotion["promotion"]; ?>">
								</div>
								<div class="form-group">
									<label>Danh Mục:</label>
									<select class="form-control" name="category">
									<?php
									$sql="SELECT * FROM category WHERE parent_id=0";
									$result_cate = $conn->query($sql);
									if ($result_cate->num_rows > 0) {
									// output data of each row
									while($data_cate = $result_cate->fetch_array()) {
									?>	
										<option value="<?php echo $data_cate["id"]; ?>"><?php echo $data_cate["category_name"]; ?></option>
									<?php
									} 
									}
									?>
									</select>
								</div>
								<button type="submit" class="btn btn-primary" name="edit-promotion">Chỉnh Sửa</button>
								<a href="promotions.php" class="btn btn-default">Trở Về</a>
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
       		var div = document.getElementById("add-promotion");
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
