		<div class="body-left">
		<!-- 	<?php 
				$sidebar = get_config("left-sidebar");
				if( $sidebar ){
					echo $sidebar;
				}
			?> -->	
			<div class="body-left-menu">
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
		</div><!---end .body-right-->



			<div class="body-main">
			
				<div id="banner-main">
					<?php echo get_config("banner-main");  ?>
				</div>


				<div class="block-body-title">
					<h2> NỔI BẬT </h2>
				</div>
				
				<div class="block-body-list">
				
					<?php 
						$rs = mysqli_query( $conn , "SELECT * FROM sp" );
						while(  $r = mysqli_fetch_array($rs, MYSQLI_ASSOC) ):
					?>
						
						
						<div class="block-product">	
							<div class="block-body-item" style="border:0.5px solid grey">
								<div class="block-body-item-img" style="width: 100%; height:65%;overflow: hidden; ">
									<img src="upload/<?php echo $r["avatar"] ?>" title="<?php echo $r["name"];?>" alt="<?php echo $r["name"]; ?>" style="width: 100%; max-width:230px ;  height:90%; ; display:block; padding-top: 15px; 
										 transition-duration: 0.5s;  /*sẽ chứa gía trị là thời gian(đơn vị s = giây) nó sẽ thiết lập quá trình để phóng to thumbnail mất bao nhiêu thời gian*/
								        /* Safari & Google Chrome */
								        -webkit-transition-duration: 0.5s; 
								        /* Mozilla Firefox */
								        -moz-transition-duration: 0.5s; 
								        /* Opera */
								        -o-transition-duration: 0.5s;
								        /* IE 9 */
								        -ms-transition-duration: 0.5s;



									 "/>
								</div>
									<p class="block-body-title">
										<a href="index.php?r=single&id=<?php echo $r['id'];?>"><?php echo $r["name"];?></a>
									</p>
									
									<!-- <p> 
										<?php echo $r["excerpt"];?>
									</p> -->
									<p class="price">
										</br><a href="index.php?r=cart&action=add&id=<?php echo $r['id']; ?>"><?php echo $r["price"] ."(đ)";?></a>
									</p>
									<p class="block-body-button-tieu-bieu" style="margin-bottom: 5px;">
										<a href="index.php?r=cart&action=add&id=<?php echo $r['id']; ?>">MUA</a>
									</p>
							</div>
						</div>

					<?php endwhile;?>


	
					
				</div><!-- end .block-body-list -->
			</div><!-- end .block-body -->
		
			

			<div class="body-right">
				<p class="block-body-button" style="background-color: #F36F36; width: 80%; margin-top: -2%;">
						<a href="index.php?r=cart&action=checkout">THANH TOÁN</a>
					</p>
				<img src="img/banner1.jpg" style="height: 450px;">
			</div>

			<!-- <div class="body-right">
				<div class="body-right-title">
					<h2>Sản phẩm đã mua</h2>


					<p class="block-body-button">
						<a href="index.php?r=cart&action=checkout">THANH TOÁN</a>
					</p>
				</div>
				
				<?php 
					if( empty( $_SESSION["products"])){
						return;
					}
				?>
				<ul>
					<?php for( $i = 0 ; $i < sizeof($_SESSION["products"]) ; $i++ ):

							$p = $_SESSION["products"][$i];
					?>

					<li>	
						<div class="body-right-item">
							<img src="upload/<?php echo $p['avatar'] ;?>" title="<?php echo $p['name'];?>" alt="<?php echo $p['name'];?>" style="width=100% ; max-width:100%;  height:100px; ; display:block "  />
							<p class="body-right-title">
								<a href="index.php?r=single&id=<?php echo $p['id'];?>"><?php echo $p['name'];?></a>
							</p>
							<div class="right-excerpt">
								<p> 
									<?php echo $p['excerpt'];?>
								</p>
							</div>
							<p class="right-price">

								</br><a href="#"><?php echo vnd_format($p['price']) . " VND ". " x " . $p['amount'];?></a>
							</p>
							<p class="block-body-button">
								<a href="index.php?r=cart&action=add&id=<?php echo $p['id'];?>">MUA THÊM</a>
							</p>
						</div>
					</li>

				<?php endfor;?>
					
				</ul>
				<img src="img/banner1.jpg">
			</div><!---end .body-right--> 