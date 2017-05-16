<?php session_start();?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
	<form method="post" action="confirm-registration.php">
	<fieldset>
		<legend>&nbsp;Register&nbsp;</legend>

<label for="username">Username:</label>
<input type="text" name="username" id="username" placeholder="Username" required/>
<br/>

<label for="password">Password:</label>
<input type="password" name="password" id="password" placeholder="Password" required />
<br/>

<label for="first_name">First Name:</label>
<input type="text" name="first_name" id="first_name" placeholder="First name"required/>
<br/>

<label for="last_name">Last Name:</label>
<input type="text" name="last_name" id="last_name" placeholder="Last name"required/>
<br/>

<label for="zip">Zip Code:</label>
<input type="text" name="zip" id="zip" placeholder="Zip Code"required/>
<br/>

<input type="submit" value="Register" />
</fieldset>
</form>

<p>Already have an account? Sign in <a href="login.php">here</a></p>

</div>
</div>
</div>
</body>
</html>
