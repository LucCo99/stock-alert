<?php
include('db_connection.php');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch current values for id = 1
$sql = "SELECT * FROM stock_checks WHERE id = 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$existing_url = $row['url'];
$existing_interval = $row['interval'];
$existing_webhook = $row['webhook_url'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Stock Monitoring</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <form action="update_data.php" method="POST">
	<input type="hidden" id="id" name="id" value="1"> 
        <label for="url">Product URL:</label>
        <input type="text" id="url" name="url" value="<?php echo htmlspecialchars($existing_url); ?>" required><br><br>

        <label for="interval">Check Interval:</label>
        <select id="interval" name="interval" required>
            <option value="1200" <?php echo ($existing_interval == 5) ? 'selected' : ''; ?>>20m</option>
            <option value="1800" <?php echo ($existing_interval == 1800) ? 'selected' : ''; ?>>30m</option>
            <option value="3600" <?php echo ($existing_interval == 3600) ? 'selected' : ''; ?>>60m</option>
        </select><br><br>

        <label for="webhook">Discord Webhook URL:</label>
        <input type="text" id="webhook" name="webhook" value="<?php echo htmlspecialchars($existing_webhook); ?>" required><br><br>

        <input type="submit" value="Update">
    </form>
</body>
</html>
<?php
$conn->close();
?>