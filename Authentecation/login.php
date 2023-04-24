<html>
<head>
	<title>Login Page</title>
</head>
<body>
	<h2>Login</h2>
	<form action="../www/index.php" method="post">
		<label>Username:</label>
		<input type="text" name="username" required><br><br>
		<label>Password:</label>
		<input type="password" name="password" required><br><br>
		<input type="submit" value="Login">
	</form>
	<?php

	include("../db_login.php");


	if(isset($_POST['username']) && isset($_POST['password'])){
		function validate($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		$username = validate($_POST['username']);
		$password = validate($_POST['password']);
	}else{
		header("Location: login.php");
		exit();
	}
		
	mysqli_close($conn);

	
?>
</body>
</html>

<?php
// Define the database credentials
$host = 'localhost';
$user = 'username';
$pass = 'password';
$dbname = 'database_name';

// Connect to the database
$conn = mysqli_connect($host, $user, $pass, $dbname);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve the username and password from the form
$username = $_POST['username'];
$password = $_POST['password'];

// Query the user table for the provided credentials
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $sql);

// Check if the query returned a result
if (mysqli_num_rows($result) == 1) {
    // Start a session and redirect to the dashboard page
    session_start();
    $_SESSION['username'] = $username;
    header('Location: dashboard.php');
    exit;
} else {
    // Display an error message and redirect to the login page
    echo 'Invalid username or password';
    header('Location: login.php');
    exit;
}

// Close the database connection
mysqli_close($conn);
?>
