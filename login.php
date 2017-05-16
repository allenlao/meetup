<?php

$username = $_POST['username'];
$password = $_POST['password'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
<body>
	<form method="post" action="login2.php">
	<fieldset>
		<legend>&nbsp;Login&nbsp;</legend>

<label for="username">Username:</label>
<input type="text" name="username" id="username" placeholder="Username"/>
<br/>

<label for="password">Password:</label>
<input type="password" name="password" id="password" placeholder="Password"/>
<br/>

<input type="submit" value="Login" />
</fieldset>
</form>
<p>Don't have an account with us? Register <a href="register.php">here</a></p>
<p><a href='index.php'>Go Back To Home Page </a></p>
</body>
</html>
