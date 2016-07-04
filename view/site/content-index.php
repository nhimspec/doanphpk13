<div class="content-bot">
	<?php 
	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_array()) {
	?>				
	<div class="col-lg-5ths col-md-3 col-xs-12 col-sm-6 box-cart">		
		<a href="sanpham.php?id=<?php echo $row["id"]; ?>"></a>			
			<div class="row img-cart">
				<img src="action/showimg.php?id=<?php echo $row["id"]; ?>" alt="<?php echo $row["product_name"]; ?>">
			</div>
			<div class="row thongtin">
				<ul>
					<li>
						Màn hình:<?php 
						
						/*$chuoi=explode(",",$row["screen"]);
						echo $chuoi["2"] . ', ' . $chuoi["1"];*/
						echo $row["screen"]; 	?>
						 <?php ?>								 			
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
					
					
				</ul>

			</div>
			<div class="fix-box">
				<h3 class="row ten"><?php echo $row["product_name"]; ?></h3>
				<label class="row gia"><?php echo $row["price"] . '&#8363'; ?></label>
				<!-- <div class="index-km">!-->
					<!--<?php echo $row['khuyeanmi'];?>!-->
				<!--</div>!-->
				
			</div>
			
			<div class='box-btn row'>
			<!--	<button type="button" class="btn btn-primary add-giohang" onclick="window.location.href='#'" >Giỏ</button>!-->
				<button type="button" class="btn btn-danger mua" onclick="window.location.href='dathang.php?id=<?php echo $row["id"]; ?>'">Mua</button>
			</div>
	</div>
						
	<?php
	} 
	}
	
	?>
</div>