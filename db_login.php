<?php
    $host_ip = "127.0.0.1";
    $username = "root"; //or the user we have created
    $password = "salaheddin"; //root currently has no password and this is wrong
    $database = "gym_db";

    $conn = mysqli_connect($host_ip, $username, $password,$database, "4306");
    if (!$conn) {
        echo "Debugging errno: " . mysqli_connect_errno();
        echo "<br>";
        echo "Debugging error: " . mysqli_connect_error();
        exit;
    }
?>