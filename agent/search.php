<?php 
 require '../scripts/islogin.php';
 require '../scripts/Connection/connection.php'; 

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

$colname_ticket = "-1";
if (isset($_GET['_i'])) {
  $colname_ticket = $_GET['_i'];
}

//mysql_select_db($database_conn, $conn);
$query_ticket = sprintf("SELECT * FROM ticket WHERE customer_no = %s", GetSQLValueString($colname_ticket, "text"));
$ticket = $conn->query($query_ticket) or die(mysql_error());
$row_ticket = $ticket->fetch_assoc();
$totalRows_ticket = $ticket->num_rows;

//mysql_select_db($database_conn, $conn);
$query_progress = "SELECT * FROM progress";
$progress =  $conn->query($query_progress) or die(mysql_error());
$row_progress = $progress->fetch_assoc();
$totalRows_progress = $progress->num_rows;

?>
<!DOCTYPE html>
<html>
    
    <head>
        <title>Agents Ticket Search</title>
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
                    <a class="brand" href="#">HDTS AGENT PANEL</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> <?php if (isset($_SESSION['username'])){ echo $_SESSION['full_name'];} ?> <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="#">Profile</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="../scripts/logout.php">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav">
                            <li>
                                <a href="index.php">Dashboard</a>
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
                            <a href="index.php">Dashboard</a>
                        </li>
                        <li class="active">
                            <a href="search.php">Ticket Status</a>
                        </li>
                    </ul>
                </div>
                <!--/span-->
                <div class="span9" id="content">
                     <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Tickets Status View</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                   <div class="span6">
                                   <form name="search" method="GET" action="search.php">
                                   <label>Customer Number</label>
                                   <input type="text" name="_i"><br>
                                   <input type="submit" class="btn" value="GO">
                                   </form>
                                   </div>
                                   <table class="table">
					                 <thead>
						                <tr>
						                  <th>Ticket ID</th>
						                  <th>Issue</th>
						                  <th>MSISDN</th>
                                          <th>Date Initiated</th>
						                  <th>Status</th>
                                          <th>Date Closed</th>
						                </tr>
					                 </thead>
					                 <tbody>
                                       <?php do { ?>
                                       <tr>
                                         <td><?php echo $row_ticket['ticket_id']; ?></td>
                                         <td><?php echo $row_ticket['subject']; ?></td>
                                         <td><?php echo $row_ticket['customer_no']; ?></td>
                                         <td><?php echo $row_ticket['start_date']; ?></td>
                                         <td><?php if (isset($_GET['_i'])){
											 		if ($row_ticket['status'] == 2)
										 			{
														echo "<span class='btn btn-danger btn-mini'>Closed</span>";
														echo "<a class='btn btn-mini btn-info' href='message.php?t_id=".$row_ticket['ticket_id']."&subject=".$row_ticket['subject']."'><span class='icon-envelope'></span></a>";	
													} else {
														echo "<span class='btn btn-success btn-mini'>Working</span>";
														//echo "<a class='btn btn-mini btn-info' href='message.php?t_id=".$row_ticket['ticket_id']."&subject=".$row_ticket['subject']."'><span class='icon-envelope'></span></a>";
													} 
										 			}
													else echo ""; 
										 		 ?></td>
                                         <td><?php if (isset($_GET['_i'])){
										 			if ($row_ticket['close_date'] == NULL)
										 			{ echo "---";}
													else {echo $row_ticket['close_date'];}
													} 
													
													if ($row_ticket['status'] == 1) {
														echo "<a href='message.php?t_id=".$row_ticket['ticket_id']."&subject=".$row_ticket['subject']."'>Send a message</a>";
													}
										 	 ?></td>
                                       </tr>
                                         <?php } while ($row_ticket = $ticket->fetch_assoc()); ?>
                                     </tbody>
						            </table>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
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
    </body>

</html>
<?php
  $ticket->free_result();
  $progress->free_result();
?>
