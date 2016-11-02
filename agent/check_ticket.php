<?php 
include '../scripts/Connection/connection.php';
$ticket= mysqli_real_escape_string($conn, $_POST['t_id']);

		$sql = "SELECT * FROM ticket WHERE ticket_id = '$ticket'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			// output data of each row
			echo "<span id='not' style='color:green;'>Valid! You can send your message now.</span>";
		} else {
			echo "<span id='yes' style='color:red;'>Invalid! Your message might not be conveyed to any user.</span>";
			}
?>