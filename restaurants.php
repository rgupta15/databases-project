<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>restaurants</title>
</head>
<body>
	<h3>Your options</h3>
		<a href="all_restaurants.php">All restarants in <?php echo $_SESSION['city'] ?></a><br><br>
		<a href="fav_cuisine.php">Restaurant by your favorite cuisine</a><br><br>
		<a href="my_reviews.php">My past reviews</a><br><br>
		<a href="write_review.php">Write new review</a><br><br>
		<a href="delete_review.php">Delete your review</a><br><br>
		<a href="my_reservations.php">See my reservations</a><br><br>
		<a href="restaurant_reservation.php">Make restaurant reservation</a>
</body>
</html>
