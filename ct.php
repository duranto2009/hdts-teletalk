<?php
  include '../scripts/islogin.php';
  include '../scripts/Connection/connection.php';
  $sql = "SELECT * FROM ticket WHERE ticket.status = 2 AND skill_id = ".$_GET['skill']."";
  $res = $conn->query($sql);
  $num = $res->num_rows;
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
$username = $_SESSION['username'];
$date = date('Y-m-d H:i:s');
$t_id = $_GET['_t'];

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "close")) {
  $updateSQL = sprintf("UPDATE ticket SET status=1 WHERE ticket_id='$t_id'",
                       GetSQLValueString($_POST['status'], "int"),
                       GetSQLValueString($_POST['status'], "text"));

  //mysql_select_db($database_conn, $conn);
  $Result1 = $conn->query($updateSQL) or die(mysql_error());

  $updateGoTo = "spoc.php?skill=".$_GET['skill']."";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_query_ticket = "-1";
if (isset($_GET['_t'])) {
  $colname_query_ticket = $_GET['_t'];
}

//mysql_select_db($database_conn, $conn);
$query_query_ticket = sprintf("SELECT * FROM ticket WHERE ticket_id = %s", GetSQLValueString($colname_query_ticket, "text"));
$query_ticket = $conn->query($query_query_ticket) or die(mysql_error());
$row_query_ticket = $query_ticket->fetch_assoc();
$totalRows_query_ticket = $query_ticket->num_rows;


$colname_query_progress = "-1";
if (isset($_GET['_t'])) {
  $colname_query_progress = $_GET['_t'];
}


//mysql_select_db($database_conn, $conn);
$query_query_progress = sprintf("SELECT * FROM progress WHERE ticket_id = %s ORDER BY id DESC", GetSQLValueString($colname_query_progress, "int"));
$query_progress = $conn->query($query_query_progress) or die(mysql_error());
$row_query_progress = $query_progress->fetch_assoc();
$totalRows_query_progress = $query_progress->num_rows;


//mysql_select_db($database_conn, $conn);
$query_ticket_status = sprintf("SELECT * FROM ticket_status WHERE ticket_id = '$t_id' ORDER BY date ASC");
$ticket_status = $conn->query($query_ticket_status) or die(mysql_error());
$row_ticket_status = $ticket_status->fetch_assoc();
$totalRows_ticket_status = $ticket_status->num_rows;

//mysql_select_db($database_conn, $conn);
$query_usre = "SELECT * FROM user WHERE skill_id = ".$row_query_ticket['skill_id']."";
$usre = $conn->query($query_usre) or die(mysql_error());
$row_usre = $usre->fetch_assoc();
$totalRows_usre = $usre->num_rows;

$colname_status = "-1";
if (isset($_GET['_t'])) {
  $colname_status = $_GET['_t'];
}

//mysql_select_db($database_conn, $conn);
$query_status = sprintf("SELECT * FROM ticket_status WHERE ticket_id = %s", GetSQLValueString($colname_status, "text"));
$status = $conn->query($query_status) or die(mysql_error());
$row_status = $status->fetch_assoc();
$totalRows_status = $status->num_rows;

$colname_assignee = "-1";
if (isset($_GET['_t'])) {
  $colname_assignee = $_GET['_t'];
}

//mysql_select_db($database_conn, $conn);
$query_assignee = sprintf("SELECT * FROM assignee WHERE ticket_id = %s", GetSQLValueString($colname_assignee, "text"));
$assignee = $conn->query($query_assignee) or die(mysql_error());
$row_assignee = $assignee->fetch_assoc();
$totalRows_assignee = $assignee->num_rows;
?>

<!DOCTYPE html>
<html>
    
    <head>
        <title>TT# <?php echo $row_query_ticket['ticket_id']; ?></title>
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
                                <a href="spoc.php?skill=<?php echo $_GET['skill']; ?>">Dashboard</a>
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
                            <a href="closed.php?skill=<?php echo $_GET['skill']; ?>"><span class="badge badge-warning pull-right"><?php echo $num; ?></span> Closed Tickets</a>
                        </li>
                        <li>
                            <a href="#"> Logs</a>
                        </li>
                    </ul>
                </div>
                <!--/span-->
                <div class="span9" id="content">
                     <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Ticket Number# <b><?php echo $row_query_ticket['ticket_id']; ?></b></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span8">
                                <h3><?php echo $row_query_ticket['subject']; ?></h3>
                                <span style="font-size:14px"><b>MSISDN#</b> 
                                <span style="color:#006"><u>0<?php echo $row_query_ticket['customer_no']; ?></u></span>
                                <p style="text-align:right"><em>Created on:</em> <?php echo $row_query_ticket['start_date']; ?></p
                                ><hr>
                                <p style="text-align:justify">
                                <?php echo $row_query_ticket['prob_desc']; ?>
                                </p>
                                </div>
                            
                                
                                <div class="span4">
                                <h5 style="text-align:center; color:#666">PROGRESS STATISTIC</h5>
                                	<div class="progress <?php if($row_query_progress['progress']<=50)
															{
																echo "progress-danger";	
															} elseif ($row_query_progress['progress'] <100)
															{
																echo "progress-warning";	
															} elseif ($row_query_progress['progress'] ==100)
															{
																echo "progress-success";	
															}
														 ?>">
										<div style="width: <?php echo $row_query_progress['progress']; ?>%;" class="bar"><?php echo $row_query_progress['progress']; ?>% Complete</div>
									</div>
                                  <h4>Who were assigned?</h4>
                                  <?php do { ?>
                                  <i class="icon-hand-right"></i>&nbsp; <?php echo $row_assignee['username']; ?><br>
                                    <?php } while ($row_assignee = $assignee->fetch_assoc()); ?>
                                </div>
                            </div>
                            
                            <div class="block-content collapse in">
                              <?php do { ?>
                              <div class="span8" style="margin:10px; background:#F0F7FE; border-radius:5px">
                                <div style="padding:10px">
                                  <h6 style="color:#333;"><em style="color:#069"><?php echo $row_status['username']; ?></em> on <em style="color:#069"><?php echo $row_status['date']; ?></em></h6>
                                  <p style="text-align:justify;"><?php echo $row_status['comment']; ?></p>
                                </div>
                              </div>
                              <?php } while ($row_status = $status->fetch_assoc()); ?>
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
        
        <!--/.fluid-container-->
        <script src="../vendors/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
		<script src="../vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js"></script>

		<script src="../vendors/ckeditor/ckeditor.js"></script>
		<script src="../vendors/ckeditor/adapters/jquery.js"></script>

		<script type="text/javascript" src="../vendors/tinymce/js/tinymce/tinymce.min.js"></script>
        <script>
        $(function() {
            // Bootstrap
            $('#bootstrap-editor').wysihtml5();

            // Ckeditor standard
            $( 'textarea#ckeditor_standard' ).ckeditor({width:'98%', height: '150px', toolbar: [
				{ name: 'document', items: [ 'Source', '-', 'NewPage', 'Preview', '-', 'Templates' ] },	// Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
				[ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],			// Defines toolbar group without name.
				{ name: 'basicstyles', items: [ 'Bold', 'Italic' ] }
			]});
            $( 'textarea#ckeditor_full' ).ckeditor({width:'98%', height: '150px'});
        });

        // Tiny MCE
        tinymce.init({
		    selector: "#tinymce_basic",
		    plugins: [
		        "advlist autolink lists link image charmap print preview anchor",
		        "searchreplace visualblocks code fullscreen",
		        "insertdatetime media table contextmenu paste"
		    ],
		    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
		});

		// Tiny MCE
        tinymce.init({
		    selector: "#tinymce_full",
		    plugins: [
		        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
		        "searchreplace wordcount visualblocks visualchars code fullscreen",
		        "insertdatetime media nonbreaking save table contextmenu directionality",
		        "emoticons template paste textcolor"
		    ],
		    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
		    toolbar2: "print preview media | forecolor backcolor emoticons",
		    image_advtab: true,
		    templates: [
		        {title: 'Test template 1', content: 'Test 1'},
		        {title: 'Test template 2', content: 'Test 2'}
		    ]
		});

        </script>
    </body>

</html>
<?php
  $query_ticket->free_result();

  $query_progress->free_result();

  $ticket_status->free_result();

  $usre->free_result();

  $status->free_result();

  $assignee->free_result();
?>
