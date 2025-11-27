<?php
$host = "localhost";       // or 127.0.0.1
$dbusername = "root";      // default for XAMPP
$dbpassword = "";          // default for XAMPP
$dbname = "eventify";   // replace with your actual DB name

// Create connection
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}
?>
