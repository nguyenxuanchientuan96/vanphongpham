
<?php 
	if( isset( $_POST["submit"] ) ){


		//check file upload 

		$file = $_FILES["avatar"];

		$allow_types = array( "iamge/jpg" , "image/jpeg" , "image/png" , "image/gif" );

		$upload_dir = "../upload/";

		$save_file = $upload_dir . $file["name"];

		if( in_array( strtolower($file["type"]) , $allow_types )  ){

			if( move_uploaded_file( $file["tmp_name"] ,  $save_file ) ){

				$name = mysqli_real_escape_string( $conn , $_POST["name"]) ;
				$info = mysqli_real_escape_string($conn, $_POST["info"]);
				$excerpt = mysqli_real_escape_string($conn,$_POST["excerpt"]);
				$menu = mysqli_real_escape_string( $conn,  $_POST["menu"] );
				$price = mysqli_real_escape_string( $conn, $_POST["price"]);


				$sql =   "INSERT INTO sp( avatar,name , info , excerpt , price , menu) VALUES( '{$file["name"]}',  '{$name}' , '{$info}' , '{$excerpt}' , '{$price}'  , '{$menu}')  ";

				if( mysqli_query( $conn , $sql ) ){
					redirect("index.php?r=list-sp");
				} else{
					echo alert("Có lỗi xảy ra, xin thử lại sau!" . mysqli_error($conn), "alert-error");
				}
			}else{
				echo alert("Không thể tải ảnh lên, vui lòng thử lại" , "alert-error");
			}
		}else{
			echo alert("File không hợp lệ, vui lòng tải file dạng ảnh ! ");
		}

	
	}
?>
			<div class="form">
			<h2 class='alert alert-success' style="color: red">Thêm sản phẩm mới</h2>
				<form  method="post" accept-charset="utf-8" enctype="multipart/form-data">

					<h2>Ảnh sản phẩm</h2>
					<input type="file" name="avatar"/>

					<h2>Tên sản phẩm</h2>
					<input type="text" name="name" max-length='120' />
					
					<h2>Thông tin giới thiệu</h2>
					<textarea id="gioithieu" name="info" class="textarea"></textarea>
					
					<h2>Thông tin tóm tắt</h2>
					<textarea  id="tomtat" name="excerpt"></textarea>

					<h2>Gía bán (VND)</h2>
					<input type="text" name="price" min-range="0" max-length='120' />

					<h2>Chọn danh mục</h2>
					<select name="menu">
					<?php 
						$menus = mysqli_query($conn, "SELECT id , name FROM menu");
						while( $menu = mysqli_fetch_array($menus, MYSQLI_ASSOC) ){
					?>

						<option value="<?php echo $menu['id']?>"><?php echo $menu["name"];?></option>
						
					<?php } ?>
					</select>
					<br/>
					<input type="submit" name="submit"  class="btn btn-submit" value="Thêm mới" style="background-color: #F36F36" />
				</form>

			</div><!--form-->