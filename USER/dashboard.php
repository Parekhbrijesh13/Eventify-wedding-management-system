<?php
session_start();

// Only allow if user session is set
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>
<?php
$conn = new mysqli("localhost", "root", "", "eventify");

// session se user id le lo
$user_id = $_SESSION['user_id'];

$sql = "SELECT email, number FROM signup_data WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$email = $phone = "Not Available";

if ($row = $result->fetch_assoc()) {
    $email = $row['email'];
    $phone = $row['number'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>User Dashboard - Eventify</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
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

    /* Sidebar */
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

    .sidebar a:hover,
    .sidebar a.active {
      background: rgba(255, 255, 255, 0.2);
    }

    /* Back button */
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
    .back-btn i {
      margin: 0;
    }
    .back-btn:hover {
      background: rgba(255, 255, 255, 0.3);
    }

    /* Main Content */
    .main {
      flex: 1;
      padding: 40px;
      background: #fff8f0;
      position: relative;
    }

    /* Top bar for logout */
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

    .card {
      background: #fff;
      border-radius: 12px;
      padding: 25px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
      margin-bottom: 25px;
    }

    .card h2 {
      color: #b22222;
      margin-bottom: 15px;
    }

    .card p {
      font-size: 16px;
      margin-bottom: 10px;
    }

    ul {
      list-style: none;
    }

    ul li {
      margin: 8px 0;
      font-size: 15px;
      padding-left: 25px;
      position: relative;
    }

    ul li::before {
      content: "💍";
      position: absolute;
      left: 0;
    }

    .profile-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
    }

    .profile-item {
      background: #fafafa;
      border-radius: 10px;
      padding: 15px;
      box-shadow: inset 0 2px 6px rgba(0,0,0,0.05);
    }

    .profile-item strong {
      display: block;
      color: #8e44ad;
      margin-bottom: 5px;
    }
    .logo {
    margin-top:-20px;
    width: 140px;      /* adjust size as needed */
    height: auto;
    display: block;
    filter: brightness(0) invert(1); /* makes dark image appear white */
}

  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar">
      <img src="assets/img/Eventify-logo.png" alt="Eventify Logo" class="logo">
      <a href="index.php" class="back-btn"><i class="fas fa-arrow-left"></i></a>
      <a href="dashboard.php" class="active"><i class="fas fa-user"></i> Profile</a>
      <a href="bookinguser.php"><i class="fas fa-history"></i> Booking History</a>
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

    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?> 🎉</h1>

    <!-- Profile Info -->
    <div class="card">
  <h2>👤 Profile Details</h2>
  <div class="profile-grid">
    <div class="profile-item">
      <strong>Username:</strong> <?php echo htmlspecialchars($_SESSION['user_name']); ?>
    </div>
    <div class="profile-item">
      <strong>User ID:</strong> <?php echo htmlspecialchars($_SESSION['user_id']); ?>
    </div>
    <div class="profile-item">
      <strong>Email:</strong> <?php echo htmlspecialchars($email); ?>
    </div>
    <div class="profile-item">
      <strong>Phone:</strong> +91 <?php echo htmlspecialchars($phone); ?>
    </div>
    <div class="profile-item">
      <strong>Role:</strong> User
    </div>
    <div class="profile-item">
      <strong>Events Booked:</strong> 
      <?php
        // User ke email ke hisaab se booking_data check karo
        $booking_sql = "SELECT * FROM booking_data WHERE email = ?";
        $stmt = $conn->prepare($booking_sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "Booking Confirmed";
        } else {
            echo "No Bookings Available";
        }
      ?>
    </div>
  </div>
</div>


    <!-- Features -->
    <div class="card">
      <h2>💡 Upcoming Features</h2>
      <ul>
        <li>Wedding Event Customization Packages</li>
        <li>Luxury Venue Recommendations</li>
        <li>Vendor & Catering Management</li>
        <li>Photography & Videography Packages</li>
        <li>Guest List & Invitation Tracking</li>
      </ul>
    </div>
  </div>

</body>
</html>
