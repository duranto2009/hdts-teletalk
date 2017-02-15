<?php 

require '../Connections/conn.php';
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
$query_g_1 = "SELECT * FROM ticket WHERE skill_id = '201' AND status != 2";
$g_1 =  $conn->query($query_g_1) or die(mysql_error());
$row_g_1 = $g_1->fetch_assoc();
$totalRows_g_1 = $g_1->num_rows;

//mysql_select_db($database_conn, $conn);
$query_g_1_closed = "SELECT * FROM ticket WHERE skill_id = '201' AND status = 2";
$g_1_closed =  $conn->query($query_g_1_closed) or die(mysql_error());
$row_g_1_closed = $g_1_closed->fetch_assoc();
$totalRows_g_1_closed = $g_1_closed->num_rows;

//mysql_select_db($database_conn, $conn);
$query_g_2 = "SELECT * FROM ticket WHERE skill_id = '202' AND status != 2";
$g_2 = $conn->query($query_g_2) or die(mysql_error());
$row_g_2 = $g_2->fetch_assoc();
$totalRows_g_2 = $g_2->num_rows;

//mysql_select_db($database_conn, $conn);
$query_g_2_closed = "SELECT * FROM ticket WHERE skill_id = '202' AND status = 2";
$g_2_closed =  $conn->query($query_g_2_closed) or die(mysql_error());
$row_g_2_closed = $g_2_closed->fetch_assoc();
$totalRows_g_2_closed = $g_2_closed->num_rows;



//mysql_select_db($database_conn, $conn);
$query_g_3 = "SELECT * FROM ticket WHERE skill_id = '203' AND status != 2";
$g_3 =  $conn->query($query_g_3) or die(mysql_error());
$row_g_3 = $g_3->fetch_assoc();
$totalRows_g_3 = $g_3->num_rows;

//mysql_select_db($database_conn, $conn);
$query_g_3_closed = "SELECT * FROM ticket WHERE skill_id = '203' AND status = 2";
$g_3_closed = $conn->query($query_g_3_closed) or die(mysql_error());
$row_g_3_closed = $g_3_closed->fetch_assoc();
$totalRows_g_3_closed = $g_3_closed->num_rows;

//mysql_select_db($database_conn, $conn);
$query_g_4 = "SELECT * FROM ticket WHERE skill_id = '204' AND status != 2";
$g_4 =  $conn->query($query_g_4) or die(mysql_error());
$row_g_4 = $g_4->fetch_assoc();
$totalRows_g_4 = $g_4->num_rows;


//mysql_select_db($database_conn, $conn);
$query_g_4_closed = "SELECT * FROM ticket WHERE skill_id = '204' AND status = 2";
$g_4_closed = $conn->query($query_g_4_closed) or die(mysql_error());
$row_g_4_closed = $g_4_closed->fetch_assoc();
$totalRows_g_4_closed = $g_4_closed->num_rows;



$colname_dept = "-1";
if (isset($_GET['skill'])) {
  $colname_dept = $_GET['skill'];
}


//mysql_select_db($database_conn, $conn);
$query_dept = sprintf("SELECT * FROM ticket WHERE skill_id = %s AND status != 2", GetSQLValueString($colname_dept, "text"));
$dept = $conn->query($query_dept) or die(mysql_error());
$row_dept = $dept->fetch_assoc();
$totalRows_dept = $dept->num_rows;



$colname_dept_closed = "-1";
if (isset($_GET['skill'])) {
  $colname_dept_closed = $_GET['skill'];
}


//mysql_select_db($database_conn, $conn);
$query_dept_closed = sprintf("SELECT * FROM ticket WHERE skill_id = %s AND status = 2", GetSQLValueString($colname_dept_closed, "text"));
$dept_closed = $conn->query($query_dept_closed) or die(mysql_error());
$row_dept_closed = $dept_closed->fetch_assoc();
$totalRows_dept_closed = $dept_closed->num_rows;


$colname_gruop_name = "-1";
if (isset($_GET['skill'])) {
  $colname_gruop_name = $_GET['skill'];
}


//mysql_select_db($database_conn, $conn);
$query_gruop_name = sprintf("SELECT * FROM dept_groups WHERE skill_id = %s", GetSQLValueString($colname_gruop_name, "text"));
$gruop_name = $conn->query($query_gruop_name) or die(mysql_error());
$row_gruop_name = $gruop_name->fetch_assoc();
$totalRows_gruop_name = $gruop_name->num_rows;


?>
<?php
include '../scripts/islogin.php';
include '../scripts/Connection/connection.php';

