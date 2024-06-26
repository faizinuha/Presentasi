<?php
$servername = "localhost";
$username = "root"; // adjust this to your database username
$password = ""; // adjust this to your database password
$dbname = "mahasiswi";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
