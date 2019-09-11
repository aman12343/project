
<?php
	include './common.php';
	$item_id = $_GET['id'];
	$user_id = $_SESSION['id'];
	$query = "insert INTO users_items(user_id, items_id, status) VALUES('$user_id', '$item_id', 'Added to cart')";
	$res = mysqli_query($con,$query) or die(mysqli_error($con));
	header('location: /products.php');
	exit;
?>