<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>make hotel reservation</title>
</head>
<body>
	<h3>You can make a reservation at one of the following restaurants</h3>
	<?php
	#session_start();

	$servername = "mpcs53001.cs.uchicago.edu";
	$username = "rgupta15";
	$password = "rohit";
	$database = "rgupta15DB";
	$conn = mysqli_connect($servername,$username,$password,$database);
	if (!$conn) {
		die("Connection failed: " .mysqli_connect_error());
	}

	$city = $_SESSION['city'];

	$query = "call all_hotels('$city')";

	$result = mysqli_query($conn,$query) or die("Query failed ".mysqli_error());

	echo "<h3>All hotels in ".$city."</h3>";

	echo "<table>"; // start a table tag in the HTML
	echo "<h1><tr><td>" . "ID" . "</td><td>" . "Name" . "</td></tr></h1>";
	while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
	echo "<tr><td>" . $row['hotel_id'] . "</td><td>" . $row['name'] . "</td></tr>";  //$row['index'] the index here is a field name
	}

	echo "</table>";
	//echo "hello";
	?>

	<form action="add_hotel_booking.php" method="GET">
		Hotel ID:<br>
		<input type="number" name="hotel_id"><br>
		Check-In Date: <br>
		<input type="date" name="check-in"><br>
		Check-Out Date: <br>
		<input type="date" name="check-out"><br>
		<input type="submit" name="submit">
	</form>
</body>
</html>