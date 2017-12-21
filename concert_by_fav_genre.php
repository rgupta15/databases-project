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
$genre = $_GET['genre'];

#$query = "SELECT name,streetAddress FROM restaurants WHERE city = '$city'";

$query = "call concert_by_genre('$genre','$city')";

$result = mysqli_query($conn,$query) or die("Query failed ".mysqli_error());

if (mysqli_num_rows($result) == 0) {
	echo "There are no concerts in $genre genre in $city at the moment";
	exit;
}

echo "<h3>Concerts with your favorite genre in ".$city."</h3>";

echo "<table>"; // start a table tag in the HTML
echo "<h1><tr><td>" . "Artist" . "</td><td>" . "Date" . "</td></tr></h1>";
while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['artist'] . "</td><td>" . $row['date_time'] . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML


?>
