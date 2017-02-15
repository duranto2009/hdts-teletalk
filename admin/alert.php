<?php 
require '../scripts/islogin.php';
require '../scripts/Connection/connection.php';

//$sql = "SELECT message.ticket, message.subject, assignee.ticket_id, assignee.username FROM message INNER JOIN assignee ON message.ticket = assignee.ticket_id AND message.viewed = 0 AND assignee.username = '$user'";

$sql = "SELECT * FROM message";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    //output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Ticket ID: " . $row["ticket"]. " " . $row["instanse"]. "<br>";
    }
} else {
    echo "0";
}
$conn->close();
?>