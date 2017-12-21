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
$cuisine = $_GET['cuisine'];

#$query = "SELECT name,streetAddress FROM restaurants WHERE city = '$city'";

$query = "call restaurants_by_cuisine('$cuisine','$city')";

$result = mysqli_query($conn,$query) or die("Query failed ".mysqli_error());

echo "<h3>Restaurants with your favorite cusine in ".$city."</h3>";

echo "<table>"; // start a table tag in the HTML
echo "<h1><tr><td>" . "Name" . "</td><td>" . "Address" . "</td></tr></h1>";
while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['name'] . "</td><td>" . $row['streetAddress'] . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML


?>
