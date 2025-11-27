<?php
// Make sure this is at the very top — no spaces or blank lines above it
header('Content-Type: text/plain');

$host = "localhost";
$username = "root";
$password = "";
$db = "eventify";

// Handle only POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name     = $_POST['name']     ?? '';
    $email    = $_POST['email']    ?? '';
    $phone    = $_POST['phone']    ?? '';
    $subject  = $_POST['subject']  ?? '';
    $message  = $_POST['message']  ?? '';

    if ($name && $email && $phone && $subject && $message) {
        // Connect to DB
        $con = mysqli_connect($host, $username, $password, $db);
        if (!$con) {
            http_response_code(500);
            echo "Database connection failed: " . mysqli_connect_error();
            exit;
        }

        // Save to DB
        $sql = "INSERT INTO contact_info (Name, Email, Phone, Help, Message)
                VALUES ('$name', '$email', '$phone', '$subject', '$message')";
        if (mysqli_query($con, $sql)) {
            echo "OK"; // ✅ This is what validate.js looks for
        } else {
            http_response_code(500);
            echo "SQL error: " . mysqli_error($con);
        }

        mysqli_close($con);
    } else {
        http_response_code(400);
        echo "All fields are required.";
    }
} else {
    http_response_code(405); // method not allowed
    echo "Invalid request.";
}
?>
