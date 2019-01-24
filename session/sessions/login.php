<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
</head>
<body>
<?php
session_start ();
// TODO 5: Consider an HTML form that calls the controller 
?>

<h3>Login</h3>
	<form action="controller.php" method="POST">
		User ID: <input type="text" name="ID"> <br>
		Password: <input type="password" name="password"> 
	<input type="submit" name="Login" value="Login"> <br> <br>
	<?php
  // TODO 6: Show message indicating the credentials were not Rick and 1234
  if( isset(  $_SESSION['loginError']))
    echo   $_SESSION['loginError'];
	
	?>
</form>
</body>
</html>