<?php
session_start();
include 'db.php'; // Ensure your database connection is correct

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: log.html");
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_details'])) {
    $username = $_SESSION['username'];
    $new_username = $_POST['username'] ?? '';
    $new_email = $_POST['email'] ?? '';
    $new_question1 = $_POST['question1'] ?? '';
    $new_question2 = $_POST['question2'] ?? '';
    $new_password = $_POST['new_password'] ?? '';

    // Start building the query
    $query = "UPDATE users SET ";
    $params = [];
    $types = '';

    // Check and append each field to the query
    if (!empty($new_username)) {
        $query .= "username = ?, ";
        $params[] = $new_username;
        $types .= 's';
    }
    if (!empty($new_email)) {
        $query .= "email = ?, ";
        $params[] = $new_email;
        $types .= 's';
    }
    if (!empty($new_question1)) {
        $query .= "question1 = ?, ";
        $params[] = $new_question1;
        $types .= 's';
    }
    if (!empty($new_question2)) {
        $query .= "question2 = ?, ";
        $params[] = $new_question2;
        $types .= 's';
    }
    if (!empty($new_password)) {
        $query .= "password = ?, ";
        $params[] = $new_password; // Store plain text password
        $types .= 's';
    }

    // Remove trailing comma and space
    $query = rtrim($query, ', ');
    $query .= " WHERE username = ?";
    $params[] = $username;
    $types .= 's';

    // Prepare and execute the query
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param($types, ...$params);
        if ($stmt->execute()) {
            $stmt->close();
            // Redirect after update
            header("Location: account.php");
            exit();
        } else {
            // Handle query execution error
            echo "Error executing query: " . $stmt->error;
        }
    } else {
        // Handle query preparation error
        echo "Error preparing statement: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f0f0;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #ffafbd, #ffc3a0);
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
            position: relative; /* Added for positioning the eye icon */
        }
        .container form .fa-eye {
            position: absolute;
            right: 10px;
            top: 38px;
            cursor: pointer;
            font-size: 18px;
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
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Account</h2>
        <form action="edit.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo $_SESSION['username']; ?>" readonly>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
            <label for="question1">Your Best Friend's Name:</label>
            <input type="text" id="question1" name="question1">
            <label for="question2">Your Favorite Movie:</label>
            <input type="text" id="question2" name="question2">
            <label for="new_password">New Password (leave empty to keep current password):</label>
            <input type="password" id="new_password" name="new_password">
            <i class="fas fa-eye" id="togglePassword"></i>
            <button type="submit" name="update_details">Save Changes</button>
        </form>
        <button class="back-button" onclick="window.location.href='account.php'">Back</button>
    </div>
    <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordInput = document.getElementById('new_password');
            const type = passwordInput.type === 'password' ? 'text' : 'password';
            passwordInput.type = type;
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>
</html>
