<!DOCTYPE html>
<html>
<head>
	<title>Gym Classes</title>
</head>
<body>
	<h1>Gym Classes</h1>
	<table>
		<tr>
			<th>Class Name</th>
			<th>Instructor</th>
			<th>Time</th>
			<th>Current Attendees</th>
		</tr>
		<?php
            $host_ip = "127.0.0.1";
            $username = "root"; 
            $password = "salaheddin"; 
            $database = "gym_db";
    
            $conn = mysqli_connect($host_ip, $username, $password, $database, "4306");
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

			// Query the database for available classes
			$sql = "SELECT * FROM classes WHERE number_of_trainees < max_num_of_trainees";
			$result = mysqli_query($conn, $sql);

			// Display the available classes in a table
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
                echo "<td>" . $row["class_id"] . "</td>";
				echo "<td>" . $row["trainer_name"] . "</td>";
				echo "<td>" . $row["class_date"] . "</td>";
				echo "<td>" . $row["number_of_trainees"] . "</td>";
				echo "<td>" . $row["max_num_of_trainees"] . "</td>";
				echo "</tr>";
			}
		?>
	</table>
	<form action="test.php" method="post">
		<label for="class">Choose a class to register:</label>
		<select name="class" id="class">
			<?php
				// Query the database for available classes to register
				$sql = "SELECT * FROM classes WHERE number_of_trainees < max_num_of_trainees";
				$result = mysqli_query($conn, $sql);

				// Display available classes in a dropdown list
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<option value='" . $row["class_id"] . "'>" . $row["trainer_name"] . "</option>";
				}
			?>
		</select>
		<button type="submit" >Register</button>
	</form>
	<?php
        
		// If the user has registered for a class, update the database
		if (isset($_POST["class"])) {
			$class_id = $_POST["class"];
			$sql = "UPDATE classes SET number_of_trainees = number_of_trainees + 1 WHERE class_id = $class_id";
			mysqli_query($conn, $sql);
            if (mysqli_query($conn, $sql)){
                $sql = "INSERT INTO bookings (class_id) VALUES ('$class_id')";
                mysqli_query($conn, $sql);
            }
			echo "<p>You have successfully registered for the class!</p>";
		}

		// Close the database connection
		mysqli_close($conn);
	?>
</body>
</html>