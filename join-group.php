<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <?php

$group_id = $_POST["group_id"];  
echo $group_id;

if (isset($_SESSION["authorized"]) == 1)
{
  echo "ADMIN USER: " . $_SESSION["username"] . "<br>";
  $isadmin = 1;
}
elseif (isset($_SESSION["username"]))
{
  echo "USER: " . $_SESSION["username"] . "<br>";
  $isadmin = 0;
}
else
{
  echo "NO LOGGED IN USER";
  $isadmin = 0;
}
?>


<?php

if(!isset($_SESSION['username'])){
  echo "<p>You cannot make a booking if you are not logged in.</p>";
  echo "<p>Login in <a href='login.php'>here</a></p>";
}

 else {
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

$sql = "INSERT INTO belongs_to(group_id, username, authorized) VALUES ( ". $group_id .", '" . $_SESSION['username'] ."',".$isadmin.")";
  echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "You have successfully joined.";
} else {
    //echo "0 results";
}
}
?>