<?php
include '../scripts/Connection/connection.php'; 
require '../PHP-email/PHPMailerAutoload.php';

$mail = new PHPMailer;

$email = $_GET['email'];
$username = $_GET['username'];
$fullname = $_GET['full'];
$password = $_GET['pass'];


//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'digicon.hdts@gmail.com';           // SMTP username
$mail->Password = 'P5KPL-AM';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('digicon.hdts@gmail.com', 'TELETALK HDTS');
$mail->addAddress($email, $fullname);     // Add a recipient
//$mail->addAddress('morshed.chowdhury@bexcom.net', 'Morshedul Arefin Chowdhury'); 
//$mail->addAddress('nazia.nowshin@realvubd.com', 'Nazia Nowshin');     
//$mail->addAddress('noor.mohammad@realvubd.com', 'Noor Mohammad ');          // Name is optional
$mail->addReplyTo('info@realvubd.com', 'REALVU');
//$mail->addBCC('sirajum.parvez@digicontechnologies.com', 'Sirajum Monir Parvez');
//$mail->addBCC('rajib.das@digicontechnologies.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = "WELCOME TO HDTS";
$mail->Body    = "<html>
                    <body>
                        <p>Hi, $fullname</p>
                        <p> You have been added to TeleTalk HDTS <span style='color:blue'></span></p>
                        <h4> Your Username is: <span style='color:#D23939'>$username</span>
                        <h4> Your Password is: <span style='color:#D23939'>$password</span>
			<p>N:B: This is an auto generated email. Please do not reply.</p>
                    </body>
                </html>";
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Ticket Created but Email could not be sent. Please contact the system administrator providing a snapshot of this page';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    echo "<a href='index.php?r=1'>Click Here to get back or you will be redirected autometically in less than 15 seconds</a>";
    header("Refresh:15; url=adduser.php?_s=1");
} else {
    header('location:adduser.php?_s=1');
}