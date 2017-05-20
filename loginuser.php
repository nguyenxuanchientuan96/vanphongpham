<?php 
	if( empty($_SESSION) ){
		session_start();
	} 
?>  

<?php require_once("template-parts/head.php");  ?>
<?php require_once("template-parts/header.php");?>
<?php require_once("template-parts/menu.php");?>

<?php require_once("inc/lib.php"); ?>
<body>		
	<!-- start body  -->
	
		<div class="body">
<?php 
	if(  isset($_POST["submit"])){
		$username = mysqli_real_escape_string($conn, $_POST["username"]);
		$password = mysqli_real_escape_string($conn, $_POST["password"] );

		$sql2="SELECT * FROM dangkithanhvien where password={$password}";
		$rs2=mysqli_query($conn,$sql2);
		$row2=mysqli_fetch_array($rs2,MYSQLI_ASSOC);
		if($row2){
				$_SESSION["name"] = $username;
				echo "Đăng nhập thành công";
				
			

		
		}
		else{
			echo alert("that bai");
		}
	}

?>
<a href="index.php?row=<?php echo $row2['id']; ?>"> Trang chủ</a>

		
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