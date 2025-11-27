<?php
$host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "eventify";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $number = trim($_POST['phone'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmpassword = $_POST['confirmpassword'] ?? '';

    // Collect missing fields
    $missing = [];
    if (!$username) $missing[] = 'Username';
    if (!$email) $missing[] = 'Email';
    if (!$number) $missing[] = 'Phone number';
    if (!$password) $missing[] = 'Password';
    if (!$confirmpassword) $missing[] = 'Confirm password';

    if (!empty($missing)) {
        http_response_code(400);
        echo "Please fill in the following fields: " . implode(", ", $missing);
        exit;
    }

    if ($password !== $confirmpassword) {
        http_response_code(400);
        echo "Passwords do not match.";
        exit;
    }

    $conn = new mysqli($host, $db_user, $db_pass, $db_name);

    if ($conn->connect_error) {
        http_response_code(500);
        echo "Database connection failed: " . $conn->connect_error;
        exit;
    }

    if (strtolower($username) === 'brijesh') {
        http_response_code(403);
        echo "❌ Username 'brijesh' is reserved and cannot be used.";
        exit;
    }

    // Check if username already exists
    $stmt = $conn->prepare("SELECT id FROM signup_data WHERE UserName = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        http_response_code(409);
        echo "Username already taken.";
        $stmt->close();
        $conn->close();
        exit;
    }

    $stmt->close();

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO signup_data (UserName, email, number, Password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $email, $number, $hashed_password);

    if ($stmt->execute()) {
        echo "<script>
                alert('Registration Successful!');
                window.location.href = '../login.php';
              </script>";
    } else {
        http_response_code(500);
        echo "SQL error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

} else {
    http_response_code(405);
    echo "Invalid request.";
}
?>
