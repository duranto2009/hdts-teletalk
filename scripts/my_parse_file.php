<?php 
include 'Connection/connection.php';
$sql = "SELECT * FROM slave_slave WHERE ms_code = ".$_POST['ms_code']."";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	echo "<select id='ss_code' size='6' style='width:300px'>";
    while($row = $result->fetch_assoc()) {
		echo "<option value=".$row['ss_code'].">".$row['ss_name']."</option>";
    }
} else {
    echo "0 results";
}
echo "</select>";
?>