<?php 
	if( ( $_GET["r"] == "edit-menu" ) && ( is_numeric( $_GET["id"] ) ) && ( $_GET["id"] > 0 ) ){

		$id = $_GET["id"];
		$rs = mysqli_query($conn, "SELECT * FROM menu WHERE id=$id");
		$menu = mysqli_fetch_array( $rs , MYSQLI_ASSOC);


		if( empty( $menu ) ){
			echo alert("OoopS!, Menu bạn tìm không tồn tại ! ");
			return;
		}

	}else{
		echo alert("OoopS!, Menu bạn tìm không tồn tại ! ");
		return;
	}

	if( isset( $_POST["submit"] ) ){
		$name = mysqli_real_escape_string($conn, $_POST["name"]);
		$info = mysqli_real_escape_string($conn, $_POST["info"]);
		$id = $menu["id"];

		$sql = "UPDATE menu SET name='{$name}', info='{$info}' WHERE id=$id LIMIT 1 ";

		if( mysqli_query($conn , $sql) ){
			redirect("index.php?r=list-menu");
		}else{
			echo alert("update menu thất bại :'( " , "alert-error");
		}
	}


?>
			<div class="form">
				<h2 class='alert alert-success'>Sửa menu: <i> <?php echo $menu["name"]; ?> </i></h2>
					<form  method="post" accept-charset="utf-8">

						<h2>Tên menu</h2>
						<input type="text" name="name" max-length='120' value="<?php echo $menu['name'] ?>" />
						
						<h2>Thông tin giới thiệu</h2>
						<textarea name="info" class="textarea"><?php echo $menu['info']; ?></textarea>
						
						<br/>
						<input type="submit" name="submit"  class="btn btn-submit" value="Thêm mới" style="background-color: #F36F36" />
					</form>
			</div><!--form-->