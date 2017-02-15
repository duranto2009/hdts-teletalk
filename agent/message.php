<?php 

require '../scripts/islogin.php'; 
$instance = "m".time();
?>

<!DOCTYPE html>
<html>
    
<head>
        <title>Agents Ticket Search</title>
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
                    <a class="brand" href="#">HDTS AGENT PANEL</a>
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
                                    <li>
                                        <a href="../scripts/logout.php">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav">
                            <li>
                                <a href="index.php">Dashboard</a>
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
                            <a href="index.php">Dashboard</a>
                        </li>
                        <li class="active">
                            <a href="search.php">Ticket Status</a>
                        </li>
                    </ul>
                </div>
                <!--/span-->
                <div class="span9" id="content">
                     <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Trouble Ticket Reinitiation Request</div>
                            </div>
                          <div class="block-content collapse in">
                                <div class="span12">
                                	<form class="form-horizontal" method="POST" name="send" action="send.php">
                                        <div class="control-group">
                                          <label class="control-label" for="typeahead">Ticket ID</label>
                                          <div class="controls">
                                            <input type="hidden" class="span6" name="t_id" id="t_id" value="<?php echo $_GET['t_id'];?>">
                                            <p><b><?php echo $_GET['t_id'];?></b></p>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="typeahead">Subject</label>
                                          <div class="controls">
                                            <input type="hidden" class="span6" name="subject" id="subject" value="<?php echo $_GET['subject'];?>">
                                            <p><b><?php echo $_GET['subject'];?></b></p>
                                          </div>
                                          
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="textarea2">Message</label>
                                          <div class="controls">
                                            <textarea class="input-xlarge textarea" placeholder="Write description" style="width: 350px; height: 100px" name="message"></textarea>
                                          </div>
                                        </div>
                                        <div class="span7">
                                          <button type="submit" class="btn btn-primary pull-right">Send Message</button>
                                        </div>
                                    </form>
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