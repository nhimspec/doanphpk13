<div class="content-bot col-md-12">
	<div class="row">	
		<div class="chung col-md-12">
			<h2 id="namephone"> <?php echo $data['ten'];?></h2>
			<a href="update.php?id=<?php echo $data["id"]; ?>" title="Chỉnh sửa"><img src="img/icon/update.png" id="update" alt="update"></a>
			<div class="phoneimg">	
				<img src="action/showimg.php?id=<?php echo $data["id"]; ?>" alt="<?php echo $data["ten"]; ?>">
			</div>
			<div class="phonesale">
				<h2 id="giaphone"><?php echo $data['gia'] . '&#8363';?></h2>
				<div class="quangcao">
					<label class="khuyenmai">Khuyến mãi</label>
					<?php echo $data['khuyenmai'];?>
				</div>
				<div class="col-md-12 chinhsach">
					<ul>
						<li>
							Trong hộp có: 
		        			<?php echo $data['dinhkem'];?>
						</li>
						<li>
							Bảo hành:
							<?php echo $data['baohanh'];?>
						</li>
					</ul>
				</div>
				<div class='box-btn'>
				<button type="button" class="btn  btn-lg add-shop" onclick="window.location.href='#'" >Đặt trước online</button>
				<button type="button" class="btn  btn-lg buy" onclick="window.location.href='dathang.php?id=<?php echo $row["id"]; ?>'">Mua hàng</button>
				<button type="button" class="btn  btn-lg call" onclick="window.location.href='dathang.php?id=<?php echo $row["id"]; ?>'">Gọi 1800 8198</button>
				</div>
			</div>
			<div class="phukien">
			</div>
		</div>
		<div class="phone-info col-md-12">
			<div class="thongso">
				<h2>Thông số kỹ thuật</h2>
				<table class="table table-hover">
					<tr>
						<td>Màn hình:</td>
						<td><?php echo $data['manhinh'];?></td>
					</tr>
					<tr>
						<td>Hệ điều hành:</td>
						<td><?php echo $data['hdh'];?></td>
					</tr>
					<tr>
						<td>Camera sau:</td>
						<td><?php echo $data['cmrsau'];?></td>
					</tr>
					<tr>
						<td>Camera trước:</td>
						<td><?php echo $data['cmrtruoc'];?></td>
					</tr>
					<tr>
						<td>CPU:</td>
						<td><?php echo $data['cpu'];?></td>
					</tr>
					<tr>
						<td>RAM:</td>
						<td><?php echo $data['ram'];?></td>
					</tr>
					<tr>
						<td>Bộ nhớ trong:</td>
						<td><?php echo $data['bonhotrong'];?></td>
					</tr>
					<tr>
						<td>Hỗ trợ thẻ nhớ:</td>
						<td><?php echo $data['hotrothenho'];?></td>
					</tr>
					<tr>
						<td>Thẻ SIM:</td>
						<td><?php echo $data['thesim'];?></td>
					</tr>
					<tr>
						<td>Kết nối:</td>
						<td><?php echo $data['ketnoi'];?></td>
					</tr>
					<tr>
						<td>Dung lượng pin:</td>
						<td><?php echo $data['dungluongpin'];?></td>
					</tr>
					<tr>
						<td>Chức năng đặc biệt:</td>
						<td><?php echo $data['chucnangdacbiet'];?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>