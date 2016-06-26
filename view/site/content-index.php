<div class="content-bot">
	<?php 
	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_array()) {
	?>				
	<div class="col-lg-3 col-md-4 box-cart">		
		<a href="sanpham.php?id=<?php echo $row["id"]; ?>"></a>			
			<div class="row img-cart">
				<img src="<?php echo "admin/" . $row["imgurl"]; ?>" alt="<?php echo $row["name"]; ?>">
			</div>
			<div class="row thongtin">
				<ul>
					<li>
						Màn hình:<?php 
						// String to array
						$chuoi=explode(",",$row["screen"]);
						echo $chuoi["2"] . ', ' . $chuoi["1"];	?>									 			
					</li>
					<li>
						Hệ Điều hành: <?php echo $row["os"]; ?>
					</li>
					<li>
						CPU:<?php 
						//string to array
						$chuoi=explode(",",$row["cpu"]); echo $chuoi["0"]; ?>
					</li>
					<li>
						RAM: <?php echo $row["ram"]; ?>
					</li>
					<li>
						Camera: <?php echo $row["b_camera"] . ", "; ?><?php echo $row["f_camera"]; ?>
					</li>
					<li>
						Dung Lượng: <?php echo $row["pin"]; ?>
					</li>
				</ul>
			</div>
			<h3 class="row ten"><?php echo $row["name"]; ?></h3>
			<label class="row gia"><?php echo number_format($row["price"],0,",",".") . '&#8363'; ?></label>
			<div class="index-km">
				<?php echo $row['promotion'];?>
			</div>
			<button type="button" class="btn btn-primary add-giohang" onclick="window.location.href='#'" >Giỏ</button>
			<button type="button" class="btn btn-danger mua" onclick="window.location.href='dathang.php?id=<?php echo $row["id"]; ?>'">Mua</button>						
	</div>
						
	<?php
	} 
	}
	
	?>
</div>