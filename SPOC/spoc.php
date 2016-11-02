<?php
include '../scripts/islogin.php';
include '../scripts/Connection/connection.php';
$sql = "SELECT * FROM ticket WHERE ticket.status = 2";
$res = $conn->query($sql);
$num = $res->num_rows();
?>
<?php require_once('../Connections/conn.php'); ?>
<?php

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "../login.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

$editFormAction = $_SERVER['PHP_SELF'];

$username = $_SESSION['username'];
$date = date('Y-m-d').time('H:i:s');
$t_id = $_GET['_t'];

if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "comment")) {
  $insertSQL = sprintf("INSERT INTO ticket_status (ticket_id,comment,date,username) VALUES ('$t_id',%s,now(),'$username')",
                       GetSQLValueString($_POST['comment'], "text"));


  //mysql_select_db($database_conn, $conn);
  $Result1 =  $conn->query($insertSQL) or die(mysql_error());


}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "progress")) {
  $insertSQL = sprintf("INSERT INTO progress (ticket_id,progress,date,username) VALUES ('$t_id',%s,now(),'$username')",
                       GetSQLValueString($_POST['progress'], "int"));


  //mysql_select_db($database_conn, $conn);
  $Result1 =  $conn->query($insertSQL) or die(mysql_error());


}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "close")) {
  $updateSQL = sprintf("UPDATE ticket SET status=2, close_date=now() WHERE ticket_id='$t_id'",
                       GetSQLValueString($_POST['status'], "int"),
                       GetSQLValueString($_POST['status'], "text"));


  //mysql_select_db($database_conn, $conn);
  $Result1 =  $conn->query($updateSQL) or die(mysql_error());


  $updateGoTo = "index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "assign")) {
  $updateSQL = sprintf("UPDATE ticket SET status=%s WHERE ticket_id=%s",
                       GetSQLValueString($_POST['status'], "int"),
                       GetSQLValueString($_POST['ticket_id'], "text"));


  //mysql_select_db($database_conn, $conn);
  $Result1 =  $conn->query($updateSQL) or die(mysql_error());

}

//$unicode=$_GET['_t'].$_POST['username'];
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "assign")) {
  $insertSQL = sprintf("INSERT INTO assignee (username, ticket_id, spoc, date) VALUES (%s, '$t_id', %s, now())",
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['spoc'], "text"));

  //mysql_select_db($database_conn, $conn);
  $Result1 =  $conn->query($insertSQL) or die(mysql_error());


}


$colname_search_assignee = "-1";
if (isset($_GET['_t'])) {
  $colname_search_assignee = $_GET['_t'];
}


//mysql_select_db($database_conn, $conn);
$query_search_assignee = sprintf("SELECT * FROM assignee WHERE ticket_id = %s", GetSQLValueString($colname_search_assignee, "text"));
$search_assignee = $conn->query($query_search_assignee) or die(mysql_error());
$row_search_assignee = $search_assignee->fetch_assoc();
$totalRows_search_assignee = $search_assignee->num_rows;



$colname_query_ticket = "-1";
if (isset($_GET['_t'])) {
  $colname_query_ticket = $_GET['_t'];
}


//mysql_select_db($database_conn, $conn);
$query_query_ticket = sprintf("SELECT * FROM ticket WHERE ticket_id = %s", GetSQLValueString($colname_query_ticket, "text"));
$query_ticket =  $conn->query($query_query_ticket) or die(mysql_error());
$row_query_ticket = $query_ticket->fetch_assoc();
$totalRows_query_ticket = $query_ticket->num_rows;



$colname_query_progress = "-1";
if (isset($_GET['_t'])) {
  $colname_query_progress = $_GET['_t'];
}


//mysql_select_db($database_conn, $conn);
$query_query_progress = sprintf("SELECT progress FROM progress WHERE ticket_id = %s ORDER BY `date` DESC", GetSQLValueString($colname_query_progress, "text"));
$query_progress =  $conn->query($query_query_progress) or die(mysql_error());
$row_query_progress = $query_progress->fetch_assoc();
$totalRows_query_progress = $query_progress->num_rows;



//mysql_select_db($database_conn, $conn);
$query_ticket_status = sprintf("SELECT * FROM ticket_status WHERE ticket_id = '$t_id' ORDER BY date ASC");
$ticket_status = $conn->query($query_ticket_status) or die(mysql_error());
$row_ticket_status = $ticket_status->fetch_assoc();
$totalRows_ticket_status = $ticket_status->num_rows;

