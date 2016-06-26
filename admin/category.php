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
if ( !empty($_GET['id_category'])) {
	$id_category = $_REQUEST['id_category'];
	$sql="SELECT * FROM category WHERE id=$id_category";
	$result_category = $conn->query($sql);
	if ($result_category->num_rows > 0) {
		$data_category = $result_category->fetch_array();
	}
}
if (isset($_POST['edit-category']))
{
	$category_name 		=$_POST['category_name'];
	$sql = "UPDATE category SET category_name='$category_name' WHERE id=$id_category";
	$result = $conn->query($sql);
	if ($result == TRUE) {
		header('location:category.php');
	}
}
if (isset($_POST['add-category'])){
	$parent_id		=$_POST['parent_id'];
	$category_name	=$_POST['category_name'];	
	$sql	="INSERT INTO category(category_name,parent_id) values('$category_name','$parent_id')";
	$conn->query($sql);
}
if (isset($_POST['delete']))
{
	$sql = "DELETE FROM category WHERE id=$id_delete";
	$result_delete = $conn->query($sql);
	if ($result_delete == TRUE) {
		header('location:category.php');
	}
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
				<h1 class="page-header">Danh Mục</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<button class="btn btn-success" onclick="showhide()"><i class="glyphicon glyphicon-plus"></i>Danh Mục</button>
					</div>
					<div class="panel-body">
						<div class="col-md-6" id="add-category" style="display:none;">	
							<form method="post">
								<div class="form-group">
									<label>Tên Danh Mục</label>
									<input type="text" class="form-control" placeholder="Sản Phẩm" name="category_name">
								</div>
								<div class="form-group">
									<label>Nhà Sản Xuất:</label>
									<select class="form-control" name="parent_id">
									<option value="0">Không</option>
									<?php
									$sql="SELECT * FROM category WHERE parent_id='0'";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
									// output data of each row
									while($data = $result->fetch_array()) {
									?>	
										<option value="<?php echo $data["id"]; ?>"><?php echo $data["category_name"]; ?></option>
									<?php
									} 
									}
									?>
									</select>
								</div>
								<button type="submit" class="btn btn-primary" name="add-category">Thêm</button>
								<button type="reset" class="btn btn-default">Xóa</button>
							</form>
						</div>
						<?php 
						if ( empty($id_delete) && empty($id_category))
						{
						?>
						<table data-toggle="table">
						  	<thead>
						  		<th data-sortable="true"><b>Danh Mục</b></th>
						  		<th data-sortable="true"><b>Hành Động</b></th>
						  	</thead>
						  	<?php 
						  	$sql="SELECT * FROM category WHERE parent_id='0'";
						  	$result = $conn->query($sql);
							if ($result->num_rows > 0) {
							// output data of each row
							while($data = $result->fetch_array()) {
							?>	
						    <tr>			
								<td data-sortable="true"><b><?php echo $data["category_name"]; ?></b></td>
								<td>
									<a href="category.php?id_category=<?php echo $data["id"]?>" class="btn btn-default"><i class="glyphicon glyphicon-wrench"></i></a>
									<a href="category.php?id_delete=<?php echo $data["id"]?>" class="btn btn-default"><i class="glyphicon glyphicon-trash"></i></a>
								</td>
						    </tr>
						    <?php 
						    	$id=$data["id"];
								$sql="SELECT * FROM category WHERE parent_id=$id";
								$output = $conn->query($sql);
								if ($output->num_rows > 0) {
								// output data of each row
								while($data = $output->fetch_array()) {
								?>	
							<tr>
								<td data-sortable="true"><?php echo "- ".$data["category_name"]; ?></td>
								<td>
									<a href="category.php?id_category=<?php echo $data["id"]?>" class="btn btn-default"><i class="glyphicon glyphicon-wrench"></i></a>
									<a href="category.php?id_delete=<?php echo $data["id"]?>" class="btn btn-default"><i class="glyphicon glyphicon-trash"></i>
									</a>
								</td>
							</tr>
							<?php
							} 
							}
							} 
							}
							?>
						</table>
						<?php 
						}
						elseif(empty($id_category))
						{
						?>
						<form method="post">
							<div class="delete-items">
								<h3>Bạn có muốn xóa danh mục này?</h3>
								<button type="submit" class="btn btn-primary" name="delete">Đồng ý</button>
								<a href="category.php" class="btn btn-default">Trở lui</a>
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
									<label>Danh mục: </label>
									<input type="text" class="form-control" placeholder="Sản Phẩm" name="category_name" value="<?php echo $data_category["category_name"]; ?>">
								</div>
								<button type="submit" class="btn btn-primary" name="edit-category">Chỉnh Sửa</button>
								<a href="category.php" class="btn btn-default">Trở Về</a>
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
       		var div = document.getElementById("add-category");
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
