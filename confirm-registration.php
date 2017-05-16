<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<?php session_start();
//READ ALL VARIABLES IN FROM REGISTER FORM
$username = $_POST["username"];
$password = $_POST["password"];
$password = md5($password);
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$zip = $_POST["zip"];

//CONNECT TO DATABASE
$conn=new PDO("mysql:host=localhost;dbname=admin_termproject;", "admin_termproj", "TermProject123");

//PREPARED STATEMENTS TO PROTECT AGAINST SQL INJECTION
$statement = $conn->prepare("INSERT INTO member(username,firstname,password,lastname,zipcode) VALUES (?,?,?,?,?)");
$statement->bindParam(1,$username);
$statement->bindParam(2,$first_name);
$statement->bindParam(3,$password);
$statement->bindParam(4,$last_name);
$statement->bindParam(5,$zip);
$statement->execute();


	// Save admin status (if 1 then admin if 0 or NULL or other not admin) from database in a session variable
    $_SESSION["username"] = $row["username"];
    $_SESSION["adminstatus"] = $row["isadmin"];
?>
<body>
	<?php
	echo "Thank you <b> $username </b> for registering your account.<br />";
	echo "<script> window.location.replace('https://project.egregiousenterprises.com/login.php');</script>";
	?>
</body>
</html>