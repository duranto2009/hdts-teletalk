<?php
require "Connection/connection.php";
if (isset($_POST['add_1'])){
	$username=$_POST['username'];
	$unit=$_POST['unit'];
	
		$sql = "INSERT INTO g_201 (username, unit) VALUES ('$username', '$unit')";
		
		if ($conn->query($sql) === TRUE) {
			header ('location:../admin/groups.back.php#tab1');
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
}
if (isset($_POST['add_2'])){
	$username=$_POST['username'];
	$unit=$_POST['unit'];
	
	$sql = "INSERT INTO g_202 (username, unit) VALUES ('$username', '$unit')";
		
		if ($conn->query($sql) === TRUE) {
			header ('location:../admin/groups.back.php#tab2');
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
}

if (isset($_POST['add_3'])){
	$username=$_POST['username'];
	$unit=$_POST['unit'];
	
	$sql = "INSERT INTO g_203 (username, unit) VALUES ('$username', '$unit')";
		
		if ($conn->query($sql) === TRUE) {
			header ('location:../admin/groups.back.php#tab3');
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
}

if (isset($_POST['add_4'])){
	$username=$_POST['username'];
	$unit=$_POST['unit'];
	
	$sql = "INSERT INTO g_204 (username, unit) VALUES ('$username', '$unit')";
		
		if ($conn->query($sql) === TRUE) {
			header ('location:../admin/groups.back.php#tab4');
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
}

if (isset($_POST['del1'])){
	$username=$_POST['username'];
	
		$sql = "DELETE FROM g_201 WHERE username = '$username'";
		
		if ($conn->query($sql) === TRUE) {
			header ('location:../admin/groups.back.php#tab1');
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
}

if (isset($_POST['del2'])){
	$username=$_POST['username'];
	
		$sql = "DELETE FROM g_202 WHERE username = '$username'";
		
		if ($conn->query($sql) === TRUE) {
			header ('location:../admin/groups.back.php#tab2');
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
}

if (isset($_POST['del3'])){
	$username=$_POST['username'];
	
		$sql = "DELETE FROM g_203 WHERE username = '$username'";
		
		if ($conn->query($sql) === TRUE) {
			header ('location:../admin/groups.back.php#tab3');
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
}

if (isset($_POST['del4'])){
	$username=$_POST['username'];
	
		$sql = "DELETE FROM g_204 WHERE username = '$username'";
		
		if ($conn->query($sql) === TRUE) {
			header ('location:../admin/groups.back.php#tab4');
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
}


$conn->close();
?> 