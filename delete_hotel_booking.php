<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>make hotel reservation</title>
</head>
<body>
	<h3>You can delete one of the following bookings</h3>
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
	$user_id = $_SESSION['user_id'];

	$query = "call get_hotel_bookings('$user_id','$city')";

	$result = mysqli_query($conn,$query) or die("Query failed ".mysqli_error());
	if (mysqli_num_rows($result) == 0) {
	echo "You do not have any hotel reservations";
	echo"<a href = 'hotels.php'>Back to hotels</a>";
	exit;
	}

	echo "<h3>Your hotel bookings in  ".$city."</h3>";

	echo "<table>"; // start a table tag in the HTML
	echo "<h1><tr><td>" . "ID" . "</td><td>" . "Name" . "</td><td>" . "Check-In" . "</td><td>" . "Check-Out" . "</td></tr></h1>";
	while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
	echo "<tr><td>" . $row['booking_id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['check_in'] . "</td><td>" . $row['check_out'] . "</td></tr>";  //$row['index'] the index here is a field name
	}

	echo "</table>";
	//echo "hello";
	?>

	<form action="remove_hotel_booking.php" method="GET">
		Booking ID:<br>
		<input type="number" name="hb_id"><br>
		<input type="submit" name="delete booking">
	</form>
</body>
</html>