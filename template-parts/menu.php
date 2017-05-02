		<!-- start menu -->
		<div class="menu">
			<ul>
					<li><a href="index.php?r=home" title="home">TRANG CHỦ</a></li>
					<li><a href="#" title="gioithieu">GIỚI THIỆU</a></li>

				<?php 
					$sql = "SELECT * FROM menu";
					$rs = mysqli_query($conn, $sql);
					while( $r = mysqli_fetch_array($rs, MYSQLI_ASSOC) ):
				?>
					<li><a href="index.php?r=category&id=<?php echo $r['id']; ?>" title="<?php echo $r['info']?>"><?php echo $r["name"];?></a></li>

				<?php endwhile;?>

				<li><a href="index.php?r=about" title="lienhe">LIÊN HỆ</a></li>	
				<li><a href="admin">ĐĂNG NHẬP QUẢN TRỊ</a></li>
			</ul>
		</div>
		<!-- end menu -->