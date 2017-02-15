<?php 
  require ('../scripts/islogin.php');
  require ('../scripts/Connection/connection.php');
?>
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
	
  $logoutGoTo = "../scripts/login.php";
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

//mysql_select_db($database_conn, $conn);
$query_search_g204 = "SELECT * FROM g_204";
$search_g204 = $conn->query($query_search_g204) or die(mysql_error());
$row_search_g204 = $search_g204->fetch_assoc();
$totalRows_search_g204 = $search_g204->num_rows;

//mysql_select_db($database_conn, $conn);
$query_add_204 = "SELECT * FROM user WHERE skill_id = 103 OR skill_id = 101 AND username NOT IN (SELECT username FROM g_204)";
$add_204 = $conn->query($query_add_204) or die(mysql_error());
$row_add_204 = $add_204->fetch_assoc();
$totalRows_add_204 = $add_204->num_rows;

//mysql_select_db($database_conn, $conn);
$query_search_g201 = "SELECT * FROM g_201";
$search_g201 = $conn->query($query_search_g201) or die(mysql_error());
$row_search_g201 = $search_g201->fetch_assoc();
$totalRows_search_g201 = $search_g201->num_rows;

//mysql_select_db($database_conn, $conn);
$query_search_g202 = "SELECT * FROM g_202";
$search_g202 =  $conn->query($query_search_g202) or die(mysql_error());
$row_search_g202 = $search_g202->fetch_assoc();
$totalRows_search_g202 = $search_g202->num_rows;

//mysql_select_db($database_conn, $conn);
$query_search_g203 = "SELECT * FROM g_203";
$search_g203 =  $conn->query($query_search_g203) or die(mysql_error());
$row_search_g203 = $search_g203->fetch_assoc();
$totalRows_search_g203 = $search_g203->num_rows;

//mysql_select_db($database_conn, $conn);
$query_g_201 = "SELECT * FROM user WHERE skill_id = 102 OR skill_id = 104 AND username NOT IN (SELECT username FROM g_201)";
$g_201 = $conn->query($query_g_201) or die(mysql_error());
$row_g_201 = $g_201->fetch_assoc();
$totalRows_g_201 = $g_201->num_rows;

//mysql_select_db($database_conn, $conn);
$query_g_202 = "SELECT * FROM user WHERE skill_id = 102 OR skill_id = 101 AND username NOT IN (SELECT username FROM g_202)";
$g_202 = $conn->query($query_g_202) or die(mysql_error());
$row_g_202 = $g_202->fetch_assoc();
$totalRows_g_202 = $g_202->num_rows;

//mysql_select_db($database_conn, $conn);
$query_g_203 = "SELECT * FROM user WHERE skill_id = 105 OR skill_id = 101 AND username NOT IN (SELECT username FROM g_203)";
$g_203 = $conn->query($query_g_203) or die(mysql_error());
$row_g_203 = $g_203->fetch_assoc();
$totalRows_g_203 = $g_203->num_rows;

//mysql_select_db($database_conn, $conn);
$query_closed_ticket = "SELECT * FROM ticket WHERE ticket.status = 2";
$closed_ticket = $conn->query($query_closed_ticket) or die(mysql_error());
$row_closed_ticket = $closed_ticket->fetch_assoc();
$totalRows_closed_ticket = $closed_ticket->num_rows;


