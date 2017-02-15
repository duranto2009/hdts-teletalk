<?php
require '../scripts/islogin.php';
require '../scripts/Connection/connection.php';
if (isset($_GET['_o'])){
	if ($_GET['_o'] == 1) {
		echo '<script language="javascript">';
		echo 'alert("Informaion Sent.")';
		echo '</script>';	
	}
} 
else {
	echo "";
}
if (isset($_SESSION['username'])) {
		if ($_SESSION['unit'] != 0){
		echo $_SESSION['unit'];
		header('location:login.php');
	}
}
if (isset($_GET['r'])){
	if($_GET['r']==1){
		header("Refresh:4;url=index.php");
		
	} else if($_GET['r']==2){
		header("Refresh:4;url=index.php");
		
	}
}

$division = '<option>Select a Division</option>
                   <option value="Barisal Division">Barisal Division</option>
                   <option value="Chittagong Division">Chittagong Division</option>
                   <option value="Dhaka Division">Dhaka Division</option>
                   <option value="Khulna Division">Khulna Division</option>
				   <option value="Mymensingh Division">Mymensingh Division</option>
                   <option value="Rajshai Division">Rajshai Division</option>
				   <option value="Rangpur Division">Rangpur Division</option>
                   <option value="Sylhet Division">Sylhet Division</option>';
?>
<!DOCTYPE html>
<html>
    
<head>
        <title>Customer Complain</title>
        <!-- Bootstrap -->
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="../assets/styles.css" rel="stylesheet" media="screen">
        <link href="../assets/DT_bootstrap.css" rel="stylesheet" media="screen">
        <script src="../vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <style>
		body{background-color:#e0e0e0;overflow-x: hidden}
        </style>
        <script>
			function showHide(){
				if(document.getElementById('agent_wrap').checked) {
						document.getElementById('agent_message').style.display='block';
				} else {
						document.getElementById('agent_message').style.display='none';
				}
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
                    <a class="brand" href="#">HDTS AGENT PANEL</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> <?php if (isset($_SESSION['username'])){ echo $_SESSION['full_name'];} ?> <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="profile.php">Profile</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="../scripts/logout.php">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav">
                            <li class="active">
                                <a href="index.php">Dashboard</a>
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
        
        
        

<script src="../vendors/jquery-1.9.1.js"></script>
<script src="../assets/district.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../vendors/datatables/js/jquery.dataTables.min.js"></script>


<script src="../assets/scripts.js"></script>
<script src="../assets/DT_bootstrap.js"></script>
<!--SCRIPTS THAT TRIGGER FORM AND ALSO USE FOR POPULATING SELECT OPTION-->        
<script>      
    $(document).on('change','#selection', function () {
        $('.form').hide(); 
        $('#' + $(this).val()).show().siblings().hide();
    });
</script>  
     
</body>
</html>
