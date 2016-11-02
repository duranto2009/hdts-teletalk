<?php
include '../scripts/islogin.php';
include '../scripts/Connection/connection.php';

if (isset($_GET['_s'])){
	if($_GET['_s']==1){
		header("Refresh:3;url=adduser.php");
		
	}
}

if (isset($_SESSION['username'])) {
		if ($_SESSION['unit'] != 1){
		echo $_SESSION['unit'];
		echo "<div style='text-align:center;'><h1>You are not an ADMIM</h1> <h3>You cannot access this page.</h3>";
	}
}

?>
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "adduser")) {
  $insertSQL = sprintf("INSERT INTO user (username, user_email, phone, password, full_name, skill_id, unit) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['user_email'], "text"),
                       GetSQLValueString($_POST['phone'], "int"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['full_name'], "text"),
                       GetSQLValueString($_POST['skill_id'], "text"),
                       GetSQLValueString($_POST['unit'], "int"));

  //mysql_select_db($database_conn, $conn);
  $Result1 = $conn->query($insertSQL) or die(mysql_error());
  mysql_query($sql);

  $insertGoTo = "mail.php?username=".$_POST['username']."&email=".$_POST['user_email']."&pass=".$_POST['password']."&full=".$_POST['full_name']."";
  if (isset($_SERVER['QUERY_STRING'])) {
    //include "mail.php";
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}


  //mysql_select_db($database_conn, $conn);
  $query_close = "SELECT * FROM ticket WHERE status = 2";
  $close =  $conn->query($query_close) or die(mysql_error());
  $row_close = $close->fetch_assoc();
  $totalRows_close = $close->num_rows;

  //mysql_select_db($database_conn, $conn);
  $query_department = "SELECT * FROM department WHERE skill_id != 777";
  $department =  $conn->query($query_department) or die(mysql_error());
  $row_department = $department->fetch_assoc();
  $totalRows_department = $department->num_rows;
?>
<!DOCTYPE html>
<html>
    
    <head>
        <title>Add New Users</title>
        <!-- Bootstrap -->
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="../assets/styles.css" rel="stylesheet" media="screen">
        <link href="../assets/DT_bootstrap.css" rel="stylesheet" media="screen">
        <script src="../vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <script>
		function ajax_post(){
			// Create our XMLHttpRequest object
			var hr = new XMLHttpRequest();
			// Create some variables we need to send to our PHP file
			var url = "../scripts/check_user.php";
			var fn = document.getElementById("uname").value;
			var vars = "username="+fn;
			hr.open("POST", url, true);
			// Set content type header information for sending url encoded variables in the request
			hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			// Access the onreadystatechange event for the XMLHttpRequest object
			hr.onreadystatechange = function() {
				if(hr.readyState == 4 && hr.status == 200) {
					var return_data = hr.responseText;
					document.getElementById("notify").innerHTML = return_data;
				}
			}
			// Send the data to PHP now... and wait for response to update the status div
			hr.send(vars); // Actually execute the request
			document.getElementById("notify").innerHTML = "Checking availabilit....";
		}
		</script>
				
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
                            <li>
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
                            <a href="closed.php"><span class="badge badge-warning pull-right"><?php echo $totalRows_close ?> </span> Closed Tickets</a>
                        </li>
                    </ul>
                </div>
                <!--/span-->
                <div class="span9" id="content">
                      <!-- morris stacked chart -->
                    <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Add a New User</div>
                            </div>
                            <div class="block-content collapse in">
                            <div align="span12" style="text-align:center">
													<?php if(isset($_GET['_s']) == 1)
															{ 
																echo "<h5 style='color:green'>User Created Successfully !</h5>";
															} else echo "<input type='hidden'>"; 
															?>
                                                            </div>
                                <div class="span12">
                                  <form action="<?php echo $editFormAction; ?>" method="POST" class="form-horizontal" name="adduser">
                                      <fieldset>
                                        <legend>User Registration</legend>
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput">Username</label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" id="uname" name="username" type="text" onChange="ajax_post();" required>
                                           <span id="notify"></span>
                                          </div>
                                        </div>
                                        
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput">Email</label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" type="email" name="user_email" required>
                                          </div>
                                        </div>
                                        
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput">Password</label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" type="password" name="password" required>
                                          </div>
                                        </div>
                                        
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput">Phone NO</label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" type="text" name="phone" required>
                                          </div>
                                        </div>
                                        
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput">Full Name</label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" type="text" name="full_name" required>
                                          </div>
                                        </div>
                                        
                                        <div class="control-group">
                                          <label class="control-label" for="selectError">Department</label>
                                          <div class="controls">
                                          <select id="selectError" name="skill_id">
                                              <option value="100">Select</option>
                                            <?php do { ?>
                                              <option value="<?php echo $row_department['skill_id']; ?>"><?php echo $row_department['department']; ?></option>
                                              <?php } while ($row_department = $department->fetch_assoc()); ?>
                                            </select>
                                          </div>
                                        </div>
                                        
                                        <div class="control-group">
                                        <label class="control-label" for="selectError">The user is a </label>
                                          <div class="controls">
                                            <p><input type="radio" name="unit" value="2"> SPOC</p>
                                            <p><input type="radio" name="unit" value="3"> Support Member</p>
                                            <p><input type="radio" name="unit" value="0" selected> Agent Only</p>
                                          </div>
                                        </div>
                                        
                                        <div class="form-actions">
                                          <button type="submit" class="btn btn-primary">Add User</button>
                                          <button type="reset" class="btn btn-inverse">Cancel</button>
                                        </div>
                                      </fieldset>
                                      <input type="hidden" name="MM_insert" value="adduser">
                                  </form>

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
        <link href="../vendors/datepicker.css" rel="stylesheet" media="screen">
        <link href="../vendors/uniform.default.css" rel="stylesheet" media="screen">
        <link href="../vendors/chosen.min.css" rel="stylesheet" media="screen">

        <link href="../vendors/wysiwyg/bootstrap-wysihtml5.css" rel="stylesheet" media="screen">

        <script src="../vendors/jquery-1.9.1.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
        <script src="../vendors/jquery.uniform.min.js"></script>
        <script src="../vendors/chosen.jquery.min.js"></script>
        <script src="../vendors/bootstrap-datepicker.js"></script>

        <script src="../vendors/wysiwyg/wysihtml5-0.3.0.js"></script>
        <script src="../vendors/wysiwyg/bootstrap-wysihtml5.js"></script>

        <script src="../vendors/wizard/jquery.bootstrap.wizard.min.js"></script>

		<script type="text/javascript" src="../vendors/jquery-validation/dist/jquery.validate.min.js"></script>
        <script src="../assets/form-validation.js"></script>
            
        <script src="../assets/scripts.js"></script>
        <script>

	jQuery(document).ready(function() {   
	   FormValidation.init();
	});
	

        $(function() {
            $(".datepicker").datepicker();
            $(".uniform_on").uniform();
            $(".chzn-select").chosen();
            $('.textarea').wysihtml5();

            $('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index+1;
                var $percent = ($current/$total) * 100;
                $('#rootwizard').find('.bar').css({width:$percent+'%'});
                // If it's the last tab then hide the last button and show the finish instead
                if($current >= $total) {
                    $('#rootwizard').find('.pager .next').hide();
                    $('#rootwizard').find('.pager .finish').show();
                    $('#rootwizard').find('.pager .finish').removeClass('disabled');
                } else {
                    $('#rootwizard').find('.pager .next').show();
                    $('#rootwizard').find('.pager .finish').hide();
                }
            }});
            $('#rootwizard .finish').click(function() {
                alert('Finished!, Starting over!');
                $('#rootwizard').find("a[href*='tab1']").trigger('click');
            });
        });
        </script>
    </body>

</html>
<?php
$close->free_result();

$department->free_result();
?>
