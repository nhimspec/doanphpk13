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
			$sql="SELECT * FROM category WHERE parent_id=(SELECT id FROM category WHERE category_name='LapTop')";
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
			$sql="SELECT * FROM promotions WHERE category_id=(SELECT id FROM category WHERE category_name='LapTop')";
			$result_prom = $conn->query($sql);
			if ($result_prom->num_rows > 0) {
			// output data of each row
			while($data_prom = $result_prom->fetch_array()) {
			?>	
			<div class="checkbox">
				<label>
					<?php 
					$checked="";
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
			<img id="laptop-image" src="<?php echo $data_product["imgurl"]; ?>">
			<input type="file" name="img" onchange="readURL_laptop(this);">
		</div>
		
		<div class="form-group">
			<label>Text area</label>
			<textarea class="form-control" rows="3"></textarea>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Bộ sản phẩm gồm:</label>
			<input type="text" class="form-control" placeholder="Bộ sản phẩm" name="attach" value="<?php echo $data_laptop['attach']?>">
		</div>		
		<div class="form-group">
			<label>Bảo Hành:</label>
			<input type="text" class="form-control" placeholder="Bảo Hành" name="guar" value="<?php echo $data_laptop['guar']?>">
		</div>		
		<div class="form-group">
			<label>CPU:</label>
			<input type="text" class="form-control" placeholder="CPU" name="cpu" value="<?php echo $data_laptop['cpu']?>">
		</div>			
		<div class="form-group">
			<label>Ram:</label>
			<input type="text" class="form-control" placeholder="Ram" name="ram" value="<?php echo $data_laptop['ram']?>">
		</div>
		<div class="form-group">
			<label>Đĩa cứng:</label>
			<input type="text" class="form-control" placeholder="Đĩa cứng" name="hdisk" value="<?php echo $data_laptop['hdisk']?>">
		</div>	
		<div class="form-group">
			<label>Màn hình rộng:</label>
			<input type="text" class="form-control" placeholder="Màn hình rộng" name="screen" value="<?php echo $data_laptop['screen']?>">
		</div>
		<div class="form-group">
			<label>Cảm ứng:</label>
			<select class="form-control" name="touch">
				<?php 
					$khong	="";
					$co 	="";
					if ($data_laptop['touch'] == 'Không')
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
			<label>Đồ họa:</label>
			<input type="text" class="form-control" placeholder="Đồ họa" name="graphic" value="<?php echo $data_laptop['graphic']?>">
		</div>
		<div class="form-group">
			<label>Đĩa quang:</label>
			<select class="form-control" name="disc">
				<?php 
					$khong	="";
					$dvd 	="";
					if ($data_laptop['disc'] == 'Không')
					{
						$khong="selected";
					}
					else
					{
						$dvd="selected";
					}
				?>
				<option <?php echo $khong;?>>Không</option>
				<option <?php echo $dvd;?>>DVD Super Multi Double Layer</option>
			</select>
		</div>
		<div class="form-group">
			<label>Webcam:</label>
			<input type="text" class="form-control" placeholder="Webcam" name="webcam" value="<?php echo $data_laptop['webcam']?>">
		</div>
		<div class="form-group">
			<label>Chất liệu vỏ:</label>
			<select class="form-control" name="coat">
				<?php 
					$vonhua="";
					$vonhom="";
					if ($data_laptop['coat'] == 'Vỏ Nhựa')
					{
						$vonhua="selected";
					}
					else
					{
						$vonhom="selected";
					}
				?>
				<option <?php echo $vonhua;?>>Vỏ Nhựa</option>
				<option <?php echo $vonhom;?>>Vỏ Nhôm</option>
			</select>
		</div>
		<div class="form-group">
			<label>Cổng giao tiếp: </label>
			<input type="text" class="form-control" placeholder="Cổng giao tiếp" name="commun" value="<?php echo $data_laptop['commun']?>">
		</div>
		<div class="form-group">
			<label>Kết nối khác:</label>
			<select class="form-control" name="connect">
				<?php 
					$khong="";
					$Bluetooth="";
					if ($data_laptop['connect'] == 'Không')
					{
						$khong="selected";
					}
					else
					{
						$Bluetooth="selected";
					}
				?>
				<option <?php echo $khong;?>>Không</option>
				<option <?php echo $Bluetooth;?>>Bluetooth</option>
			</select>
		</div>
		<div class="form-group">
			<label>Pin/Battery:</label>
			<input type="text" class="form-control" placeholder="Pin" name="pin" value="<?php echo $data_laptop['pin']?>">
		</div>
		<div class="form-group">
			<label>Trọng Lượng: </label>
			<input type="text" class="form-control" placeholder="Trọng Lượng" name="height" value="<?php echo $data_laptop['height']?>">
		</div>
		
		<button type="submit" name="update-laptop" class="btn btn-primary">Chỉnh Sửa</button>
	</div>
</form>