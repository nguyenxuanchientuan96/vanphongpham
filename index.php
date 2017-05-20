<?php
 require_once "inc/lib.php"; ?>
<?php require_once("template-parts/head.php");  ?>
<?php require_once("template-parts/header.php");?>
<?php echo("<script>window.homeUrl = '{$home_url}'</script>"); ?>
<?php require_once 'template-parts/menu.php'; ?>
<body>		
	<!-- start body  -->
		<div class="body">	

			<?php 
			if( isset($_GET["r"]) ){
				switch( $_GET["r"] ){
					case "single":
						include "template-parts/single.php";
						// include "template-parts/body-right.php";
						break;

					case "cart" : 
						include "template-parts/cart/cart.php";
						break;


					case "category" : 
						include "template-parts/category.php";
						break;

						
					case "about":
						include 'about.php';
						break;
					case "registeruser":
						include 'registeruser.php';
						break;
					case "loginuser":
						include 'loginuser.php';
						break;
					case "thongtin":
						include 'thongitn.php';
						break;

					
					default : 
						include 'template-parts/home.php';


				}
			}else

			if( isset($_GET["s"]) ){
				include "template-parts/search.php";
			}else{
				include 'template-parts/home.php';
			}

			?>

		</div>
	<!-- end body -->


		<!-- start footer -->
		<?php require_once("template-parts/footer.php");?>
		<!-- end footer -->
</body>

</html>