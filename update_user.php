<?php

session_start();

$name = $_POST['new_name'];
$age = $_POST['new_age'];
$email = $_POST['new_email'];
$pw = $_POST['new_password'];
$user_id = $_SESSION['user_id'];



$servername = "mpcs53001.cs.uchicago.edu";
$username = "rgupta15";
$password = "rohit";
$database = "rgupta15DB";

$conn = mysqli_connect($servername,$username,$password,$database);
if (!$conn) {
	die("Connection failed: " .mysqli_connect_error());
}

$query = "call update_user('$user_id','$name','$age','$email','$pw')";
$result = mysqli_query($conn,$query) or die("Query failed ".mysqli_error());


?>