<?php
$localhost ="localhost";
$username ="root";
$password ="";
$db       = "board";

$con = mysqli_connect($localhost,$username,$password,$db);
 // echo "connected";
if (mysqli_connect_error()) {
	echo "Failed to connect".mysqli_connect_error();
}