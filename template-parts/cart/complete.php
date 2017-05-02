<div style="padding:250px 0px;background-color: white">
	<div class="alert alert-success">
		<?php echo $CART_COMPLETE_MESSAGE ?>
	</div>
</div>

<?php 
	if( !empty($_SESSION["products"]) ){
		unset($_SESSION["products"]);
	}
 ?>