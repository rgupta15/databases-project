<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>write review</title>
</head>
<body>
	<h3>You can review the following restaurants</h3>
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

	$query = "call all_restaurants('$city')";

	$result = mysqli_query($conn,$query) or die("Query failed ".mysqli_error());

	echo "<h3>All restaurants in ".$city."</h3>";

	echo "<table>"; // start a table tag in the HTML
	echo "<h1><tr><td>" . "ID" . "</td><td>" . "Name" . "</td></tr></h1>";
	while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
	echo "<tr><td>" . $row['restaurant_id'] . "</td><td>" . $row['name'] . "</td></tr>";  //$row['index'] the index here is a field name
	}

	echo "</table>";
	//echo "hello";
	?>

	<form action="add_review.php" method="GET" id = "review_form">
		Restaurant ID:<br>
		<input type="number" name="rest_id"><br>
		Rating: <br>
		<input type="number" name="rating" min="1" max="5"><br>
		Comments: <br>
		<textarea name = "review" cols="40" rows="5" id ="review_form" >Enter your comments here..</textarea><br>
		<input type="submit" name="submit">
	</form>
</body>
</html>