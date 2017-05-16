<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container-fluid">
    <div class="row">

  <?php

$from = $_GET['event_date_from'];
//add on default 00:00:00 for time of event to check with database
$from .= ' 00:00:00';

$to = $_GET['event_date_to'];
//add on default 00:00:00 for time of event to check with database
$to .= ' 00:00:00';

if (isset($_SESSION["authorized"]) == 1)
{
  echo "ADMIN USER: " . $_SESSION["username"] . " " . "<a href='logout.php'>Logout</a>" . "<br>";
}
elseif (isset($_SESSION["username"]))
{
  echo "USER: " . $_SESSION["username"] . " " . "<a href='logout.php'>Logout</a>" . "<br>";
}
else
{
  echo "<div style ='color:#ff0000'>NO LOGGED IN USER</div>";
  echo "<p>Login/Register <a href='login.php'>Here</a>";
}
?>

<div class="col-md-9">



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

$sql = "SELECT * FROM events WHERE start_time between '" . $from . "' and '". $to ."' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<h1>Events from ". $from_date = substr($from, 0, 10) . " to " . $to_date = substr($to, 0, 10) . "</h1>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<strong>Event: </strong>" . $row["title"]. " <br> <strong>Description: </strong>" . $row["description"]. "<br><strong>Start Time: </strong>" . $row["start_time"]. "<br><strong>End Time: </strong>" . $row["end_time"]. "<br><strong>Location: </strong>" . $row["lname"]. "<br><strong>Zip Code: </strong>" . $row["zip"]. "<br><hr>";
    }
} else {
    //echo "0 results";
}



//Echo latest results for events
$sql = "SELECT * FROM events";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<h1>Latest Events:</h1>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $event_id = $row['event_id'];
        echo "<strong>Event: </strong>" . $row["title"]. " <br> <strong>Description: </strong>" . $row["description"]. "<br><strong>Start Time: </strong>" . $row["start_time"]. "<br><strong>End Time: </strong>" . $row["end_time"]. "<br><strong>Location: </strong>" . $row["lname"]. "<br><strong>Zip Code: </strong>" . $row["zip"]. "<br>";

        echo "<form id='rsvp' method='post' action='rsvp.php' ><fieldset>";
        echo "<input type='hidden' name='event_id' value='$event_id' /><br />";
        echo "<input type='submit' value='RSVP' />";
        echo "</fieldset></form><br><hr>";

    }
} else {
    //echo "0 results";
}
?>


</div>
<div class="col-md-3 text-right">
<h2>Find Events</h2>
<form role="form" method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <label>From:</label>
  <input type="date" name="event_date_from"><br>
  <label>To:</label>
  <input type="date" name="event_date_to"><br>
  <input type="submit">
</form>





<div>
<hr style="margin-top: 50px;">
<h2>Find Your Interest</h2>
<form role="form" method="POST" action="interests.php">
  <label>Select your favourite interest</label>

  <?php $sql = "SELECT * FROM interest";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo '<select name="interest">';
    while($row = $result->fetch_assoc()) {
        echo '<option value="' . $row["interest_name"] . '">' . $row["interest_name"] . '</option>';
    }
    echo '</select>';
} else {
    //echo "0 results";
}
?>
  <input type="submit">
</form>
</div>





<div>
  <?php $sql = "SELECT events.title, events.start_time FROM attend, events WHERE events.event_id = attend.event_id AND attend.rsvp = 1 AND username =  '" . $_SESSION["username"] ."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "<hr>";
    echo "<h2>Events Attending: </h2>";
    echo "<ul class='list-unstyled'>";
    while($row = $result->fetch_assoc()) {
        echo '<li><b>Event Name: </b>' . $row["title"] . '</li>';
        echo '<li><b>Event Start Time: </b>' . $row["start_time"] . '</li>';

        echo "<form id='events' method='get' action='events.php' ><fieldset>";
        echo "<input type='hidden' name='event_title' value='" . $row['title'] . "' /><br />";
        echo "<input type='submit' value='View Ratings' />";
        echo "</fieldset></form><br><hr>";

    }
    echo "</ul>";
} else {
    echo "<div class='alert alert-danger text-center' style='margin-top: 20px;'> You are <strong>not</strong> attending any events.</div>";
}
?>
</div>

<div>
  <h2><a href='create-event.php'>Create Event </a></h2>
</div>


</div><!--/col-md-3-->
</div><!--/row-->
</div><!--/container-fluid-->










</body>
</html>
