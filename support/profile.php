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
        
        
<!--Update Password-->

<?php
    if (isset($_POST['update_pass'])) {
        // code...
        $user=$_SESSION['username'];
        $password=$_POST['password'];
        $confirm_password=$_POST['confirm_password'];
        
        if ($password==$confirm_password) {
            // code...
            $update="UPDATE user SET password='$password' WHERE username='$user'";
            $update_execute=$conn->query($update);
            if ($update_execute==TRUE) {
                // code...
                header('location:profile.php?success');
            }
            else{
                // code...
                header('location:profile.php?error');
            }
        }
        else{
            header('location:profile.php?pass_mismatch');
        }
        

    }

?>

    <!--CONFIRMATIONs-->
        <div class="container">
            <div class="row">
                <div class="span4">
                </div>
                <div class="span12  text-center">
                    <?php
                        if (isset($_GET['success'])) {
                            // code...
                            echo "<h3 style='color:green'>Password updated successfully</h3>";
                        }
                        
                        if (isset($_GET['pass_mismatch'])) {
                            // code...
                            echo "<h3 style='color:red'>Password Mismatch</h3>";
                        }
                        
                        if (isset($_GET['error'])) {
                            // code...
                            echo "<h3 style='color:red'>Somethign Went wrong.Try later</h3>";
                        }
                    
                    ?>    
                </div>
            </div>    
        </div>
        <hr>

    <!--PASSWORD FORM-->
        <div class="container">
            <div class="row">
                <div class="span4">
                </div>
                <div class="span8">
                     <form action="profile.php" method="POST">
                        <div class="form-inline">
                            <div class="span3">
                                <label>Password</label>&nbsp;&nbsp;
                            </div>    
                            <div class="span9">    
                                <input type="password" name="password"/ required>
                            </div>
                        </div>
                        <div class="form-inline">
                            <div class="span3">
                                
                                <label>Confirm Password</label>&nbsp;&nbsp;
                            </div>    
                            <div class="span9">
                                     
                                <input type="password" name="confirm_password"/ required>
                            </div>
                        </div>
                        <div class="form-inline">
                            <div class="span2">
                                
                            </div>    
                            <div class="span9">
                                <br>    
                                <button class="btn btn-success" type="submit" name="update_pass">Submit</button>
                            </div>
                         </div>
                     </form>     
                </div>
            </div>    
        </div>
        
        
        
 <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        
        
        
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
