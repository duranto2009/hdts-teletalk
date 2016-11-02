<?php
include '../scripts/islogin.php';
include '../scripts/Connection/connection.php';
$sql = "SELECT * FROM ticket WHERE ticket.status = 2";
$res = $conn->query($sql);
$num = mysqli_num_rows($res);

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

$colname_user = "-1";
if (isset($_GET['u'])) {
  $colname_user = $_GET['u'];
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "adduser")) {
  $updateSQL = sprintf("UPDATE user SET user_email=%s, phone=%s, password=%s, full_name=%s, skill_id=%s, unit=%s WHERE id=$colname_user",
                       GetSQLValueString($_POST['user_email'], "text"),
                       GetSQLValueString($_POST['phone'], "int"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['full_name'], "text"),
                       GetSQLValueString($_POST['skill_id'], "text"),
                       GetSQLValueString($_POST['unit'], "int"),
                       GetSQLValueString($_POST['username'], "text"));


  //mysql_select_db($database_conn, $conn);
  $Result1 = $conn->query($updateSQL) or die(mysql_error());



  $updateGoTo = "edit.php?_s=1";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_user = "-1";
if (isset($_GET['u'])) {
  $colname_user = $_GET['u'];
}


//mysql_select_db($database_conn, $conn);
  $query_user = sprintf("SELECT * FROM `user` WHERE id = %s", GetSQLValueString($colname_user, "int"));
  $user =  $conn->query($query_user) or die(mysql_error());
  $row_user = $user->fetch_assoc();
  $totalRows_user = $user->num_rows;



?>
<!DOCTYPE html>
<html>
    
    <head>
        <title><?php echo $row_user['full_name']; ?></title>
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
                            <a href="closed.php"><span class="badge badge-warning pull-right"><?php echo $num; ?></span> Closed Tickets</a>
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
                                <div class="muted pull-left">USER: <?php echo $row_user['full_name']; ?></div>
                            </div>
                            <div class="block-content collapse in">
                            <div align="span12" style="text-align:center">
													<?php if(isset($_GET['_s']) == 1)
															{ 
																echo "<h5 style='color:green'>User-> ".$row_user['full_name']." has been updated !</h5>";
															} else echo "<input type='hidden'>"; 
															?>
                                                            </div>
                                <div class="span12">
                                  <form action="<?php echo $editFormAction; ?>" method="POST" class="form-horizontal" name="adduser">
                                      <fieldset>
                                        <div class="control-group" align="center">
                                         <h5> Change credentials for <span style="color:#00C"> <?php echo $row_user['username']; ?></span></h5>
                                        </div>
                                        
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput">Email</label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" type="email" name="user_email" value="<?php echo $row_user['user_email']; ?>">
                                          </div>
                                        </div>
                                        
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput">Password</label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" type="password" name="password" value="<?php echo $row_user['password']; ?>">
                                          </div>
                                        </div>
                                        
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput">Phone NO</label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" type="text" name="phone" value="0<?php echo $row_user['phone']; ?>">
                                          </div>
                                        </div>
                                        
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput">Full Name</label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" type="text" name="full_name" value="<?php echo $row_user['full_name']; ?>">
                                          </div>
                                        </div>
                                        
                                        <div class="control-group">
                                          <label class="control-label" for="selectError">Department</label>
                                          <div class="controls">
                                            <select id="selectError" name="skill_id">
                                              <option value="">Select</option>
                                              <option value="100" <?php if ($row_user['skill_id']==100){echo "selected";} ?>>Operations</option>
                                              <option value="101" <?php if ($row_user['skill_id']==101){echo "selected";} ?>>IT & Billing</option>
                                              <option value="102" <?php if ($row_user['skill_id']==102){echo "selected";} ?>>System Operation</option>
                                              <option value="103" <?php if ($row_user['skill_id']==103){echo "selected";} ?>>Marketing & Sales</option>
                                              <option value="104" <?php if ($row_user['skill_id']==104){echo "selected";} ?>>Planning & Implementation</option>
                                              <option value="105" <?php if ($row_user['skill_id']==105){echo "selected";} ?>>Customer Relationship Department</option>
                                              <option value="106" <?php if ($row_user['skill_id']==106){echo "selected";} ?>>Procurement</option>
                                              <option value="107" <?php if ($row_user['skill_id']==107){echo "selected";} ?>>Finance & Accounts</option>
                                              <option value="108" <?php if ($row_user['skill_id']==108){echo "selected";} ?>>3G Project</option>
                                              <option value="109" <?php if ($row_user['skill_id']==109){echo "selected";} ?>>Regulatory Affair & Customer Service</option>
                                            </select>
                                          </div>
                                        </div>
                                        
                                        <div class="control-group">
                                        <label class="control-label" for="selectError">The user is a </label>
                                          <div class="controls">
                                            <p><input type="radio" name="unit" value="2" <?php if ($row_user['unit']==2){echo "checked";} ?>> SPOC</p>
                                            <p><input type="radio" name="unit" value="3" <?php if ($row_user['unit']==3){echo "checked";} ?>> Support Member</p>
                                            <p><input type="radio" name="unit" value="0" <?php if ($row_user['unit']==0){echo "checked";} ?>> Agent Only</p>
                                          </div>
                                        </div>
                                        
                                        <div class="form-actions">
                                          <a href="delete.php?u=<?php echo $row_user['username']; ?>" class="btn btn-danger">DELETE</a>&nbsp;
                                          <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                      </fieldset>
                                      <input type="hidden" name="MM_update" value="adduser">
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
  $user->free_result();
?>
