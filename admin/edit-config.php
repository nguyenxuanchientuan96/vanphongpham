<?php 
	if( ( $_GET["r"] == "edit-config" ) && ( !empty( $_GET["id"] ) ) ){

		$id = strip_tags($_GET["id"]);
		$rs = mysqli_query($conn, "SELECT * FROM config WHERE id=$id");
		$menu = mysqli_fetch_array( $rs , MYSQLI_ASSOC);


		if( empty( $menu ) ){
			echo alert("OoopS!, không tồn tại ! ");
			return;
		}

	}else{
		echo alert("OoopS!,  không tồn tại ! ");
		return;
	}

	if( isset( $_POST["submit"] ) ){
		$name = mysqli_real_escape_string($conn, $_POST["name"]);
		$info = mysqli_real_escape_string($conn, $_POST["info"]);
		$id = $menu["id"];

		$sql = "UPDATE config SET k='{$name}', v='{$info}' WHERE id='{$id}' LIMIT 1 ";

		if( mysqli_query($conn , $sql) ){
			redirect("index.php?r=list-config");
		}else{
			echo alert("update  thất bại :'( " , "alert-error");
		}
	}


?>
			<div class="form">
				<h2 class='alert alert-success'>Sửa : <i> <?php echo $menu["k"]; ?> </i></h2>
					<form  method="post" accept-charset="utf-8">

						<h2>id</h2>
						<input type="text" name="name" max-length='120' value="<?php echo $menu['k'] ?>" />
						
						<h2>Thông tin giới thiệu</h2>
						<textarea id="editor-config" name="info" class="textarea"><?php echo $menu['v']; ?></textarea>
						
						<br/>
						<input type="submit" name="submit"  class="btn btn-submit" value="Sửa"/>
					</form>
			</div><!--form-->