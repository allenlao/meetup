<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <?php

$event_title = $_GET['event_title'];

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
  echo "<p>Login <a href='login.php'>here</a>";
}
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

$sql = "SELECT * FROM events WHERE title = '" . $event_title . "' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<h2><b>Event Name: </b>' . $row["title"] . '</h2>';
        echo '<h2><b>Event Start Time: </b>' . $row["start_time"] . '</h2>';
        $event_id = $row["event_id"];

    }
    echo "<h3>Ratings:</h3>";
    $sql2 = "SELECT * FROM attend WHERE event_id = '" . $event_id . "' ";
    $result = $conn->query($sql2);
    while($row = $result->fetch_assoc()) {
        echo '<li><b>Username: </b>' . $row["username"] . '</li>';
        if($row["rating"] == 0){
          echo "<li><b>Rating: Not yet rated by this user.</b></li>";
          echo nl2br("\n");
        }
        else{
        echo '<li><b>Rating: </b>' . $row["rating"] . '/10</li>';
        echo nl2br("\n");
        }
    }


} else {
    echo "0 results found for that particular event.";
}

?>


<form role="form" method="POST" action="ratings.php">
  <label>Submit Your Ratings from 1-10 (1 being lowest &amp; 10 being highest):</label><br>
  <input type="number" name="rating" min="1" max="10" placeholder="1" required><br>
  <input type="hidden" name="event_id" value="<?php echo $event_id;?>">
  <input type="submit">
</form>

<p><a href='index.php'>Go Back To Home Page </a></p>;
