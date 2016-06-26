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
			$sql="SELECT * FROM category WHERE parent_id=(SELECT id FROM category WHERE category_name='Tablet')";
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
			$sql="SELECT * FROM promotions WHERE category_id=(SELECT id FROM category WHERE category_name='Tablet')";
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
			<img id="tablet-image" src="<?php echo $data_product["imgurl"]; ?>">
			<input type="file" name="img" onchange="readURL_tablet(this);">
		</div>
		
		<div class="form-group">
			<label>Text area</label>
			<textarea class="form-control" rows="3"></textarea>
		</div>
	</div>
	<div class="col-md-6">
	
		<div class="form-group">
			<label>Bộ sản phẩm gồm:</label>
			<input type="text" class="form-control" placeholder="Bộ Sản Phẩm" name="attach" value="<?php echo $data_tablet['attach']?>">
		</div>		
		<div class="form-group">
			<label>Bảo Hành:</label>
			<input type="text" class="form-control" placeholder="Bảo Hành" name="guar" value="<?php echo $data_tablet['guar']?>">
		</div>		
		<div class="form-group">
			<label>Màn Hình</label>
			<input type="text" class="form-control" placeholder="Màn Hình" name="screen" value="<?php echo $data_tablet['screen']?>">
		</div>			
		<div class="form-group">
			<label>Hệ Điều Hành:</label>
			<input type="text" class="form-control" placeholder="Hệ điều hành" name="os" value="<?php echo $data_tablet['os']?>">
		</div>
		<div class="form-group">
			<label>CPU</label>
			<input type="text" class="form-control" placeholder="CPU" name="cpu" value="<?php echo $data_tablet['cpu']?>">
		</div>
		<div class="form-group">
			<label>Ram:</label>
			<input type="text" class="form-control" placeholder="Ram" name="ram" value="<?php echo $data_tablet['ram']?>">
		</div>
		<div class="form-group">
			<label>Bộ Nhớ Trong:</label>
			<input type="text" class="form-control" placeholder="Bộ nhớ trong" name="in_memory" value="<?php echo $data_tablet['in_memory']?>">
		</div>	
		<div class="form-group">
			<label>Camera Sau:</label>
			<input type="text" class="form-control" placeholder="Camera Sau" name="b_camera" value="<?php echo $data_tablet['b_camera']?>">
		</div>	
		<div class="form-group">
			<label>Camera Trước:</label>
			<input type="text" class="form-control" placeholder="Camera Trước" name="f_camera" value="<?php echo $data_tablet['f_camera']?>">
		</div>
		<div class="form-group">
			<label>Kết Nối Mạng:</label>
			<input type="text" class="form-control" placeholder="Kết nối" name="connect" value="<?php echo $data_tablet['connect']?>">
		</div>
		<div class="form-group">
			<label>Hổ Trợ SIM:</label>
			<select class="form-control" name="sup_sim">
				<?php 
					$khong	="";
					$Nano 	="";
					if ($data_tablet['sup_sim'] == 'Không')
					{
						$khong="selected";
					}
					else
					{
						$Nano="selected";
					}
				?>
				<option <?php echo $khong;?>>Không</option>
				<option <?php echo $Nano;?>>Nano Sim</option>
			</select>
		</div>
		<div class="form-group">
			<label>Đàm Thoại:</label>
			<select class="form-control" name="talk">
				<?php 
					$khong	="";
					$co 	="";
					if ($data_tablet['talk'] == 'Không')
					{
						$khong="selected";
					}
					else
					{
						$co="selected";
					}
				?>
				<option <?php echo $khong;?>>Không</option>
				<option <?php echo $co;?>>Có</option>
			</select>
		</div>
		<div class="form-group">
			<label>Trọng Lượng:</label>
			<input type="text" class="form-control" placeholder="Trọng Lượng" name="height" value="<?php echo $data_tablet['height']?>">
		</div>
		<div class="form-group">
			<label>Pin:</label>
			<input type="text" class="form-control" placeholder="Pin" name="pin" value="<?php echo $data_tablet['pin']?>">
		</div>
		
		<button type="submit" name="update-tablet" class="btn btn-primary">Chỉnh Sửa</button>
	</div>
</form>