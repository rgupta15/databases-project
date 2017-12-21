<?php
session_start();

date_default_timezone_set('UTC');

$concert_id = $_GET['concert_id'];
$num_tix = $_GET['num_tix'];
$city = $_SESSION['city'];
$user_id = $_SESSION['user_id'];

$servername = "mpcs53001.cs.uchicago.edu";
$username = "rgupta15";
$password = "rohit";
$database = "rgupta15DB";

$conn = mysqli_connect($servername,$username,$password,$database);
if (!$conn) {
	die("Connection failed: " .mysqli_connect_error());
}

//check if valid reataurant id
$query = "call check_concert_id('$concert_id','$city')";
$result = mysqli_query($conn,$query) or die("Query failed ".mysqli_error());
if (mysqli_num_rows($result) == 0) {
	echo "You have entered incorrect concert id";
	exit;
}

$conn = mysqli_connect($servername,$username,$password,$database);
if (!$conn) {
	die("Connection failed: " .mysqli_connect_error());
}

$query = "call add_concert_booking('$concert_id','$user_id','$num_tix')";
$result = mysqli_query($conn,$query) or die("Query failed ".mysqli_error());

echo "Hotel Reservation sucessful";


?>

<!DOCTYPE html>
<html>
<head>
	<title>add reservation</title>
</head>
<body>
	<br><br>
	<a href="restaurants.php">Back to all restaurants</a>
</body>
</html>