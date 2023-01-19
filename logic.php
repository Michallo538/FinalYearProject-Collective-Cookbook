<?php
$servername = "localhost";
$username = "Roots";
$password = "DB";
$database = "collectivecookbook";

//$conn = mysqli_connect($servername, $username, $password, $database)
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: " . $conn->connect_errno;
    exit();
}

