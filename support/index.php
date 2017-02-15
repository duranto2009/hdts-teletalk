<?php
require '../scripts/islogin.php';
require '../scripts/Connection/connection.php';

if (isset($_SESSION['username'])) {
		if ($_SESSION['unit'] != 3){
		echo $_SESSION['unit'];
		echo "<div style='text-align:center;'><h1>You are not an ADMIM</h1> <h3>You cannot access this page.</h3>";
	}
}


if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  //$theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

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


  $uname = $_SESSION['username'];
  //mysql_select_db($database_conn, $conn);
  $query_notification = "SELECT * FROM assignee WHERE username = '$uname' AND viewed=0 ORDER BY date DESC";
  $notification =  $conn->query($query_notification) or die(mysql_error());
  $row_notification = $notification->fetch_assoc();
  $totalRows_notification = $notification->num_rows;

  //mysql_select_db($database_conn, $conn);
  $query_search_ticket = "SELECT ticket.id, ticket.subject, ticket.customer_no, ticket.ticket_id, ticket.start_date, ticket.status, ticket.skill_id FROM ticket INNER JOIN assignee ON assignee.ticket_id = ticket.ticket_id WHERE assignee.username = '$uname' AND assignee.viewed = 1 AND ticket.status != 2";

  $search_ticket =  $conn->query($query_search_ticket) or die(mysql_error());
  $row_search_ticket = $search_ticket->fetch_assoc();
  $totalRows_search_ticket = $search_ticket->num_rows;
?>
<!DOCTYPE html>
<html>
    
    <head>
        <title>Dashboard</title>
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
                    <a class="brand" href="#">TELETALK</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                        	<li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown" id="notification"> 
                                <i class="icon-flag"></i>
                                <sup class="label label-warning"><?php echo $totalRows_notification ?></sup>
                                </a>
                                
                              <ul class="dropdown-menu" style="width:300px; padding:20px; maxheight:70vh; overflow:scroll">
                                    <?php 
									if ($totalRows_notification==0) {
										echo "<p style='text-align:center'>No Notification</p>";
									} else
									do { ?>
                                    <li>
                                        <a href="../scripts/update_notification.php?_t=<?php echo $row_notification['ticket_id']; ?>">
                                          Ticket ID# <span style="color:#3C443E; font-weight:bold"><?php echo $row_notification['ticket_id']; ?></span>
                                          <br> has been assigned to you.
                                          
                                          <p style="text-align:right; font-style:italic; size:8px">by -- <span style="color:#F63; font-weight:bold">
										  <?php echo $row_notification['spoc']; ?></span> on <span style="font-weight:bold">
										  <?php echo $row_notification['date']; ?></span></p>
                                        </a>
                                        </li><hr>
                                      <?php } while ($row_notification = $notification->fetch_assoc()); ?>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> <?php if (isset($_SESSION['username'])){ echo $_SESSION['full_name'];} ?> <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="profile.php">Profile</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li> <a href="../scripts/logout.php">Logout</a> </li>
                                </ul>
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
                        <li class="active">
                            <a href="index.php"> Dashboard</a>
                        </li>
                        <li>

                            <?php
                              if(isset($_SESSION['username'])){
                                $user = $_SESSION['username'];
                                $g_201 = "SELECT * FROM g_201 WHERE username = '$user'";
                                $g_202 = "SELECT * FROM g_202 WHERE username = '$user'";
                                $g_203 = "SELECT * FROM g_203 WHERE username = '$user'";
                                $g_204 = "SELECT * FROM g_204 WHERE username = '$user'";
                                $result1 = $conn->query($g_201);
                                $result2 = $conn->query($g_202);
                                $result3 = $conn->query($g_203);
                                $result4 = $conn->query($g_204);
                                
                                if ($result1->num_rows == 1) { 
                                  echo '<a href="closed.php?skill=201">Closed Ticket</a>';
                                }
                                if ($result2->num_rows == 1) {
                                  echo '<a href="closed.php?skill=202">Closed Ticket</a>';
                                }
                                if ($result3->num_rows == 1) {
                                  echo '<a href="closed.php?skill=203">Closed Ticket</a>';
                                }
                                if ($result4->num_rows == 1) {
                                  echo '<a href="closed.php?skill=204">Closed Ticket</a>';
                                }
                              }
                            ?>
                        </li>
                    </ul>
                </div>
                <!--/span-->
                <div class="span9" id="content">
                     <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">My Tickets</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                  <div class="table-toolbar">
                                    <div id="notify"></div>
									<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                                      <thead>
                                        <tr>
                                          <th  style="display:none;">ID</th>
                                          <th>Ticket ID</th>
                                          <th>Subject</th>
                                          <th>Customer No</th>
                                          <th>Date</th>
                                          <th>Status</th>
                                          <th>Action</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php do { ?>
                                        <tr class="odd gradeX">
                                          <td style="display:none"><?php echo $row_search_ticket['id']; ?></td>
                                          <td><?php echo $row_search_ticket['ticket_id']; ?></td>
                                          <td><?php echo $row_search_ticket['subject']; ?></td>
                                          <td class="center">0<?php echo $row_search_ticket['customer_no']; ?></td>
                                          <td class="center"><?php echo $row_search_ticket['start_date']; ?></td>
                                          </a>
                                            <td class="center"><?php 
											  	if (isset($row_search_ticket['status'])) {
													if ($row_search_ticket['status'] == 0)
														{
															echo "<span class='btn btn-success'>New</span>";
														} else 
														echo "<span class='btn btn-warning'>Opened</span>";
												} else echo "";
											 ?></td>
                                          <td>
                                          <?php 
										  if ($totalRows_search_ticket>0){
										  ?>  
                                          <a href="service.php?_t=<?php echo $row_search_ticket['ticket_id']; ?>&skill=<?php echo $row_search_ticket['skill_id']; ?>" class="btn btn-info"> View</a>
										  <?php
                                          }
										  ?>
										  </td>
                                        </tr>
                                          <?php } while ($row_search_ticket = $search_ticket->fetch_assoc()); ?>
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
  $notification->free_result();

  $search_ticket->free_result();
?>
