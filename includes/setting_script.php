<?php
	require './common.php';
	if(!isset($_SESSION['email'])){
		header("location: /index.php");
		exit();
	}
	$user_email = $_SESSION['email'];
	$old_password = md5($_POST['old-password']);
	$password = md5($_POST['password']);
	$password1 = md5($_POST['password1']);
	$query = "select password from users where email='$user_email'";
	$response = mysqli_query($con,$query) or die(mysqli_error($con));
	$res = mysqli_fetch_array($response);
	$pass = $res['password'];
	if(strcmp($pass,$old_password)==0){
		if(strcmp($password,$password1)==0){
			$query = "update users set password='$password' where id='$user_id'";
			$res = mysqli_query($con,$query);
			echo "password changed";
			header('location: /products.php');
		}
		else{
			header('location: /settings.php');
		}	
	} 
	else{
		header('location: /settings.php');
	} 
?>