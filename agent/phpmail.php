<?php
    include '../scripts/Connection/connection.php';
    ini_set("SMTP", "mail.teletalk.com.bd");
    ini_set("sendmail_from", "crm.ticket@teletalk.com.bd");
	
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: Ticketing System <crm.ticket@teletalk.com.bd>";
    $message = "<html>
		<body>
			<p>Hi,</p>
            <p>A new ticket regarding <span style='color:blue'>$subject</span> has been created by $agent on $time</p>
            <h4>Ticket ID# <span style='color:#CFCFCF'>$t_id</span></h4>
            <br><br><br><br>
            
            <i>Helpdesk Ticketing System</i>
            <u>This is an auto generated email. Please do not reply.</u>
		</body>
		</html>";
    mail("Rashed Musharaf <rashed.musharaf@digicontechnologies.com>", $subject, $message, $headers);
    echo "Check your email now....<BR/>";
?>
