<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['booking_id'])) {
    $booking_id = intval($_POST['booking_id']);

    $stmt = $conn->prepare("UPDATE booking_data SET status = 'confirmed' WHERE booking_id = ?");
    $stmt->bind_param("i", $booking_id);

    if ($stmt->execute()) {
        echo "<script>
                alert('Booking Confirmed Successfully!');
                window.location.href='bookinguser.php';
              </script>";
        exit();
    } else {
        echo "Error updating booking: " . $stmt->error;
    }
}
