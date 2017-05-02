		<div class="body-left">
			<?php 
				$sidebar = get_config("left-sidebar");
				if( $sidebar ){
					echo $sidebar;
				}
			?>	
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
							<div class="block-body-item">
								<img src="upload/<?php echo $r["avatar"] ?>" title="<?php echo $r["name"];?>" alt="<?php echo $r["name"]; ?>" style="width=100% ; max-width:200px ;  height:50%; ; display:block; padding-top: 5px; "/>
									
									<p class="block-body-title">
										<a href="index.php?r=single&id=<?php echo $r['id'];?>"><?php echo $r["name"];?></a>
									</p>
									
									<!-- <p> 
										<?php echo $r["excerpt"];?>
									</p> -->
									<p class="price">
										</br><a href="index.php?r=cart&action=add&id=<?php echo $r['id']; ?>"><?php echo $r["price"] ."(đ)";?></a>
									</p>
									<p class="block-body-button-tieu-bieu">
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