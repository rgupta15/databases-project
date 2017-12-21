<?php
session_start();


$rest_id = $_GET['rest_id'];
$review = $_GET['review'];
$city = $_SESSION['city'];
$rating = $_GET['rating'];
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

$query = "call add_review('$rest_id','$city','$rating','$user_id','$review')";
$result = mysqli_query($conn,$query) or die("Query failed ".mysqli_error());

echo "Review sucessful";

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
	<a href="restaurants.php">Back to all restaurants</a>
</body>
</html>