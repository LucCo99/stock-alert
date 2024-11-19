<?php
// db_connection.php

$servername = "localhost"; // your server name
$username = "root";        // your database username
$password = "EeL48!b=nD/W"; // your database password
$dbname = "stock_checks";  // your database name

// Create a new connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Uncomment this to check if the connection was successful
// echo "Connected successfully";
?>
