<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Eventify - Admin Dashboard</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .sidebar {
         animation: fadeUp 0.8s ease-in-out;
        }

    /* Animation Keyframes */
        @keyframes fadeUp {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
        }

        /* Apply animation on load */
        .main {
        animation: fadeUp 0.6s ease-in-out;
        }

        .card {
        animation: fadeUp 0.8s ease-in-out;
        }

        .table-container {
        animation: fadeUp 1s ease-in-out;
        }


    body {
      display: flex;
      min-height: 100vh;
      background-color: #f1f3f6;
    }

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

    .main {
      margin-left: 240px;
      padding: 30px;
      flex: 1;
      overflow-x: hidden;
    }

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

    .topbar .user-controls {
      display: flex;
      align-items: center;
      gap: 15px;
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
      transition: background 0.3s;
    }

    .logout-btn:hover {
      background-color: #e84118;
    }

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

    .table-container {
      background: white;
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.05);
      overflow-x: auto;
      margin-bottom: 30px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 15px;
      min-width: 600px;
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

    td.status-upcoming {
      color: green;
      font-weight: bold;
    }

    td.status-completed {
      color: red;
      font-weight: bold;
    }

    td.status-pending {
      color: orange;
      font-weight: bold;
    }

    .accept-btn {
      background-color: #2ed573;
      color: white;
      padding: 6px 12px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 14px;
    }

    .accept-btn:hover {
      background-color: #1eae60;
    }

    @media (max-width: 768px) {
      .sidebar {
        display: none;
      }

      .main {
        margin-left: 0;
        padding: 15px;
      }

      .stats {
        flex-direction: column;
      }

      .topbar {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
      }
    }
  </style>
</head>
<body>
  <div class="sidebar">
    <h2>Eventify</h2>
    <a href="#" class="active">Dashboard</a>
    <a href="#">Events</a>
    <a href="#">Users</a>
    <a href="#">Bookings</a>
    <a href="#">Payments</a>
    <a href="#">Settings</a>
  </div>

  <div class="main">
    <div class="topbar">
      <h1>Admin Dashboard</h1>
      <div class="user-controls">
        <span>Welcome, Admin</span>
        <button class="logout-btn">Logout</button>
      </div>
    </div>

    <div class="stats">
      <div class="card">
        <h3>Total Events</h3>
        <p>128</p>
      </div>
      <div class="card">
        <h3>Total Users</h3>
        <p>1,253</p>
      </div>
      <div class="card">
        <h3>Revenue</h3>
        <p>₹2,30,000</p>
      </div>
      <div class="card">
        <h3>Upcoming Events</h3>
        <p>12</p>
      </div>
    </div>

    <div class="table-container">
      <h2>Recent Events</h2>
      <table>
        <thead>
          <tr>
            <th>Event Name</th>
            <th>Date</th>
            <th>Location</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Tech Summit 2025</td>
            <td>2025-08-10</td>
            <td>Ahmedabad</td>
            <td class="status-upcoming">Upcoming</td>
          </tr>
          <tr>
            <td>Startup Meet</td>
            <td>2025-07-20</td>
            <td>Surat</td>
            <td class="status-completed">Completed</td>
          </tr>
          <tr>
            <td>Cultural Fest</td>
            <td>2025-07-30</td>
            <td>Vadodara</td>
            <td class="status-pending">Pending</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="table-container">
      <h2>Event Bookings</h2>
      <table>
        <thead>
          <tr>
            <th>Event</th>
            <th>User</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Tech Summit 2025</td>
            <td>Rahul Shah</td>
            <td class="booking-status">Pending</td>
            <td><button class="accept-btn" onclick="acceptBooking(this)">Accept</button></td>
          </tr>
          <tr>
            <td>Cultural Fest</td>
            <td>Priya Mehta</td>
            <td class="booking-status">Pending</td>
            <td><button class="accept-btn" onclick="acceptBooking(this)">Accept</button></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <script>
    function acceptBooking(btn) {
      const row = btn.closest("tr");
      const statusCell = row.querySelector(".booking-status");
      statusCell.textContent = "Accepted";
      statusCell.style.color = "green";
      btn.disabled = true;
      btn.textContent = "Accepted";
      btn.style.backgroundColor = "#ccc";
    }
  </script>
</body>
</html>
