<?php
	require 'scripts/islogin.php';
	require 'scripts/Connection/connection.php';
	$t_id = $_POST['t_id'];
	$comment = $_POST['comment'];
	$username = $POST['username'];
	$t_id = preg_replace("/[^A-Za-z0-9]/", "", $t_id);
	$username = preg_replace("/[^A-Za-z0-9]/", "", $username);
	$sql = "INSERT INTO ticket_status (ticket_id, comment, date, username) VALUES ($t_id', '$comment', now(), '$username')";
	//if ($conn->query($sql) === TRUE) {
	//   header("location:view.php?_t=".$_POST['t_id']."");
	//} else {
	//    echo "Error: " . $sql . "<br>" . $conn->error;
	//}
	echo $t_id."<br>";
	echo $comment;
	$conn->close();
?> 
