

<?php 
	if( empty($_SESSION) ){
		session_start();
	} 
?>
<?php require_once("template-parts/head.php");  ?>
<?php require_once("template-parts/header.php");?>
<?php require_once("template-parts/menu.php");?>

<?php require_once("../inc/lib.php"); ?>
<body>		
	<!-- start body  -->
		<div class="body">
<?php 
	if(  isset($_POST["submit"])){
		$username = mysqli_real_escape_string($conn, $_POST["username"]);
		$password = mysqli_real_escape_string($conn, $_POST["password"] );

		if( login( $username , $password  ) ){
			$_SESSION["username"] = $username;
			redirect("index.php?r=admin");
		}else{
			echo alert("Sai mật khẩu hoặc tên tài khoản ! " , "alert-error");
		}
	}
?>
		
			<h2 class="alert alert-success" style="color: red">Bạn phải đăng nhập để vào trang quản trị</h2>
			<div class="form">
				<form  method="post">
				
					<h2 style="padding-bottom: 10px;">Tên tài khoản</h2>
					<input type="text" name="username" />
					
					<h2 style="padding-bottom: 10px;">Mật khẩu</h2>
					<input type="password" name="password" class="textarea">


					<br/>
					<input type="submit" name="submit" class="btn btn-submit" value="Đăng nhập" style="background-color: #F36F36" />
				</form>

			</div><!--form-->

		</div>
	<!-- end body -->


		<!-- start footer -->
		<?php require_once("template-parts/footer.php");?>
		<!-- end footer -->
</body>

</html>