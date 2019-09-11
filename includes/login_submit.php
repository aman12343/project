<?php

$con  = mysqli_connect("localhost","shashi","shashi","base01")
		or die(mysqli_error($con));

$email = mysqli_real_escape_string($con,$_POST["e-mail"]);
$password = md5($_POST["password"]);
$query = "select * from users where email = '$email' and password = '$password'";
$response = mysqli_query($con,$query) 
			or die(mysqli_error($con));
$row = mysqli_fetch_array($response);
if(mysqli_num_rows($response)==0){
	echo "no user available with this data";
} else {
	session_start();
	$_SESSION['id'] = $row['id'];
	$_SESSION['email'] = $email;
	
	header("location: /products.php");
	}
	 //echo "<a href='../products.php'>clik to redirect</a>";
?>