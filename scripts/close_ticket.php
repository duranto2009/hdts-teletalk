<?php
require 'islogin.php';
require 'Connection/connection.php';

if (isset($_SESSION['username'])) {
		if ($_SESSION['unit'] != 1){
		echo $_SESSION['unit'];
		echo "<div style='text-align:center;'><h1>You are not an ADMIM</h1> <h3>You cannot access this page.</h3>";
	}
}

$sql = "UPDATE ticket SET ticket.status=2 WHERE ticket.id=".$_GET['_t']."";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
