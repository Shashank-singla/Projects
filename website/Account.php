<?php
session_start();
include 'db.php';

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: log.html');
    exit;
}

$username = $_SESSION['username'];

$query = "SELECT username, email, question1, question2 FROM users WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

$user = null;
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    $user = ["error" => "User not found"];
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: "Montserrat", sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #ffafbd, #ffc3a0);
        }

        .account-container {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            padding: 40px;
            width: 60%;
            max-width: 800px;
            margin: 40px auto;
            text-align: center;
        }

        .account-container h2 {
            color: #333;
            margin-bottom: 20px;
        }

        .account-details {
            text-align: left;
            margin-bottom: 20px;
        }

        .account-details p {
            font-size: 16px;
            color: #666;
            margin: 10px 0;
        }

        .account-details label {
            font-weight: bold;
            color: #333;
        }

        .buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .buttons button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            background: black;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease-in-out;
        }

        .buttons button:hover {
            background: #333;
        }

        .responsive-img {
            max-width: 200px;
            height: 200px;
            margin-right: 90%;
            margin-top: -110px;
            display: flex;
            margin-bottom: -80px;
        }

        section {
            margin-bottom: 2rem;
        }

        header {
            background: black;
            color: #fff;
            padding: 0.4rem;
            text-align: right;
        }

        .nav {
            margin-top: 25px;
        }

        .nav a {
            padding: 10px;
            margin-right: 20px;
            text-decoration: none;
            color: #ffffff;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <header>
        <section class="nav">
            <a href="home.php"><i class="fas fa-home"></i> HOME</a>
            <a href="about.html"><i class="fas fa-info-circle"></i> ABOUT US</a>
            <a href="Course.php"><i class="fas fa-book"></i> COURSES</a>
            <a href="contact.html"><i class="fas fa-envelope"></i> CONTACT</a>
            <a href="account.php"><i class="fas fa-user"></i> ACCOUNT</a>
            <div class="search">
                <img src="logo/logo2.png" alt="Welcome Image" class="responsive-img">
            </div>
        </section>
    </header>
    <div class="account-container">
        <h2>Account Details</h2>
        <div class="account-details">
            <?php if (isset($user['error'])): ?>
                <p><?php echo htmlspecialchars($user['error']); ?></p>
            <?php else: ?>
                <p><label>Username:</label> <?php echo htmlspecialchars($user['username']); ?></p>
                <p><label>Email:</label> <?php echo htmlspecialchars($user['email']); ?></p>
                <p><label>Security Question 1:</label> <?php echo htmlspecialchars($user['question1']); ?></p>
                <p><label>Security Question 2:</label> <?php echo htmlspecialchars($user['question2']); ?></p>
            <?php endif; ?>
        </div>
        <div class="buttons">
            <button onclick="logout()">Logout</button>
            <button onclick="editDetails()">Edit Details</button>
        </div>
    </div>
    <script>
        function logout() {
            window.location.href = 'logout.php';
        }

        function editDetails() {
            window.location.href = 'verify_password.php';
        }
    </script>
</body>
</html>
