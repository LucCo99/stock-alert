<?php
include('db_connection.php');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$url = $_POST['url'];
$interval = $_POST['interval'];
$webhook = $_POST['webhook'];

// Insert data into the table
$sql = "INSERT INTO stock_checks (url, check_interval, webhook_url) VALUES ('$url', '$interval', '$webhook')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
