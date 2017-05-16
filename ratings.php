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
echo $event_id;
$rating = $_POST['rating'];  

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


$sql = "UPDATE attend SET rating = ". $rating ." WHERE username = '". $_SESSION['username']."' AND event_id = ".$event_id."";
echo $sql;

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "<h3>Groups related to <u>" . $interest ."</u> : </h3>";
    while($row = $result->fetch_assoc()) {
        echo "<p>". $row["group_name"]. " </p> <hr>";
    }
} else {
    echo "<p>Could not add that rating</p>";
}
?>
<a href="index.php">Return Home</a>
</body>
</html>