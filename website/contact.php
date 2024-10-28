<?php
session_start();
require 'db.php';

$name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$message=$_POST['message'];

$sql = "insert into contact values('$name','$last_name','$email','$message')";

if (mysqli_query($conn, $sql)) {
    echo '<script>alert("Message Sent!");window.location.href="contact.html";</script>';
} else {
    echo '<script>alert("Meaage Not Sent. Please try again.");window.history.back();</script>';
}
?>

