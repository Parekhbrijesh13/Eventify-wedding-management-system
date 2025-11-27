<?php
session_start();

// Only allow if admin session is set
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Venue Form</title>
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
      background-color: #f1f3f6;
    }

    /* Sidebar */
    .sidebar {
      width: 240px;
      background-color: #2f3542;
      color: #fff;
      padding: 20px;
      position: fixed;
      height: 100%;
    }

    .sidebar h2 {
      color: #70a1ff;
      font-size: 24px;
      margin-bottom: 30px;
    }

    .sidebar a {
      display: block;
      color: #dcdde1;
      text-decoration: none;
      margin: 10px 0;
      padding: 10px;
      border-radius: 5px;
      transition: background 0.3s, padding-left 0.3s;
    }

    .sidebar a:hover {
      background-color: #57606f;
      padding-left: 18px;
    }

    .sidebar a.active {
      background-color: #3742fa;
      font-weight: bold;
    }

    /* Main Content */
    .main {
      margin-left: 240px;
      padding: 30px;
      flex: 1;
      overflow-x: hidden;
    }

    /* Topbar */
    .topbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 25px;
    }

    .topbar h1 {
      font-size: 26px;
      color: #2f3542;
    }

    .user-controls span {
      color: #2f3542;
      font-weight: 500;
    }

    .logout-btn {
      background-color: #ff4757;
      color: white;
      border: none;
      padding: 8px 14px;
      border-radius: 5px;
      cursor: pointer;
    }

    .logout-btn:hover {
      background-color: #e84118;
    }

    /* Enhanced Form Styling */
    .venue-form-container {
      background-color: #fff;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
      max-width: 900px;
      margin: 0 auto;
    }

    .venue-form-container h2 {
      font-size: 24px;
      margin-bottom: 30px;
      color: #2f3542;
      position: relative;
    }

    .venue-form-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 25px 40px;
    }

    .form-group {
      position: relative;
    }

    .form-group label {
      position: absolute;
      top: -10px;
      left: 12px;
      background: #fff;
      padding: 0 5px;
      font-size: 13px;
      color: #2f3542;
      font-weight: 500;
      z-index: 1;
    }

    .form-group input {
      width: 100%;
      padding: 12px 14px;
      border: 1px solid #ccc;
      border-radius: 6px;
      transition: 0.3s ease;
      background-color: #f9f9f9;
    }

    .form-group input:focus {
      outline: none;
      border-color: #3742fa;
      background-color: #fff;
      box-shadow: 0 0 5px rgba(55, 66, 250, 0.2);
    }

    .form-group input::placeholder {
      color: #bbb;
    }

    .form-submit {
      margin-top: 35px;
      text-align: right;
    }

    input[type="submit"] {
      background-color: #3742fa;
      color: white;
      padding: 12px 30px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.3s;
    }

    input[type="submit"]:hover {
      background-color: #2f35c7;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .venue-form-grid {
        grid-template-columns: 1fr;
      }

      .form-submit {
        text-align: center;
      }
    }

  </style>
</head>
<body>

  <div class="sidebar">
    <h2>Eventify</h2>
    <a href="admindashboard.php" >Dashboard</a>
    <a href="requestadmin.php">Approved Requests</a>
    <a href="requestrejected.php" >Rejected Requests</a>
    <a href="requestconfirmed.php">Confirmed Requests</a>
    <a href="venues_form.php"  class="active">Venues</a>
    <a href="checkAvailibility.php">check Availibility</a>
    <a href="#">Settings</a>
  </div>

  <div class="main">
    <!-- Top Bar -->
    <div class="topbar">
      <h1>Admin Dashboard</h1>
      <div class="user-controls">
        <!-- Uncomment if using PHP session -->
        <span>Welcome, <?php echo htmlspecialchars($_SESSION['admin_name']); ?></span> 
        <form action="logout.php" method="post">
          <button type="submit" class="logout-btn">Logout</button>
        </form>
      </div>
    </div>

    <!-- Venue Form -->
    <div class="venue-form-container">
      <h2>Add New Venue</h2>
      <form action="submit_venue.php" method="post">
        <div class="venue-form-grid">
          <div class="form-group">
            <label for="venue_name">Venue Name</label>
            <input type="text" id="venue_name" name="venue_name" placeholder="Enter venue name" required>
          </div>

          <div class="form-group">
            <label for="venue_price">Venue Price</label>
            <input type="number" step="0.01" id="venue_price" name="venue_price" placeholder="Enter price" required>
          </div>

          <div class="form-group">
            <label for="venue_location">Venue Location</label>
            <input type="text" id="venue_location" name="venue_location" placeholder="Enter location" required>
          </div>

          <div class="form-group">
            <label for="capacity">Capacity</label>
            <input type="number" id="capacity" name="capacity" placeholder="Enter capacity" required>
          </div>
        </div>

        <div class="form-submit">
          <input type="submit" value="Submit">
        </div>
      </form>
    </div>

  </div>

</body>
</html>
