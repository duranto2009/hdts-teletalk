<?php
include '../../../scripts/islogin.php';
include '../../../scripts/Connection/connection.php';
if (isset($_GET['_o'])){
	if ($_GET['_o'] == 1) {
		echo '<script language="javascript">';
		echo 'alert("Informaion Sent.")';
		echo '</script>';	
	}
} 
else {
	echo "";
}
if (isset($_SESSION['username'])) {
		if ($_SESSION['unit'] != 0){
		echo $_SESSION['unit'];
		header('location:login.php');
	}
}
?>
<?php 
		require_once "Mail.php";  
		$from = "Ticketing System <viparvez@gmail.com>"; 
		$to = "akandshuvo@gmail.com"; 
		$body = "A new ticket# $t_id has been created. By $agent on $time";  
		$host = "smtp.gmail.com"; 
		$username = "viparvez@gmail.com"; 
		$password = "suJANa53535326@4916120503030409"; 
		$headers = array ('From' => $from,   'To' => $to,   'Subject' => $subject); 
		$smtp = Mail::factory('smtp',   array ('host' => $host,     'auth' => true,     'username' => $username,     'password' => $password));  
		$mail = $smtp->send($to, $headers, $body);  
		
		if (PEAR::isError($mail)) {   
		header( "refresh:0;url=index.php?r=1" );  
		} else {   
		echo("<p>Ticket Created but Message not sent!</p>"); 
		header( "refresh:0;url=index.php?r=1" ); 
		} 
		?>