<div class="content-bot col-md-12">
	<form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" onsubmit="return confirm('Xác nhận bạn muốn tạo mới sản phẩm?')">
		<div class="row">	
			<div class="chung col-md-12">
				<h2 id="namephone"><input class="form-control" name="ten" placeholder="Tên sản phẩm" type="text"></h2>
				<div class="phoneimg">
					<img id="blah">
					<input type="file" name="image" onchange="readURL(this);">
				</div>
				<div class="phonesale">
					<h2 id="giaphone"><input class="form-control" name="gia" placeholder="Giá thành" type="text"></h2>
					<div>
							<h3>Khuyến mãi:</h3>
							<textarea id="editor1" name="khuyenmai">Khuyến mãi.....</textarea>
							<script type="text/javascript">
								CKEDITOR.replace( 'editor1' );
							</script>
					</div>
					<div class="col-md-12 chinhsach">
						<ul>
							<li>
								Trong hộp có: 
			        			<input class="form-control" name="dinhkem" placeholder="Đính kèm" type="text">
							</li>
							<li>
								Bảo hành:
								<input class="form-control" name="baohanh" placeholder="Bảo Hành" type="text">
							</li>
						</ul>
					</div>
				</div>
				<div class="phukien">
				</div>
			</div>
			<div class="phone-info col-md-12">
				<div class="thongso">
					<h2>Thông số kỹ thuật</h2>
					<table class="table">
						<tr>
							<td>Màn hình:</td>
							<td><input class="form-control" name="manhinh" placeholder="Màn Hình" type="text"></td>
						</tr>
						<tr>
							<td>Hệ điều hành:</td>
							<td><input class="form-control" name="hdh" placeholder="Hệ điều hành" type="text"></td>
						</tr>
						<tr>
							<td>Camera sau:</td>
							<td><input class="form-control" name="cmrsau" placeholder="Camera sau" type="text"></td>
						</tr>
						<tr>
							<td>Camera trước:</td>
							<td><input class="form-control" name="cmrtruoc" placeholder="Camera trước" type="text"></td>
						</tr>
						<tr>
							<td>CPU:</td>
							<td><input class="form-control" name="cpu" placeholder="CPU" type="text"></td>
						</tr>
						<tr>
							<td>RAM:</td>
							<td><input class="form-control" name="ram" placeholder="Ram" type="text"></td>
						</tr>
						<tr>
							<td>Bộ nhớ trong:</td>
							<td><input class="form-control" name="bonhotrong" placeholder="Bộ nhớ trong" type="text"></td>
						</tr>
						<tr>
							<td>Hỗ trợ thẻ nhớ:</td>
							<td><input class="form-control" name="hotrothenho" placeholder="Hỗ trợ thẻ nhớ" type="text"></td>
						</tr>
						<tr>
							<td>Thẻ SIM:</td>
							<td><input class="form-control" name="thesim" placeholder="Thẻ SIM" type="text"></td>
						</tr>
						<tr>
							<td>Kết nối:</td>
							<td><input class="form-control" name="ketnoi" placeholder="Kết nối" type="text"></td>
						</tr>
						<tr>
							<td>Dung lượng pin:</td>
							<td><input class="form-control" name="dungluongpin" placeholder="Dung lượng pin" type="text"></td>
						</tr>
						<tr>
							<td>Chức năng đặc biệt:</td>
							<td><input class="form-control" name="chucnangdacbiet" placeholder="Chức năng đặc biệt" type="text"></td>
						</tr>
					</table>
					<div class="form-group submit">
						<div class="well well-lg">
							<button type="submit" class="btn btn-success">Thêm</button>
							<a href="index.php" class="btn btn-default" role="button">Trở lui</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>