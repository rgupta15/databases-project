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
	<form action="restaurants_by_cusine.php" method = "GET">
		<input type="radio" name="cuisine" value = "IND" checked="checked">INDIAN<br>
		<input type="radio" name="cuisine" value = "MEX">MEXICAN<br>
		<input type="radio" name="cuisine" value = "CHI">CHINESE<br>
		<input type="radio" name="cuisine" value = "ITA">ITALIAN<br>
		<input type="radio" name="cuisine" value = "GRE">GREEK<br>
		<input type="radio" name="cuisine" value = "AME">AMERICAN<br>
		<input type="submit" value="Submit">
	</form>
</body>
</html>
