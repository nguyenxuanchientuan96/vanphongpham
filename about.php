<?php 





	if( $_SERVER["REQUEST_METHOD"] == "POST" ){
		$errors_arr = array();


		$ten = (trim(strip_tags($_POST["ten"]) )) ;
		$diachi = trim(strip_tags( $_POST["diachi"] ) );
		$sdt = trim(strip_tags( $_POST["sdt"] ));
		$email = trim(strip_tags( $_POST["email"] ));
		$content = trim(strip_tags($_POST["content"]) );

		if( empty( $ten ) || !validate_username( $ten ) )  {
			$errors_arr["ten"] = "Tên không được để trống hoặc không nằm trong bảng chữ cái ! ";
		};

		if( empty( $diachi ) )  {
			$errors_arr["diachi"] = "Địa chỉ không được để trống ! ";
		}

		if( empty( $sdt ) || !validate_phone( $sdt )  ){
			$errors_arr["sdt"] = "Số điện thoại trống hoặc không hợp lệ ! ";
		}

		if( empty( $email  ) || !validate_email( $email ) ){
				$errors_arr["email"] = "Email trống hoặc không hợp lệ, chúng tôi chỉ chấp nhận email từ Gmail, Yahoo, hoặc Microsoft mail! ";
		}

		if( empty( $content ) ){
			$errors_arr["content"] = "Nội dung không được để trống ! ";
		}
		if( empty( $errors_arr ) ){
			$ten = mysqli_real_escape_string($conn, $ten);
			$diachi = mysqli_real_escape_string($conn, $diachi);
			$sdt = mysqli_real_escape_string($conn, $sdt);
			$email = mysqli_real_escape_string($conn, $email);
			$content = mysqli_real_escape_string($conn, $content);


			$sql = "INSERT INTO lienhe( ten ,diachi , sdt , email , content  ) VALUES ( '{$ten}' , '{$diachi}' , '{$sdt}' , '{$email}' , '{$content}' ) ";
			$rs = mysqli_query( $conn , $sql );

			if( $rs  ){
				redirect( "index.php?r=about&action=complete" );
			}else{
				echo alert(  "Có lỗi xảy ra , xin thử lại sau "  . mysqli_error($conn) , "alert-error" );
			}
		}else{
			$str = "Có lỗi xảy ra, vui lòng nhập lại : <br/> " ;
			foreach( $errors_arr as $v ){
				$str .=  "- ". $v . " <br/> ";
			}
			//echo $str;
			var_dump( $errors_arr );
		}

	}//post	
 ?>


<div id="contact">
<div class="cart-fill-wrap">

	<?php if( !empty($_GET["action"]) &&  $_GET["action"] == "complete" ){
		echo "<h2>Cảm ơn bạn đã liên hệ với chúng tôi, chúng tôi sẽ liên hệ lại trong thời gian sớm nhất !!! </h2>"; 						
	}

	?>

	<div class="about-contact">
		<h2> LIÊN HỆ GÓP Ý </h2>
		<form  method="post" accept-charset="utf-8">
			
		<label>
			<p>Tên của bạn : </p> 
			<input type="text" name="ten" />
		</label>		
		<br>
		<label>
			<p>Địa chỉ : </p> 
			<input type="text" name="diachi" />
		</label>
		<br>
		<label>

			
			<p>Số điện thoại :</p> 
			<input type="text" name="sdt" />
		</label>
		<br>
		<label>
			<p> Địa chỉ email : </p>
			<input type="text" name="email">
		</label>
		<br>
		<label>
			<p>Nội dung :</p> 
			<textarea type="text" name="content"></textarea>
		</label>
		<br>
		<button type="submit">Gửi </button>

		</form>
	</div><!-- .cart-fill -->

</div>
</div><!-- #contact -->

<div class="alert alert-success">
	

	<p>
		© Công ty TNHH văn phòng phẩm TLT- All Rights Reserved.
Địa chỉ: Công ty TNHH văn phòng phẩm TLT - 456 Minh Khai -Hai Bà Trưng - Hà Nội </p>
<p> 
Điện thoại: 0989765049 - Gmail: chientuan084@gmail.com
	</p>


</div>