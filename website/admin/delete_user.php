<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: log.html");
    exit();
}

include 'config.php'; // Database connection

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the delete statement
    $query = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    // Redirect back to the admin home page
    header("Location: admin_home.php");
    exit();
} else {
    echo "Invalid request.";
}

$conn->close();
?>
