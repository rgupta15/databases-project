<?php

session_start();
#echo $_POST['email'];

$name = $_POST['name'];
$age = $_POST['age'];
$email = $_POST['email'];
$pw = $_POST['password'];


$servername = "mpcs53001.cs.uchicago.edu";
$username = "rgupta15";
$password = "rohit";
$database = "rgupta15DB";

$conn = mysqli_connect($servername,$username,$password,$database);
if (!$conn) {
	die("Connection failed: " .mysqli_connect_error());
}

if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

	$query = "call check_user('$email')";
	$result = mysqli_query($conn,$query) or die("Query failed ".mysqli_error());

	if (mysqli_num_rows($result) != 0) 
	{
	echo "Email already exists with another user. Sign up with different email";
	exit;
	}
	else
	{
		$conn = mysqli_connect($servername,$username,$password,$database);
		if (!$conn) {
			die("Connection failed: " .mysqli_connect_error());
		}
		$query = "call insert_user('$name','$age','$email','$pw')";
		$result = mysqli_query($conn,$query) or die("Query failed ".mysqli_error());

	}
	

} else {
    echo "Email address '$email' is considered invalid.\n";
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Success</title>
</head>
<body>
	<h2>Sign up is succesfful and you are now considered an existing user</h2>
	<a href="SemiFinal.html">Log In</a>
</body>
</html>