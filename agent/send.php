<?php
	include '../scripts/islogin.php';
	include '../scripts/Connection/connection.php';

	if (isset($_SESSION['username'])) {
			if ($_SESSION['unit'] != 0){
			echo $_SESSION['unit'];
			header('location:login.php');
		}
	}

	$time = date("l jS \of F Y h:i:s A");
	$instance = "m".time();
	$t_id = $_POST['t_id'];
	$agent = $_SESSION['username'];
	$skill = $_SESSION['skill'];
	$subject = $_POST['subject'];
	$message=$_POST['message'];



	$sql = "INSERT INTO message (id, ticket_id, skill_id, subject, message, username, instance, time) VALUES ('', '$t_id', '$skill', '$subject', '$message', '$agent', '$instance', '$time')";

	if ($conn->query($sql) === TRUE) {
		echo "<script type='text/javascript'>alert('Message has been sent')</script>";
	    header('Location: search.php');
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>