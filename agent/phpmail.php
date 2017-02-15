<?php
require '/var/www/html/hdts/PHP-email/PHPMailerAutoload.php';
//require_once('../PHP-email/class.phpmailer.php');
$mail = new PHPMailer;







    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'mail.teletalk.com.bd';  // Specify main and backup SMTP servers


    $mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->SMTPAuth = false;                               // Enable SMTP authentication
    $mail->Username = 'crm.ticket@teletalk.com.bd';           // SMTP username
    $mail->Password = 'crmticket';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 25;                                    // TCP port to connect to

    $mail->setFrom('crm.ticket@teletalk.com.bd', 'TELETALK HDTS');

    $mail->addAddress('crm.ticket@teletalk.com.bd','Shovon Rahman'); 


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

    $mail->Subject = "Hello from the other side";
    $mail->Body    = "<html>
                        <body>
                            <h3>Hello from the other side</h3>
                        </body>
                      </html>";
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if(!$mail->send()) {
        echo 'Ticket Created but Email could not be sent. Please contact the system administrator providing a snapshot of this page';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
        echo "<a href='index.php?r=1'>Click Here to get back or you will be redirected autometically in less than 15 seconds</a>";
        //header('location:index.php?r=1');
    } else {
        //header('location:index.php?r=1');
        echo "success";
    }
?>
