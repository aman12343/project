
<?php
include('./common.php');
$id=$_GET['id'];
$user_id=$_SESSION['id'];
$query="delete from users_items where id='$id'";
$res=mysqli_query($con,$query);
header("location: /cart.php");
?>