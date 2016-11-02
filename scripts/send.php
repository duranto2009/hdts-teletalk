<?php
include "../scripts/Connection/connection.php";
$ticket = $_POST['t_id'];
$subject = $_POST['subject'];
$message = $_POST['message'];

echo $ticket;
echo $subject;
echo $message;

//$sql = "INSERT INTO message (ticket, subject, message) VALUES ('$ticket', '$subject', '$message')";

//if ($conn->query($sql) === TRUE) {
//    header( "refresh:0;url=index.php?r=2" );
//} else {
//    echo "Error: " . $sql . "<br>" . $conn->error;
//}
?>