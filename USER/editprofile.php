<?php
session_start();

// Only allow if user session is set
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$conn = new mysqli("localhost", "root", "", "eventify");
$user_id = $_SESSION['user_id'];

// Fetch user data
$sql = "SELECT username, email, Password, number FROM signup_data WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$username = $email = $phone = "";
if ($row = $result->fetch_assoc()) {
    $username = $row['username'];
    $email = $row['email'];
    $phone = $row['number'];
    $password = $row['Password']; // hashed password
}

// Handle profile update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_profile'])) {
    $new_username = $_POST['username'];
    $new_email = $_POST['email'];
    $new_phone = $_POST['phone'];
    $old_password = $_POST['old_password'] ?? '';
    $new_password = $_POST['new_password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    if (!empty($new_password)) {
        // Validate password change
        if (empty($old_password)) {
            $error = "Please enter your current password to set a new one.";
        } elseif (!password_verify($old_password, $password)) {
            $error = "Old password is incorrect.";
        } elseif ($new_password !== $confirm_password) {
            $error = "New password and confirmation do not match.";
        } else {
            // All good – update with new password
            $hashedPassword = password_hash($new_password, PASSWORD_BCRYPT);
            $update_sql = "UPDATE signup_data SET username = ?, email = ?, number = ?, Password = ? WHERE id = ?";
            $update_stmt = $conn->prepare($update_sql);
            $update_stmt->bind_param("ssssi", $new_username, $new_email, $new_phone, $hashedPassword, $user_id);
        }
    } else {
        // No password change
        $update_sql = "UPDATE signup_data SET username = ?, email = ?, number = ? WHERE id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("sssi", $new_username, $new_email, $new_phone, $user_id);
    }

    // Execute update if no validation error
    if (!isset($error)) {
        if ($update_stmt->execute()) {
            $success = "Profile updated successfully!";
            $username = $new_username;
            $email = $new_email;
            $phone = $new_phone;
            if (!empty($new_password)) {
                $password = $hashedPassword; // Update local password variable
            }
        } else {
            $error = "Something went wrong. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>User Dashboard - Eventify</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    * {margin:0;padding:0;box-sizing:border-box;font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;}
    body {display:flex;min-height:100vh;background:#fdfdfd;}
    .sidebar {width:260px;background:linear-gradient(180deg, #8e44ad, #ff6f91);color:white;display:flex;flex-direction:column;padding:30px 20px;}
    .sidebar h2 {margin-bottom:20px;text-align:center;font-size:22px;}
    .sidebar a {display:block;padding:12px 15px;margin:8px 0;color:white;text-decoration:none;border-radius:8px;font-size:16px;transition:0.3s;}
    .sidebar a i {margin-right:10px;}
    .sidebar a:hover, .sidebar a.active {background:rgba(255,255,255,0.2);}
    .back-btn {display:inline-block;width:50px;padding:8px 12px;margin-bottom:20px;color:white;text-decoration:none;font-size:18px;border-radius:6px;background:rgba(255,255,255,0.15);transition:0.3s;}
    .back-btn i {margin:0;}
    .back-btn:hover {background:rgba(255,255,255,0.3);}
    .main {flex:1;padding:40px;background:#fff8f0;position:relative;}
    .top-bar {display:flex;justify-content:flex-end;margin-bottom:20px;}
    .logout-btn {background:#c0392b;border:none;padding:10px 15px;border-radius:8px;color:white;font-size:14px;cursor:pointer;transition:0.3s;}
    .logout-btn:hover {background:#96281b;}
    .main h1 {font-size:28px;color:#2c3e50;margin-bottom:20px;}
    .card {background:#fff;border-radius:12px;padding:25px;box-shadow:0 4px 12px rgba(0,0,0,0.08);margin-bottom:25px;}
    .card h2 {color:#b22222;margin-bottom:15px;}
    .profile-grid {display:grid;grid-template-columns:1fr 1fr;gap:20px;}
    .profile-item strong {display:block;color:#8e44ad;margin-bottom:5px;}
    input[type="text"], input[type="email"], input[type="password"] {width:100%;padding:10px;border:1px solid #ddd;border-radius:6px;margin-top:5px;font-size:15px;}
    input:focus {border-color:#8e44ad;outline:none;box-shadow:0 0 5px rgba(142,68,173,0.3);}
    .logo {margin-top:-20px;width:140px;height:auto;display:block;filter:brightness(0) invert(1);}
    .btn-save {background:#8e44ad;color:white;padding:10px 20px;border:none;border-radius:8px;cursor:pointer;}
    .btn-save:hover {background:#732d91;}
    .msg {padding:10px;border-radius:6px;margin-bottom:15px;}
    .msg.success {background:#d4edda;color:#155724;border:1px solid #c3e6cb;}
    .msg.error {background:#f8d7da;color:#721c24;border:1px solid #f5c6cb;}
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar">
      <img src="assets/img/Eventify-logo.png" alt="Eventify Logo" class="logo">
      <a href="index.php" class="back-btn"><i class="fas fa-arrow-left"></i></a>
      <a href="dashboard.php" ><i class="fas fa-user"></i> Profile</a>
      <a href="bookinguser.php"><i class="fas fa-history"></i> Booking History</a>
      <a href="myevent.php"><i class="fas fa-calendar-check"></i> My Events</a>
      <a href="editprofile.php" class="active"><i class="fas fa-cog"></i>Edit Profile</a>
  </div>

  <!-- Main Content -->
  <div class="main">
    <div class="top-bar">
      <form method="post" action="logout.php">
        <button class="logout-btn">Logout</button>
      </form>
    </div>

    <h1>Edit Profile</h1>

    <?php if (isset($success)) echo "<div class='msg success'>$success</div>"; ?>
    <?php if (isset($error)) echo "<div class='msg error'>$error</div>"; ?>

    <div class="card">
      <h2>Update Your Information</h2>
      <form method="post">
        <div class="profile-grid">
          <div class="profile-item">
            <strong>Username</strong>
            <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>" required>
          </div>
          <div class="profile-item">
            <strong>Email</strong>
            <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
          </div>
          <div class="profile-item">
            <strong>Phone</strong>
            <input type="text" name="phone" value="<?php echo htmlspecialchars($phone); ?>" required>
          </div>
          <div class="profile-item">
            <strong>Old Password</strong>
            <input type="password" name="old_password" placeholder="Enter current password (only if changing)">
          </div>
          <div class="profile-item">
            <strong>New Password</strong>
            <input type="password" name="new_password" placeholder="Enter new password">
          </div>
          <div class="profile-item">
            <strong>Confirm New Password</strong>
            <input type="password" name="confirm_password" placeholder="Confirm new password">
          </div>
        </div>
        <br>
        <button type="submit" name="update_profile" class="btn-save">Save Changes</button>
      </form>
    </div>
  </div>

</body>
</html>
