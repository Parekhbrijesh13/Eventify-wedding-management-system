<?php
// Database connection settings
    include "connection.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect POST data safely
$venue_name = $_POST['venue_name'];
$venue_price = $_POST['venue_price'];
$venue_location = $_POST['venue_location'];
$capacity = $_POST['capacity'];

// Prepare an SQL statement to avoid SQL injection
$stmt = $conn->prepare("INSERT INTO venues (venue_name, venue_price, venue_location, capacity) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sdsi", $venue_name, $venue_price, $venue_location, $capacity);

// Execute the statement
if ($stmt->execute()) {
    echo "New venue added successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();
?>
