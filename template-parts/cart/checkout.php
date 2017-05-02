<?php 
	if(empty($_SESSION))
	session_start();



	if( isset($_GET["type"]) && $_GET["type"] == "complete" ){
		echo alert($CART_CHECKOUT_SUCCESS);
		return;
	}
	
	if( empty( $_SESSION["products"]) ){
		echo alert($CART_CHECKOUT_EMPTY);
		return;
	}	


	$products = $_SESSION["products"];

	$total = 0 ;

	for( $i = 0 ; $i < sizeof( $products ) ; $i++ ){
		$total += $products[$i]["price"] * $products[$i]["amount"];
	}



 ?>

 <table class="table">

 	<caption class="alert alert-success">Thanh toán</caption>
 	<thead>
 		<tr>
 			<th>Hình ảnh</th>
 			<th>Tên</th>
 			<th>Số lượng</th>
 			<th>Đơn giá</th>
 			<th>Thành tiền</th>
 			<th>mua thêm</th>
 			<th style="color:red">Xóa</th>
 		</tr>
 	</thead>


 	<tbody>
 		<?php
 			 for( $i = 0 ; $i < sizeof( $products ) ; $i++ ): 
 			 		$p = $products[$i];
 		?>

 		<tr>
 			<td><img class="avatar" src="upload/<?php echo $p['avatar']; ?>"/></td>
 			<td><?php echo $p["name"];?></td>
 			<td><?php echo $p["amount"]; ?></td>
 			<td> <?php  echo vnd_format($p["price"])." VND"; ?> </td>
 			<td> <?php  echo vnd_format( $p["price"] * $p["amount"]); ?> VND </td>
 			<td><a class=" btn-checkout" href="index.php?r=cart&action=add&id=<?php echo $p['id']; ?>" title="Mua thêm một sản phẩm nữa">+1</a></td>
 			<td><a style="color:red" href="index.php?r=cart&action=delete-one&id=<?php echo $p['id']; ?>" title="Xóa sản phẩm này" onclick="return confirm('bạn chắc chứ !?')">xóa</a></td>
 			<td></td>
 		</tr>

 	<?php endfor;?>

 	<tr class="checkout-footer"> 
 		<td>Thành tiền: </td>
 		<td><?php echo vnd_format($total); ?> VND</td>
	 	<td style="min-width:300px"><a href="index.php?r=cart&action=fill" class="btn btn-checkout"><?php echo $CART_BTN_PROCESS_CHECKOUT ?> </a></td>
	</tr>
 	</tbody>
 	
 </table>

