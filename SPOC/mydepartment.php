<?php

require '../scripts/islogin.php';
require '../scripts/Connection/connection.php';


    if (!isset($_GET['skill'])) {
        	header ('location:login.php');
        }

    if (!function_exists("GetSQLValueString")) {
        function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
            {
              if (PHP_VERSION < 6) {
                $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
              }

              $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_real_escape_string($theValue);

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

    $skill = $_GET['skill'];


    //mysql_select_db($database_conn, $conn);
    $query_user = "SELECT * FROM user WHERE user.skill_id ='$skill'";
    $user = $conn->query($query_user) or die(mysql_error());
    $row_user = $user->fetch_assoc();
    $totalRows_user = $user->num_rows;


    $sql = "SELECT * FROM ticket WHERE ticket.status = 2 AND skill_id = ".$_GET['skill']."";
    $res = $conn->query($sql);
    $num = $res->num_rows;
    if (isset($_SESSION['username'])) {
    		if ($_SESSION['unit'] != 2){
    		echo $_SESSION['unit'];
    		echo "<div style='text-align:center;'><h1>You are not an SPOC</h1> <h3>You cannot access this page.</h3>";
    	}
    }

    require "getmessage.php";
?>

<!DOCTYPE html>
<html>
    
    <head>
        <title>My Group</title>
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
                                        <a tabindex="-1" href="profile.php">Profile</a>
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
                            <li class="active">
                                <a href="mydepartment.php?skill=<?php echo $_GET['skill']; ?>" role="button">My Group</a>
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
                        <li class="active">
                            <a href="mydepartment.php?skill=<?php echo $_GET['skill']; ?>">My Group</a>
                        </li>
                    </ul>
                </div>
                <!--/span-->
                <div class="span9" id="content">
                     <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">All Users</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                   </div>
                                    
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                                        <thead>
                                            <tr>
                                                <th>Full Name</th>
                                                <th>Username</th>
                                                <th>Phone</th>
                                                <th>Department</th>
                                                <th>Role</th>
                                                <th>Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php do { ?>
                                          <tr class="odd gradeX">
                                            <td><?php echo $row_user['full_name']; ?></td>
                                            <td><?php echo $row_user['username']; ?></td>
                                            <td class="center"><?php echo "0".$row_user['phone']; ?></td>
                                            <td class="center"><?php if($row_user['skill_id']==100)
																	{echo "Operations";} elseif($row_user['skill_id']==101)
																	{echo "IT";} elseif($row_user['skill_id']==102)
																	{echo "Billing";} elseif($row_user['skill_id']==103)
																	{echo "VAS";} elseif($row_user['skill_id']==777)
																	{echo "N/A";}
																?></td>
                                            <td class="center"><?php if ($row_user['unit']==0)
																	{echo "Agent";} elseif ($row_user['unit']==1)
																	{echo "Super Admin";} elseif ($row_user['unit']==2)
																	{echo "SPOC";} elseif ($row_user['unit']==3)
																	{echo "Support";}
																?></td>
                                                                <td><?php echo $row_user['user_email']; ?></td>
                                          </tr>
                                            <?php } while ($row_user = $user->fetch_assoc()); ?>
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
    </body>
</html>
<?php
    $user->free_result();
?>
