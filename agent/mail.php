<?php
//include '../scripts/Connection/connection.php'; 
//    ini_set("SMTP", "mail.teletalk.com.bd");
//    ini_set("sendmail_from", "crm.ticket@teletalk.com.bd");

//    $message = "
//                <html>
//                    <body>
//                        <p>Hi,</p>
//                        <p> A new ticket regarding <span style='color:blue'>$subject</span> has been create by $agent on $time </p>
//                        <h4> Ticket ID# <span style='color:#CFCFCF'>$t_id</span>
//                    </body>
//                </html>
//                ";

//    $headers = "MIME-Version: 1.0" . "\r\n";
//    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
//    $headers .= "From: crm.ticket@teletalk.com.bd";


//    mail("crm.ticket@teletalk.com.bd", $subject, $message, $headers);
//    header('location:index.php?r=1');

require '../scripts/Connection/connection.php'; 
require '../PHP-email/PHPMailerAutoload.php';

$mail = new PHPMailer;





//$mail->SMTPDebug = 3;                               // Enable verbose debug output


    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'mail.teletalk.com.bd';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'crm.ticket@teletalk.com.bd';           // SMTP username
    $mail->Password = 'crmticket';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 25;                                    // TCP port to connect to

    $mail->setFrom('crm.ticket@teletalk.com.bd', 'TELETALK HDTS');

    $mail->addAddress('akandshuvo@hotmail.com','Shovon Rahman'); 


   // $mail->addAddress('jamal.uddin@teletalk.com.bd','Jamal Uddin');     // Add a recipient
   //    $mail->addAddress('hasan.mahmud@teletalk.com','Hasan Mahmud');     // Add a recipient
   //       $mail->addAddress('jashim.uddin@teletalk.com.bd','Jasim Uddin');     // Add a recipient
   //          $mail->addAddress('maksud.hossain@teletalk.com.bd','Maksud Hossain');     // Add a recipient
   //             $mail->addAddress('jinat.akhter@teletalk.com.bd','Jinat Akhter');     // Add a recipient
   //                $mail->addAddress('afrin.akhter@teletalk.com.bd','Afrin Akhter');     // Add a recipient
   //                   $mail->addAddress('mustofa.ali@teletalk.com.bd','Mustofa Ali');     // Add a recipient
   //                      $mail->addAddress('taposh.paul@teletalk.com.bd','Taposh Paul');     // Add a recipient
   //                         $mail->addAddress('rabiul.alam@teletalk.com.bd','Rabiul Alam');     // Add a recipient
   //                            $mail->addAddress('ahsanul.hauque@teletalk.com.bd','Ahsanul Haque');     // Add a recipient
   //                                 $mail->addAddress('crm.ticket@teletalk.com.bd', 'TELETALK HDTS'); 




    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = $subject;
    $mail->Body    = "<html>
                        <body>
                            Ticket Has been Created by &nbsp;&nbsp;".$username.
                            "<br>SUBJECT:&nbsp;&nbsp;".$subject.
                        "</body>
                    </html>";
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if(!$mail->send()) {
        echo 'Ticket Created but Email could not be sent. Please contact the system administrator providing a snapshot of this page';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
        echo "<a href='index.php?r=1'>Click Here to get back or you will be redirected autometically in less than 15 seconds</a>";
        header('location:index.php?r=1');
    } else {
        header('location:index.php?r=1');
    }
?>