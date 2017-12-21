<?php
session_start();

$servername = "mpcs53001.cs.uchicago.edu";
$username = "rgupta15";
$password = "rohit";
$database = "rgupta15DB";

$conn = mysqli_connect($servername,$username,$password,$database);
if (!$conn) {
	die("Connection failed: " .mysqli_connect_error());
}



$city = $_SESSION['city'];
$user_id = $_SESSION['user_id'];

#$query = "SELECT name,streetAddress FROM restaurants WHERE city = '$city'";

$query = "call show_reservations('$user_id','$city')";

$result = mysqli_query($conn,$query) or die("Query failed ".mysqli_error());

if (mysqli_num_rows($result) == 0) {
	echo "You haven't made any restaurant reservations in $city ";
	exit;
}

echo "<h3>Your reservations</h3>";

echo "<table>"; // start a table tag in the HTML
echo "<h1><tr><td>" . "Name" . "</td><td>" . "Date" . "</td><td>" . "Party Size" . "</td></tr></h1>";
while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['name'] . "</td><td>" . $row['date_time'] . "</td><td>" . $row['num_people'] . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>";



?>


