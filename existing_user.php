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

$user_email = $_POST['email'];
$user_pw = $_POST['password'];


#$query = "SELECT * FROM user WHERE email = '$user_email' AND password = '$user_pw' ";
$query = "call return_user('$user_email','$user_pw')";

$result = mysqli_query($conn,$query) or die("Query failed ".mysqli_error());


if (mysqli_num_rows($result) == 0) {
	echo "User and password incorrect";
	exit;
}

while ($tuple = mysqli_fetch_array($result)) {
	echo "welcome ".$tuple['name'];
	$user_id = $tuple['user_id'];
	$_SESSION['user_id'] = $user_id;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title> Successful Sign In</title>
</head>
<body>
	<form action = "successful_sign_in.php" method= 'GET'>
		<br>Current Location ? <br>
		<input type="radio" name="city" value = "NYC" checked="checked">New York City<br>
		<input type="radio" name="city" value = "LA">Los Angeles<br>
		<input type="radio" name="city" value = "Chicago">Chicago<br>
		<input type="radio" name="city" value = "SF">San Francisco<br>
		<input type="submit" value="Submit">
	</form>
	<form action = "update_user_cred.php">
		<input type="submit" value="update user credentials">
	</form>
	<?php 
	#$_POST["user_id"] = $user_id;

	?>
</body>
</html>
