<?php
session_start();

#echo $_SESSION['user_id'];

$_SESSION['city'] = $_GET['city'];

?>

<!DOCTYPE html>
<html>
<head>
	<title>options</title>
</head>
<body>
	<h2>Welcome to <?php echo $_GET['city'] ?></h2>
	<ul>
		<li><a href="restaurants.php">Restaurants</a></li><br>
		<li><a href="hotels.php">Hotels</a></li><br>
		<li><a href="concerts.php">Concerts</a></li>
	</ul>
</body>
</html>