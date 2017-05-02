<?php 
	$sql = " SELECT * FROM menu";
	$rs = mysqli_query($conn, $sql);
	if( $rs->num_rows  <= 0  ){
			echo "<div class='alert alert-error'>Danh mục trống, vui lòng thêm mới</div>";
			return;
	}
?>

<table class="table">
	<caption class="alert alert-success" style="color: #14242F">Tất cả menu</caption>
	
	<thead>
		<tr>
			<th>id</th>
			<th>Tên </th>
			<th>giới thiệu</th>
			<th>Sửa</th>
			<th>Xóa</th>
		</tr>
	</thead>

	<tbody>
		<?php 
		$counter = 1 ;
		while( $menu = mysqli_fetch_array( $rs , MYSQLI_ASSOC ) ):  ?>

		<tr>
			<td><?php echo $counter++;?></td>
			<td><?php echo $menu["name"]; ?></td>
			<td><?php echo $menu["info"];?></td>
            <td><a  onclick='return confirm("Ban thực sự muốn xóa")' href="delete.php?type=menu&id=<?php echo $menu['id'];?>">xóa</a></td>
			<td><a href="index.php?r=edit-menu&id=<?php echo $menu['id'];?>">Sửa</a></td>
		</tr>

	<?php endwhile;?>
	</tbody>
</table>