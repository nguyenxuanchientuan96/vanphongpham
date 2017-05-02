<?php 



	//config 
	
	$home_url = "http://localhost/TLT" ; //nhập home url vào đây 
	$appRoot = dirname(dirname(__FILE__));

		//db config 
	$host = "localhost";
	$db_username = "root";
	$db_password = ""; 
	$db_name = "vpp"; //database name
		//end db config 


		//language 
	require_once( "lang.php" );

	$conn = mysqli_connect( $host, $db_username, $db_password, $db_name);


	//end config 

	if( !$conn ){
		echo "<h1>Có lỗi xảy ra khi kết nối db </h1>";
		die;
	}else{
		mysqli_set_charset($conn, "utf8");
	}

	function alert($content , $type= "alert-success"){
		return "<div class='alert {$type}'>{$content}</div>";
	}

	function redirect($url){
		return header("Location: " . $url);
	}

	function get_menu_name_by_id($id){
		global $conn;
		$rs = mysqli_query($conn,  "SELECT name FROM menu WHERE id = {$id} ");
		$name =  mysqli_fetch_object($rs);
		if (!empty($name->name) ){
			return $name->name;
		}else{
			return "---";
		}
	}

	function logged_in(){
		return empty($_SESSION["username"]) ? false : true;
	}

	function login($user,$password){

		global $conn;
		$sql = "SELECT id FROM user WHERE username='{$user}' AND password=md5('{$password}') ";

		if( $rs = mysqli_query( $conn , $sql) ){
			if( mysqli_num_rows($rs) > 0  ){
				$_SESSION["username"] = $user;
				return true;
			}
		}
		return false;
	}




// lay config theo key trong bang config ;
	function get_config($id){
		global $conn;
		$sql = "SELECT v FROM config WHERE k='{$id}' ";
		if( $rs = mysqli_query( $conn , $sql ) ){
			$content =  mysqli_fetch_array($rs, MYSQLI_ASSOC);
			return $content["v"];
		}
		return false;
	}


	function vnd_format($money){
		return number_format( intval($money) );
	}

	//validate functions 

	function validate_phone($phone){
		$pattern = "/^\+84[0-9]+|[0-9]+$/";
		return preg_match($pattern, $phone);
	}

	function validate_email( $email ){
		$pattern = "/^\S+@gmail\.com|hotmail\.com|yahoo\.com$/";
		return preg_match($pattern, $email);
	}

	function validate_username( $name ){
		$pattern = "/^([a-zA-Z]+){2}$/";
		return preg_match( $pattern, $name );
	}

	//end validate functions 




