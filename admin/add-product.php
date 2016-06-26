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
// Check username available
if ( isset($_POST['phone'])) {
	// keep track post values
	$product_name				=$_POST['name'];
	$price						=$_POST['price'];
	$category_id				=$_POST['category'];
		// Create img name
	$imgname = $_FILES["img"]["name"];
	// Move to file
	move_uploaded_file($_FILES["img"]["tmp_name"],"img/$imgname");
	$imgurl ="img/".$imgname;
	$sql = "INSERT INTO product(category_id,product_name,price,imgurl) values('$category_id','$product_name','$price','$imgurl')";
	$conn->query($sql);
	$product_id= $conn->insert_id;
	// give value for promotion
	if ( !empty($_POST['promotion']))	
	{
		foreach($_POST['promotion'] as $selected){
			$sql = "INSERT INTO product_promotions(product_id,promotion_id) values('$product_id','$selected')";
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
		$sql = "INSERT INTO phone(product_id,attach,guar,screen,os,f_camera,b_camera,cpu,ram,in_memory,sup_memory,sim,connection,pin,s_function) values('$product_id','$attach','$guar','$screen','$os','$f_camera','$b_camera','$cpu','$ram','$in_memory','$sup_memory','$sim','$connection','$pin','$s_function')";
	$conn->query($sql);
	$completed="Thêm Sản Phẩm Thành Công";
}
if ( isset($_POST['laptop'])) {
	// keep track post values
	$product_name				=$_POST['name'];
	$price						=$_POST['price'];
	$category_id				=$_POST['category'];
		// Create img name
	$imgname = $_FILES["img"]["name"];
	// Move to file
	move_uploaded_file($_FILES["img"]["tmp_name"],"img/$imgname");
	$imgurl ="img/".$imgname;
	$sql = "INSERT INTO product(category_id,product_name,price,imgurl) values('$category_id','$product_name','$price','$imgurl')";
	$conn->query($sql);
	$product_id= $conn->insert_id;
	// give value for promotion
	if ( !empty($_POST['promotion']))	
	{
		foreach($_POST['promotion'] as $selected){
			$sql = "INSERT INTO product_promotions(product_id,promotion_id) values('$product_id','$selected')";
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
		$sql = "INSERT INTO laptop(product_id,attach,guar,cpu,ram,hdisk,screen,touch,graphic,disc,webcam,coat,commun,connect,pin,height) values('$product_id','$attach','$guar','$cpu','$ram','$hdisk','$screen','$touch','$graphic','$disc','$webcam','$coat','$commun','$connect','$pin','$height')";
	$conn->query($sql);
	$completed="Thêm Sản Phẩm Thành Công";
}
if ( isset($_POST['tablet'])) {
	// keep track post values
	$product_name				=$_POST['name'];
	$price						=$_POST['price'];
	$category_id				=$_POST['category'];
		// Create img name
	$imgname = $_FILES["img"]["name"];
	// Move to file
	move_uploaded_file($_FILES["img"]["tmp_name"],"img/$imgname");
	$imgurl ="img/".$imgname;
	$sql = "INSERT INTO product(category_id,product_name,price,imgurl) values('$category_id','$product_name','$price','$imgurl')";
	$conn->query($sql);
	$product_id= $conn->insert_id;
	// give value for promotion
	if ( !empty($_POST['promotion']))	
	{
		foreach($_POST['promotion'] as $selected){
			$sql = "INSERT INTO product_promotions(product_id,promotion_id) values('$product_id','$selected')";
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
		$sql = "INSERT INTO tablet(product_id,attach,guar,screen,os,cpu,ram,in_memory,b_camera,f_camera,connect,sup_sim,talk,height,pin) values('$product_id','$attach','$guar','$screen','$os','$cpu','$ram','$in_memory','$b_camera','$f_camera','$connect','$sup_sim','$talk','$height','$pin')";
	$conn->query($sql);
	$completed="Thêm Sản Phẩm Thành Công";
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
				<h1 class="page-header">Thêm Sản Phẩm</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body tabs" style="padding-bottom:20px;">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#tab1" data-toggle="tab">Điện Thoại</a></li>
							<li><a href="#tab2" data-toggle="tab">Laptop</a></li>
							<li><a href="#tab3" data-toggle="tab">Tablet</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane fade in active" id="tab1">
								<?php include 'views/site/newproduct-phone.php';?>
							</div>
							<div class="tab-pane fade" id="tab2">
								<?php include 'views/site/newproduct-laptop.php';?>
							</div>
							<div class="tab-pane fade" id="tab3">
								<?php include 'views/site/newproduct-tablet.php';?>
							</div>
						</div>
					</div>
				</div><!--/.panel-->
			</div><!--/.col-->
		</div><!-- /.row -->
		
	</div><!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
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
        function readURL_tablet(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                	$('#tablet-image').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
	</script>	
</body>

</html>
