<?php
//DATABASE CONNECTION
require "Connection/connection.php";

$sql = "INSERT INTO user (username, user_email, phone, password, full_name, skill_id, unit) VALUES (%s, %s, %s, %s, %s, %s, %s)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->errorno;
}

$conn->close();
?> 