<?php 
require 'islogin.php';
require 'Connection/connection.php';
if (isset($_GET['_t'])){
		$user= $conn->real_escape_string($_SESSION['username']);
		$tk= $conn->real_escape_string($_GET['_t']);
		$sql = "UPDATE assignee SET viewed=1 WHERE username = '$user' AND ticket_id = '$tk'";
		$result = $conn->query($sql);
		$skill = $SESSION['skill'];
		if ($conn->query($sql) === TRUE) {
			header ("location:../support/service.php?_t=$tk&skill=101");
		} else {
			echo "Error updating record: " . $conn->error;
		}
}
?>