<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Eventify-Login Page.</title>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Poppins&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      min-height: 100vh;
      background: linear-gradient(-45deg, #fbc2eb, #a6c1ee, #fbc2eb);
      background-size: 400% 400%;
      animation: gradientBG 15s ease infinite;
      display: flex;
      padding: 0;
    }

    @keyframes gradientBG {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .container {
      display: flex;
      width: 100%;
      height: 100vh;
    }

    .left-section {
      width: 50%;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      color: white;
      padding: 40px;
      text-align: center;
    }

    .left-section img {
    width: 220px;
    height: auto;
    margin-top:-50px;
    filter: brightness(0) invert(1); /* turns black to white */
  }

  .left-section img {
    animation: fadeIn 1s ease-in-out, float 4s ease-in-out infinite;
  }

    @keyframes float {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-8px); }
    100% { transform: translateY(0px); }
  }



    .left-section h1 {
      font-family: 'Dancing Script', cursive;
      font-size: 42px;
      margin-bottom: 15px;
    }

    .left-section p {
      font-size: 18px;
      font-weight:500;
      font-style: italic;
      color: #fffafc;
      line-height: 1.6;
      max-width: 400px;
      margin-bottom: 30px;
    }

    .right-section {
      width: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-box {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(15px);
      border-radius: 20px;
      padding: 40px 30px;
      width: 340px;
      max-width: 400px;
      color: white;
      box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
      animation: fadeIn 1s ease;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(-30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .login-box h2 {
      text-align: center;
      margin-bottom: 30px;
      font-family: 'Dancing Script', cursive;
      font-size: 28px;
    }

    .input-box {
      margin-bottom: 20px;
    }

    .input-box label {
      display: block;
      margin-bottom: 6px;
      font-weight: 500;
    }

    .input-box input {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 10px;
      outline: none;
      font-size: 16px;
      background: rgba(255, 255, 255, 0.2);
      color: white;
      transition: background 0.3s ease;
    }

    .input-box input::placeholder {
      color: rgba(255, 255, 255, 0.7);
    }

    .input-box input:focus {
      background: rgba(255, 255, 255, 0.3);
    }

    .remember-forgot {
      display: flex;
      justify-content: space-between;
      font-size: 14px;
      margin-bottom: 20px;
    }

    .remember-forgot label {
      display: flex;
      align-items: center;
      gap: 5px;
    }

    .remember-forgot a {
      color: white;
      text-decoration: none;
    }

    .remember-forgot a:hover {
      text-decoration: underline;
    }

    .login-btn {
      width: 100%;
      padding: 12px;
      background-color: white;
      color: #2e8b57;
      font-weight: bold;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      font-size: 16px;
      transition: transform 0.2s ease, box-shadow 0.3s ease;
    }

    .login-btn:hover {
      transform: scale(1.03);
      box-shadow: 0 0 12px rgba(255, 255, 255, 0.4);
    }

    .signup-link {
      text-align: center;
      margin-top: 20px;
      font-size: 14px;
    }

    .signup-link a {
      color: white;
      text-decoration: none;
      font-weight: bold;
    }

    .signup-link a:hover {
      text-decoration: underline;
    }

    @media (max-width: 768px) {
      .container {
        flex-direction: column;
      }
      .left-section,
      .right-section {
        width: 100%;
      }
      .left-section {
        padding: 20px;
      }
    }
  </style>
</head>
<body>

  <div class="container">
    <!-- Left Side: Logo & Slogan -->
    <div class="left-section">
      <img src="assets/img/Eventify-logo.png" alt="Eventify Logo" />
      <h1 style="color: white; font-size: 28px; margin-bottom: 10px;">Unlock Your Dream Destination Wedding in Gujarat</h1>
      <p>
        Where every celebration becomes a fairytale. <br> 
        Plan your dream wedding with elegance.  <br>
        From "Yes" to "I do" — we’re by your side.  <br>
        Turning your special day into timeless memories.

      </p>
    </div>

    <!-- Right Side: Login Box -->
    <div class="right-section">
      <div class="login-box">
        <h2>Login to Your Account</h2>
        <form action="loginfile.php" method="post">
          <div class="input-box">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>
          </div>
          <div class="input-box">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
          </div>
          <div class="remember-forgot">
            <label><input type="checkbox"> Remember me</label>
            <a href="#">Forgot Password?</a>
          </div>
          <button class="login-btn" type="submit">Login</button>
          <div class="signup-link">
            Don't have an account? <a href="signup.php">Sign Up</a>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>
</html>
