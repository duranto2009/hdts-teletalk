<?php
ob_start();
$servername = "localhost";
$username = "hdts";
$password = "h3lp!d3Sk*16";
$dbname = "hdts";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
