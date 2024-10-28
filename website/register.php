<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    // Storing password as plain text (not recommended)
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $question1 = mysqli_real_escape_string($conn, $_POST['question1']);
    $question2 = mysqli_real_escape_string($conn, $_POST['question2']);

    $sql = "INSERT INTO users (username, email, password, question1, question2) VALUES ('$username', '$email', '$password', '$question1', '$question2')";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Registration successful!");window.location.href="log.html";</script>';
    } else {
        echo '<script>alert("Registration failed. Please try again.");window.history.back();</script>';
    }
}
?>
