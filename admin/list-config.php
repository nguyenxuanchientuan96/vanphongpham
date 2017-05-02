<?php 
	$sql = " SELECT * FROM config";
	$rs = mysqli_query($conn, $sql);
	if( $rs->num_rows  <= 0  ){
			echo "<div class='alert alert-error'>vui lòng thêm mới</div>";
			return;
	}
?>

<table class="table">
	<caption class="alert alert-success" style="color: #12422F">Tất cả config</caption>
	
	<thead>
		<tr>
			<th>id</th>
			<th>key </th>
			<th>value</th>
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
			<td><?php echo $menu["k"]; ?></td>
			<td><?php echo $menu["v"];?></td>
            <td><a  onclick='return confirm("Ban thực sự muốn xóa")' href="delete.php?type=config&id=<?php echo $menu['id'];?>">xóa</a></td>
			<td><a href="index.php?r=edit-config&id=<?php echo $menu['id'];?>">Sửa</a></td>
		</tr>

	<?php endwhile;?>
	</tbody>
</table>