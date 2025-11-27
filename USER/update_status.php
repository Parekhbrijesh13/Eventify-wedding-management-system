<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id']) && isset($_POST['status'])) {
        $id = intval($_POST['id']);
        $status = $_POST['status'];

        $stmt = $conn->prepare("UPDATE booking_data SET status=? WHERE booking_id=?");
        $stmt->bind_param("si", $status, $id);

        if ($stmt->execute()) {
            // Redirect back without showing blank page
            header("Location: admindashboard.php?msg=Status+updated+to+$status");
            exit;
        } else {
            die("Error updating status: " . $conn->error);
        }

        $stmt->close();
    } else {
        die("Missing booking id or status.");
    }
} else {
    die("Invalid request method.");
}

$conn->close();
?>
