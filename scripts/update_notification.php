<?php 
include 'islogin.php';
include 'Connection/connection.php';
if (isset($_GET['_t'])){
		$user= mysqli_real_escape_string($conn, $_SESSION['username']);
		$tk= mysqli_real_escape_string($conn, $_GET['_t']);
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