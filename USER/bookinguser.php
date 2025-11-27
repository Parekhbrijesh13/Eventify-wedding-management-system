<?php
session_start();
include 'connection.php';

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$user_email = $_SESSION['email'];

// Fetch approved bookings
$booking_stmt = $conn->prepare("SELECT * FROM booking_data WHERE Email = ? AND (status = 'approved' OR status = 'confirmed')");
$booking_stmt->bind_param("s", $user_email);
$booking_stmt->execute();
$booking_data = $booking_stmt->get_result();

// ✅ FIXED: Fetch venue details for booked venues (corrected WHERE clause with parentheses)
$venue_stmt = $conn->prepare("
    SELECT DISTINCT v.* 
    FROM booking_data b 
    JOIN venues v ON b.Venue = v.venue_name 
    WHERE b.Email = ? AND (b.status = 'approved' OR b.status = 'confirmed')
");
$venue_stmt->bind_param("s", $user_email);
$venue_stmt->execute();
$venue_data = $venue_stmt->get_result();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Your Approved Bookings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* (CSS unchanged) */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            display: flex;
            min-height: 100vh;
            background: #fdfdfd;
        }

        .sidebar {
            width: 260px;
            background: linear-gradient(180deg, #8e44ad, #ff6f91);
            color: white;
            display: flex;
            flex-direction: column;
            padding: 30px 20px;
        }

        .sidebar h2 {
            margin-bottom: 20px;
            text-align: center;
            font-size: 22px;
        }

        .sidebar a {
            display: block;
            padding: 12px 15px;
            margin: 8px 0;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 16px;
            transition: 0.3s;
        }

        .sidebar a i {
            margin-right: 10px;
        }

        .sidebar a:hover, .sidebar a.active {
            background: rgba(255, 255, 255, 0.2);
        }

        .back-btn {
            display: inline-block;
            width: 50px;
            padding: 8px 12px;
            margin-bottom: 20px;
            color: white;
            text-decoration: none;
            font-size: 18px;
            border-radius: 6px;
            background: rgba(255, 255, 255, 0.15);
            transition: 0.3s;
        }

        .back-btn:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .main {
            flex: 1;
            padding: 40px;
            background: #fff8f0;
            position: relative;
        }

        .top-bar {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
        }

        .logout-btn {
            background: #c0392b;
            border: none;
            padding: 10px 15px;
            border-radius: 8px;
            color: white;
            font-size: 14px;
            cursor: pointer;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background: #96281b;
        }

        .main h1 {
            font-size: 28px;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .logo {
            margin-top: -20px;
            width: 140px;
            height: auto;
            display: block;
            filter: brightness(0) invert(1);
        }

        .table-container {
            margin: 50px auto;
            max-width: 100%;
            background: #ffffff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            overflow-x: auto;
        }

        .table {
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
            min-width: 900px;
        }

        .table thead th {
            background-color: #4e73df;
            color: white;
            font-weight: 600;
            padding: 14px 16px;
            text-align: center;
        }

        .table tbody td {
            padding: 12px 14px;
            text-align: center;
            border-top: 1px solid #e9ecef;
        }

        .table tbody tr:hover {
            background-color: #f8f9fc;
        }

        @media (max-width: 992px) {
            .table-container {
                padding: 15px;
            }

            .table {
                min-width: unset;
            }

            .table thead {
                display: none;
            }

            .table, .table tbody, .table tr, .table td {
                display: block;
                width: 100%;
            }

            .table td {
                text-align: right;
                padding-left: 50%;
                position: relative;
            }

            .table td::before {
                content: attr(data-label);
                position: absolute;
                left: 10px;
                top: 12px;
                font-weight: bold;
                text-align: left;
            }
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <img src="assets/img/Eventify-logo.png" alt="Eventify Logo" class="logo">
    <a href="index.php" class="back-btn"><i class="fas fa-arrow-left"></i></a>
    <a href="dashboard.php"><i class="fas fa-user"></i> Profile</a>
    <a href="bookinguser.php" class="active"><i class="fas fa-history"></i> Booking History</a>
    <a href="myevent.php"><i class="fas fa-calendar-check"></i> My Events</a>
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

    <!-- Booking Table -->
    <div class="container table-container">
        <h2>Your Approved Bookings</h2>
        <?php if ($booking_data->num_rows > 0): ?>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th><th>Name</th><th>Phone</th><th>Email</th>
                        <th>Date</th><th>Guests</th><th>Budget</th>
                        <th>City</th><th>Venue</th><th>Type</th><th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $booking_data->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['booking_id']) ?></td>
                        <td><?= htmlspecialchars($row['FullName']) ?></td>
                        <td><?= htmlspecialchars($row['PhoneNumber']) ?></td>
                        <td><?= htmlspecialchars($row['Email']) ?></td>
                        <td><?= htmlspecialchars($row['Date']) ?></td>
                        <td><?= htmlspecialchars($row['NumberOfGuest']) ?></td>
                        <td>₹<?= number_format($row['budget']) ?></td>
                        <td><?= htmlspecialchars($row['City']) ?></td>
                        <td><?= htmlspecialchars($row['Venue']) ?></td>
                        <td><?= htmlspecialchars($row['FunctionType']) ?></td>
                        <td><?= htmlspecialchars($row['FunctionTime']) ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-info text-center" role="alert" style="font-size: 1.25rem;">
                No approved bookings found.
            </div>
        <?php endif; ?>
    </div>

    <!-- Venue Table -->
    <div class="container table-container mt-5">
        <h2>Venue Details of Your Booked Events</h2>
        <?php if ($venue_data->num_rows > 0): ?>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Venue ID</th>
                        <th>Venue Name</th>
                        <th>Price</th>
                        <th>Location</th>
                        <th>Capacity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($venue = $venue_data->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($venue['venue_id']) ?></td>
                        <td><?= htmlspecialchars($venue['venue_name']) ?></td>
                        <td>₹<?= number_format($venue['venue_price']) ?></td>
                        <td><?= htmlspecialchars($venue['venue_location']) ?></td>
                        <td><?= htmlspecialchars($venue['capacity']) ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-warning text-center" role="alert" style="font-size: 1.2rem;">
                No venue details found.
            </div>
        <?php endif; ?>
    </div>

    <?php
    // ✅ FIXED: Total Price Query with proper parentheses
    $total_stmt = $conn->prepare("
        SELECT b.booking_id, b.Venue, b.NumberOfGuest, v.venue_price, b.status
        FROM booking_data b
        JOIN venues v ON b.Venue = v.venue_name
        WHERE b.Email = ? AND (b.status = 'approved' OR b.status = 'confirmed')
    ");
    $total_stmt->bind_param("s", $user_email);
    $total_stmt->execute();
    $total_data = $total_stmt->get_result();
    ?>

    <div class="container table-container">
        <h2>Total Price Summary</h2>

        <?php if ($total_data->num_rows > 0): ?>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Venue</th>
                    <th>No. of Guests</th>
                    <th>Venue Price</th>
                    <th>Guest Charges (₹500 x Guests)</th>
                    <th>GST (18%)</th>
                    <th><strong>Total Price</strong></th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $per_guest_charge = 500;
                    while ($row = $total_data->fetch_assoc()):
                        $guests = (int)$row['NumberOfGuest'];
                        $venue_price = (float)$row['venue_price'];
                        $guest_charges = $guests * $per_guest_charge;
                        $subtotal = $venue_price + $guest_charges;
                        $gst = $subtotal * 0.18;
                        $total_price = $subtotal + $gst;
                ?>
                <tr>
                    <td><?= htmlspecialchars($row['booking_id']) ?></td>
                    <td><?= htmlspecialchars($row['Venue']) ?></td>
                    <td><?= $guests ?></td>
                    <td>₹<?= number_format($venue_price) ?></td>
                    <td>₹<?= number_format($guest_charges) ?></td>
                    <td>₹<?= number_format($gst) ?></td>
                    <td><strong>₹<?= number_format($total_price) ?></strong></td>
                    <td>
                        <?php if (($row['status'] ?? '') == 'approved'): ?>
    <form action="confirm_booking.php" method="POST">
        <input type="hidden" name="booking_id" value="<?= $row['booking_id']; ?>">
        <button type="submit" class="btn btn-success">Confirm Booking</button>
    </form>
<?php else: ?>
    <span class="badge bg-success">Already Confirmed</span>
    <br>
    <a href="https://wa.me/<?= $row['whatsapp_number'] ?? '6359061142'; ?>" target="_blank" 
       class="btn btn-success mt-2">📲 Contact Here</a>
<?php endif; ?>

                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php else: ?>
        <div class="alert alert-warning text-center" role="alert">
            No pricing data found.
        </div>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
