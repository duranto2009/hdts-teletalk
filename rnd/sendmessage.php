<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hdts";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql1 = "SELECT * FROM ticket WHERE ticket_id=201512091449668120213";
$result = $conn->query($sql1);

if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();
    //echo "Skill ID: " . $row["skill_id"]."";
    $sql2 = "INSERT INTO message (ticket_id, subject, message, username) VALUES ('201512091449668120213', '".$row['subject']."', 'Test Message', 'agent')";
	//$result2 = $conn->query($sql2);
	
	if ($result2 = $conn->query($sql2)){
		echo "Message posted";
		//$row2 = $result2->fetch_assoc();
		//echo $result2->num_rows;	
	}
	else {
		echo $conn->error;
		}
} else {
    echo "0 results";
}
$conn->close();
?>