//mysql_select_db($database_conn, $conn);
$query_usre = "SELECT * FROM user WHERE skill_id=".$_GET['skill']." AND unit!=2 AND username NOT IN (SELECT username from assignee WHERE ticket_id = ".$_GET['_t'].")";
$usre =  $conn->query($query_usre) or die(mysql_error());
$row_usre = $usre->fetch_assoc();
$totalRows_usre = $usre->num_rows;



//mysql_select_db($database_conn, $conn);
$query_g_201_user = "SELECT * FROM g_201 WHERE unit!=2 AND username NOT IN (SELECT username from assignee WHERE ticket_id = ".$_GET['_t'].")";
$g_201_user = $conn->query($query_g_201_user) or die(mysql_error());
$row_g_201_user = $g_201_user->fetch_assoc();
$totalRows_g_201_user = $g_201_user->num_rows;



//mysql_select_db($database_conn, $conn);
$query_g_202_user = "SELECT * FROM g_202 WHERE unit!=2 AND username NOT IN (SELECT username from assignee WHERE ticket_id = ".$_GET['_t'].")";
$g_202_user = $conn->query($query_g_202_user) or die(mysql_error());
$row_g_202_user = $g_202_user->fetch_assoc();
$totalRows_g_202_user = $g_202_user->num_rows;



//mysql_select_db($database_conn, $conn);
$query_g_203_user = "SELECT * FROM g_203 WHERE unit!=2 AND username NOT IN (SELECT username from assignee WHERE ticket_id = ".$_GET['_t'].")";
$g_203_user =  $conn->query($query_g_203_user) or die(mysql_error());
$row_g_203_user = $g_203_user->fetch_assoc();
$totalRows_g_203_user = $g_203_user->num_rows;



//mysql_select_db($database_conn, $conn);
$query_g_204_user = "SELECT * FROM g_204 WHERE unit!=2 AND username NOT IN (SELECT username from assignee WHERE ticket_id = ".$_GET['_t'].")";
$g_204_user =  $conn->query($query_g_204_user) or die(mysql_error());
$row_g_204_user = $g_204_user->fetch_assoc();
$totalRows_g_204_user = $g_204_user->num_rows;



$colname_form1_search = "-1";
if (isset($_GET['_t'])) {
  $colname_form1_search = $_GET['_t'];
}


//mysql_select_db($database_conn, $conn);
$query_form1_search = "SELECT * FROM form1 WHERE ticket_id = '$t_id'";
$form1_search = $conn->query($query_form1_search) or die(mysql_error());
$row_form1_search = $form1_search->fetch_assoc();
$totalRows_form1_search = $form1_search->num_rows;



//mysql_select_db($database_conn, $conn);
$query_form2_search = "SELECT * FROM form2 WHERE ticket_id = '$t_id'";
$form2_search =  $conn->query($query_form2_search) or die(mysql_error());
$row_form2_search = $form2_search->fetch_assoc();
$totalRows_form2_search = $form2_search->num_rows;



//mysql_select_db($database_conn, $conn);
$query_form3_search = "SELECT * FROM form3 WHERE ticket_id = '$t_id'";
$form3_search =  $conn->query($query_form3_search) or die(mysql_error());
$row_form3_search = $form3_search->fetch_assoc();
$totalRows_form3_search = $form3_search->num_rows;



//mysql_select_db($database_conn, $conn);
$query_form4_search = "SELECT * FROM form4 WHERE ticket_id = '$t_id'";
$form4_search =  $conn->query($query_form4_search) or die(mysql_error());
$row_form4_search = $form4_search->fetch_assoc();
$totalRows_form4_search = $form4_search->num_rows;



$colname_dept_closed = "-1";
if (isset($_GET['skill'])) {
  $colname_dept_closed = $_GET['skill'];
}


//mysql_select_db($database_conn, $conn);
$query_dept_closed = sprintf("SELECT * FROM ticket WHERE skill_id = %s AND status = 2", GetSQLValueString($colname_dept_closed, "text"));
$dept_closed = $conn->query($query_dept_closed) or die(mysql_error());
$row_dept_closed = $dept_closed->fetch_assoc();
$totalRows_dept_closed = $dept_closed->num_rows;


include "getmessage.php";	
?>

