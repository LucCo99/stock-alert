<?php
include('db_connection.php');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id']; // Get the id from the form to identify the record to update
$url = $_POST['url'];
$interval = $_POST['interval'];
$webhook = $_POST['webhook'];

// Update the record in the table
$sql = "UPDATE stock_checks SET url = '$url', check_interval = '$interval', webhook_url = '$webhook' WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
