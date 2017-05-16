<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title> Logout </title>
	</head>
	<body>
		<?php 
		echo 'You have been logged out.<br /><a href="index.php">Return Home</a>';

session_destroy();

echo "<script> window.location.replace('https://project.egregiousenterprises.com/login.php');</script>";
?>


</body>
</html>