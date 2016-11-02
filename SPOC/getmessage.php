<?php
include "../scripts/Connection/connection.php";

$member = $_SESSION['username'];

$sql1 = "SELECT * FROM g_201 WHERE username='$member'";
$result_1 = $conn->query($sql1);

if ($result_1->num_rows > 0) {
    	$go_201 = 201;
	} else {
		$go_201 = "";
	}
	

$sql2 = "SELECT * FROM g_202 WHERE username='$member'";
$result_2 = $conn->query($sql2);

if ($result_2->num_rows > 0) {
    	$go_202 = 202;
	} else {
		$go_202 = "";
	}
	
$sql3 = "SELECT * FROM g_203 WHERE username='$member'";
$result_3 = $conn->query($sql3);

if ($result_3->num_rows > 0) {
    	$go_203 = 203;
	} else {
		$go_203 = "";
	}
	

$sql4 = "SELECT * FROM g_204 WHERE username='$member'";
$result_4 = $conn->query($sql4);

if ($result_4->num_rows > 0) {
    	$go_204 = 204;
	} else {
		$go_204 = "";
	}
	
	
$message = "SELECT * FROM message WHERE viewed = 0 AND skill_id IN ('".$_SESSION['skill']."','$go_201','$go_202','$go_203','$go_204')";

$message2 = "SELECT * FROM message WHERE skill_id IN ('".$_SESSION['skill']."','$go_201','$go_202','$go_203','$go_204') ORDER BY time DESC";

$result_message = $conn->query($message);
$result_message2 = $conn->query($message2);

if ($result_message->num_rows > 0) {
    	$row_message = $result_message->fetch_assoc();
	}
	
if ($result_message2->num_rows > 0) {
    	$row_message2 = $result_message2->fetch_assoc();
	}
?>