<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Fav Cusine</title>
</head>
<body>
	<h3>Please Select Your Favorite Cuisine</h3><br>
	<form action="concert_by_fav_genre.php" method = "GET">
		<input type="radio" name="genre" value = "EDM">Electronic Dance Music<br>
		<input type="radio" name="genre" value = "Rock">Rock<br>
		<input type="radio" name="genre" value = "Pop">Pop<br>
		<input type="radio" name="genre" value = "HipHop">HipHop<br>
		<input type="submit" value="Submit">
	</form>
</body>
</html>