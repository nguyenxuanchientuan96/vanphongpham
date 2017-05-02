<?php 
	if( isset( $_POST["submit"] ) ){
		$name = mysqli_real_escape_string($conn, $_POST["name"]);
		$info = mysqli_real_escape_string($conn, $_POST["info"]);

		$sql = "INSERT INTO menu(name,info) VALUES (  '{$name}' , '{$info}' )";
		if( mysqli_query($conn, $sql) ){
			redirect("index.php?r=list-menu");
		}else{
			echo alert("Thêm thất bại, thử lại sau" , "alert-error");
		}
	}
?>
			<div class="form">
				<form  method="post">
				
					<h2>Tên danh mục</h2>
					<input type="text" name="name" />
					
					<h2>Thông tin danh mục</h2>
					<textarea name="info" class="textarea"></textarea>
					
					<br/>
					<input type="submit" name="submit" class="btn btn-submit" value="Thêm mới" style="background-color: #F36F36" />
				</form>

			</div><!--form-->
