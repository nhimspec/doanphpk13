<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
	<form role="search">
		<div class="form-group">
			<input type="text" class="form-control" placeholder="Search">
		</div>
	</form>
	<ul class="nav menu">
		<li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'index.php'){echo 'active'; }else { echo ''; } ?>"><a href="index.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
		<li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'widgets.php'){echo 'active'; }else { echo ''; } ?>"><a href="widgets.php"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Widgets</a></li>
		<li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'charts.php'){echo 'active'; }else { echo ''; } ?>"><a href="charts.php"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Charts</a></li>
		<li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'category.php'){echo 'active'; }else { echo ''; } ?>"><a href="category.php"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>Danh Mục</a></li>
		<li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'promotions.php'){echo 'active'; }else { echo ''; } ?>"><a href="promotions.php"><svg class="glyph stroked basket "><use xlink:href="#stroked-basket"/></svg>Khuyến Mãi</a></li>
		<li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'product.php'){echo 'active'; }else { echo ''; } ?>"><a href="product.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg>Sản Phẩm</a></li>
		<li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'add-product.php'){echo 'active'; }else { echo ''; } ?>"><a href="add-product.php"><svg class="glyph stroked upload"><use xlink:href="#stroked-upload"/></svg>Thêm Sản Phẩm</a></li>
		<li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'icons.php'){echo 'active'; }else { echo ''; } ?>"><a href="icons.php"><svg class="glyph stroked star"><use xlink:href="#stroked-star"></use></svg> Icons</a></li>
		<li role="presentation" class="divider"></li>
		<li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'controller-admin.php'){echo 'active'; }else { echo ''; } ?>"><a href="controller-admin.php"><svg class="glyph stroked eye"><use xlink:href="#stroked-eye"/></svg>Quản lý admin</a></li>
		<li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'profile.php'){echo 'active'; }else { echo ''; } ?>"><a href="profile.php?id=<?php echo $userid;?>"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Thông tin cá nhân</a></li>
	</ul>
</div><!--/.sidebar-->