?>
<!DOCTYPE html>
<html>
    
    <head>
        <title>Manage Groups</title>
        <!-- Bootstrap -->
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="../assets/styles.css" rel="stylesheet" media="screen">
        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="vendors/flot/excanvas.min.js"></script><![endif]-->
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
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
                    <a class="brand" href="#">ADMIN PANEL</a>
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
                                    <li> <a href="<?php echo "../scripts/logout.php"; ?>">Logout</a> </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav">
                            <li>
                                <a href="dashboard.php">Dashboard</a>
                            </li>
                            <li class="dropdown">
                                <a href="user.php" role="button">Users</a>
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
                            <a href="dashboard.php"> Dashboard</a>
                        </li>
                        <li>
                            <a href="user.php">User Management</a>
                        </li>
                        <li class="active">
                            <a href="groups.php">Group Management</a>
                        </li>
                      <li>
                            <a href="closed.php"><span class="badge badge-warning pull-right"><?php echo $totalRows_closed_ticket ?> </span> Closed Tickets</a>
                        </li>
                    </ul>
                </div>
                <!--/span-->
                <div class="span9" id="content">
                      <!-- morris stacked chart -->
                    <div class="row-fluid">
                        <!-- block -->
                     <!-- wizard -->
                    <div class="row-fluid section">
                         <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Groups</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                	<div class="tab-pane" id="tab1" style="min-height:100vh">
											<div class="group">
                                            <hr><h3>GROUP 1 </h3>
                                            <h6>SO/P&I </h6><hr></div>
                                            <h4 style="text-align:center;color:#034E7F">System Operation / Planning & Implementation </h4><hr>
											
                                            <div class="span5" align="center">
                                               	    <table>
                                                    <?php do { ?>
                                               	      <form class="form-horizontal" method="POST" name="remove1" action="../scripts/add_to_group.php">
                                               	        <tr>
                                               	          <td width="100px"><?php echo $row_search_g201['username']; ?></td>
                                               	          <td>
                                                          <input type="hidden" name="username" value="<?php echo $row_search_g201['username']; ?>">
                                                          <?php 
														  if ($totalRows_search_g201>0){
                                                          echo '<button class="btn btn-danger btn-mini" name="del1">Remove</button>';
														  }
														  ?>
                                                          </td>
														</tr>
                                           	          </form>
                                               	    <?php } while ($row_search_g201 = $search_g201->fetch_assoc()); ?>
                                           	      </table>
                                            </div>
                                            <div class="span6" align="center" >
                                           	        <table>
                                               	    <?php do { ?>
                                               	        <form class="form-horizontal" method="POST" name="add1" action="../scripts/add_to_group.php">
                                               	          <tr>
                                               	            <td width="100px"><?php echo $row_g_201['username']; ?></td>
                                               	            <td>
                                                          <?php
														  if ($totalRows_g_201>0){
                                                           echo '<button class="btn btn-success btn-mini" name="add_1">Add</button>';
														  }?>
														  </td>
                                                            <input type="hidden" name="username" value="<?php echo $row_g_201['username']; ?>">
                                                            <input type="hidden" name="unit" value="<?php echo $row_g_201['unit']; ?>">  
                                                          </tr>
                                           	            </form>
                                               	      <?php } while ($row_g_201 = $g_201->fetch_assoc()); ?>
                                               	        </table>
                                            </div>
                                          </div>
                                          
                                          
                                          <div class="tab-pane" id="tab2" style="min-height:100vh">
											<div class="group">
                                            <hr><h3>GROUP 2 </h3>
                                            <h6>SO/IT&B </h6><hr>
											</div>
                                            <h4 style="text-align:center;color:#034E7F">System Operation / IT & Billing </h4><hr>
                                            <div class="span5" align="center">
                                           	        <table>
                                               	    <?php do { ?>
                                               	        <form class="form-horizontal" method="POST" name="remove2" action="../scripts/add_to_group.php">
                                               	          <tr>
                                               	            <td width="100px"><?php echo $row_search_g202['username']; ?></td>
                                               	            <td>
                                                            <input type="hidden" name="username" value="<?php echo $row_search_g202['username']; ?>">
                                                            <?php 
															  if ($totalRows_search_g202>0){
															  echo '<button class="btn btn-danger btn-mini" name="del2">Remove</button>';
															  }
															  ?>
                                                            </td>
                                               	            </tr>
                                           	            </form>
                                               	     <?php } while ($row_search_g202 = $search_g202->fetch_assoc()); ?>
                                           	        </table>
                                            </div>
                                            <div class="span6" align="center" >
                                           	        <table>
                                               	    <?php do { ?>
                                               	        <form class="form-horizontal" method="POST" name="add2" action="../scripts/add_to_group.php">
                                               	          <tr>
                                               	            <td width="100px"><?php echo $row_g_202['username']; ?></td>
                                               	            <td>
															<?php
															  if ($totalRows_g_202>0){
															   echo '<button class="btn btn-success btn-mini" name="add_2">Add</button>';
															  }?>
                                                          	</td>
                                                            <input type="hidden" name="username" value="<?php echo $row_g_202['username']; ?>">
                                                            <input type="hidden" name="unit" value="<?php echo $row_g_202['unit']; ?>">
                                           	              </tr>
                                           	            </form>
                                               	      <?php } while ($row_g_202 = $g_202->fetch_assoc()); ?>
                                               	    </table>
                                            </div>
                                          </div>
                                          
                                          <div class="tab-pane" id="tab3" style="min-height:100vh">
											<div class="group">
                                            <hr><h3>GROUP 3 </h3>
                                            <h6>CRM/IT&B </h6><hr>
											</div>
                                            <h4 style="text-align:center;color:#034E7F">Customer Relationship Department / IT & Billing </h4><hr>
                                            <div class="span5" align="center">
                                           	        <table>
                                               	    <?php do { ?>
                                               	        <form class="form-horizontal" method="POST" name="remove3" action="../scripts/add_to_group.php">
                                               	          <tr>
                                               	            <td width="100px"><?php echo $row_search_g203['username']; ?></td>
                                               	            <td>
                                                             <input type="hidden" name="username" value="<?php echo $row_search_g203['username']; ?>">
                                                            <?php 
															  if ($totalRows_search_g203>0){
															  echo '<button class="btn btn-danger btn-mini" name="del3">Remove</button>';
															  }
															?>
                                                            </td>
                                           	              </tr>
                                           	            </form>
                                               	    <?php } while ($row_search_g203 = $search_g203->fetch_assoc()); ?>
                                           	        </table>
                                            </div>
                                            <div class="span6" align="center" >
                                           	      <table>
                                               	  <?php do { ?>
                                               	      <form class="form-horizontal" method="POST" name="add3" action="../scripts/add_to_group.php">
                                               	        <tr>
                                               	          <td width="100px"><?php echo $row_g_203['username']; ?></td>
                                               	          <td>
                                                          <?php
															  if ($totalRows_g_203>0){
															   echo '<button class="btn btn-success btn-mini" name="add_3">Add</button>';
														  }?>
                                                          </td>
                                                          <input type="hidden" name="username" value="<?php echo $row_g_203['username']; ?>">
                                                          <input type="hidden" name="unit" value="<?php echo $row_g_203['unit']; ?>">
                                               	          </tr>
                                               	        
                                           	          </form>
                                               	   <?php } while ($row_g_203 = $g_203->fetch_assoc()); ?>
                                               	      </table>
                                            </div>
                                          </div>
                                          
                                          
                                          <div class="tab-pane" id="tab4" style="min-height:100vh">
											<div class="group">
                                            <hr><h3>GROUP 4 </h3>
                                            <h6>M&S/IT&B </h6><hr>
											</div>
                                            <h4 style="text-align:center;color:#034E7F">Marketing & Sales / IT & Billing </h4><hr>
                                            <div class="span5" align="center">
                                               	    <table>
                                                    <?php do { ?>
                                                    <form class="form-horizontal" method="POST" name="remove4" action="../scripts/add_to_group.php">
                                                	    <tr>
                                                	      <td width="100px"><?php echo $row_search_g204['username']; ?></td>
                                                	      <td>
                                                          <input type="hidden" name="username" value="<?php echo $row_search_g204['username']; ?>">
                                                          <?php 
														  if ($totalRows_search_g204>0){
                                                          echo '<button class="btn btn-danger btn-mini" name="del4">Remove</button>';
														  }
														  ?>
                                                          </td>
                                                	      </tr>
                                                    </form>
                                                    <?php } while ($row_search_g204 = $search_g204->fetch_assoc()); ?>
                                       	      </table>
                                            </div>
                                            <div class="span6" align="center" >
                                               	    <table>
                                                      <?php do { ?>
                                            	<form class="form-horizontal" method="POST" name="add4" action="../scripts/add_to_group.php">
                                                          <tr>
                                                            <td width="100px"><?php echo $row_add_204['username']; ?></td>
                                                            <td>
                                                            <?php
															  if ($totalRows_add_204>0){
															   echo '<button class="btn btn-success btn-mini" name="add_4">Add</button>';
															  }?>
                                                            </td>
                                                            <input type="hidden" name="username" value="<?php echo $row_add_204['username']; ?>">
                                                            <input type="hidden" name="unit" value="<?php echo $row_add_204['unit']; ?>">
                                                          </tr>
                                                 </form>
                                                          <?php } while ($row_add_204 = $add_204->fetch_assoc()); ?>
                                       	          </table>
                                            </div>
                                        </div>  
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
	            <!-- /wizard -->
					<!-- END FORM-->
				</div>
			    </div>
			</div>   
            <hr>
            <footer>
                <p>&copy; Digicon Technologies Limited, <?php echo date("Y"); ?></p>
            </footer>
        </div>
        <!--/.fluid-container-->
        <link href="../vendors/datepicker.css" rel="stylesheet" media="screen">
        <link href="../vendors/uniform.default.css" rel="stylesheet" media="screen">
        <link href="../vendors/chosen.min.css" rel="stylesheet" media="screen">
        <script src="../vendors/jquery-1.9.1.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
        <script src="../vendors/jquery.uniform.min.js"></script>
        <script src="../vendors/bootstrap-datepicker.js"></script>
		<script src="../assets/scripts.js"></script>
</body>

</html>
<?php
  $search_g204->free_result();

  $add_204->free_result();

  $search_g201->free_result();

  $search_g202->free_result();

  $search_g203->free_result();

  $g_201->free_result();

  $g_202->free_result();

  $g_203->free_result();
?>
