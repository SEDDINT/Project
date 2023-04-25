<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
 
	<!--Script Link  put befor end of </body> -->
    <link rel="stylesheet" href="../src/style.css">
    <script src="../src/main.js" defer></script>
    <title>The GYM</title>
</head>
<body>
    <a class="nav-link" href="index.html">The gym</a>

    <?php
        $host_ip = "127.0.0.1";
        $username = "root"; 
        $password = "salaheddin"; 
        $database = "gym_db";

        $conn = mysqli_connect($host_ip, $username, $password, $database, "4306");

        if (!$conn) {
            echo "Debugging errno: " . mysqli_connect_errno();
            echo "<br>";
            echo "Debugging error: " . mysqli_connect_error();
            exit;
        }

        $query = "SELECT * from classes";

        $result = mysqli_query($conn, $query);
        if ($result) {
        echo '<div class="container">';
        echo    '<table class="table table-striped table-dark">';
        echo        '<thead>';
        echo            '<tr>';
        echo            '<th scope="col">#</th>';
        echo            '<th scope="col">Trainer Name</th>';
        echo            '<th scope="col">Start Date</th>';
        echo            '<th scope="col">Current Trainees</th>';
        echo            '<th scope="col">Max Trainees</th>';
        echo            '</tr>';
        echo        '</thead>';
        echo        '<tbody>';
                    while ($result_row = mysqli_fetch_row($result)) {
                        echo "<tr>";
                        echo "<td>$result_row[0] </td>";
                        echo "<td>$result_row[1] </td>";
                        echo "<td> $result_row[2] </td>";
                        echo "<td>$result_row[3] </td>";
                        echo "<td>$result_row[4] </td>";
                        echo "</tr>";
                    }
        echo        '</tbody>';
        echo    '</table>';
        echo '</div>';
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    ?>
    <button class="btn btn-dark">Register</button>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>