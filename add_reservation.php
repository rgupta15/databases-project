<?php
session_start();


$rest_id = $_GET['rest_id'];
$party_size = $_GET['party_size'];
$city = $_SESSION['city'];
$date_time = $_GET['date_time'];
$user_id = $_SESSION['user_id'];


date_default_timezone_set('UTC');
$date_time = date("Y-m-d H:i:s",strtotime($date_time));


$servername = "mpcs53001.cs.uchicago.edu";
$username = "rgupta15";
$password = "rohit";
$database = "rgupta15DB";

$conn = mysqli_connect($servername,$username,$password,$database);
if (!$conn) {
	die("Connection failed: " .mysqli_connect_error());
}

//check if valid reataurant id
$query = "call check_rest_id('$rest_id','$city')";
$result = mysqli_query($conn,$query) or die("Query failed ".mysqli_error());
if (mysqli_num_rows($result) == 0) {
	echo "You have entered incorrect restaurant id";
	exit;
}

$conn = mysqli_connect($servername,$username,$password,$database);
if (!$conn) {
	die("Connection failed: " .mysqli_connect_error());
}

$query = "call add_restaurant_reservation('$rest_id','$party_size','$user_id','$date_time')";
$result = mysqli_query($conn,$query) or die("Query failed ".mysqli_error());

echo "Reservation sucessful";

//if not valid print error msg and exit 

//if valid then add review to db 

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