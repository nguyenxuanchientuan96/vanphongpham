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
$hien_loi = false; // hien thi thong bao loi : true / false

		//language 
	require_once( "lang.php" );

	$conn = mysqli_connect( $host, $db_username, $db_password, $db_name);


	//end config 


	if( !$hien_loi ){
		ini_set("display_errors" , 0 );
	}

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

	function login_user($user,$password){

		global $conn;
		$sql = "SELECT id FROM dang_ky WHERE username='{$user}' AND password=('{$password}') ";

		if( $rs = mysqli_query( $conn , $sql) ){
			if( mysqli_num_rows($rs) > 0  ){
				$_SESSION["username"] = $user;
				return true;
			}
		}
		return false;
	};




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

	function validate_username( $username ){
		$pattern = "/(\s)+/";
		return !preg_match( $pattern, $username );
	}

	function validate_name( $name ){
		$name = trim($name);
		if( empty($name) ) return false;
		if( strlen( $name ) < 2  ) return false;
		$arrName = explode(" ", $name);

		foreach ($arrName as $v) {
			if( $v == "" )
				return false;
		}

		return true ; 
	}

	function validate_password($pass){
		return strlen($pass) > 6 ? true : false;
	}
	//end validate functions 

	function username_exists($username){
		global $conn;
		$sql = "SELECT id FROM dang_ky WHERE username='{$username}' ";
		return  mysqli_num_rows(mysqli_query( $conn , $sql )) > 0  ;

	}

	function email_exists( $email ){
		global $conn;
		$sql = "SELECT id FROM dang_ky WHERE email='{$email}' ";
		return  mysqli_num_rows(mysqli_query( $conn , $sql )) > 0  ;
	}




