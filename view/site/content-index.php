<div class="content-bot">
	<?php 
	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_array()) {
	?>				
	<div class="col-lg-5ths col-md-4 col-xs-2 col-sm-3 box-cart">		
		<a href="sanpham.php?id=<?php echo $row["id"]; ?>"></a>			
			<div class="row img-cart">
				<img src="action/showimg.php?id=<?php echo $row["id"]; ?>" alt="<?php echo $row["ten"]; ?>">
			</div>
			<div class="row thongtin">
				<ul>
					<li>
						Màn hình:<?php 
						// String to array
						$chuoi=explode(",",$row["manhinh"]);
						echo $chuoi["2"] . ', ' . $chuoi["1"];	?>									 			
					</li>
					<li>
						Hệ Điều hành: <?php echo $row["hdh"]; ?>
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
						Camera: <?php echo $row["cmrsau"] . ", "; ?><?php echo $row["cmrtruoc"]; ?>
					</li>
					
					
				</ul>

			</div>
			<div class="fix-box">
				<h3 class="row ten"><?php echo $row["ten"]; ?></h3>
				<label class="row gia"><?php echo $row["gia"] . '&#8363'; ?></label>
				<div class="index-km">
					<?php echo $row['khuyenmai'];?>
				</div>
			</div>
			
			<div class='box-btn'>
			<!--	<button type="button" class="btn btn-primary add-giohang" onclick="window.location.href='#'" >Giỏ</button>!-->
				<button type="button" class="btn btn-danger mua" onclick="window.location.href='dathang.php?id=<?php echo $row["id"]; ?>'">Mua</button>
			</div>
	</div>
						
	<?php
	} 
	}
	
	?>
</div>