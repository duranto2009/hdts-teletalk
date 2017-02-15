<?php 
require 'islogin.php';
require 'Connection/connection.php';
if (isset($_GET['_t'])){
			$user= $conn->real_escape_string($_SESSION['username']);
			$tk= $conn->real_escape_string($_GET['_t']);
			$ins = $_GET['ins'];
			$sql = "UPDATE message SET viewed = 1,viewed_time = now(),viewed_by = '$user' WHERE instance = '$ins'";
			$result = $conn->query($sql);
			if ($conn->query($sql) === TRUE) {
					header ("location:../SPOC/svc.php?_t=$tk&skill=".$_GET['skill']."&ins=$ins");
				} else {
						echo "Error updating record: " . $conn->error;
					}
	}
?>