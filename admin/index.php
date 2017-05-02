<?php
 require_once("../inc/lib.php"); ?>

<?php require_once("template-parts/head.php");  ?>
<?php require_once("template-parts/header.php");?>
<?php require_once("template-parts/menu.php");?>
<body>		
	<!-- start body  -->
		<div class="body">

		<?php 		
		if( !logged_in() )
			redirect("login.php?r=login");

		if( isset( $_GET["r"] ) )
					switch( $_GET["r"] ){
						case "add-sp":
						include_once 'add-sp.php';
						break;

						case "add-menu":
						include_once "add-menu.php";
						break;

						case "add-config" : 
						include_once 'add-config.php';
						break;

						case "edit-sp":
						include_once "edit-sp.php";
						break;

						case "edit-menu":
						include_once 'edit-menu.php';
						break;

						case "edit-config";
						include_once 'edit-config.php';
						break;

						case "delete":
						include_once 'delete.php';
						break;

						case "list-config" :
						include_once 'list-config.php';
						break;

						case "list-sp":
						include "list-sp.php";
						break;

						case "list-menu":
						include 'list-menu.php';
						break;

						case "list-config" :
						include "list-config.php";
						break;


						case "list-user" : 
							include("list-user.php");
							break;

						case "edit-user":
							include("edit-user.php");
						break;

						case "add-user":
						include 'add-user.php';
						break;



						case "login":
						include 'login.php';
						break;

						case "logout":
							if(!empty($_SESSION))
							session_destroy();
						include "login.php";
						break;



						default:
						include_once 'list-sp.php';
					}
			else 
				include_once 'list-sp.php';

		?>
		</div>
	<!-- end body -->


		<!-- start footer -->
		<?php require_once("template-parts/footer.php");?>
		<!-- end footer -->
</body>

</html>
