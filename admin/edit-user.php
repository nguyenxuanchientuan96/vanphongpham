<?php 
	if( ( $_GET["r"] == "edit-user" ) && ( is_numeric( $_GET["id"] ) ) && ( $_GET["id"] > 0 ) ){

		$id = $_GET["id"];
		$rs = mysqli_query($conn, "SELECT * FROM user WHERE id=$id");
		$u = mysqli_fetch_array( $rs , MYSQLI_ASSOC);


		if( empty( $u ) ){
			echo alert("OoopS!, người dùng bạn tìm không tồn tại ! ");
			return;
		}

	}else{
		echo alert("OoopS!, người dùng bạn tìm không tồn tại ! ");
		return;
	}

	if( isset( $_POST["submit"] ) ){
		$passowrd1= mysqli_real_escape_string($conn, $_POST["password1"]);
		$password2 = mysqli_real_escape_string($conn, $_POST["password2"]);
		$old_password = mysqli_real_escape_string($conn, $_POST["old_password"]);
		$info = mysqli_real_escape_string($conn, $_POST["info"]);
		$id = $u["id"];

		if( $password1 != $password2 ){
			echo alert("Mật khẩu mới bạn nhập không khớp !!! ");
			return;
		}

		if( mysqli_query($conn, "SELECT id FROM user WHERE password = md5('{$old_password}') AND id={$id} ") ){
			$sql = "UPDATE user SET password='{$password1}', info='{$info}' WHERE id=$id LIMIT 1 ";
			if( mysqli_query(  $conn , $sql) ){
				redirect("index.php?r=list-user");
			}else{
				echo alert("Cập nhật lỗi, vui lòng thử lại sau  " , "alert-error");
			}
		}else{
			echo alert("Mật khẩu cũ không khớp ! " , "alert-error");
		}

		

		if( mysqli_query($conn , $sql) ){
			redirect("index.php?r=list-user");
		}else{
			echo alert("update user thất bại :'( " , "alert-error");
		}
	}


?>
			<div class="form">
				<h2 class='alert alert-success'>Sửa user: <i> <?php echo $u["username"]; ?> </i></h2>
					<form  method="post" accept-charset="utf-8">

						<h2>Tên tài khoản</h2>
						<input type="text" name="username" readonly max-length='120' value="<?php echo $u['username'] ?>" />
						
						<h2>Thông tin giới thiệu</h2>
						<textarea name="info" class="textarea"><?php echo $u['info']; ?></textarea>
						
						<div class="change-password">
							<h2>Nhập mật khẩu</h2>
							<input type="password" name="password1" />
							<h2>Xác nhận mật khẩu</h2>
							<input type="password" name="password2" />
							<h2>Nhập mật khẩu cũ</h2>
							<input type="password" name="old_password" />
						</div>

						<br/>
						<input type="submit" name="submit"  class="btn btn-submit" value="Thêm mới" style="background-color: #F36F36" />
					</form>
			</div><!--form-->