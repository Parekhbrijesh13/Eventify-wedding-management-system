<?php
include 'connection.php';

$selectedDate = isset($_POST['Date']) ? $_POST['Date'] : '';

if (!empty($selectedDate)) {
    $sql = "SELECT venue_name 
            FROM venues 
            WHERE venue_name NOT IN (
                SELECT Venue 
                FROM booking_data 
                WHERE Date = ?
            )
            ORDER BY venue_name ASC";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $selectedDate);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        echo '<option value="">Select Venue</option>';
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . htmlspecialchars($row['venue_name']) . '">' 
                . htmlspecialchars($row['venue_name']) . 
                '</option>';
        }
    } else {
        echo '<option value="">No available venues</option>';
    }

    $stmt->close();
} else {
    echo '<option value="">Invalid date selected</option>';
}
?>
