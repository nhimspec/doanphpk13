<form method="post" enctype="multipart/form-data" onsubmit="return confirm('Xác nhận chỉnh sửa?')">
	<div class="col-md-6">							
		<div class="form-group">
			<label>Tên:</label>
			<input type="text" class="form-control" placeholder="Sản Phẩm" name="name" value="<?php echo $data_product['product_name']?>">
		</div>								
		<div class="form-group">
			<label>Giá:</label>
			<input type="text" class="form-control" placeholder="Giá" name="price" value="<?php echo $data_product['price']?>">
		</div>
		<div class="form-group">
			<label>Hãng Sản Xuất:</label>
			<select class="form-control" name="category">
			<?php
			$category_type="";
			$sql="SELECT * FROM category WHERE parent_id=(SELECT id FROM category WHERE category_name='Điện Thoại')";
			$result_cate = $conn->query($sql);
			if ($result_cate->num_rows > 0) {
			// output data of each row
			while($data_cate = $result_cate->fetch_array()) {
				$sql="SELECT * FROM category WHERE id=(SELECT category_id FROm product WHERE id='$id_product')";
				$result_cate_type = $conn->query($sql);
				if ($result_cate_type->num_rows > 0) {
				// output data of each row
				while($data_cate_type = $result_cate_type->fetch_array()) {
					if ($data_cate_type['category_name'] == $data_cate["category_name"])
					{
						$category_type	="selected";
					}
				}
				}

			?>	
				<option value="<?php echo $data_cate["id"]; ?>" <?php echo $category_type; ?>><?php echo $data_cate["category_name"]; ?></option>
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
					<?php 
					$checked="";
					// 
					$sql="SELECT * FROM product_promotions WHERE product_id=$id_product";
					$result_prod_prom = $conn->query($sql);
					if ($result_prod_prom->num_rows > 0) {
						while($data_prod_prom = $result_prod_prom->fetch_array()) {
							if($data_prod_prom['promotion_id'] == $data_prom['id']){
								$checked="checked";
							}
					} 
					}
					?>
					<input type="checkbox" name="promotion[]" <?php echo $checked; ?> value="<?php echo $data_prom["id"]; ?>"><?php echo $data_prom["promotion"]; ?>
				</label>
			</div>
			<?php
			} 
			}
			?>
		</div>
		<div class="form-group">
			<label>Upload Ảnh: </label>
			<img id="phone-image" src="<?php echo $data_product["imgurl"]; ?>">
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
			<input type="text" class="form-control" placeholder="Trong Hộp" name="attach" value="<?php echo $data_phone['attach']?>">
		</div>		
		<div class="form-group">
			<label>Bảo Hành:</label>
			<input type="text" class="form-control" placeholder="Bảo Hành" name="guar" value="<?php echo $data_phone['guar']?>">
		</div>		
		<div class="form-group">
			<label>Màn Hình</label>
			<input type="text" class="form-control" placeholder="Màn Hình" name="screen" value="<?php echo $data_phone['screen']?>">
		</div>			
		<div class="form-group">
			<label>Hệ Điều Hành:</label>
			<input type="text" class="form-control" placeholder="Hệ điều hành" name="os" value="<?php echo $data_phone['os']?>">
		</div>	
		<div class="form-group">
			<label>Camera Sau:</label>
			<input type="text" class="form-control" placeholder="Camera Sau" name="b_camera" value="<?php echo $data_phone['b_camera']?>">
		</div>	
		<div class="form-group">
			<label>Camera Trước:</label>
			<input type="text" class="form-control" placeholder="Camera Trước" name="f_camera" value="<?php echo $data_phone['f_camera']?>">
		</div>
		<div class="form-group">
			<label>CPU</label>
			<input type="text" class="form-control" placeholder="CPU" name="cpu" value="<?php echo $data_phone['cpu']?>">
		</div>
		<div class="form-group">
			<label>Ram:</label>
			<input type="text" class="form-control" placeholder="Ram" name="ram" value="<?php echo $data_phone['ram']?>">
		</div>
		<div class="form-group">
			<label>Bộ Nhớ Trong:</label>
			<input type="text" class="form-control" placeholder="Bộ nhớ trong" name="in_memory" value="<?php echo $data_phone['in_memory']?>">
		</div>
		<div class="form-group">
			<label>Hổ trợ thẻ nhớ:</label>
			<select class="form-control" name="sup_memory">
				<?php 
					$khong	="";
					$MicroSD 	="";
					if ($data_phone['sup_memory'] == 'Không')
					{
						$khong="selected";
					}
					else
					{
						$MicroSD="selected";
					}
				?>
				<option <?php echo $khong;?>>Không</option>
				<option <?php echo $MicroSD;?>>MicroSD, 200 GB</option>
			</select>
		</div>
		<div class="form-group">
			<label>Thẻ Sim:</label>
			<input type="text" class="form-control" placeholder="Thẻ Sim" name="sim" value="<?php echo $data_phone['sim']?>">
		</div>
		<div class="form-group">
			<label>Kết Nối:</label>
			<input type="text" class="form-control" placeholder="Kết nối" name="connection" value="<?php echo $data_phone['connection']?>">
		</div>
		<div class="form-group">
			<label>Dung Lượng Pin:</label>
			<input type="text" class="form-control" placeholder="Dung Lượng Pin" name="pin" value="<?php echo $data_phone['pin']?>">
		</div>
		<div class="form-group">
			<label>Chức Năng Đặc Biệt: </label>
			<input type="text" class="form-control" placeholder="Chức năng" name="s_function" value="<?php echo $data_phone['s_function']?>">
		</div>
		
		<button type="submit" name="update-phone" class="btn btn-primary">Chỉnh Sửa</button>
	</div>
</form>