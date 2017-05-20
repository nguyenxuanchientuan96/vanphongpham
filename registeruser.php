<?php 
	if( isset( $_POST["submit"] ) ){
		$name = mysqli_real_escape_string($conn, $_POST["name"]);
		$birth = mysqli_real_escape_string($conn, $_POST["ngaysinh"]);
		$quequan = mysqli_real_escape_string($conn, $_POST["quequan"]);
		$noilamviec = mysqli_real_escape_string($conn, $_POST["noilamviec"]);
		$gioithieubanthan = mysqli_real_escape_string($conn, $_POST["gioithieubanthan"]);
		$p1 = mysqli_real_escape_string($conn, $_POST["password"]);
		$p2 = mysqli_real_escape_string($conn, $_POST["re-password"]);

		if( preg_match("/^\w+$/", $name ) ){
			echo alert("Tên người dùng không hợp lệ ! " , "alert-error");
			return;
		}

		if( $p1 == $p2 ){
			$sql = " INSERT INTO dangkithanhvien(name, ngaysinh , quequan, noilamviec, gioithieubanthan, password) VALUES ( '{$name}' , ('{$birth}') , '{$quequan}','{$noilamviec}','{$gioithieubanthan}','{$p1}' )";
			if( mysqli_query($conn, $sql) ){
				echo "Thành công";
			}else{				
				echo alert("Tên người dùng đã tồn tại hoặc bị lỗi, vui lòng thử lại" , "alert-error");
			}
		}else{
			echo alert("Mật khẩu không khớp, vui lòng nhập lại" , "alert-error");
		}

		
	}
?>
			<div class="form">
				<form  method="post">
					<label>
						<h2>Họ tên</h2>
						<input type="text" name="name" />
					</label>
					<label>
						<h2>Ngày sinh</h2>
						<input type="text" name="ngaysinh" class="textarea">
					</label>
					<label>
						<h2>Quê quán</h2>
						<input type="text" class="textarea" name="quequan"/>
					</label>
					<label>
						<h2>Nơi làm việc</h2>
						<textarea name="noilamviec"></textarea>
					</label>

					<label>
						<h2>Giới thiệu bản thân</h2>
						<textarea name="gioithieubanthan"></textarea>
					</label>

					<label>
						<h2>Password</h2>
						<textarea name="password"></textarea>
					</label>

					<label>
						<h2>Nhập lại password</h2>
						<textarea name="re-password"></textarea>
					</label>
					<br/>
					<input type="submit" name="submit" class="btn btn-submit" value="Tạo mới" style="background-color: #F36F36" />
				</form>

			</div><!--form-->
