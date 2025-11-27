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
  <meta charset="UTF-8" />
  <title>Eventify - Admin Dashboard</title>
  <style>
/* Reset and Base */
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

/* Stats Cards */
.stats {
  display: flex;
  gap: 20px;
  flex-wrap: wrap;
  margin-bottom: 30px;
}

.card {
  background: white;
  padding: 20px;
  border-radius: 8px;
  min-width: 220px;
  flex: 1;
  box-shadow: 0 4px 10px rgba(0,0,0,0.05);
  transition: transform 0.2s ease;
}

.card:hover {
  transform: translateY(-3px);
}

.card h3 {
  font-size: 14px;
  color: #7f8fa6;
  margin-bottom: 8px;
}

.card p {
  font-size: 24px;
  font-weight: bold;
  color: #2f3542;
}

/* Table */
.table-container {
  background: white;
  border-radius: 8px;
  padding: 20px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.05);
  margin-bottom: 30px;
  overflow-x: auto;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 15px;
  min-width: 1000px;
}

th, td {
  padding: 12px 15px;
  border-bottom: 1px solid #eee;
  text-align: left;
}

th {
  background-color: #f1f2f6;
  color: #2f3542;
}

/* Status Colors */
td.status-pending {
  color: orange;
  font-weight: bold;
}

td.status-approved {
  color: green;
  font-weight: bold;
}

td.status-rejected {
  color: red;
  font-weight: bold;
}

/* Action Buttons */
.btn {
     display: flex;
    justify-content: center;  /* center horizontally */
    align-items: center;      /* center vertically */
    width: 80px;   /* same width */
    height: 35px;  /* same height */
    font-size: 14px;
    font-weight: bold;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.btn-approve {
  background-color: #2ed573;
  color: white;
}

.btn-reject {
  background-color: #ff4757;
  color: white;
}

.btn-view {
  background-color: #3742fa;
  color: white;
}

/* Button spacing */
td .btn {
  margin-right: 8px;
}

td .btn:last-child {
  margin-right: 0;
}
.action-buttons {
  display: flex;
  flex-direction: column; 
  gap: 8px;   /* 👈 buttons ke beech ka gap */
}
.action-buttons {
    display: flex;
    gap: 10px;
}

.btn {
    padding: 6px 12px;
    border-radius: 6px;
    font-size: 14px;
    text-decoration: none;
    color: white;
    cursor: pointer;
}

.btn-approve {
    background-color: #28a745; /* green */
}

.btn-reject {
    background-color: #ff4757; /* red */
}

  </style>
</head>
<body>
  <div class="sidebar">
    <h2>Eventify</h2>
    <a href="admindashboard.php" >Dashboard</a>
    <a href="requestadmin.php" class="active">Approved Requests</a>
    <a href="requestrejected.php" >Rejected Requests</a>
    <a href="requestconfirmed.php">Confirmed Requests</a>
    <a href="venues_form.php">Venues</a>
    <a href="checkAvailibility.php">check Availibility</a>
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


    <!-- Requests Table -->
    <div class="table-container">
      <h2>Approved Requests</h2>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th><th>Phone</th><th>Email</th>
            <th>Date</th><th>Guests</th><th>budget</th>
            <th>City</th><th>Venue</th><th>Type</th>
            <th>Time</th><th>Status</th>
          </tr>
        </thead>
        <tbody>
          
          <?php
          include 'connection.php';
      $sql = "SELECT * FROM booking_data where status = 'approved' " ;
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
              echo "<tr>
        <td>".$row['booking_id']."</td>
        <td>".$row['FullName']."</td>
        <td>".$row['PhoneNumber']."</td>
        <td>".$row['Email']."</td>
        <td>".$row['Date']."</td>
        <td>".$row['NumberOfGuest']."</td>
        <td>".$row['budget']."</td>
        <td>".$row['City']."</td>
        <td>".$row['Venue']."</td>
        <td>".$row['FunctionType']."</td>
        <td>".$row['FunctionTime']."</td>
        <td>".$row['status']."</td>
      </tr>";

          }
      } else {
          echo "<tr><td colspan='12'>No Records Found</td></tr>";
      }

      $conn->close();
      ?>


        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
