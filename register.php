<?php
// Include database configuration
include('config.php');

// Start the session
session_start();

// If the user is already logged in, redirect to products page
if (isset($_SESSION['user'])) {
    header("Location: productes.php");
    exit;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and sanitize form inputs
    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Securely hash the password

    // Check if username or email already exists
    $check = mysqli_query($con, "SELECT * FROM users WHERE username = '$username' OR email = '$email'");
    if (mysqli_num_rows($check) > 0) {
        // Show error if user exists
        $error = "Username or email already taken.";
    } else {
        // Insert new user into the database
        mysqli_query($con, "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')");

        // Set session and redirect to products page
        $_SESSION['user'] = $username;
        header("Location: productes.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>Register New Account</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">

    <style>
        /* Basic page styling */
        body {
            font-family: 'Cairo', sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .register-container {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            width: 400px;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }
        button {
            background-color: #28a745;
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
            background-color: #218838;
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

    <!-- Registration Form -->
    <div class="register-container">
        <h2>Create a New Account</h2>

        <!-- Show error message if any -->
        <?php if (isset($error)) echo "<div class='error'>$error</div>"; ?>

        <form method="post">
            <!-- Username input -->
            <input type="text" name="username" placeholder="Username" required>

            <!-- Email input -->
            <input type="email" name="email" placeholder="Email Address" required>

            <!-- Password input -->
            <input type="password" name="password" placeholder="Password" required>

            <!-- Submit button -->
            <button type="submit">Register</button>
        </form>

        <!-- Link to login page -->
        <div class="message">
            Already have an account? <a href="login.php">Login here</a>
        </div>
    </div>

</body>
</html>
