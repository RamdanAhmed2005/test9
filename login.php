<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            width: 350px;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 12px;
            width: 100%;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 15px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .message {
            margin-top: 15px;
            font-size: 14px;
        }
        .message a {
            color: #007bff;
            text-decoration: none;
        }
        .error {
            color: red;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>

        <!-- Show error if login fails -->
        <?php

session_start();
include('config.php');

// If the user is already logged in, redirect to home page
if (isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input    = $_POST['username_or_email']; // Username or Email input
    $password = $_POST['password']; // Password input

    // Query the user by username or email
    $result = mysqli_query($con, "SELECT * FROM users WHERE username = '$input' OR email = '$input'");
    $user = mysqli_fetch_assoc($result);

    // Verify password and login
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['username']; // Store username in session
        header("Location: index.php"); // Redirect after successful login
        exit;
    } else {
        $error = "Invalid login credentials";
    }
}

         if (isset($error)) echo "<div class='error'>$error</div>"; 
         ?>

        <!-- Login Form -->
        <form method="post">
            <input type="text" name="username_or_email" placeholder="Username or Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>

        <!-- Link to register page -->
        <div class="message">
            Don't have an account? <a href="register.php">Register now</a>
        </div>
    </div>
</body>
</html>
