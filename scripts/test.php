<?php
session_start();
require 'Connection/connection.php';
//include 'echo_loggin_failed.php';
// username and password sent from form 
$username=$_POST['username'];
$password=$_POST['password'];

// To protect MySQL injection
$username = stripslashes($username);
$password = stripslashes($password);
$username = $conn->real_escape_string($username);
$password = $conn->real_escape_string($password);
$sql="SELECT * FROM user WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// Mysql_num_row is counting table row
if ($result->num_rows == 1 && $row['unit'] == 0) {
		// Register $username, $password and redirect to file "login_success.php"
		$_SESSION['username']=$username;
		$_SESSION['password']=$password;
		$_SESSION['full_name']=$row['full_name'];
		$_SESSION['skill']=$row['skill_id'];
		$_SESSION['unit']=$row['unit'];
		echo $row['unit'];
	}
elseif ($result->num_rows == 1 && $row['unit'] == 1) {
		// Register $username, $password and redirect to file "login_success.php"
		$_SESSION['username']=$username;
		$_SESSION['password']=$password;
		$_SESSION['full_name']=$row['full_name'];
		$_SESSION['skill']=$row['skill_id'];
		$_SESSION['unit']=$row['unit'];
		echo $row['unit'];	
	} 
elseif ($result->num_rows == 1 && $row['unit'] == 2) {
		// Register $username, $password and redirect to file "login_success.php"
		$_SESSION['username']=$username;
		$_SESSION['password']=$password;
		$_SESSION['full_name']=$row['full_name'];
		$_SESSION['skill']=$row['skill_id'];
		$_SESSION['unit']=$row['unit'];
		echo $row['unit'];	
	} 
else{
		echo $row['unit'].$row['skill_id'];
	}
?>
