<?php 
	if( isset( $_POST["submit"] ) ){
		$name = mysqli_real_escape_string($conn, $_POST["name"]);
		$p1 = mysqli_real_escape_string($conn, $_POST["password1"]);
		$p2 = mysqli_real_escape_string($conn, $_POST["password2"]);
		$info = mysqli_real_escape_string($conn, $_POST["info"]);

		if( preg_match("/^\w+$/", $name ) ){
			echo alert("Tên người dùng không hợp lệ ! " , "alert-error");
			return;
		}

		if( $p1 == $p2 ){
			$sql = " INSERT INTO user(username, password , info) VALUES ( '{$name}' , md5('{$p1}') , '{$info}' )";
			if( mysqli_query($conn, $sql) ){
				redirect("index.php?r=list-user");
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
				
					<h2>Tên tài khoản</h2>
					<input type="text" name="name" />
					
					<h2>Mật khẩu</h2>
					<input type="password" name="password1" class="textarea">

					<h2>Nhập lại mật khẩu</h2>
					<input type="password" class="textarea" name="password2"/>
					
					<h2>Thông tin</h2>
					<textarea name="info"></textarea>

					<br/>
					<input type="submit" name="submit" class="btn btn-submit" value="Tạo mới" style="background-color: #F36F36" />
				</form>

			</div><!--form-->
