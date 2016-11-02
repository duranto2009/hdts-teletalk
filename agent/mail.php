<?php
include '../scripts/Connection/connection.php'; 
    ini_set("SMTP", "mail.teletalk.com.bd");
    ini_set("sendmail_from", "crm.ticket@teletalk.com.bd");

    $message = "
                <html>
                    <body>
                        <p>Hi,</p>
                        <p> A new ticket regarding <span style='color:blue'>$subject</span> has been create by $agent on $time </p>
                        <h4> Ticket ID# <span style='color:#CFCFCF'>$t_id</span>
                    </body>
                </html>
                ";

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: crm.ticket@teletalk.com.bd";


    mail("crm.ticket@teletalk.com.bd", $subject, $message, $headers);
    header('location:index.php?r=1');
?>