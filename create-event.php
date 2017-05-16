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

if (isset($_SESSION["authorized"]) == 1)
{
  //user is admin and can see page + make a new event
  echo "ADMIN: " . $_SESSION["username"] . "<br>";
?>

	<form method="POST" action="publish-event.php">
	  <div class="form-group">
	    <label for="title">Event Title:</label>
	    <input type="text" name="e_title" class="form-control" id="event_title">
	  </div>
	  <div class="form-group">
	    <label for="pwd">Description:</label>
	    <textarea name="description" class="form-control" id="description"></textarea>
	  </div>
	  <div class="form-group">
	    <label for="start_time">Start Time:</label>
	    <input type="date" name="start_time" class="form-control" id="start_time">
	  </div>
	  <div class="form-group">
	    <label for="end_time">End Time:</label>
	    <input name="end_time" type="date" class="form-control" id="end_time">
	  </div>
	  <div class="form-group">
	    <label for="lname">Location Name:</label>
	    <input type="text" name="lname" class="form-control" id="lname">
	  </div>
	  <div class="form-group">
	    <label for="zip">Zip Code:</label>
	    <input type="text" name="zip" class="form-control" id="zip">
	  </div>
	  <div class="form-group">
	    <label for="street">Street:</label>
	    <input type="text" name="street" class="form-control" id="street">
	  </div>
	  <div class="form-group">
	    <label for="city">City:</label>
	    <input type="text" name="city" class="form-control" id="city">
	  </div>
	  <div class="form-group">
	    <label for="latitude">Latitude:</label>
	    <input type="text" name="latitude" class="form-control" id="latitude">
	  </div>
	  <div class="form-group">
	    <label for="longtitude">Longtitude:</label>
	    <input type="text" name="longtitude" class="form-control" id="longtitude">
	  </div>

	  <div class="form-group">
	    <label for="group_id">Group ID</label>
	    <select name="group_id">
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

$sql = "SELECT* FROM groups";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each group name with ID
    while($row = $result->fetch_assoc()) {
        echo "<option value='". $row["group_id"]. "'>". $row["group_name"]. "</option> ";
    }
} else {
    echo "No groups are available to attach this event to.";
}?>
	    </select>
	  </div>

	  <button type="submit" class="btn btn-default">Submit</button>
	</form>


<?php
}
elseif (isset($_SESSION["username"]))
{
  //LOGGED IN USER BUT NOT ADMIN
  echo "You do not have sufficient privilledges to view this page";
  echo "<p><a href='index.php'>Go Back To Home Page </a></p>";
}
else
{
  //NO LOGGED IN USER
	echo "You are not authorized to view this page";
  echo "<p><a href='index.php'>Go Back To Home Page </a></p>";
}
?>

<p><a href='index.php'>Go Back To Home Page </a></p>

</div>
</div>
</div>

</body>
</html>
