<?php
session_start();
include 'db.php'; // Ensure your database connection is correct

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: log.html");
    exit();
}

// Handle password verification
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['verify_password'])) {
    $username = $_SESSION['username'];
    $current_password = $_POST['current_password'];

    // Fetch current password from the database
    $query = "SELECT password FROM users WHERE username = '$username'";
    $result = $conn->query($query);
    $user = $result->fetch_assoc();

    if ($user && $user['password'] === $current_password) {
        // Password is correct, redirect to edit page
        echo "<script>alert('password is correct.'); window.location.href='edit.php';</script>";
        exit();
    } else {
        // Incorrect password
        echo "<script>alert('Incorrect password. Please try again.'); window.location.href='verify_password.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #ffafbd, #ffc3a0);
            margin: 0;
            padding: 0;
        }
        .container {
            width: 400px;
            padding: 20px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin: 50px auto;
            position: relative;
        }
        .container h2 {
            margin: 0 0 20px;
            font-size: 24px;
            color: #333;
        }
        .container form {
            display: flex;
            flex-direction: column;
        }
        .container form label {
            font-size: 14px;
            color: #333;
            margin-top: 10px;
        }
        .container form input {
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            width: calc(100% - 30px);
        }
        .container form button {
            margin-top: 20px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: #000;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
        .container form button:hover {
            background: #333;
        }
        .error {
            color: red;
            margin-bottom: 10px;
        }
        .back-button {
            margin-top: 10px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: #f44336;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
        }
        .back-button:hover {
            background: #d32f2f;
        }
        .fa-eye {
            position: absolute;
            right: 19px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Verify Password</h2>
        <form action="verify_password.php" method="POST">
            <label for="current_password">Current Password:</label>
            <div style="position: relative;">
                <input type="password" id="current_password" name="current_password" required>
                <i class="fas fa-eye" id="togglePassword"></i>
            </div>
            <button type="submit" name="verify_password">Verify Password</button>
        </form>
        <button class="back-button" onclick="window.location.href='account.php'">Back</button>
    </div>
    <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordInput = document.getElementById('current_password');
            const type = passwordInput.type === 'password' ? 'text' : 'password';
            passwordInput.type = type;
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>
</html>
