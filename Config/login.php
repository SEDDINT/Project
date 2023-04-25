<html>
<head>
	<title>Login Page</title>
</head>
<body>
	<h2>Login</h2>
	<form action="../www/user.php" method="post">
		<label>Username:</label>
		<input type="text" name="username" required><br><br>
		<label>Password:</label>
		<input type="password" name="password" required><br><br>
		<input type="submit" value="Login">
	</form>
	<?php

		include("../db_login.php");

		
	?>
</body>
</html>
