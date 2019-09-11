<?php
	function check_if_added_to_cart($item_id){
		$con  = mysqli_connect("localhost","shashi","shashi","base01")
		or die(mysqli_error($con));

	session_start();
		$user_id = $_SESSION["id"];
		$query = "select * FROM users_items WHERE items_id=$item_id AND user_id =$user_id and status='Added to cart'";
		$response = mysqli_query($con,$query);
		ini_set("log_errors", 1);
		ini_set("error_log", "/tmp/php-error.log");
		$res = mysqli_num_rows($response);
		error_log($res);
		if($res>=1){
			return 1;
		} else{
			return 0;
		}
	}
?>