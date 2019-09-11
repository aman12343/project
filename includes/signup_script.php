<?php
	include "./common.php";
	$name = mysqli_real_escape_string($con,$_POST["name"]);
	$email = mysqli_real_escape_string($con,$_POST["e-mail"]);
	$password = md5(mysqli_real_escape_string($con,$_POST["password"]));
	$contact = mysqli_real_escape_string($con,$_POST["contact"]);
	$city = mysqli_real_escape_string($con,$_POST["city"]);
	$address = mysqli_real_escape_string($con,$_POST["address"]);
	$query = "select email from users where email='$email'";
	$response = mysqli_query($con,$query) or die(mysqli_error($con));
	$row = mysqli_num_rows($response);
	if($row>0){
		header("Location: /signup.php");
	} else{
		$query = "insert into users(name,email,password,contact,city,address) values('$name','$email','$password',$contact,'$city','$address')";
		$response = mysqli_query($con,$query) or die(mysqli_error($con));
		$_SESSION["id"] = mysqli_insert_id($con);
		session_start();
		$_SESSION["email"] = $email;
		header("location: /products.php");
	}