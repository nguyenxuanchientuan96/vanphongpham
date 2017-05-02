<?php 
	$sql = " SELECT * FROM user";
	$rs = mysqli_query($conn, $sql);
	if( $rs->num_rows  <= 0  ){
			echo "<div class='alert alert-error'>Danh mục trống, vui lòng thêm mới</div>";
			return;
	}
?>

<table class="table">
	<caption class="alert alert-success" style="color: #14422F">Tất cả menu</caption>
	
	<thead>
		<tr>
			<th>Id</th>
			<th>Tên </th>
			<th>Giới thiệu</th>
			<th>Sửa</th>
			<th>Xóa</th>
		</tr>
	</thead>

	<tbody>
		<?php 
		$counter = 1 ;
		while( $u = mysqli_fetch_array( $rs , MYSQLI_ASSOC ) ):  ?>

		<tr>
			<td><?php echo $counter++;?></td>
			<td><?php echo $u["username"]; ?></td>
			<td><?php echo $u["info"];?></td>
            <td><a  onclick='return confirm("Ban thực sự muốn xóa")' href="delete.php?type=user&id=<?php echo $u['id'];?>">xóa</a></td>
			<td><a href="index.php?r=edit-user&id=<?php echo $u['id'];?>">Sửa</a></td>
		</tr>

	<?php endwhile;?>
	</tbody>
</table>