<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['username'])) {
        header('Location: forget.php');
        exit;
    }

    $username = $_SESSION['username'];
    $password = mysqli_real_escape_string($conn, $_POST['password']); // This ensures special characters in the password are escaped
   
    $query = "UPDATE users SET password = '$password' WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Password changed successfully.'); window.location.href='log.html';</script>";
    } else {
        echo "<script>alert('Error changing password. Please try again.'); window.location.href='forget.php';</script>";
    }
}
?>
