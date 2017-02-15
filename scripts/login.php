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
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HDTD ADMIN</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

	  <div class="row">
        	<div class="col-xs-4 col-xs-offset-4 loginBanner">
            	<h1>HDTS</h1>
                <h4>Admin Login</h4>
            </div>
        </div>
      <div class="row">
        	<div class="col-xs-4 col-xs-offset-4">
            	<form role="form" class="loginWrapper" method="post" action="check_login.php">
                  <div class="form-group">
                    <label for="uname">Username:</label>
                    <input type="text" class="form-control" id="uname" name="myusername" required>
                  </div>
                  <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" name="mypassword" required>
                  </div>
                  <button type="submit" class="btn btn-primary" name="login">Login</button>
                </form>
            </div>
        </div>  	

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
      

</body>

</html>