if (isset($_SESSION['username'])) {
		if ($_SESSION['unit'] != 2){
		echo $_SESSION['unit'];
		echo "<div style='text-align:center;'><h1>You are not an ADMIM</h1> <h3>You cannot access this page.</h3>";
	}
}
include "getmessage.php";	
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
                    <a class="brand" href="index.php?skill=<?php echo $_SESSION['skill']; ?>">TELETALK</a>
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
                            <li class="active">
                                <a href="index.php?skill=<?php echo $_SESSION['skill']; ?>">Dashboard</a>
                            </li>
                            <li>
                                <a href="mydepartment.php?skill=<?php echo $_SESSION['skill']; ?>">My Group
                                </a>
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
                            <a href="index.php?skill=<?php echo $_SESSION['skill']; ?>"> Dashboard</a>
                        </li>
                        
                        <li>
                            <a href="mydepartment.php?skill=<?php echo $_SESSION['skill']; ?>"> My Group</a>
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
                                   <div class="span4">
                                   		<div class="bs-docs-sidenav" style="padding:20px; background:#F3F3F3">
                                        <h4 align="center"><?php echo $row_gruop_name['short_name']; ?></h4>
                                        	<table cellpadding="5px">
                                            	<tr>
                                                	<td>
                                                    <a href="ticket_view.php?skill=<?php echo $_SESSION['skill']; ?>">
                                                    <i class="icon-tasks"></i> Total New/Open Tickets</a>
                                                    </td>
                                                    <td>
                                                    <span class="badge badge-info pull-right">
													<?php echo $totalRows_dept ?>
                                                    </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                	<td>
                                                	<a href="ct.php?skill=<?php echo $_SESSION['skill']; ?>">
                                                	<i class="icon-tasks"></i> Total Closed Tickets
                                                    </a>
                                                    </td>
                                                    <td>
													<span class="badge badge-warning pull-right">
													<?php echo $totalRows_dept_closed ?>
                                                    </span>
                                                    </td>
                                                </tr>
                                            </table>
                                     </div>
                                   </div>
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
														
														echo '<div class="span4">
																<div class="bs-docs-sidenav" style="padding:20px; background:#F3F3F3">
																<h4 align="center">P&I/SO</h4>
																	<table cellpadding="5px">
																		<tr>
																			<td>
																			<a href="ticket_view.php?skill=201">
																			<i class="icon-tasks"></i> Total New/Open Tickets
																			</a>
																			</td>
																			<td> 
																			<span class="badge badge-info pull-right">
																			'.$totalRows_g_1.'
																			</span>
																			</td>
																		</tr>
																		<tr>
																			<td>
																			<a href="ct.php?skill=201">
																			<i class="icon-tasks"></i>Total Closed Tickets
																			</a>
																			</td>
																			<td> 
																			<span class="badge badge-warning pull-right">
																			'.$totalRows_g_1_closed.'
																			</span>
																			</td>
																		</tr>
																	</table>
																 </div>
														   </div>';
														}
													if ($result2->num_rows == 1) {
														
														echo '<div class="span4">
																<div class="bs-docs-sidenav" style="padding:20px; background:#F3F3F3">
																<h4 align="center">SO/IT&B</h4>
																	<table cellpadding="5px">
																		<tr>
																			<td>
																			<a href="ticket_view.php?skill=202">
																			<i class="icon-tasks"></i> Total New/Open Tickets
																			</a>
																			</td>
																			<td> 
																			<span class="badge badge-info pull-right">
																			'.$totalRows_g_2.'
																			</span>
																			</td>
																		</tr>
																		<tr>
																			<td>
																			<a href="ct.php?skill=202">
																			<i class="icon-tasks"></i> Total Closed Tickets
																			</a>
																			</td>
																			<td> 
																			<span class="badge badge-warning pull-right">
																			'.$totalRows_g_2_closed.'
																			</span>
																			</td>
																		</tr>
																	</table>
																 </div>
														   </div>';
														}
													if ($result3->num_rows == 1) {
														
														echo '<div class="span4">
																<div class="bs-docs-sidenav" style="padding:20px; background:#F3F3F3">
																<h4 align="center">CRM/IT&B</h4>
																	<table cellpadding="5px">
																		<tr>
																			<td>
																			<a href="ticket_view.php?skill=203">
																			<i class="icon-tasks"></i> Total New/Open Tickets
																			</a>
																			</td>
																			<td> 
																			<span class="badge badge-info pull-right">
																			'.$totalRows_g_3.'
																			</span>
																			</td>
																		</tr>
																		<tr>
																			<td>
																			<a href="ct.php?skill=203">
																			<i class="icon-tasks"></i> Total Closed Tickets
																			</a>
																			</td>
																			<td> 
																			<span class="badge badge-warning pull-right">
																			'.$totalRows_g_3_closed.'
																			</span>
																			</td>
																		</tr>
																	</table>
																 </div>
														   </div>';
														}
													if ($result4->num_rows == 1) {
														
														echo '<div class="span4">
																<div class="bs-docs-sidenav" style="padding:20px; background:#F3F3F3">
																<h4 align="center">M&S(VAS)/IT&B</h4>
																	<table cellpadding="5px">
																		<tr>
																			<td>
																			<a href="ticket_view.php?skill=204">
																			<i class="icon-tasks"></i> Total New/Open Tickets
																			</a>
																			</td>
																			<td> 
																			<span class="badge badge-info pull-right">
																			'.$totalRows_g_4.'
																			</span>
																			</td>
																		</tr>
																		<tr>
																			<td>
																			<a href="ticket_view.php?skill=204">
																			<i class="icon-tasks"></i> Total Closed Tickets
																			</a>
																			</td>
																			<td> 
																			<span class="badge badge-warning pull-right">
																			'.$totalRows_g_4_closed.'
																			</span>
																			</td>
																		</tr>
																	</table>
																 </div>
														   </div>';
														}
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
    </body>

</html>
<?php
  $g_1->free_result();

  $g_1_closed->free_result();

  $g_2->free_result();

  $g_2_closed->free_result();

  $g_3->free_result();

  $g_3_closed->free_result();

  $g_4->free_result();

  $g_4_closed->free_result();

  $dept->free_result();

  $dept_closed->free_result();

  $gruop_name->free_result();
?>
