<?php
session_start();

include 'Connection/connection.php';

$username = $_SESSION['username'];
$date = date("Y-m-d h:i:s");

$sql = "INSERT INTO sys_log (username, logout)
VALUES ('$username', '$date')";

if ($conn->query($sql) === TRUE) {
    session_destroy();
    header('Location: ../login.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
exit;
?>