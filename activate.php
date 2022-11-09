<?php
session_start();
include'db.php';
$token = $_GET['token'];
if (isset($token)) {
	

$query = "SELECT * FROM user WHERE token = '$token' LIMIT 1";

$result = mysqli_query($con,$query);
$update_query= "UPDATE user SET status = 'active' WHERE token = '$token'";
$update_query_run=mysqli_query($con,$update_query);
if ($update_query_run) {
	header('location:index.php');
}

}
?>