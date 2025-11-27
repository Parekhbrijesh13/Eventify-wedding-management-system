<?php
session_start();

// Only allow if admin session is set
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

include 'connection.php'; // ✅ make sure this file has $conn connection

// Handle search filter
$search_date = $_GET['search_date'] ?? "";

// Fetch booking data
if (!empty($search_date)) {
    $stmt = $conn->prepare("SELECT booking_id, FullName, email, Date, venue 
                            FROM booking_data
                            WHERE Date = ?");
    $stmt->bind_param("s", $search_date);
} else {
    $stmt = $conn->prepare("SELECT booking_id, FullName, email, Date, venue 
                            FROM booking_data
                            ORDER BY Date DESC");
}
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Eventify - Admin Dashboard</title>
  <style>
/* Reset & Base */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body {
  display: flex;
  min-height: 100vh;
  background-color: #f4f6fa;
  color: #2f3542;
}

/* Sidebar */
.sidebar {
  width: 240px;
  background: linear-gradient(180deg, #2f3542, #1e272e);
  color: #fff;
  padding: 25px 20px;
  position: fixed;
  height: 100%;
  box-shadow: 2px 0 8px rgba(0,0,0,0.15);
}

.sidebar h2 {
  color: #70a1ff;
  font-size: 26px;
  margin-bottom: 40px;
  text-align: center;
  letter-spacing: 1px;
}

.sidebar a {
  display: block;
  color: #dcdde1;
  text-decoration: none;
  margin: 12px 0;
  padding: 12px 15px;
  border-radius: 6px;
  font-weight: 500;
  transition: all 0.3s ease;
}

.sidebar a:hover {
  background: rgba(255,255,255,0.1);
  padding-left: 20px;
}

.sidebar a.active {
  background: #3742fa;
  font-weight: bold;
  color: #fff;
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
  margin-bottom: 30px;
}

.topbar h1 {
  font-size: 28px;
  font-weight: 600;
  color: #2f3542;
}

.user-controls {
  display: flex;
  align-items: center;
  gap: 15px;
}

.user-controls span {
  color: #2f3542;
  font-weight: 500;
}

.logout-btn {
  background: #ff4757;
  color: #fff;
  border: none;
  padding: 8px 16px;
  border-radius: 6px;
  cursor: pointer;
  font-weight: 500;
  transition: background 0.3s ease;
}

.logout-btn:hover {
  background: #e84118;
}

/* Search Bar */
.search-bar {
  margin-bottom: 25px;
  background: #ffffff;
  padding: 15px 20px;
  border-radius: 10px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.08);
  display: flex;
  align-items: center;
  gap: 15px;
}

.search-bar label {
  font-weight: 600;
  font-size: 15px;
}

.search-bar input[type="date"] {
  padding: 10px 14px;
  border: 1px solid #dcdde1;
  border-radius: 6px;
  font-size: 14px;
  outline: none;
  transition: all 0.3s ease;
}

.search-bar input[type="date"]:focus {
  border-color: #3742fa;
  box-shadow: 0 0 5px rgba(55,66,250,0.25);
}

/* Search + Reset buttons */
.search-bar button {
  padding: 10px 18px;
  border: none;
  border-radius: 6px;
  background: #3742fa;
  color: #fff;
  font-weight: 500;
  cursor: pointer;
  transition: all 0.3s ease;
}

.search-bar button:hover {
  background: #2f3542;
}

.reset-btn {
  padding: 10px 18px;
  border-radius: 6px;
  background: #ff4757;
  color: #fff;
  text-decoration: none;
  font-weight: 500;
  transition: all 0.3s ease;
}

.reset-btn:hover {
  background: #e84118;
}

/* Table */
.table-container {
  background: #fff;
  border-radius: 12px;
  padding: 20px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}

.table-container h2 {
  margin-bottom: 15px;
  font-size: 20px;
  font-weight: 600;
  color: #2f3542;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 10px;
  min-width: 900px;
}

th, td {
  padding: 14px 16px;
  border-bottom: 1px solid #eee;
  text-align: left;
  font-size: 14px;
}

th {
  background: #f1f2f6;
  font-size: 15px;
  font-weight: 600;
  color: #2f3542;
}

tbody tr:hover {
  background: #f8f9fd;
}

/* Status Colors */
td.status-pending {
  color: #ffa502;
  font-weight: bold;
}

td.status-approved {
  color: #2ed573;
  font-weight: bold;
}

td.status-rejected {
  color: #ff4757;
  font-weight: bold;
}

/* Action Buttons */
.btn {
  padding: 6px 12px;
  border-radius: 6px;
  font-size: 13px;
  font-weight: 500;
  border: none;
  cursor: pointer;
  transition: all 0.3s ease;
}

.btn-approve {
  background: #2ed573;
  color: #fff;
}

.btn-reject {
  background: #ff4757;
  color: #fff;
}

.btn-view {
  background: #3742fa;
  color: #fff;
}

.btn:hover {
  opacity: 0.9;
}
  </style>
</head>
<body>
  <div class="sidebar">
    <h2>Eventify</h2>
    <a href="admindashboard.php">Dashboard</a>
    <a href="requestadmin.php">Approved Requests</a>
    <a href="requestrejected.php">Rejected Requests</a>
    <a href="requestconfirmed.php">Confirmed Requests</a>
    <a href="venues_form.php">Venues</a>
    <a href="checkAvailibility.php"  class="active">Check Availability</a>
    <a href="#">Settings</a>
  </div>

  <div class="main">
    <!-- Top Bar -->
    <div class="topbar">
      <h1>Admin Dashboard</h1>
      <div class="user-controls">
        <span>Welcome, <?php echo htmlspecialchars($_SESSION['admin_name']); ?></span>
        <form action="logout.php" method="post">
          <button type="submit" class="logout-btn">Logout</button>
        </form>
      </div>
    </div>

    <!-- 🔍 Search by Date -->
    <div class="search-bar">
      <form method="GET" action="">
        <label for="search_date">Search by Date: </label>
        <input type="date" name="search_date" id="search_date" value="<?php echo htmlspecialchars($search_date); ?>" required>
        <button type="submit">Search</button>
        <a href="admindashboard.php" class="reset-btn">Reset</a>
      </form>
    </div>

    <!-- 📋 Booking Table -->
    <div class="table-container">
      <h2>Booking Records</h2>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Date</th>
            <th>Venue</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
              <tr>
                <td><?php echo $row['booking_id']; ?></td>
                <td><?php echo htmlspecialchars($row['FullName']); ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
                <td><?php echo $row['Date']; ?></td>
                <td><?php echo htmlspecialchars($row['venue']); ?></td>
              </tr>
            <?php endwhile; ?>
          <?php else: ?>
            <tr>
              <td colspan="5" style="text-align:center; color:red;">No bookings found for this date.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
