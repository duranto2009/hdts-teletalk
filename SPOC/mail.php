<?php


$to = "";


$subject = $subject;

$message = "<html>
				<body>
				    <h4>Dear Concern</h4>

                    <h4>Ticket Has been Created by &nbsp;&nbsp;".$username.
                    "</h4><h4>SUBJECT:&nbsp;&nbsp;".$subject.
                    "</h4><h4>Ticket ID::&nbsp;&nbsp;".$t_id.
                "</h4>
                <h3>Please Login to View More<h3>	
                </body>
            </html>";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From:crm.ticket@teletalk.com.bd' . "\r\n";


if (mail($to,$subject,$message,$headers)==TRUE) {
	# code...
	 header('location:index.php?r=1');
}
else{
	echo 'Ticket Created but Email could not be sent. Please contact the system administrator providing a snapshot of this page';
	echo "<br>";
    echo "<a href='index.php?r=1'>Click Here to get back or you will be redirected autometically in less than 15 seconds</a>";

	header("Refresh:15; url=index.php?r=1");
}

?>
