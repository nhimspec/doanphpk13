<?php 
session_start();
require 'database/database.php';
$conn = database::connect();
$promotion ="";
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
// get id delete
if ( !empty($_GET['id_delete'])) {
	$id_delete = $_REQUEST['id_delete'];
}
if ( isset($_POST['delete']))
{
	$sql = "DELETE FROM product WHERE id=$id_delete";
	$conn->query($sql);
	$sql = "DELETE FROM product_promotions WHERE product_id=$id_delete";
	$conn->query($sql);
	$sql = "DELETE FROM phone WHERE product_id=$id_delete";
	$conn->query($sql);
	$sql = "DELETE FROM laptop WHERE product_id=$id_delete";
	$conn->query($sql);
	header('location:product.php');
}
// select database for each phone
if ( !empty($_GET['id_product'])) {
	$id_product = $_REQUEST['id_product'];
	$sql="SELECT * FROM product WHERE id=$id_product";
	$result_product = $conn->query($sql);
	if ($result_product->num_rows > 0) {
		$data_product = $result_product->fetch_array();
	}
	// check type of category
	$category_type_id	=$data_product['category_id'];
	$sql="SELECT * FROM category WHERE id=(SELECT parent_id FROM category WHERE id=$category_type_id)";
	$result_type_product = $conn->query($sql);
	if ($result_type_product->num_rows > 0) {
		$data_type_product = $result_type_product->fetch_array();
	}
	$category_type 		=$data_type_product['category_name'];

	// select Phone
	$sql="SELECT * FROM phone WHERE product_id=$id_product";
	$result_phone = $conn->query($sql);
	if ($result_phone->num_rows > 0) {
		$data_phone = $result_phone->fetch_array();
	}

	//select Laptop
	$sql="SELECT * FROM laptop WHERE product_id=$id_product";
	$result_laptop = $conn->query($sql);
	if ($result_laptop->num_rows > 0) {
		$data_laptop = $result_laptop->fetch_array();
	}

	//select Tablet
	$sql="SELECT * FROM tablet WHERE product_id=$id_product";
	$result_tablet = $conn->query($sql);
	if ($result_tablet->num_rows > 0) {
		$data_tablet = $result_tablet->fetch_array();
	}
}
// click button update-phone
if ( isset($_POST['update-phone'])) {
	// keep track post values
	$product_name			=$_POST['name'];
	$price					=$_POST['price'];
	$category_id			=$_POST['category'];
		// Create img name
	$imgname = $_FILES["img"]["name"];
	// Move to file
	if(!empty($_FILES["img"]["name"]))
	{
		// Create img name
		$imgname = $_FILES["img"]["name"];
		// Move to file
		move_uploaded_file($_FILES["img"]["tmp_name"],"img/$imgname");
		$imgurl ="img/".$imgname;

	}
	else
	{
	$imgurl=$data_product['imgurl'];
	}
	$sql = "UPDATE product SET category_id='$category_id',product_name='$product_name',price='$price',imgurl='$imgurl' WHERE id=$id_product";
	$conn->query($sql);
	// give value for promotion
	if ( !empty($_POST['promotion']))	
	{
		$sql = "DELETE FROM product_promotions WHERE product_id=$id_product";
		$conn->query($sql);
		$sql	= "ALTER TABLE product_promotions AUTO_INCREMENT = 1";
		$conn->query($sql);
		foreach($_POST['promotion'] as $selected){
			$sql = "INSERT INTO product_promotions(product_id,promotion_id) values('$id_product','$selected')";
			$conn->query($sql);
		}
	}
	$attach					=$_POST['attach'];
	$guar					=$_POST['guar'];
	$screen					=$_POST['screen'];
	$os						=$_POST['os'];
	$f_camera				=$_POST['f_camera'];
	$b_camera				=$_POST['b_camera'];
	$cpu					=$_POST['cpu'];
	$ram					=$_POST['ram'];
	$in_memory				=$_POST['in_memory'];
	$sup_memory				=$_POST['sup_memory'];
	$sim					=$_POST['sim'];
	$connection				=$_POST['connection'];
	$pin					=$_POST['pin'];
	$s_function				=$_POST['s_function'];
	// insert data
		$sql = "UPDATE phone SET attach='$attach',guar='$guar',screen='$screen',os='$os',f_camera='$f_camera',b_camera='$b_camera',cpu='$cpu',ram='$ram',in_memory='$in_memory',sup_memory='$sup_memory',sim='$sim',connection='$connection',pin='$pin',s_function='$s_function' WHERE id=$id_product";
	$conn->query($sql);
	header('location:product.php');
}
// click button update-Laptop
if ( isset($_POST['update-laptop'])) {
	// keep track post values
	$product_name			=$_POST['name'];
	$price					=$_POST['price'];
	$category_id			=$_POST['category'];
		// Create img name
	$imgname = $_FILES["img"]["name"];
	// Move to file
	if(!empty($_FILES["img"]["name"]))
	{
		// Create img name
		$imgname = $_FILES["img"]["name"];
		// Move to file
		move_uploaded_file($_FILES["img"]["tmp_name"],"img/$imgname");
		$imgurl ="img/".$imgname;

	}
	else
	{
	$imgurl=$data_product['imgurl'];
	}
	$sql = "UPDATE product SET category_id='$category_id',product_name='$product_name',price='$price',imgurl='$imgurl' WHERE id=$id_product";
	$conn->query($sql);
	// give value for promotion
	if ( !empty($_POST['promotion']))	
	{
		$sql 	= "DELETE FROM product_promotions WHERE product_id=$id_product";
		$conn->query($sql);
		$sql	= "ALTER TABLE product_promotions AUTO_INCREMENT = 1";
		$conn->query($sql);
		foreach($_POST['promotion'] as $selected){
			$sql = "INSERT INTO product_promotions(product_id,promotion_id) values('$id_product','$selected')";
			$conn->query($sql);
		}
	}
	$attach					=$_POST['attach'];
	$guar					=$_POST['guar'];
	$cpu					=$_POST['cpu'];
	$ram					=$_POST['ram'];
	$hdisk					=$_POST['hdisk'];
	$screen					=$_POST['screen'];
	$touch					=$_POST['touch'];
	$graphic				=$_POST['graphic'];
	$disc					=$_POST['disc'];
	$webcam					=$_POST['webcam'];
	$coat					=$_POST['coat'];
	$commun					=$_POST['commun'];
	$connect				=$_POST['connect'];
	$pin					=$_POST['pin'];
	$height					=$_POST['height'];
	// insert data
		$sql = "UPDATE laptop SET attach='$attach',guar='$guar',cpu='$cpu',ram='$ram',hdisk='$hdisk',screen='$screen',touch='$touch',graphic='$graphic',disc='$disc',webcam='$webcam',coat='$coat',commun='$commun',connect='$connect',pin='$pin',height='$height' WHERE id=$id_product";
	$conn->query($sql);
	header('location:product.php');
}
// click button update-tablet
if ( isset($_POST['update-tablet'])) {
	// keep track post values
	$product_name			=$_POST['name'];
	$price					=$_POST['price'];
	$category_id			=$_POST['category'];
		// Create img name
	$imgname = $_FILES["img"]["name"];
	// Move to file
	if(!empty($_FILES["img"]["name"]))
	{
		// Create img name
		$imgname = $_FILES["img"]["name"];
		// Move to file
		move_uploaded_file($_FILES["img"]["tmp_name"],"img/$imgname");
		$imgurl ="img/".$imgname;

	}
	else
	{
	$imgurl=$data_product['imgurl'];
	}
	$sql = "UPDATE product SET category_id='$category_id',product_name='$product_name',price='$price',imgurl='$imgurl' WHERE id=$id_product";
	$conn->query($sql);
	// give value for promotion
	if ( !empty($_POST['promotion']))	
	{
		$sql = "DELETE FROM product_promotions WHERE product_id=$id_product";
		$conn->query($sql);
		$sql	= "ALTER TABLE product_promotions AUTO_INCREMENT = 1";
		$conn->query($sql);
		foreach($_POST['promotion'] as $selected){
			$sql = "INSERT INTO product_promotions(product_id,promotion_id) values('$id_product','$selected')";
			$conn->query($sql);
		}
	}
	$attach					=$_POST['attach'];
	$guar					=$_POST['guar'];
	$screen					=$_POST['screen'];
	$os						=$_POST['os'];
	$cpu					=$_POST['cpu'];
	$ram					=$_POST['ram'];
	$in_memory				=$_POST['in_memory'];
	$b_camera				=$_POST['b_camera'];
	$f_camera				=$_POST['f_camera'];
	$connect				=$_POST['connect'];
	$sup_sim				=$_POST['sup_sim'];
	$talk					=$_POST['talk'];
	$height					=$_POST['height'];
	$pin					=$_POST['pin'];
	// insert data
		$sql = "UPDATE tablet SET attach='$attach',guar='$guar',screen='$screen',os='$os',cpu='$cpu',ram='$ram',in_memory='$in_memory',b_camera='$b_camera',f_camera='$f_camera',connect='$connect',sup_sim='$sup_sim',talk='$talk',height='$height',pin='$pin' WHERE id=$id_product";
	$conn->query($sql);
	header('location:product.php');
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
				<h1 class="page-header">Sản phẩm</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
					<?php
					if (empty($id_product)) 
					{
					?>
						Quản lý sản phẩm
					<?php
					}
					else
					{
					?>
						Chỉnh Sửa Sản Phẩm
					<?php
					}
					?>
					</div>
					<div class="panel-body">
						<?php 
						// show prduct if no action
						if ( empty($id_delete) && empty($id_product))
						{
						?>
							<table class="bootstrapTable" data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true">
							    <thead>
								    <tr>
								        <th>ID</th>
								        <th>Sản Phẩm</th>
								        <th>Hãng Sản Xuất</th>
								        <th>Giá</th>
								        <th>Hành Động</th>
								    </tr>
							    </thead>
							    <tbody>
							    <?php 
							    $sql="SELECT * FROM product";
								$result = $conn->query($sql);
								if ($result->num_rows > 0) {
								// output data of each row
								while($data = $result->fetch_array()) {
								?>	
							    	<tr>
								        <td><?php echo $data["id"]; ?></td>
								        <td><img class="img-product" src="<?php echo $data["imgurl"]; ?>"><?php echo $data["product_name"]; ?></td>
								        <td>
								        <?php 
								        $sql="SELECT * FROM category";
										$result_cate = $conn->query($sql);
										if ($result_cate->num_rows > 0) {
										// output data of each row
										while($data_cate = $result_cate->fetch_array()) {
						      				if( $data_cate['id'] == $data['category_id']){ echo $data_cate['category_name']; }
								      	}
								      	}
								      	?>
								        </td>
								        <td><?php echo number_format($data["price"],0,",",".") . '&#8363'; ?></td>
								        <td>
								        	<a href="product.php?id_product=<?php echo $data["id"]?>" class="btn btn-default"><i class="glyphicon glyphicon-wrench"></i></a>
								        	<a href="product.php?id_delete=<?php echo $data["id"]?>" class="btn btn-default"><i class="glyphicon glyphicon-trash"></i></a>
								        </td>
							    	</tr>	
							    <?php
								} 
								}
								?>
							    </tbody>
							</table>
						<?php }
						// show delete
						elseif(empty($id_product))
						{
						?>
						<form method="post">
							<div class="delete-items">
								<h3>Xóa
								<?php 
								$sql="SELECT * FROM product WHERE id=$id_delete";
								$result = $conn->query($sql);
								if ($result->num_rows > 0) {
								// output data of each row
								$data = $result->fetch_array();
								echo $data['product_name'];
								}
								?>
								?
								</h3>
								<button type="submit" name="delete" class="btn btn-primary">Đồng ý</button>
								<a href="product.php" class="btn btn-default">Trở lui</a>
							</div>
						</form>
						<?php
						}
						elseif(empty($id_delete) && $category_type == "Điện Thoại")
							// show update Phone
						{ include 'views/site/editproduct-phone.php';}
						elseif(empty($id_delete) && $category_type == "LapTop")
							// show update Laptop
						{ include 'views/site/editproduct-laptop.php';}
						elseif(empty($id_delete) && $category_type == "Tablet")
							// show update phone
						{ include 'views/site/editproduct-tablet.php';}
						database::disconnect();
						?>

					</div><!-- panel-body -->
				</div><!-- panel -->
			</div> <!-- col-lg-12 -->
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
    <script src="js/bootstrap-editable.js"></script>
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
		function readURL_phone(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                	$('#phone-image').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        function readURL_laptop(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                	$('#laptop-image').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
	</script>	
</body>

</html>
