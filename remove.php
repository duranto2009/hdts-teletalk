<?php
	include 'scripts/islogin.php';
	include 'scripts/Connection/connection.php';

	$user = $_POST['user'];
	$t_id = $_POST['ticket'];
	$skill = $_POST['skill'];
	// sql to delete a record
	$sql = "DELETE FROM assignee WHERE username = '$user' AND ticket_id = '$t_id'";

	if ($conn->query($sql) === TRUE) {
	    header ("location:view.php?_t=$t_id&skill=$skill");
	} else {
	    echo "Error deleting record: " . $conn->error;
	}

	$conn->close();
?> 