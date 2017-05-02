<?php 

	if( empty( $_SESSION["products"]) ){
		echo alert($CART_CHECKOUT_EMPTY);
		return;
	}	



	if(empty($_SESSION))
		session_start();




	if( $_SERVER["REQUEST_METHOD"] == "POST" ){
		$errors_arr = array();


		$ten = (trim(strip_tags($_POST["ten"]) )) ;
		$diachi = trim(strip_tags( $_POST["diachi"] ) );
		$sdt = trim(strip_tags( $_POST["sdt"] ));
		$email = trim(strip_tags( $_POST["email"] ));


		if( empty( $ten ) || !validate_username( $ten ) )  {
			$errors_arr["ten"] = "Tên không được để trống ! ";
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

		if( empty( $errors_arr ) ){
			$ten = mysqli_real_escape_string($conn, $ten);
			$diachi = mysqli_real_escape_string($conn, $diachi);
			$sdt = mysqli_real_escape_string($conn, $sdt);
			$email = mysqli_real_escape_string($conn, $email);

			$sql = "INSERT INTO thanhtoan( ten ,diachi , sdt , email  ) VALUES ( '{$ten}' , '{$diachi}' , '{$sdt}' , '{$email}' ) ";
			$rs = mysqli_query( $conn , $sql );

			if( $rs  ){
				redirect( "index.php?r=cart&action=complete" );
			}else{
				alert(  "Có lỗi xảy ra , xin thử lại sau "  . mysqli_error($conn) , "alert-error" );
			}
		}else{
			$str = "Có lỗi xảy ra, vui lòng nhập lại : <br/> " ;
			foreach( $errors_arr as $v ){
				$str +=  "- ". $v . " <br/> ";
			}

			var_dump(  $str , "alert-error");
		}

	}//post	
 ?>



<div class="cart-fill-wrap">


	<h2>Tuyệt vời, vui lòng nhập những thông tin dưới đây và chúng tôi sẽ chuyển hàng tới ngay cho bạn ! </h2>

	<div class="cart-fill">
		<form action="" method="post" accept-charset="utf-8">
			
		<label>
			Tên của bạn : 
			<input type="text" name="ten" />
		</label>		

		<label>
			Địa chỉ : 
			<input type="text" name="diachi" />
		</label>

		<label>
			
			Số điện thoại : 
			<input type="text" name="sdt" />
		</label>

		<label>
			Địa chỉ email : 
			<input type="text" name="email">
		</label>

		<button type="submit">Tiến hành thanh toán </button>

		</form>
	</div><!-- .cart-fill -->

</div>