<?php
$con = mysqli_connect('localhost','phpmyadmin','root','login');
if($con)
{
	// echo "Connected";
}
else
{
	echo "COuld not connect" . mysqli_error();
}





?>