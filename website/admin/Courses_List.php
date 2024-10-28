<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: log.html");
    exit();
}

include 'config.php'; // Database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Courses</title>
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
            max-width: 1000px;
            margin: 20px auto;
            color: #333;
            margin-top: 120px; /* Adjusted to avoid overlap with header */
        }

        .container h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .actions a {
            margin-right: 10px;
            color: #007bff;
            text-decoration: none;
        }

        .actions a:hover {
            text-decoration: underline;
        }

        footer {
            background: black;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: flex;
            bottom: 0;
            width: 100%;
        }

        .button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            background: black;
            color: white;
            font-size: 16px;
            cursor: pointer;
            margin: 5px;
            text-align: center;
            display: block;
            width: fit-content;
            margin: 10px auto;
            text-decoration: none;
        }

        .button:hover {
            background: #333;
        }

        .img {
            width: 220px;
            margin-right: 98%;
            margin-top: -110px;
            margin-bottom: -50px;
        }
    </style>
</head>
<body>
    <header>
        <section class="nav">
            <a href="courses_List.php"><i class="fas fa-book"></i> COURSES</a>
            <a href="admin_home.php"><i class="fas fa-users"></i> USERS DETAIL</a>
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i> LOGOUT</a>
            <div class="search">
                <img src="logo/logo2.png" alt="Welcome Image" class="img">
            </div>
        </section>
    </header>
    <div class="container">
        <a href="course.php" class="button">Add New Course</a>
        <?php
        $query = "SELECT * FROM courses"; // Assuming you have a table named 'courses'
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            echo "<h2>Course List</h2>";
            echo "<table>";
            echo "<tr>
                    <th>ID</th>
                    <th>Course Name</th>
                    <th>Time Period</th>
                    <th>Cost</th>
                    <th>File</th>
                    <th>Actions</th>
                  </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['course_name']}</td>
                        <td>{$row['time_period']}</td>
                        <td>{$row['cost']}</td>
                        <td><a href='uploads/{$row['uploaded_file']}' target='_blank'>View File</a></td>
                        <td class='actions'>
                            <a href='edit_course.php?id={$row['id']}'>Edit</a>
                            <a href='delete_course.php?id={$row['id']}' onclick='return confirm(\"Are you sure you want to delete this course?\")'>Delete</a>
                        </td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "No courses found.";
        }

        $conn->close();
        ?>
    </div>
    <footer>
        <p>&copy; 2024 Tutorial Whale. All rights reserved.</p>
    </footer>
</body>
</html>
