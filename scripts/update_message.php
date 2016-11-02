<?php 
include 'islogin.php';
include 'Connection/connection.php';
if (isset($_GET['_t'])){
		$user= mysqli_real_escape_string($conn, $_SESSION['username']);
		$tk= mysqli_real_escape_string($conn, $_GET['_t']);
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