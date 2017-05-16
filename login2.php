<?php
	session_start();
	?>

<html>
<head>
<title> Login | </title>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php
//Read in username and password from id's in previous login.html form 
$un = $_POST["username"];
$pw = $_POST["password"]; 
$pw = md5($pw);




//CONNECT TO DATABASE
$conn=new PDO("mysql:host=localhost;dbname=admin_termproject;", "admin_termproj", "TermProject123");


$login_attempt="SELECT authorized FROM belongs_to WHERE username=?";
$statement = $conn->prepare($login_attempt);

$statement->bindParam(1,$un);
$statement->execute();
$row = $statement->fetch();
if($row==false)
	{
		//No matching username and password in database
		echo $row; 
	}
	
	else
	{

	// Save admin status from database in a session variable
    $_SESSION["username"] = $row["username"];
    $_SESSION["authorized"] = $row["authorized"];
	echo $_SESSION["authorized"];
	}

?>





<?php $login_attempt="SELECT username, password FROM member WHERE username=? AND password=?";
$statement = $conn->prepare($login_attempt);

$statement->bindParam(1,$un);
$statement->bindParam(2,$pw);
$statement->execute();
$row = $statement->fetch();
if($row==false)
	{
		//No matching username and password in database
		echo "Invalid Login."; 
	}
	
	else
	{

	// Save admin status (if 1 then admin if 0 or NULL or other not admin) from database in a session variable
    $_SESSION["username"] = $row["username"];
	
	//send logged in user to homepage
	echo '<br>' . $_SESSION['username'];
	echo "<script> window.location.replace('https://project.egregiousenterprises.com');</script>";
	
	}


?>
