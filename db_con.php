<?php

$servername = "mpcs53001.cs.uchicago.edu";
$username = "rgupta15";
$password = "rohit";
$database = "rgupta15DB";

$conn = mysqli_connect($servername,$username,$password,$database);

if (!$conn) {
	# code...
	die("Connection failed: " .mysqli_connect_error());
}

echo "connected successfully";

$query = 'SELECT name FROM restaurants WHERE city = "LA"';

$result = mysqli_query($conn,$query);

while ($tuple = mysqli_fetch_row($result)) {
	echo $tuple[0];
	echo "\n";
}

?>
