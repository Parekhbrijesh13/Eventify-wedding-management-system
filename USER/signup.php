<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Eventify - SignUp Page</title>
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
      justify-content: center;
      align-items: center;
      padding: 0;
    }

    @keyframes gradientBG {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .signup-box {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(15px);
      border-radius: 20px;
      padding: 30px 25px;
      width: 340px;
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

    .signup-box h2 {
      text-align: center;
      margin-bottom: 25px;
      font-family: 'Dancing Script', cursive;
      font-size: 24px;
    }

    .input-box {
      margin-bottom: 16px;
    }

    .input-box label {
      display: block;
      margin-bottom: 5px;
      font-size: 14px;
      font-weight: 500;
    }

    .input-box input {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 8px;
      outline: none;
      font-size: 14px;
      background: rgba(255, 255, 255, 0.2);
      color: black;
    }

    .input-box input::placeholder {
      color: rgba(255, 255, 255, 0.7);
    }

    .input-box input:focus {
      background: rgba(255, 255, 255, 0.3);
    }

    .signup-btn {
      width: 100%;
      padding: 10px;
      background-color: white;
      color: #2e8b57;
      font-weight: bold;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 15px;
      transition: transform 0.2s ease, box-shadow 0.3s ease;
      margin-top: 5px;
    }

    .signup-btn:hover {
      transform: scale(1.03);
      box-shadow: 0 0 12px rgba(255, 255, 255, 0.4);
    }

    .login-link {
      text-align: center;
      margin-top: 15px;
      font-size: 13px;
    }

    .login-link a {
      color: white;
      text-decoration: none;
      font-weight: bold;
    }

    .login-link a:hover {
      text-decoration: underline;
    }

    .role-box {
      margin-bottom: 16px;
    }

    .role-box label {
      margin-right: 10px;
    }

    .terms-box {
      margin-bottom: 15px;
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 13px;
    }

    .terms-box a {
      color: #fff;
      text-decoration: underline;
    }

    .role-box .role-options {
      display: flex;
      gap: 15px;
      margin-top: 8px;
    }

    .role-options label {
      display: flex;
      align-items: center;
      gap: 5px;
      font-size: 14px;
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

    .right-section {
      width: 50%;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      color: white;
      padding: 40px;
      text-align: center;
      margin-left:-40px;
    }

    .right-section img {
    width: 220px;
    height: auto;
    margin-top:-50px;
    filter: brightness(0) invert(1); /* turns black to white */
  }

  .right-section img {
    animation: fadeIn 1s ease-in-out, float 4s ease-in-out infinite;
  }

    @keyframes float {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-8px); }
    100% { transform: translateY(0px); }
  }



    .right-section h1 {
      font-family: 'Dancing Script', cursive;
      font-size: 42px;
      margin-bottom: 15px;
    }

    .right-section p {
      font-size: 18px;
      font-weight:500;
      font-style: italic;
      color: #fffafc;
      line-height: 1.6;
      max-width: 400px;
      margin-bottom: 30px;
    }

  </style>
</head>
<body>
  <div class="left-section">
  <div class="signup-box">
    <h2>Sign Up Here..</h2>

    <form action="forms/signupfile.php" method="POST">

     

      <div class="input-box">
        <label for="username">User Name:</label>
        <input type="text" id="username" name="username" placeholder="Your User Name" required>
      </div>

      <div class="input-box">
        <label for="email">Email:</label>
        <input type="Email" id="email" name="email" placeholder="Your Email" required>
      </div>

      <div class="input-box">
        <label for="number">Phone Number:</label>
        <input type="text" id="phone" name="phone" placeholder="Your Phone Number" required>
      </div>

      <div class="input-box">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Your Password" required>
      </div>

      <div class="input-box">    
        <label for="confirmpassword">Confirm Password:</label>
        <input type="password" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password" required>
      </div>

      <div class="terms-box">
        <input type="checkbox" name="terms" required>
        <label>I agree to the <a href="#">Terms and Conditions</a></label>
      </div>

      <button class="signup-btn" type="submit">Sign Up</button>

      <div class="login-link">
        Already have an account? <a href="login.php">Login</a>
      </div>
      
    </form>
  </div>
  </div>

    <div class="right-section">
      <img src="assets/img/Eventify-logo.png" alt="Eventify Logo" />
      <h1 style="color: white; font-size: 28px; margin-bottom: 10px;">Unlock Your Dream Destination Wedding in Gujarat</h1>
      <p>
        Where every celebration becomes a fairytale. <br> 
        Plan your dream wedding with elegance.  <br>
        From "Yes" to "I do" — we’re by your side.  <br>
        Turning your special day into timeless memories.

      </p>
    </div>
</body>
</html>

