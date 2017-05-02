<?php 
	if( !empty($_GET["s"] )  ){
		$search = strip_tags($_GET["s"]);
		$sql = "SELECT * FROM sp WHERE name LIKE '%{$search}%' " ;
		$rs = mysqli_query($conn, $sql);

		if( !$rs || mysqli_num_rows($rs) <= 0  ){
			echo alert("Nội dung bạn tìm: " . $search . " không tồn tại :'( " , "alert-error");
			return;
		}
	}else{
		echo alert($SEARCH_404 , "alert-error");
		return;
	}
?>

	<div class="block-body">
		<div class="block-body-title">
			<h2>Kết quả tìm kiếm của "<i><?php echo $search;?></i>"</h2>
		</div>
		
		<div class="block-body-list">
			<ul>
			<?php 
				while(  $r = mysqli_fetch_array($rs, MYSQLI_ASSOC) ):
			?>
				
				
				<li>	
					<div class="block-body-item">
						<img src="upload/<?php echo $r["avatar"] ?>" title="<?php echo $r["name"];?>" alt="<?php echo $r["name"];?>" 
						style="max-width:500px ; height:auto; padding-top: 5px; display:block "  />
							
							<p class="block-body-title">
								<a href="index.php?r=single&id=<?php echo $r['id'];?>" style="color: black; font-size: 30px;text-decoration: none"><?php echo $r["name"];?></a>
							</p>
							<div class="search-excerpt">
								<p> 
									<?php echo $r["excerpt"];?>
								</p>
							</div>
							<div class="search-price">
								<p>
									</br><a href="index.php?r=cart&action=add&id=<?php echo $r['id']; ?>"><?php echo $r["price"];?></a>
								</p>
							</div>
							<p class="search-block-body-button-tieu-bieu">
								<a href="index.php?r=cart&action=add&id=<?php echo $r['id']; ?> ">MUA</a>
							</p>
					</div>
				</li>

			<?php endwhile;?>


				
			</ul>
			
		</div><!-- end .block-body-list -->
	</div><!-- end .block-body -->