<!DOCTYPE html>
<html>
    
    <head>
        <title>TT# <?php echo $row_query_ticket['ticket_id']; ?></title>
        <!-- Bootstrap -->
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="../assets/styles.css" rel="stylesheet" media="screen">
        <link href="../assets/DT_bootstrap.css" rel="stylesheet" media="screen">
        <script src="../vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="index.php?skill=<?php echo $_SESSION['skill']; ?>">Teletalk</a>
                    <div class="nav-collapse collapse">
                    <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown" id="notification"> 
                                <i class="icon-flag"></i>
                                <sup class="label label-warning"><?php echo $result_message->num_rows ?></sup>
                                </a>
                                
                              <ul class="dropdown-menu" style="width:300px; padding:20px; maxheight:70vh; overflow:scroll">
                                    <?php 
									do { ?>
                                    <li>
                                        <a <?php if ($row_message2['viewed']==1) {echo "class='inactive'";}?>href="../scripts/update_message.php?_t=<?php echo $row_message2['ticket_id']."&skill=".$row_message2['skill_id']."&ins=".$row_message2['instance'].""; ?>">
                                          Ticket ID# <span style="color:#3C443E; font-weight:bold"><?php echo $row_message2['ticket_id'] ?></span>
                                          <br><?php echo "has got a recheck request from <span style='color:blue'>".$row_message2['username']. "</span>"; ?>
                                          
                                          <p style="text-align:right; font-style:italic; size:8px"> on <span style="font-weight:bold">
										  <?php echo $row_message2['time'] ?></span></p>
                                          <?php
                                          if ($row_message2['viewed']==1){
										 	echo "<underline>Viewed by ".$row_message2['viewed_by']." on ".$row_message2['viewed_time']." </underline>";
										  }
                                          
										  ?>
										</a>
                                        </li><hr>
                                      <?php } while ($row_message2 = $result_message2->fetch_assoc()); ?>
                                </ul>
                            </li>
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> <?php if (isset($_SESSION['username'])){ echo $_SESSION['full_name'];} ?> <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="#">Profile</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li> <a href="<?php echo $logoutAction ?>">Logout</a> </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav">
                            <li>
                                <a href="../admin/dashboard.php">Dashboard</a>
                            </li>
                            <li class="dropdown">
                                <a href="mydepartment.php" role="button">My Group</a>
                            </li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <li>
                            <a href="index.php?skill=<?php echo $_SESSION['skill']; ?>"> Dashboard</a>
                        </li>
                        
                        <li>
                            <a href="mydepartment.php?skill=<?php echo $_SESSION['skill']; ?>"> My Group</a>
                        </li>
                        <li>
                            <a href="ct.php?skill=<?php echo $_SESSION['skill']; ?>"><span class="badge badge-warning pull-right"><?php echo $totalRows_dept_closed ?></span> Closed</a>
                        </li>
                    </ul>
                </div>
                <!--/span-->
                <div class="span9" id="content">
                     <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Ticket Number# <b><?php echo $row_query_ticket['ticket_id']; ?></b></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span8">
                                <h3><?php echo $row_query_ticket['subject']; ?></h3>
                                <span style="font-size:14px"><b>MSISDN#</b> 
                                <span style="color:#006"><u>0<?php echo $row_query_ticket['customer_no']; ?></u></span>
                                <p style="text-align:right"><em>Created on:</em> <?php echo $row_query_ticket['start_date']; ?></p>
                                <form method="POST" action="<?php echo $editFormAction; ?>" name="close">
                                	<input type="hidden" name="status" value="2">
                               		<button type="submit" name="submit" class="btn btn-danger btn-mini">Close This Ticket</button>
                               		<input type="hidden" name="MM_update" value="close">
                                </form>
                                <hr>
                                <div class="span12">
                                <table style="font-weight:bold; text-align:right" cellpadding="2px">
                                <?php 
									if ($totalRows_form1_search>0){
										echo "<tr><td style='color:#698975'>Ticket <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form1_search['ticket_id']."</td><tr>";
										if ($row_form1_search['division'] != NULL){
											echo "<tr><td style='color:#698975'>Division <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form1_search['division']."</td><tr>";
										}
										if ($row_form1_search['district'] != NULL){
											echo "<tr><td style='color:#698975'>District <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form1_search['district']."</td><tr>";
										}
										if ($row_form1_search['thana'] != NULL){
											echo "<tr><td style='color:#698975'>Thana <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form1_search['thana']."</td><tr>";
										}
										if ($row_form1_search['loc'] != NULL){
											echo "<tr><td style='color:#698975'>Location <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form1_search['loc']."</td><tr>";
										}
										if ($row_form1_search['problem'] != NULL){
											echo "<tr><td style='color:#698975'>Problem Description <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form1_search['problem']."</td><tr>";
										}
										if ($row_form1_search['set_m'] != NULL){
											echo "<tr><td style='color:#698975'>Hand Set Model No. <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form1_search['set_m']."</td><tr>";
										}
										if ($row_form1_search['error_m'] != NULL){
											echo "<tr><td style='color:#698975'>Error Message <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form1_search['error_m']."</td><tr>";
										}
										if ($row_form1_search['alt_m'] != NULL){
											echo "<tr><td style='color:#698975'>Alternate Number <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form1_search['alt_m']."</td><tr>";
										}
                                        if ($row_form1_search['3g_pac'] != NULL){
											echo "<tr><td style='color:#698975'>3G Pack <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form1_search['3g_pac']."</td><tr>";
										}
                                        if ($row_form1_search['b_msisdn'] != NULL){
											echo "<tr><td style='color:#698975'>B-Part Mobile Number <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form1_search['b_msisdn']."</td><tr>";
										}
                                        if ($row_form1_search['other_set'] != NULL){
											echo "<tr><td style='color:#698975'>Problem with other set <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form1_search['other_set']."</td><tr>";
										}
                                        if ($row_form1_search['signal_str'] != NULL){
											echo "<tr><td style='color:#698975'>Signal Strength <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form1_search['signal_str']."</td><tr>";
										}
                                        if ($row_form1_search['top'] != NULL){
											echo "<tr><td style='color:#698975'>Temporary or Persistent? <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form1_search['top']."</td><tr>";
										}
                                        if ($row_form1_search['spec_time'] != NULL){
											echo "<tr><td style='color:#698975'>Any Specific Time? <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form1_search['spec_time']."</td><tr>";
										}
                                        if ($row_form1_search['isd_no'] != NULL){
											echo "<tr><td style='color:#698975'>ISD No. <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form1_search['isd_no']."</td><tr>";
										}
										if ($row_form1_search['gprs_pack'] != NULL){
											echo "<tr><td style='color:#698975'>GPRS Pack Name <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form1_search['gprs_pack']."</td><tr>";
										}
										if ($row_form1_search['prob_duration'] != NULL){
											echo "<tr><td style='color:#698975'>Problem Duration <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form1_search['prob_duration']."</td><tr>";
										}
										if ($row_form1_search['vas'] != NULL){
											echo "<tr><td style='color:#698975'>VAS <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form1_search['vas']."</td><tr>";
										}
										if ($row_form1_search['cust_veri'] != NULL){
											echo "<tr><td style='color:#698975'>Customer Verification <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form1_search['cust_veri']."</td><tr>";
										}
										if ($row_form1_search['shortcode'] != NULL){
											echo "<tr><td style='color:#698975'>Short Code <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form1_search['shortcode']."</td><tr>";
										}
										if ($row_form1_search['alt_name'] != NULL){
											echo "<tr><td style='color:#698975'>Alternate Name <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form1_search['alt_name']."</td><tr>";
										}
										if ($row_form1_search['current_package'] != NULL){
											echo "<tr><td style='color:#698975'>Current Package <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form1_search['current_package']."</td><tr>";
										}
										if ($row_form1_search['req_fnf'] != NULL){
											echo "<tr><td style='color:#698975'>Required FNF <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form1_search['req_fnf']."</td><tr>";
										}
										if ($row_form1_search['fnf_add_date'] != NULL){
											echo "<tr><td style='color:#698975'>FNF add Date <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form1_search['fnf_add_date']."</td><tr>";
										}
										if ($row_form1_search['desired_pack'] != NULL){
											echo "<tr><td style='color:#698975'>Desired Package <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form1_search['desired_pack']."</td><tr>";
										}
										if ($row_form1_search['effective_date'] != NULL){
											echo "<tr><td style='color:#698975'>Effective Date <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form1_search['effective_date']."</td><tr>";
										}
										if ($row_form1_search['desired_fnf'] != NULL){
											echo "<tr><td style='color:#698975'>Desired FNF <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form1_search['desired_fnf']."</td><tr>";
										}
									} 
									// Form 2
									
									elseif ($totalRows_form2_search>0){
										if ($row_form2_search['ticket_id'] != NULL){
											echo "<tr><td style='color:#698975'>Ticket No. <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form2_search['ticket_id']."</td><tr>";
										}
										if ($row_form2_search['fnf_d'] != NULL){
											echo "<tr><td style='color:#698975'>Amount <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form2_search['fnf_d']."</td><tr>";
										}
                                        if ($row_form2_search['fnf'] != NULL){
											echo "<tr><td style='color:#698975'>FNF No. <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form2_search['fnf']."</td><tr>";
										}
                                        if ($row_form2_search['fnf_d'] != NULL){
											echo "<tr><td style='color:#698975'>FNF Add Date <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form2_search['fnf_d']."</td><tr>";
										}
                                        if ($row_form2_search['overc_p'] != NULL){
											echo "<tr><td style='color:#698975'>Overcharged Period <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form2_search['overc_p']."</td><tr>";
										}
                                        if ($row_form2_search['prob'] != NULL){
											echo "<tr><td style='color:#698975'>Problem Description <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form2_search['prob']."</td><tr>";
										}
                                        if ($row_form2_search['eleg_offer'] != NULL){
											echo "<tr><td style='color:#698975'>Elegible for (OFFER) <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form2_search['eleg_offer']."</td><tr>";
										} 
                                        if ($row_form2_search['alt_no'] != NULL){
											echo "<tr><td style='color:#698975'>Alternate No. <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form2_search['alt_no']."</td><tr>";
										}
                                        if ($row_form2_search['bon_date'] != NULL){
											echo "<tr><td style='color:#698975'>Bonus Date <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form2_search['bon_date']."</td><tr>";
										}
									}
										
										// Form 3
										elseif ($totalRows_form3_search>0){
										if ($row_form3_search['ticket_id'] != NULL){
											echo "<tr><td style='color:#698975'>Ticket No. <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form3_search['ticket_id']."</td><tr>";
										}
										if ($row_form3_search['address'] != NULL){
											echo "<tr><td style='color:#698975'>Address <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form3_search['address']."</td><tr>";
										}
                                        if ($row_form3_search['req_bill_month'] != NULL){
											echo "<tr><td style='color:#698975'>Requested Bill Month <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form3_search['req_bill_month']."</td><tr>";
										}
                                        if ($row_form3_search['mod_address'] != NULL){
											echo "<tr><td style='color:#698975'>Modified Address <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form3_search['mod_address']."</td><tr>";
										}
                                        if ($row_form3_search['alt_no'] != NULL){
											echo "<tr><td style='color:#698975'>Alternate Contact <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form3_search['alt_no']."</td><tr>";
										}
                                        if ($row_form3_search['email'] != NULL){
											echo "<tr><td style='color:#698975'>Email <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form3_search['email']."</td><tr>";
										}
                                        if ($row_form3_search['date'] != NULL){
											echo "<tr><td style='color:#698975'>Date <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form3_search['date']."</td><tr>";
										} 
                                        if ($row_form3_search['call_date'] != NULL){
											echo "<tr><td style='color:#698975'>Date of Call <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form3_search['call_date']."</td><tr>";
										}
                                        if ($row_form3_search['prob'] != NULL){
											echo "<tr><td style='color:#698975'>Problem Description <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form3_search['current_bill']."</td><tr>";
										}
                                        if ($row_form3_search['current_bill'] != NULL){
											echo "<tr><td style='color:#698975'>Current Bill <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form3_search['current_bill']."</td><tr>";
										}
                                        if ($row_form3_search['msisdn'] != NULL){
											echo "<tr><td style='color:#698975'>MSISDN <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form3_search['msisdn']."</td><tr>";
										}
									}
									
									// Form 4
										elseif ($totalRows_form4_search>0){
										if ($row_form4_search['ticket_id'] != NULL){
											echo "<tr><td style='color:#698975'>Ticket No. <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form4_search['ticket_id']."</td><tr>";
										}
										if ($row_form4_search['recharge_method'] != NULL){
											echo "<tr><td style='color:#698975'>Recharge Method <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form4_search['recharge_method']."</td><tr>";
										}
                                        if ($row_form4_search['card_serial'] != NULL){
											echo "<tr><td style='color:#698975'>Card Serial Number <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form4_search['card_serial']."</td><tr>";
										}
                                        if ($row_form4_search['prob_duration'] != NULL){
											echo "<tr><td style='color:#698975'>Problem Duration <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form4_search['prob_duration']."</td><tr>";
										}
                                        if ($row_form4_search['error_m'] != NULL){
											echo "<tr><td style='color:#698975'>Error Message <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form4_search['error_m']."</td><tr>";
										}
                                        if ($row_form4_search['loc'] != NULL){
											echo "<tr><td style='color:#698975'>Location <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form4_search['loc']."</td><tr>";
										}
                                        if ($row_form4_search['prob'] != NULL){
											echo "<tr><td style='color:#698975'>Problem <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form4_search['prob']."</td><tr>";
										} 
                                        if ($row_form4_search['date_tried'] != NULL){
											echo "<tr><td style='color:#698975'>Date Tried <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form4_search['date_tried']."</td><tr>";
										}
                                        if ($row_form4_search['paid_amount'] != NULL){
											echo "<tr><td style='color:#698975'>Paid Amount <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form4_search['paid_amount']."</td><tr>";
										}
                                        if ($row_form4_search['dis_amount'] != NULL){
											echo "<tr><td style='color:#698975'>Discount Amount <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form4_search['dis_amount']."</td><tr>";
										}
                                        if ($row_form4_search['payment_date'] != NULL){
											echo "<tr><td style='color:#698975'>Payment Date <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form4_search['payment_date']."</td><tr>";
										}
										if ($row_form4_search['payment_method'] != NULL){
											echo "<tr><td style='color:#698975'>Payment Method <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form4_search['payment_method']."</td><tr>";
										}
										if ($row_form4_search['alt_no'] != NULL){
											echo "<tr><td style='color:#698975'>Alternate Number <i class='icon-share-alt'></i> </td><td style='text-align:left'>&nbsp".$row_form4_search['alt_no']."</td><tr>";
										}
									}
								?>
                                </table>
                                <div class="block-content collapse in">
                              <?php 
							  if ($totalRows_ticket_status>0){
							  do { ?>
                              <div class="span10" style="margin:5px; background:#0093B1; border-radius:5px">
                                  <div style="padding:10px">
                                    <h6 style="color:#333;"><em style="color:white"><?php echo $row_ticket_status['username']; ?></em>  on 
                                      <span style="color:#EDD664; text-align:right"><?php echo $row_ticket_status['date']; ?></span> </h6>
                                    <p style="text-align:justify;color:#FFE6CC;font-weight:bold; font-stretch:expanded"><?php echo $row_ticket_status['comment']; ?></p>
                                  </div>
                              </div>
                                <?php } while ($row_ticket_status = $ticket_status->fetch_assoc());
							  }
								 ?>
                             
                             <div class="span10">  
                             		<div class="row-fluid">
 										<div class="block-content collapse in">
                                        <form method="POST" name="comment" action="<?php echo $editFormAction; ?>">
                                        <label>Place your comment</label>
                                            <textarea name="comment" class="span12" required></textarea><br>
                                          <p align="right">
                                            <button type="submit" class="btn btn-primary" name="insert">Submit</button>
                                            </p>
                                          <input type="hidden" name="MM_insert" value="comment">
                                        </form>
                                        </div> 
                                    </div>                                              
                               </div>
                             </div>
                                </div>
                                </div>
                                <div class="span4">
                                <h5 style="text-align:center; color:#666">PROGRESS STATISTIC</h5>
                                	<div class="progress <?php if($row_query_progress['progress']<=50)
															{
																echo "progress-danger";	
															} elseif ($row_query_progress['progress'] <100)
															{
																echo "progress-warning";	
															} elseif ($row_query_progress['progress'] ==100)
															{
																echo "progress-success";	
															}
														 ?>">
										<div style="width: <?php echo $row_query_progress['progress']; ?>%;" class="bar"><?php echo $row_query_progress['progress']; ?>% Complete</div>
									</div>
                                        <form method="POST" action="<?php echo $editFormAction; ?>" name="progress">
                                        	<input type="number" min="0" max="100" maxlength="3" name="progress" value="<?php echo $row_query_progress['progress']; ?>">%
                                          <button type="submit" name="prog_update" class="btn btn-small">Update</button>
                                            <input type="hidden" name="MM_insert" value="progress">
                                        </form>
                                        <hr>
                                  <h4>Who are engaged?</h4>
                                        	<?php
											if ($totalRows_search_assignee!=0) {
											 do { ?>
                                       	    <form method="POST" action="../remove.php">
                                        	    <i class="icon-hand-right"></i><?php echo $row_search_assignee['username'];?>
                                        	    <input type="hidden" name="user" value="<?php echo $row_search_assignee['username'];?>">
                                        	    <input type="hidden" name="ticket" value="<?php echo $t_id; ?>">
                                        	    <input type="hidden" name="skill" value="<?php echo $_GET['skill']; ?>">
                                        	    <input type="submit" value="Remove" name="Remove" class="btn btn-mini btn-danger">
                                        	    </form>
                                        	  <?php 
											  } while ($row_search_assignee = $search_assignee->fetch_assoc());
											} else echo "<p style='color:red'>No one assigned</p>"
											   ?>
                                        <hr>
                           		  <h4>You may assign these people</h4>
                                        <?php 
										if ($totalRows_usre>0){
										do { ?>
                                  <form action="<?php echo $editFormAction; ?>" method="POST" name="assign">
                                            <i class="icon-hand-right"></i>&nbsp;<?php echo $row_usre['username']; ?>&nbsp;
                                            <input type="hidden" name="username" value="<?php echo $row_usre['username'];?>">
                                            <input type="hidden" name="spoc" value="<?php echo $_SESSION['username'];?>">
                                            <input type="hidden" name="ticket_id" value="<?php echo $t_id;?>">
                                            <input type="hidden" name="status" value="1">
                                            <button type="submit" name="assign" class="btn btn-mini btn-success">Assign</button>
                                            <input type="hidden" name="MM_insert" value="assign">
                                            <input type="hidden" name="MM_update" value="assign">
                                        </form>
                                          <?php } while ($row_usre = $usre->fetch_assoc());
										 } elseif ($_GET['skill']==201){
											 	 if ($totalRows_g_201_user==0){
													echo "<p style='color:red'>No One</p>";	
												} else {
										?>
                                        <?php do { ?>
                                        <form action="<?php echo $editFormAction; ?>" method="POST" name="assign">
                                                    <i class="icon-hand-right"></i>&nbsp;<?php echo $row_g_201_user['username']; ?>&nbsp;
                                                    <input type="hidden" name="username" value="<?php echo $row_g_201_user['username']; ?>">
                                                    <input type="hidden" name="spoc" value="<?php echo $_SESSION['username'];?>">
                                                    <input type="hidden" name="ticket_id" value="<?php echo $t_id;?>">
                                                    <input type="hidden" name="status" value="1">
                                                    <button type="submit" name="assign" class="btn btn-mini btn-success">Assign</button>
                                                    <input type="hidden" name="MM_insert" value="assign">
                                                    <input type="hidden" name="MM_update" value="assign">
                                                    </form>
                                                  <?php } while ($row_g_201_user = $g_201_user->fetch_assoc()); ?>
<?php 
										 
										}
												}
												
										elseif ($_GET['skill']==202){
											 	 if ($totalRows_g_202_user==0){
													echo "<p style='color:red'>No One</p>";	
												} else {
										?>
                                        <?php do { ?>
                                        <form action="<?php echo $editFormAction; ?>" method="POST" name="assign">
                                                    <i class="icon-hand-right"></i>&nbsp;<?php echo $row_g_202_user['username']; ?>&nbsp;
                                                    <input type="hidden" name="username" value="<?php echo $row_g_202_user['username']; ?>">
                                                    <input type="hidden" name="spoc" value="<?php echo $_SESSION['username'];?>">
                                                    <input type="hidden" name="ticket_id" value="<?php echo $t_id;?>">
                                                    <input type="hidden" name="status" value="1">
                                                    <button type="submit" name="assign" class="btn btn-mini btn-success">Assign</button>
                                                    <input type="hidden" name="MM_insert" value="assign">
                                                    <input type="hidden" name="MM_update" value="assign">
                                                    </form>
                                                  <?php } while ($row_g_202_user = $g_202_user->fetch_assoc()); ?>
<?php 
										 
										}
												}
												
										elseif ($_GET['skill']==203){
											 	 if ($totalRows_g_203_user==0){
													echo "<p style='color:red'>No One</p>";	
												} else {
										?>
                                        <?php do { ?>
                                        <form action="<?php echo $editFormAction; ?>" method="POST" name="assign">
                                                    <i class="icon-hand-right"></i>&nbsp;<?php echo $row_g_203_user['username']; ?>&nbsp;
                                                    <input type="hidden" name="username" value="<?php echo $row_g_203_user['username']; ?>">
                                                    <input type="hidden" name="spoc" value="<?php echo $_SESSION['username'];?>">
                                                    <input type="hidden" name="ticket_id" value="<?php echo $t_id;?>">
                                                    <input type="hidden" name="status" value="1">
                                                    <button type="submit" name="assign" class="btn btn-mini btn-success">Assign</button>
                                                    <input type="hidden" name="MM_insert" value="assign">
                                                    <input type="hidden" name="MM_update" value="assign">
                                                    </form>
                                                  <?php } while ($row_g_203_user = $g_203_user->fetch_assoc()); ?>
<?php 
										 
										}
												}
												
										elseif ($_GET['skill']==204){
											 	 if ($totalRows_g_204_user==0){
													echo "<p style='color:red'>No One</p>";	
												} else {
										?>
                                        <?php do { ?>
                                        <form action="<?php echo $editFormAction; ?>" method="POST" name="assign">
                                                    <i class="icon-hand-right"></i>&nbsp;<?php echo $row_g_204_user['username']; ?>&nbsp;
                                                    <input type="hidden" name="username" value="<?php echo $row_g_204_user['username']; ?>">
                                                    <input type="hidden" name="spoc" value="<?php echo $_SESSION['username'];?>">
                                                    <input type="hidden" name="ticket_id" value="<?php echo $t_id;?>">
                                                    <input type="hidden" name="status" value="1">
                                                    <button type="submit" name="assign" class="btn btn-mini btn-success">Assign</button>
                                                    <input type="hidden" name="MM_insert" value="assign">
                                                    <input type="hidden" name="MM_update" value="assign">
                                                    </form>
                                                  <?php } while ($row_g_204_user = $g_204_user->fetch_assoc()); ?>
<?php 
										 
										}
												}
										 else {
											 echo "<p style='color:red'>No user in this skill set.</p>";
										 }
										   ?>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
            </div>
            <hr>
            <footer>
                 <p>&copy; Digicon Technologies Limited, <?php echo date("Y"); ?></p>
            </footer>
        </div>
        <!--/.fluid-container-->

        <script src="../vendors/jquery-1.9.1.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
        <script src="../vendors/datatables/js/jquery.dataTables.min.js"></script>


        <script src="../assets/scripts.js"></script>
        <script src="../assets/DT_bootstrap.js"></script>
        <script>
        $(function() {
            
        });
        </script>
        
        <!--/.fluid-container-->
        <script src="../vendors/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
		<script src="../vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js"></script>

		<script src="../vendors/ckeditor/ckeditor.js"></script>
		<script src="../vendors/ckeditor/adapters/jquery.js"></script>

		<script type="text/javascript" src="../vendors/tinymce/js/tinymce/tinymce.min.js"></script>
        <script>
        $(function() {
            // Bootstrap
            $('#bootstrap-editor').wysihtml5();

            // Ckeditor standard
            $( 'textarea#ckeditor_standard' ).ckeditor({width:'98%', height: '150px', toolbar: [
				{ name: 'document', items: [ 'Source', '-', 'NewPage', 'Preview', '-', 'Templates' ] },	// Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
				[ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],			// Defines toolbar group without name.
				{ name: 'basicstyles', items: [ 'Bold', 'Italic' ] }
			]});
            $( 'textarea#ckeditor_full' ).ckeditor({width:'98%', height: '150px'});
        });

        // Tiny MCE
        tinymce.init({
		    selector: "#tinymce_basic",
		    plugins: [
		        "advlist autolink lists link image charmap print preview anchor",
		        "searchreplace visualblocks code fullscreen",
		        "insertdatetime media table contextmenu paste"
		    ],
		    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
		});

		// Tiny MCE
        tinymce.init({
		    selector: "#tinymce_full",
		    plugins: [
		        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
		        "searchreplace wordcount visualblocks visualchars code fullscreen",
		        "insertdatetime media nonbreaking save table contextmenu directionality",
		        "emoticons template paste textcolor"
		    ],
		    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
		    toolbar2: "print preview media | forecolor backcolor emoticons",
		    image_advtab: true,
		    templates: [
		        {title: 'Test template 1', content: 'Test 1'},
		        {title: 'Test template 2', content: 'Test 2'}
		    ]
		});

        </script>
    </body>

</html>
<?php
  $query_ticket->free_result();

  $query_progress->free_result();

  $ticket_status->free_result();

  $usre->free_result();

  $g_201_user->free_result();

  $g_202_user->free_result();

  $g_203_user->free_result();

  $g_204_user->free_result();

  $form1_search->free_result();

  $form2_search->free_result();

  $form3_search->free_result();

  $form4_search->free_result();

  $search_assignee->free_result();
?>
