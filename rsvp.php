<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <?php

$event_id = $_POST['event_id'];

if (isset($_SESSION["authorized"]) == 1)
{
  echo "ADMIN USER: " . $_SESSION["username"] . "<br>";
}
elseif (isset($_SESSION["username"]))
{
  echo "USER: " . $_SESSION["username"] . "<br>";
}
else
{
  echo "NO LOGGED IN USER";
}
?>


<?php

if(!isset($_SESSION['username'])){
  echo "<h2>You cannot make a booking if you are not logged in.</h2>";
  echo "<p>Login in <a href='login.php'>here</a></p>";
  echo "<p><a href='index.php'>Go Back To Home Page </a></p>";
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

$sql = "INSERT INTO attend(event_id, username, rsvp, rating) VALUES ( ". $event_id .", '" . $_SESSION['username'] ."',1,0)";
$result = $conn->query($sql);
echo '<h2>Thank you, you are now attending this event.</h2>';
echo "<br><a href='index.php'>Return Home</a>";
if ($result->num_rows > 0) {
    // output data of each row
    echo "<h3>Groups related to <u>" . $interest ."</u> : </h3>";
    while($row = $result->fetch_assoc()) {
        echo "<p>". $row["group_name"]. " </p> <hr>";
    }
} else {
    //echo "0 results";
}
}
?>
