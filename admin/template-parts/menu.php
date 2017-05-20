		<!-- start menu -->
		<div class="menu">
			<ul  style="margin:0 auto; display:block ; width:100%">
				<li><a href="../index.php" title="home">Trang chủ</a></li>

				<li>
					<a href="index.php?r=list-sp" title="các loài hoa">Tất cả sản phẩm</a>
					<ul>
						<li><a href="index.php?r=add-sp" title="Thêm hoa mới">Thêm sản phẩm mới</a></li>
					</ul>
				</li>


				<li>
					<a href="index.php?r=list-menu" title="tất cả danh mục">Tất cả danh mục</a>
					<ul>
						<a href="index.php?r=add-menu" title="Thêm danh mục">Thêm danh mục</a>
					</ul>
				</li>


				<li>
					<a href="index.php?r=list-config" title="tất cả ">Tất cả quảng cáo</a>
					<ul>
						<a href="index.php?r=add-config" title="Thêm ">Thêm</a>
					</ul>
				</li>

				<li>
					<a href="index.php?r=list-user" title="tất cả user">Tất cả User</a>
					<ul>
						<a href="index.php?r=add-user" title="Thêm user">Thêm user</a>
					</ul>
				</li>

				<?php if( !empty($_SESSION) ):?>
				<li>
					<a href="index.php?r=logout" title="logout" onclick="return confirm('bạn muốn thoát ko !? ')">Thoát</a>
				</li>
			<?php endif;?>
			</ul>
		</div>
		<!-- end menu -->