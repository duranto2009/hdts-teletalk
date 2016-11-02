<?php require_once('../Connections/conn.php'); ?>
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

//mysql_select_db($database_conn, $conn);
$query_closed_ticket = "SELECT * FROM ticket WHERE ticket.status = 2 AND skill_id = ".$_GET['skill']."";
$closed_ticket = $conn->query($query_closed_ticket) or die(mysql_error());
$row_closed_ticket = $closed_ticket->fetch_assoc();
$totalRows_closed_ticket = $closed_ticket->num_rows;


?>
<?php
    include '../scripts/islogin.php';
    include '../scripts/Connection/connection.php';
    $sql = "SELECT * FROM ticket WHERE ticket.status = 2 AND skill_id = ".$_GET['skill']."";
    $res = $conn->query($sql);
    $num = $res->num_rows;
    include "getmessage.php";	
?>
<!DOCTYPE html>
<html>
    
    <head>
        <title>Closed Tickets</title>
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
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> <?php if (isset($_SESSION['username'])){ echo $_SESSION['full_name'];} ?> <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="#">Profile</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li> <a href="../scripts/logout.php">Logout</a> </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav">
                            <li>
                                <a href="index.php?skill=<?php echo $_GET['skill']; ?>">Dashboard</a>
                            </li>
                            <li>
                                <a href="mydepartment.php?skill=<?php echo $_SESSION['skill']; ?>" role="button">My Group</a>
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
                            <a href="index.php?skill=<?php echo $_GET['skill']; ?>"> Dashboard</a>
                        </li>
                        <li>
                            <a href="mydepartment.php?skill=<?php echo $_GET['skill']; ?>">My Group</a>
                        <li class="active">
                            <a href="ct.php?skill=<?php echo $_GET['skill']; ?>"><span class="badge badge-warning pull-right"><?php echo $totalRows_closed_ticket ?> </span> Closed Tickets</a>
                        </li>
                    </ul>
                </div>
                <!--/span-->
                <div class="span9" id="content">
                     <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Closed Tickets</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    
  									<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                                        <thead>
                                            <tr>
                                            	<th  style="display:none;">ID</th>
                                                <th>Ticket ID</th>
                                                <th>Issue</th>
                                                <th>MSISDN</th>
                                                <th>Closed Date</th>
                                              	<th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php do { ?>
										    <tr class="odd gradeX">
                                            	<td style="display:none"><?php echo $row_closed_ticket['id']; ?></td>
											    <td><?php echo $row_closed_ticket['ticket_id']; ?></td>
											    <td><?php echo $row_closed_ticket['subject']; ?></td>
											    <td><?php echo "0".$row_closed_ticket['customer_no']; ?></td>
											    <td class="center"><?php echo $row_closed_ticket['close_date']; ?></td>
											    <td class="center">
                                                	<?php
                                                    	if (isset($row_closed_ticket['status'])){
															echo "<a class='btn btn-danger'>Closed</a>";
														} else echo "";
													?>
												</td>
											    <td class="center">
                                                <?php
                                                    	if (isset($row_closed_ticket['ticket_id'])){
															echo "<a class='btn btn-primary' href='svc.php?_t=".$row_closed_ticket['ticket_id']."&skill=".$_GET['skill']."'>View</a>";
														} else echo "";
												?>
															</td>
										      </tr>
											  <?php } while ($row_closed_ticket = $closed_ticket->fetch_assoc()); ?>
                                        </tbody>
									</table>
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
    </body>

</html>
<?php
    $closed_ticket->free_result();
?>
