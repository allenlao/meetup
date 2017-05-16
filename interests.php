<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <?php

$interest = $_POST['interest'];

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

//$sql = "SELECT * FROM about WHERE interest_name = '" . $interest . "'";
$sql = "SELECT groups.group_id, groups.group_name FROM about, groups WHERE about.group_id = groups.group_id AND interest_name = '" . $interest . "' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "<h2>Groups related to <u>" . $interest ."</u> : </h2>";
    while($row = $result->fetch_assoc()) {
        echo "<h4><strong>". $row["group_name"]. " </strong></h4>";
        $group_id = $row["group_id"];
        echo '<form role="form" method="POST" action="join-group.php">';
        echo '<input type="hidden" name="group_id" value=" ' . $group_id. '">';
        echo '<input type="submit" value="Join Group">';
        echo "</form>";
    }
} else {
    //echo "0 results";
}
echo "<p><a href='index.php'>Go Back To Home Page </a></p>";
?>
