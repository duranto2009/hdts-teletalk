<?php 
require 'Connection/connection.php';
$user= $conn->real_escape_string($_POST['username']);
$length= strlen($user);
if ($username == NULL || $length < 6 || $length > 16) {
	echo "<span style='color:blue; font-weight:bold'>Username should be minimun 6 characters and maximum 16</span>";	
} else {
		$sql = "SELECT * FROM user WHERE username = '$user'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			// output data of each row
			echo "<span style='color:red; font-weight:bold'>This username is already taken.</span>";
		} else {
			echo "<span style='color:green; font-weight:bold'>Username Available</span>";
		}
}
?>