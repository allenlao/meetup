<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-12">
	<?php

//First bits to post the location of event
$street = $_POST['street'];
$city = $_POST['city'];
$latitude = $_POST['latitude'];
$longtitude = $_POST['longtitude'];

//second to post event 
$e_title = $_POST['e_title'];
$description = $_POST['description'];
$start_time = $_POST['start_time'];	
$end_time = $_POST['end_time'];	
$lname = $_POST['lname'];	
$zip = $_POST['zip'];	
$group_id = $_POST['group_id'];	



if (isset($_SESSION["authorized"]) == 1)
{
  //user is admin and can see page + make a new event
  echo "ADMIN: " . $_SESSION["username"] . "<br>";
?>


<?php 
$servername = "localhost";
$username = "admin_termproj";
$password = "TermProject123";
$dbname = "admin_termproject";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO location(lname, zip, street, city, description, latitude, longitude) VALUES ('". $lname ."', '". $zip ."', '".$street."', '".$city."', '". $description ."', '". $latitude ."', ". $longtitude.")";

$result = $conn->query($sql); 


$sql = "INSERT INTO events(title, description, start_time, end_time, group_id, lname, zip) VALUES ('". $e_title ."', '". $description ."', '".$start_time."', '".$end_time."', ". $group_id .", '". $lname ."', ". $zip.")";
  
$result = $conn->query($sql); 
?>

	<p>Success.</p>


<?php 
}
elseif (isset($_SESSION["username"]))
{
  //LOGGED IN USER BUT NOT ADMIN
  echo "You do not have sufficient privilledges to view this page";
}
else
{
  //NO LOGGED IN USER
	echo "You are not authorized to view this page";
}
?>

</div>
</div>
</div>

</body>
</html>