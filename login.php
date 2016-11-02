<?php
session_start();
if (isset($_GET['r'])){
	if ($_GET['r'] == "error") {
		echo '<script language="javascript">';
		echo 'alert("Username or Password is Wrong!")';
		echo '</script>';	
	}
} 
else {
	echo "";
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>HDTS LOGIN</title>
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="assets/styles.css" rel="stylesheet" media="screen">
    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  </head>
  <body id="login">
    <div class="container">
      <form class="form-signin" method="post" action="scripts/check_login.php">
        <h2 class="form-signin-heading">PLEASE SIGN IN</h2>
        <input type="text" class="input-block-level" name="username" placeholder="Username">
        <input type="password" class="input-block-level" name="password" placeholder="Password">
        <label class="checkbox">
        </label>
        <button class="btn btn-large btn-primary" type="submit" name="login">SIGN IN</button>
      </form>

    </div> <!-- /container -->
    <script src="vendors/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>