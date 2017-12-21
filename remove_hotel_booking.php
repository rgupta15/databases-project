<?php
session_start();


$hb_id = $_GET['hb_id'];
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
$query = "call check_hb_id('$user_id','$city','$hb_id')";
$result = mysqli_query($conn,$query) or die("Query failed ".mysqli_error());
if (mysqli_num_rows($result) == 0) {
	echo "You have entered incorrect review id";
	exit;
}

$conn = mysqli_connect($servername,$username,$password,$database);
if (!$conn) {
	die("Connection failed: " .mysqli_connect_error());
}

$query = "call delete_hotel_booking('$hb_id')";

$result = mysqli_query($conn,$query) or die("Query failed ".mysqli_error());

echo "Delete sucessful";

//if not valid print error msg and exit 

//if valid then add review to db 

?>

<!DOCTYPE html>
<html>
<head>
	<title>add review</title>
</head>
<body>
	<br><br>
	<a href="hotels.php">Back to hotels</a>
</body>
</html>