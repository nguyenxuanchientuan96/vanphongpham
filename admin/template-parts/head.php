<?php 
	if( empty($_SESSION) )
		@session_start();

?>
<html>
<head>
	<meta charset="utf-8" />
	<title>admin</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<script src="plugins/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="plugins/hienAnh/prettyPhoto.css" />
	<script src="plugins/hienAnh/jquery.prettyPhoto.js"></script>
	<script src="plugins/tinymce/tinymce.min.js"></script>
	<script src="js/custom.js"></script>
	<?php echo("<script>window.homeUrl = '{$home_url}'</script>");  ?>

</head>
