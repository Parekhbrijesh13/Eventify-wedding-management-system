<?php
session_start();
include 'connection.php'; // DB connection

$user_email = $_SESSION['email'] ?? '';
$booking_id = $_POST['booking_id'] ?? '';

// Handle confirm booking POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($booking_id)) {
    $stmt = $conn->prepare("UPDATE bookings SET status = 'confirmed' WHERE booking_id = ?");
    $stmt->bind_param("i", $booking_id);
    $stmt->execute();
    echo "<script>
            alert('Booking Confirmed Successfully!');
            window.location.href='myevent.php';
          </script>";
    exit();
}

// Fetch all bookings for this user
$booking_stmt = $conn->prepare("
    SELECT b.booking_id, b.venue, b.NumberOfGuest, b.status 
    FROM booking_data b
    LEFT JOIN venues v ON b.Venue = v.venue_name
    WHERE b.Email = ? AND status IN ('confirmed','approved','pending')
    ORDER BY b.booking_id DESC
");
$booking_stmt->bind_param("s", $user_email);
$booking_stmt->execute();
$booking_data = $booking_stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Events - Eventify</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { display: flex; min-height: 100vh; background: #f9f9fc; }
        .sidebar { width: 260px; background: linear-gradient(180deg, #8e44ad, #ff6f91); color: white; display: flex; flex-direction: column; padding: 30px 20px; }
        .sidebar a { display: block; padding: 12px 15px; margin: 8px 0; color: white; text-decoration: none; border-radius: 8px; font-size: 16px; transition: 0.3s; }
        .sidebar a i { margin-right: 10px; }
        .sidebar a:hover, .sidebar a.active { background: rgba(255,255,255,0.2); }
        .back-btn { display: inline-block; width: 50px; padding: 8px 12px; margin-bottom: 20px; color: white; text-decoration: none; font-size: 18px; border-radius: 6px; background: rgba(255,255,255,0.15); transition: 0.3s; }
        .back-btn:hover { background: rgba(255,255,255,0.3); }
        .main { flex: 1; padding: 40px; background: #fff8f0; position: relative; }
        .top-bar { display: flex; justify-content: flex-end; margin-bottom: 20px; }
        .logout-btn { background: #c0392b; border: none; padding: 10px 15px; border-radius: 8px; color: white; font-size: 14px; cursor: pointer; transition: 0.3s; }
        .logout-btn:hover { background: #96281b; }
        .main h1 { font-size: 28px; color: #2c3e50; margin-bottom: 25px; font-weight: 600; }
        .card-custom { border-radius: 12px; border: none; background: #fff; box-shadow: 0 4px 12px rgba(0,0,0,0.08); transition: transform 0.2s; }
        .card-custom:hover { transform: translateY(-3px); }
        .card-custom h4 { color: #8e44ad; font-weight: 600; margin-bottom: 15px; }
        .event-detail { margin: 5px 0; font-size: 15px; }
        .event-detail i { color: #8e44ad; margin-right: 8px; }
        .status-badge { font-size: 14px; padding: 6px 12px; border-radius: 20px; }
        .no-booking { margin-top: 50px; }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <img src="assets/img/Eventify-logo.png" alt="Eventify Logo" class="logo mb-4" style="width:140px; filter:brightness(0) invert(1);">
        <a href="index.php" class="back-btn"><i class="fas fa-arrow-left"></i></a>
        <a href="dashboard.php"><i class="fas fa-user"></i> Profile</a>
        <a href="bookinguser.php"><i class="fas fa-history"></i> Booking History</a>
        <a href="myevent.php" class="active"><i class="fas fa-calendar-check"></i> My Events</a>
        <a href="editprofile.php"><i class="fas fa-cog"></i>Edit Profile</a>
    </div>

    <!-- Main Content -->
    <div class="main">
        <!-- Logout button -->
        <div class="top-bar">
            <form action="logout.php" method="post">
                <button class="logout-btn" type="submit"><i class="fas fa-sign-out-alt"></i> Logout</button>
            </form>
        </div>

        <h1>Welcome, <?= htmlspecialchars($_SESSION['user_name']) ?> 🎉</h1>

        <?php if($booking_data && $booking_data->num_rows > 0): ?>
            <?php while($booking = $booking_data->fetch_assoc()): ?>
                <div class="card card-custom p-4 mb-4">
                    <h4><i class="fas fa-map-marker-alt"></i> <?= htmlspecialchars($booking['venue']) ?></h4>
                    
                    <p class="event-detail"><i class="fas fa-users"></i> Guests: <?= $booking['NumberOfGuest'] ?></p>
                    
                    <p class="event-detail">
                        <i class="fas fa-info-circle"></i> Status: 
                        <?php if($booking['status'] == 'confirmed'): ?>
                            <span class="badge bg-success status-badge">Confirmed</span>
                        <?php elseif($booking['status'] == 'approved'): ?>
                            <span class="badge bg-primary status-badge">Approved</span>
                        <?php else: ?>
                            <span class="badge bg-warning status-badge">Pending</span>
                        <?php endif; ?>
                    </p>

                    <?php if($booking['status'] != 'confirmed'): ?>
                        <form action="" method="POST" class="mt-2">
                            <input type="hidden" name="booking_id" value="<?= $booking['booking_id'] ?>">
                            <button type="submit" class="btn btn-success"><i class="fas fa-check-circle"></i> Confirm Booking</button>
                        </form>
                    <?php else: ?>
                        <a href="https://wa.me/<?= $booking['whatsapp_number'] ?? '919876543210'; ?>" target="_blank" 
                           class="btn btn-success mt-3"><i class="fab fa-whatsapp"></i> Contact Organizer</a>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="alert alert-warning text-center no-booking">
                <i class="fas fa-calendar-times fa-2x mb-2"></i><br>
                No bookings available at the moment.
            </div>
        <?php endif; ?>

    </div>
</body>
</html>
