<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: log.html");
    exit();
}

include 'config.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $question1 = $_POST['question1'];
    $question2 = $_POST['question2'];

    $query = "UPDATE users SET username = ?, email = ?, question1 = ?, question2 = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssi", $username, $email, $question1, $question2, $id);
    $stmt->execute();

    header("Location: admin_home.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM users WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
} else {
    header("Location: admin_home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #ffafbd, #ffc3a0);
            font-family: Arial, sans-serif;
        }
        .edit-container {
            width: 400px;
            padding: 20px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
        }
        .edit-container h2 {
            margin: 10px 0 20px;
            font-size: 24px;
            color: #333;
        }
        .edit-container form {
            text-align: left;
        }
        .edit-container form label {
            display: block;
            font-size: 14px;
            color: #333;
            margin-top: 10px;
        }
        .edit-container form input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }
        .edit-container form button {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            border: none;
            border-radius: 5px;
            background: #000;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease-in-out;
        }
        .edit-container form button:hover {
            background: #333;
        }
        .edit-container .back-button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            background: #f44336;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease-in-out;
        }
        .edit-container .back-button:hover {
            background: #d32f2f;
        }
    </style>
</head>
<body>
    <div class="edit-container">
        <h2>Edit User</h2>
        <form action="edit_user.php" method="POST">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($row['username']); ?>" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>
            <label for="question1">Security Question 1:</label>
            <input type="text" id="question1" name="question1" value="<?php echo htmlspecialchars($row['question1']); ?>" required>
            <label for="question2">Security Question 2:</label>
            <input type="text" id="question2" name="question2" value="<?php echo htmlspecialchars($row['question2']); ?>" required>
            <button type="submit">Save Changes</button>
        </form>
        <button class="back-button" onclick="window.location.href='admin_home.php'">Back</button>
    </div>
</body>
</html>
