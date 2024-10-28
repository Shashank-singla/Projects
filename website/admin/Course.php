<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: log.html");
    exit();
}

include 'config.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_name = $_POST['course_name'];
    $time_period = $_POST['time_period'];
    $cost = $_POST['cost'];
    $uploaded_file = $_FILES['uploaded_file']['name'];
    
    // File upload path
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES['uploaded_file']['name']);
    move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $target_file);

    $query = "INSERT INTO courses (course_name, time_period, cost, uploaded_file) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssds", $course_name, $time_period, $cost, $uploaded_file);
    $stmt->execute();

    header("Location: courses_List.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course</title>
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
        .form-container {
            width: 400px;
            padding: 20px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
        }
        .form-container h2 {
            margin: 10px 0 20px;
            font-size: 24px;
            color: #333;
        }
        .form-container form {
            text-align: left;
        }
        .form-container form label {
            display: block;
            font-size: 14px;
            color: #333;
            margin-top: 10px;
        }
        .form-container form input,
        .form-container form textarea {
            width: 95%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }
        .form-container form button {
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
        .form-container form button:hover {
            background: #333;
        }
        .form-container .back-button {
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
        .form-container .back-button:hover {
            background: #d32f2f;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Add Course</h2>
        <form action="course.php" method="POST" enctype="multipart/form-data">
            <label for="course_name">Course Name:</label>
            <input type="text" id="course_name" name="course_name" required>
            <label for="time_period">Time Period:</label>
            <input type="text" id="time_period" name="time_period" required>
            <label for="cost">Cost:</label>
            <input type="number" id="cost" name="cost" required>
            <label for="uploaded_file">Upload File:</label>
            <input type="file" id="uploaded_file" name="uploaded_file" required>
            <button type="submit">Add Course</button>
        </form>
        <button class="back-button" onclick="window.location.href='Courses_List.php'">Back</button>
    </div>
</body>
</html>
