<?php
header('Content-Type: text/html; charset=UTF-8');

$host = "localhost";
$username = "root";
$password = "";
$db = "eventify";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $FullName = trim($_POST['FullName'] ?? '');
    $PhoneNumber = trim($_POST['PhoneNumber'] ?? '');
    $Email = trim($_POST['Email'] ?? '');
    $Date = $_POST['Date'] ?? '';
    $NumberOfGuest = $_POST['NumberOfGuest'] ?? '';
    $budget = $_POST['budget'] ?? '';
    $City = $_POST['City'] ?? '';
    $Venue = $_POST['Venue'] ?? '';
    $FunctionType = $_POST['FunctionType'] ?? '';
    $FunctionTime = $_POST['FunctionTime'] ?? '';

    // Basic validation
    if (!$FullName || !$PhoneNumber || !$Email || !$Date || !$NumberOfGuest || !$budget || !$City || !$Venue || !$FunctionType || !$FunctionTime) {
        http_response_code(400);
        echo "All fields are required.";
        exit;
    }

    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo "Invalid email format.";
        exit;
    }

    $con = mysqli_connect($host, $username, $password, $db);
    if (!$con) {
        http_response_code(500);
        echo "Database connection failed: " . mysqli_connect_error();
        exit;
    }

    // Prepared statement to prevent SQL injection
    $status = "pending";
    $stmt = $con->prepare("INSERT INTO booking_data 
    (FullName, PhoneNumber, Email, Date, NumberOfGuest, budget, City, Venue, FunctionType, FunctionTime, status) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("ssssissssss", 
            $FullName, 
            $PhoneNumber, 
            $Email, 
            $Date, 
            $NumberOfGuest, 
            $budget,
            $City, 
            $Venue, 
            $FunctionType, 
            $FunctionTime, 
            $status
        );

    if ($stmt->execute()) {
       echo "<script>alert('✅ Booking request submitted successfully!'); window.location.href=('../booknow.php');</script>";
    } else {
        http_response_code(500);
        echo "SQL error: " . $stmt->error;
    }

    $stmt->close();
    mysqli_close($con);

} else {
    http_response_code(405);
    echo "Invalid request.";
}
?>
