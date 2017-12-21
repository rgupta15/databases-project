<?php
session_start();

date_default_timezone_set('UTC');

$hotel_id = $_GET['hotel_id'];
$check_in = $_GET['check-in'];
$check_out = $_GET['check-out'];
$city = $_SESSION['city'];
$user_id = $_SESSION['user_id'];

if ($check_out <= $check_in ) {
	# code...
	echo "Check-out date has to be after check-in date";
	exit;
}

$servername = "mpcs53001.cs.uchicago.edu";
$username = "rgupta15";
$password = "rohit";
$database = "rgupta15DB";

$conn = mysqli_connect($servername,$username,$password,$database);
if (!$conn) {
	die("Connection failed: " .mysqli_connect_error());
}

//check if valid reataurant id
$query = "call check_hotel_id('$hotel_id','$city')";
$result = mysqli_query($conn,$query) or die("Query failed ".mysqli_error());
if (mysqli_num_rows($result) == 0) {
	echo "You have entered incorrect restaurant id";
	exit;
}

$conn = mysqli_connect($servername,$username,$password,$database);
if (!$conn) {
	die("Connection failed: " .mysqli_connect_error());
}

$query = "call add_hotel_booking('$hotel_id','$check_in','$check_out','$user_id')";
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