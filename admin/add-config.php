<?php 
	if( isset( $_POST["submit"] ) ){
		$name = mysqli_real_escape_string($conn, $_POST["name"]);
		$info = mysqli_real_escape_string($conn, $_POST["info"]);

		$sql = "INSERT INTO config(k,v) VALUES (  '{$name}' , '{$info}' )";
		if( mysqli_query($conn, $sql) ){
			redirect("index.php?r=list-config");
		}else{
			echo alert("Thêm thất bại, thử lại sau" . mysqli_error($conn) , "alert-error");
		}
	}
?>
			<div class="form">
				<form  method="post">
				
					<h2>Id </h2>
					<input type="text" name="name" maxlength="120" />
					
					<h2>Value</h2>
					<textarea id="editor-config" name="info" class="textarea"></textarea>
					
					<br/>
					<input type="submit" name="submit" class="btn btn-submit" value="Thêm mới" style="background-color: #F36F36" />
				</form>

			</div><!--form-->
