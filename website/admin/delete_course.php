<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: log.html");
    exit();
}

include 'config.php'; // Database connection

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Get the course ID from the query parameter

    // Prepare and execute the delete query
    $stmt = $conn->prepare("DELETE FROM courses WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param('i', $id);
        if ($stmt->execute()) {
            // Redirect after successful deletion
            header("Location: courses_List.php");
            exit();
        } else {
            echo "Error deleting course: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

$conn->close();
?>
