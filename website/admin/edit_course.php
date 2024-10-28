<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: log.html");
    exit();
}

include 'config.php'; // Database connection

// Get the course ID from the query parameter
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
} else {
    // Redirect if no ID is provided
    header("Location: courses_List.php");
    exit();
}

// Fetch the current course details
$query = "SELECT * FROM courses WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    // Redirect if course not found
    header("Location: courses_List.php");
    exit();
}

$course = $result->fetch_assoc();
$stmt->close();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_name = $_POST['course_name'] ?? '';
    $time_period = $_POST['time_period'] ?? '';
    $cost = $_POST['cost'] ?? '';
    $uploaded_file = $_FILES['uploaded_file']['name'] ?? '';

    // Handle file upload
    if ($uploaded_file) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($uploaded_file);
        move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $target_file);
        $uploaded_file = basename($uploaded_file);
    } else {
        $uploaded_file = $course['uploaded_file']; // Keep existing file if no new file is uploaded
    }

    // Update course details
    $query = "UPDATE courses SET course_name = ?, time_period = ?, cost = ?, uploaded_file = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssssi', $course_name, $time_period, $cost, $uploaded_file, $id);

    if ($stmt->execute()) {
        // Redirect after successful update
        header("Location: courses_List.php");
        exit();
    } else {
        echo "Error updating course: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Course</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: "Montserrat", sans-serif;
            line-height: 1.6;
            color: #ffffff;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #ffafbd, #ffc3a0);
        }

        header {
            background: black;
            width: 100%;
            height: 100px;
            color: #fff;
            padding: 0.4rem;
            text-align: right;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
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

        .container {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            padding: 40px;
            width: 80%;
            max-width: 800px;
            margin: 20px auto;
            color: #333;
            margin-top: 120px; /* Adjusted to avoid overlap with header */
        }

        .container h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
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

        .container form input, .container form textarea {
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        .container form button {
            margin-top: 20px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: black;
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
    <header>
        <section class="nav">
            <a href="courses_List.php"><i class="fas fa-book"></i> COURSES</a>
            <a href="admin_home.php"><i class="fas fa-users"></i> USERS DETAIL</a>
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i> LOGOUT</a>
        </section>
    </header>
    <div class="container">
        <h2>Edit Course</h2>
        <form action="edit_course.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
            <label for="course_name">Course Name:</label>
            <input type="text" id="course_name" name="course_name" value="<?php echo htmlspecialchars($course['course_name']); ?>" required>
            <label for="time_period">Time Period:</label>
            <input type="text" id="time_period" name="time_period" value="<?php echo htmlspecialchars($course['time_period']); ?>" required>
            <label for="cost">Cost:</label>
            <input type="text" id="cost" name="cost" value="<?php echo htmlspecialchars($course['cost']); ?>" required>
            <label for="uploaded_file">Upload File (leave empty to keep current file):</label>
            <input type="file" id="uploaded_file" name="uploaded_file">
            <label>Current File:</label>
            <a href="uploads/<?php echo htmlspecialchars($course['uploaded_file']); ?>" target="_blank"><?php echo htmlspecialchars($course['uploaded_file']); ?></a>
            <button type="submit">Save Changes</button>
        </form>
        <button class="back-button" onclick="window.location.href='courses_List.php'">Back</button>
    </div>
</body>
</html>
