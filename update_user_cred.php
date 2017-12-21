<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Add new credentials</title>
</head>
<body>
	<form action = "update_user.php" method="POST">
		New Name: <br>
		<input type="text" name="new_name"><br>
		New Age: <br>
		<input type="number" name="new_age" min = "18"><br>
		New Email: <br>
		<input type="email" name="new_email" placeholder="Valid email address required"><br>
		New Password: <br>
		<input type="password" name="new_password"><br>
		<input type="submit" name="submit">
	</form>
</body>
</html>