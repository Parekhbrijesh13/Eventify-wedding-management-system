<?php
session_start();
include 'connection.php';

$username = $_POST['username'];
$password = $_POST['password'];
            

// Query user data
$sql = "SELECT id, UserName, Password, email FROM signup_data WHERE UserName = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();

    if (password_verify($password, $row['Password'])) {
        
        // ✅ If admin (username = brijesh)
        if ($row['UserName'] === 'brijesh') {
            $_SESSION['admin_id']   = $row['id'];
            $_SESSION['admin_name'] = $row['UserName'];
            header("Location: admindashboard.php");
        } 
        // ✅ Else normal user
        else {
            $_SESSION['user_id']   = $row['id'];
            $_SESSION['user_name'] = $row['UserName'];
            $_SESSION['email'] = $row['email'];
            header("Location: index.php");
        }
        exit;
    } else {
        echo "<script>alert('❌ Incorrect password!'); window.location.href='login.php';</script>";
    }
} else {
    echo "<script>alert('❌ Username not found!'); window.location.href='login.php';</script>";
}
?>
