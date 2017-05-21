<?php 
	$sql = " SELECT * FROM sp";
	$rs = mysqli_query($conn, $sql);

	if(  $rs->num_rows <= 0  ){
			echo "<div class='alert alert-error'>Không có sp trong cửa hàng, vui lòng thêm mới</div>";
			return;
	}
?>

<table class="table">
	<caption class="alert alert-success" style="color: #12422F">Tất cả sản phẩm</caption>
	
	<thead>
		<tr>
			<th>ID</th>
			<th>Ảnh</th>
			<th>Tên sản phẩm</th>
			<th>Giới thiệu</th>
			<th>Danh mục</th>
			<th>Giá tiền</th>
			<th>Sửa</th>
			<th>Xóa</th>
		</tr>
	</thead>

	<tbody>
		<?php 
		$counter = 1 ;
		while( $sp = mysqli_fetch_array( $rs , MYSQLI_ASSOC ) ):  ?>

		<tr>
			<td><?php echo $counter++;?></td>
			<td>
				<a href="edit-sp.php?id=<?php echo $sp['id'];?>">
					 <img class="avatar" src="../upload/<?php echo $sp['avatar'] ?>" title='<?php echo $sp["name"]; ?>' />
				 </a>
			 </td>
			<td><?php echo $sp["name"]; ?></td>
			<td><?php echo $sp["excerpt"];?></td>
			<td><?php echo get_menu_name_by_id($sp["menu"]) ;?></td>
			<td> <p class="price"><?php echo $sp["price"];?></p></td> 
            <td><a  onclick='return confirm("Ban thực sự muốn xóa")' href="delete.php?type=sp&id=<?php echo $sp['id'];?>">xóa</a></td>
			<td><a href="index.php?r=edit-sp&id=<?php echo $sp['id'];?>">Sửa</a></td>
		</tr>

	<?php endwhile;?>
	</tbody>
</table>