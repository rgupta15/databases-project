<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>make concert booking</title>
</head>
<body>
	<h3>You can make book tickets for one the following concerts</h3>
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

	$query = "call all_concerts('$city')";

	$result = mysqli_query($conn,$query) or die("Query failed ".mysqli_error());

	echo "<h3>All concerts in ".$city."</h3>";

	echo "<table>"; // start a table tag in the HTML
	echo "<h1><tr><td>" . "ID" . "</td><td>" . "Artist" . "</td><td>" . "date" . "</td></tr></h1>";
	while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
	echo "<tr><td>" . $row['concert_id'] . "</td><td>" . $row['artist'] . "</td><td>" . $row['date_time'] . "</td></tr>";  //$row['index'] the index here is a field name
	}

	echo "</table>";
	//echo "hello";
	?>

	<form action="add_concert_booking.php" method="GET">
		Concert ID:<br>
		<input type="number" name="concert_id"><br>
		Number of Tickets: <br>
		<input type="number" name="num_tix"><br>
		<input type="submit" name="submit">
	</form>
</body>
</html>
