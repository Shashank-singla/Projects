<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
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
        .container {
            width: 400px;
            padding: 20px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
            overflow: hidden;
            transition: height 0.3s ease-in-out;
        }
        .container form {
            padding: 20px;
            box-sizing: border-box;
        }
        .container form h2 {
            margin: 10px 0 20px;
            font-size: 24px;
            color: #333;
        }
        .container form img {
            width: 150px;
            height: 150px;
            margin-bottom: 20px;
        }
        .container form label {
            display: block;
            text-align: left;
            font-size: 12px;
            color: #333;
            margin-left: 10px;
        }
        .container form input {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }
        .container form button {
            width: 95%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: #000;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease-in-out;
        }
        .container form button:hover {
            background: #333;
        }
        .password-container {
            position: relative;
            display: flex;
            align-items: center;
        }
        .password-container input {
            flex: 1;
        }
        .password-container .toggle-password {
            position: absolute;
            right: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container" id="form-container">
        <?php
        session_start();
        $step = isset($_GET['step']) ? intval($_GET['step']) : 1;

        if ($step == 2 && isset($_SESSION['username'])) {
            ?>
            <form id="password-form" action="change_password.php" method="POST">
                <img src="logo/logo1.png" alt="logo">
                <h2>Change Password</h2>
                <label for="new-password">New Password</label>
                <div class="password-container">
                    <input id="new-password" name="password" type="password" placeholder="New Password" required>
                    <i class="fas fa-eye toggle-password" onclick="togglePassword('new-password')"></i>
                </div>
                <button type="submit">Change Password</button>
            </form>
            <?php
        } else {
            ?>
            <form id="question-form" action="forget_password.php" method="POST">
                <img src="logo/logo1.png" alt="logo">
                <h2>Forget Password</h2>
                <label for="username">Username</label>
                <input id="username" name="username" type="text" placeholder="Username" required>
                <label for="question1">Your Best Friend's Name</label>
                <input id="question1" name="question1" type="text" placeholder="Your Best Friend's Name" required>
                <label for="question2">Your Favorite Movie</label>
                <input id="question2" name="question2" type="text" placeholder="Your Favorite Movie" required>
                <button type="submit">Verify</button>
            </form>
            <?php
        }
        ?>
    </div>
    <script>
        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            const icon = input.nextElementSibling;
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }
    </script>
</body>
</html>
