
<?php
require ('../scripts/islogin.php');
require ('../scripts/Connection/connection.php');
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
$query_user = "SELECT * FROM user";
$user = $conn->query($query_user) or die(mysql_error());
$row_user = $user->fetch_assoc();
$totalRows_user = $user->num_rows;

//mysql_select_db($database_conn, $conn);
$query_closed = "SELECT * FROM ticket WHERE status = 2";
$closed = $conn->query($query_closed) or die(mysql_error());
$row_closed = $closed->fetch_assoc();
$totalRows_closed = $closed->num_rows;


if (isset($_SESSION['username'])) {
		if ($_SESSION['unit'] != 1){
		echo $_SESSION['unit'];
		echo "<div style='text-align:center;'><h1>You are not an ADMIM</h1> <h3>You cannot access this page.</h3>";
	}
}
?>

<!DOCTYPE html>
<html>
    
    <head>
        <title>Users</title>
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
                                    <li> <a href="../scripts/logout.php">Logout</a> </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav">
                            <li>
                                <a href="dashboard.php">Dashboard</a>
                            </li>
                            <li class="active">
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
                        <li class="active">
                            <a href="user.php">User Management</a>
                        </li>
                        
                        <li>
                            <a href="groups.php">Group Management</a>
                        </li>
                        <li>
                            <a href="closed.php"><span class="badge badge-warning pull-right"><?php echo $totalRows_closed ?> </span> Closed Tickets</a>
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
                                      <div class="btn-group">
                                         <a href="adduser.php" class="btn btn-success">Add New <i class="icon-plus icon-white"></i></a>
                                      </div>
                                   </div>
                                    
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                                        <thead>
                                            <tr>
                                                <th>Full Name</th>
                                                <th>Username</th>
                                                <th>Phone</th>
                                                <th>Department</th>
                                                <th>Role</th>
                                                <th>Action</th>
						<th>SKILL</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php do { ?>
                                          <tr class="odd gradeX">
                                            <td><?php echo $row_user['full_name']; ?></td>
                                            <td><?php echo $row_user['username']; ?></td>
                                            <td class="center"><?php echo $row_user['phone']; ?></td>
                                            <td class="center"><?php if($row_user['skill_id']==100)
																	{echo "Operations";} elseif($row_user['skill_id']==101)
																	{echo "IT&Billing";} elseif($row_user['skill_id']==102)
																	{echo "System Operation";} elseif($row_user['skill_id']==103)
																	{echo "Marketing & Sales";} elseif($row_user['skill_id']==104)
																	{echo "Planning & Implementation";} elseif($row_user['skill_id']==105)
																	{echo "Customer Relationship Department";} elseif($row_user['skill_id']==106)
																	{echo "Procurement";} elseif($row_user['skill_id']==107)
																	{echo "Finance & Accounts";} elseif($row_user['skill_id']==108)
																	{echo "3G Project";} elseif($row_user['skill_id']==109)
																	{echo "Regulatory Affair & Customer Service";} elseif($row_user['skill_id']==777)
																	{echo "N/A";}
																?></td>
                                            <td class="center"><?php if ($row_user['unit']==0)
																	{echo "Agent";} elseif ($row_user['unit']==1)
																	{echo "Super Admin";} elseif ($row_user['unit']==2)
																	{echo "SPOC";} elseif ($row_user['unit']==3)
																	{echo "Support";}
																?></td>
                                                                <td><a href="edit.php?u=<?php echo $row_user['id']; ?>" class="btn btn-info">View/Edit</a></td>
        							                                  
						<td><?php echo $row_user['skill_id']; ?></td>	
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
        <script>
        $(function() {
            
        });
        </script>
    </body>

</html>
<?php
$user->free_result();

$closed->free_result();
?>
