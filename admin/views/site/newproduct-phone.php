<?php 
if (!empty($completed))
{
?>		
	<div class="col-md-12 completed">
		<h2><?php echo $completed; ?></h2>
		<a href="index.php" class="btn btn-default" role="button">Về Trang Chủ</a>
		<a href="add-product.php" class="btn btn-success" role="button">Thêm Sản Phẩm Khác</a>
	</div>
<?php 
}
else{
?>
<form method="post" enctype="multipart/form-data" onsubmit="return confirm('Xác nhận bạn muốn tạo mới sản phẩm?')">
	<div class="col-md-6">							
		<div class="form-group">
			<label>Tên:</label>
			<input type="text" class="form-control" placeholder="Sản Phẩm" name="name">
		</div>								
		<div class="form-group">
			<label>Giá:</label>
			<input type="text" class="form-control" placeholder="Giá" name="price">
		</div>
		<div class="form-group">
			<label>Hãng Sản Xuất:</label>
			<select class="form-control" name="category">
			<?php
			$sql="SELECT * FROM category WHERE parent_id=(SELECT id FROM category WHERE category_name='Điện Thoại')";
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
		<div class="form-group">
			<label>Khuyến Mãi:</label>
			<?php 
			$sql="SELECT * FROM promotions WHERE category_id=(SELECT id FROM category WHERE category_name='Điện Thoại')";
			$result_prom = $conn->query($sql);
			if ($result_prom->num_rows > 0) {
			// output data of each row
			while($data_prom = $result_prom->fetch_array()) {
			?>	
			<div class="checkbox">
				<label>
					<input type="checkbox" name="promotion[]" value="<?php echo $data_prom["id"]; ?>"><?php echo $data_prom["promotion"]; ?>
				</label>
			</div>
			<?php
			} 
			}
			?>
		</div>
		<div class="form-group">
			<label>Upload Ảnh: </label>
			<img id="phone-image">
			<input type="file" name="img" onchange="readURL_phone(this);">
		</div>
		
		<div class="form-group">
			<label>Text area</label>
			<textarea class="form-control" rows="3"></textarea>
		</div>
	</div>
	<div class="col-md-6">
	
		<div class="form-group">
			<label>Trong Hộp Có:</label>
			<input type="text" class="form-control" placeholder="Trong Hộp" name="attach">
		</div>		
		<div class="form-group">
			<label>Bảo Hành:</label>
			<input type="text" class="form-control" placeholder="Bảo Hành" name="guar">
		</div>		
		<div class="form-group">
			<label>Màn Hình</label>
			<input type="text" class="form-control" placeholder="Màn Hình" name="screen">
		</div>			
		<div class="form-group">
			<label>Hệ Điều Hành:</label>
			<input type="text" class="form-control" placeholder="Hệ điều hành" name="os">
		</div>	
		<div class="form-group">
			<label>Camera Sau:</label>
			<input type="text" class="form-control" placeholder="Camera Sau" name="b_camera">
		</div>	
		<div class="form-group">
			<label>Camera Trước:</label>
			<input type="text" class="form-control" placeholder="Camera Trước" name="f_camera">
		</div>
		<div class="form-group">
			<label>CPU</label>
			<input type="text" class="form-control" placeholder="CPU" name="cpu">
		</div>
		<div class="form-group">
			<label>Ram:</label>
			<input type="text" class="form-control" placeholder="Ram" name="ram">
		</div>
		<div class="form-group">
			<label>Bộ Nhớ Trong:</label>
			<input type="text" class="form-control" placeholder="Bộ nhớ trong" name="in_memory">
		</div>
		<div class="form-group">
			<label>Hổ trợ thẻ nhớ:</label>
			<select class="form-control" name="sup_memory">
				<option>Không</option>
				<option>MicroSD, 200 GB</option>
			</select>
		</div>
		<div class="form-group">
			<label>Thẻ Sim:</label>
			<input type="text" class="form-control" placeholder="Thẻ Sim" name="sim">
		</div>
		<div class="form-group">
			<label>Kết Nối:</label>
			<input type="text" class="form-control" placeholder="Kết nối" name="connection">
		</div>
		<div class="form-group">
			<label>Dung Lượng Pin:</label>
			<input type="text" class="form-control" placeholder="Dung Lượng Pin" name="pin">
		</div>
		<div class="form-group">
			<label>Chức Năng Đặc Biệt: </label>
			<input type="text" class="form-control" placeholder="Chức năng" name="s_function">
		</div>
		
		<button type="submit" class="btn btn-primary" name="phone">Thêm</button>
		<button type="reset" class="btn btn-default">Xóa</button>
	</div>
</form>
<?php } ?>