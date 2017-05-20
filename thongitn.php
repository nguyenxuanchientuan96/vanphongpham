<?php
	require_once 'inc/lib.php';
	if(isset($_POST["delete"])){
		$id=$_POST["delete"];
		$sql="DELETE FROM dangkithanhvien WHERE id={$id}";
		$rs=mysqli_query($conn,$sql);
		if($rs){
			echo "Xóa thành công";
		}
		else{
			echo "Thất bại";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>admin</title>
</head>
<body>
	<h1> Thông tin tất cả user </h1>
	<p> <a href="index.php"> Về trang chủ </a> </p>
	<p> <a href="index.php?r=registeruser"> Thêm người dùng mới </a> </p>
	
	<table border="1">
		<thead>
			<tr>

				<th> Tên </th>
				<th> Ngày sinh </th>
				<th> Quê quán </th>
				<th> Nơi làm việc </th>
				<th> Giới thiệu bản thân </th>
			
				<th> password </th>
				<th> repassword </th>
				<th> option </th>
			</tr>

		</thead>
		<tbody>
			<?php 
				$sql="SELECT * FROM dangkithanhvien";
				$rs=mysqli_query($conn,$sql);
				while ($row=mysqli_fetch_array($rs,MYSQLI_ASSOC)) {
			?>
			<tr>
				<td> <?php echo $row["name"]; ?> </td>
				<td> <?php echo $row["ngaysinh"]; ?> </td>
				<td> <?php echo $row["quequan"]; ?> </td>
				<td> <?php echo $row["noilamviec"]; ?> </td>
				<td> <?php echo $row["gioithieubanthan"]; ?> </td>
				<td> <?php echo $row["password"]; ?> </td>
				<td> <?php echo $row["repassword"]; ?> </td>
					
				<td> 
				<form method="POST">
					<input type="hidden" name="delete" value="<?php echo $row["id"];  ?>">
					<button type="submit" onclick="return confirm('bạn có chắc chắn muốn xóa không??')"> Xóa</button>
				</form>
					</td>
			</tr>

			<?php } ?>
		</tbody>
	</table>

</body>
</html>