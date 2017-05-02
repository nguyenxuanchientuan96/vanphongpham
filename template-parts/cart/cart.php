<?php 
	if( !isset( $_SESSION ) )
		session_start();

	if( empty( $_SESSION["products"] ) ){
		$_SESSION["products"] = array(); // nếu trống thì khởi tạo ! 
	}

	if( isset( $_GET["id"] )){
		$id = $_GET["id"];
	} 

	switch( $_GET["action"] ){

		//them san pham vao gio hang 
		case "add":


			$sql = "SELECT * FROM sp WHERE id={$id} LIMIT 1";
			$rs = mysqli_query($conn, $sql);
			$product = mysqli_fetch_array($rs, MYSQLI_ASSOC );

			if( empty($product) ){
				echo alert($CART_CHECKOUT_NOT_EXISTS);
				return;
			}

			$isExists = false;
			//check xem sản phẩm đã tồn tại chưa, nếu có thì tăng số lượng mua 1 lần
			for( $i = 0 ; $i < sizeof( $_SESSION["products"] ) ; $i++ ){		
				if( $_SESSION["products"][$i]["id"] == $id ){
					//tang so luong mua len 1 don vi ! 
					  !empty($_SESSION["products"][$i]["amount"]) ? $_SESSION["products"][$i]["amount"]++ :  $_SESSION["products"][$i]["amount"] = 1 ;
					$isExists = true;
					break;

				}
			}
			//nếu sản phẩm chưa tồn tại, add nó vào 
			if( !$isExists ){
				//thêm thuộc tính amount vào cho $product:
				$product["amount"] = 1 ;
				$_SESSION["products"] [] = $product;
			}

			redirect("index.php?r=cart&action=checkout");

		break;

		case "delete-one" : 
			//check xem san pham voi id đã tồn tại chưa, nếu rồi tiến hành xóa nó khỏi danh sách mua 

			for( $i = 0 ; $i < sizeof( $_SESSION["products"] ) ; $i++ ){

					if( $_SESSION["products"][$i]["id"] == $id ){
						//xóa khỏi $_SESSION["products"]
						unset( $_SESSION["products"][$i] );
					}
			}
			redirect("index.php?r=cart");
		break;


		case "delete-all":
			unset($_SESSION["products"]);
			redirect("index.php");
		break;

		case "checkout":
			require_once "checkout.php";
			break;


		case "fill" : 
		require_once "fill.php";
		break;

		
		case "complete"  :
		 require_once 'complete.php';
		 break;

		 
		default :
			require_once("checkout.php");		 	


	}
?>