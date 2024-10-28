<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $question1 = $_POST['question1'];
    $question2 = $_POST['question2'];

    $query = "SELECT * FROM users WHERE username = ? AND question1 = ? AND question2 = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $username, $question1, $question2);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header('Location: forget.php?step=2');
        exit;
    } else {
        echo "<script>alert('Incorrect security answers. Please try again.'); window.location.href='forget.php';</script>";
    }
}
?>
