<?PHP
	include("../db_login.php");
?>
<html>
<head>
	<title>Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
 
	<!--Script Link  put befor end of </body> -->
	<link rel="stylesheet" href="../src/CSS/style.css">
	<script src="../src/JS/main.js" defer></script>
</head>
<body>
	<center>
		<br>
		<br>
		<br>
		<h3>Login</h3>
		<form method="post" action="login.php" style="width: 100vh;">
					<div class="form-group">
						<label for="exampleInputEmail1">Username: </label>
						<input  class="form-control"  type="text" name="username" id="username" placeholder="Enter your Username" required>
						<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Password: </label>
						<input class="form-control" type="password" name="password" id="password" placeholder="Enter your Password" required >
					</div>
					<br>
					<button type="submit" class="btn btn-dark">Login</button>
		</form>
	</center>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

	<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$username = $_POST["username"];
			$password = $_POST["password"];

			$sql = "SELECT * FROM user_account WHERE username = '$username' AND password = '$password'";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				// Login successful
				// Redirect to user.php
				header("Location: ../www/user.php");
			} else {
				// Login failed
				echo "Invalid username or password";
			}
		}
		?>
</html>