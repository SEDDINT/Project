<?php
	// Start session
	session_start();

	// Include database connection
	include("../db_login.php");

	// Check if form is submitted
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		// Get username and password from form
		$username = $_POST["username"];
		$password = $_POST["password"];

		// Retrieve user data from database
		$sql = "SELECT * FROM user_account WHERE username = '$username'";
		$result = $conn->query($sql);

		// Check if user exists in database
		if ($result->num_rows == 1) {
			
			// Get user data from database
			$row = $result->fetch_assoc();
			$user_id = $row["user_id"];
			$hashed_password = $row["password"];

			// Check if password is correct
			if (password_verify($password, $hashed_password)) {
				
				// Password is correct, start session and redirect to dashboard
				$_SESSION["user_id"] = $user_id;
				header("Location: dashboard.php");
				exit();

			} else {
				// Password is incorrect, show error message
				$error_message = "Invalid password";

			}

		} else {
			
			// User does not exist, show error message
			$error_message = "Invalid username";

		}

	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>
<body>

	<h1>Login</h1>

	<?php if (isset($error_message)): ?>
		<p><?php echo $error_message; ?></p>
	<?php endif; ?>

	<form method="post" action="login.php">

		<label for="username">Username:</label>
		<input type="text" name="username" id="username" required>

		<label for="password">Password:</label>
		<input type="password" name="password" id="password" required>

		<input type="submit" value="Login">

	</form>

</body>
</html>