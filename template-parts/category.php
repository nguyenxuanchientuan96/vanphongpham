<?php 
	if( isset(  $_GET["id"])  && (is_numeric($_GET["id"])) ){

		$sql = "SELECT * FROM sp WHERE menu={$_GET['id']} ";
		$rs = mysqli_query($conn, $sql);
		if( mysqli_num_rows($rs)  <= 0 ){
			echo alert( $CATEGORY_NOT_EXISTS , "alert-error");
			return;
		}
	}


?>

	<div class="block-body">
		<div class="block-body-title">
			<h2>Các sản phẩm trong mục : <?php  echo get_menu_name_by_id($_GET["id"]); ?></h2>
		</div>
		
		<div class="block-body-list">
			<ul>
			<?php 
				while(  $r = mysqli_fetch_array($rs, MYSQLI_ASSOC) ):
			?>
				
				
				<li>	
					<div class="block-body-item">
						<img src="upload/<?php echo $r["avatar"] ?>" title="<?php echo $r["name"];?>" alt="<?php echo $r["name"]; ?>" style="width:100%; max-width:250px; padding-top: 10px; ; height:auto ; display:block "  />
							
							<p class="block-body-title">
								<a href="index.php?r=single&id=<?php echo $r['id'];?>"><?php echo $r["name"];?></a>
							</p>
							
							<p> 
								<?php echo $r["excerpt"];?>
							</p>
							<p>
								</br><a href="index.php?r=cart&action=add&id=<?php echo $r['id']; ?>"><?php echo $r["price"];?></a>
							</p>
							<p class="block-body-button-tieu-bieu">
								<a href="index.php?r=cart&action=add&id=<?php echo $r['id']; ?>">MUA</a>
							</p>
					</div>
				</li>

			<?php endwhile;?>


				
			</ul>
			
		</div><!-- end .block-body-list -->
	</div><!-- end .block-body -->

