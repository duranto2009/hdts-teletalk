<?php
include '../scripts/islogin.php';
include '../scripts/Connection/connection.php';
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
                                        <a tabindex="-1" href="#">Profile</a>
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
        <div class="container-fluid">
    <div class="row-fluid">
                <div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <li class="active">
                            <a href="index.php">Dashboard</a>
                        </li>
                        <li>
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
                            <div class="muted pull-left">Customer Complain Entry</div>
                        </div>
                        <div class="block-content collapse in">
                        <?php
						if (isset($_GET['r'])){
							$success = $_GET['r'];
							if ($success == 1){
								echo '
							<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<h4>The ticket was created successfully!</h4>
							</div>';
							} else if($success == 2){
								 echo '
							<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<h4>Message sent!</h4>
							</div>';
							} else  echo "";
						}
						?>
            <!--COMPLAIN TAKING FORM AREA-->
                          <form action="create_ticket.php" method="POST" name="ticket">
                          			<div class="span12" align="center">
                                        	015 <input style="background:#A7D29B; font-weight:bold" type="tel" name="customer_no" placeholder="Customer Number" input pattern=".{8,8}"   required title="10-11 characters">
                                        </div>
                                    <div class="container span12">
                                        <!--CATAGORIES WITH SUB-CATAGORIES-->
                                        <div class="row">
                                           <!--MASTER CATAGORY-->
                                            <div class="span4 offset2">
                                                <div class="form-group">
                                                  <label>Problem Catagory</label>
                                                  <select class="form-control" size="6" id="selection" style="width:300px" name="master"> 

                                                    <option value="3g">3G RELATED COMPLAIN</option>
                                                    <option value="bill_adjust">BILL ADJUSTMENT</option>
                                                    <option value="bill_recieve">BILL RECIEVING PROBLEM</option>
                                                    <option value="credit_control">CREDIT CONTROL PROBLEM</option>
                                                    <option value="general">GENERAL COMPLAIN</option>
                                                    <option value="network">NETWORK COMPLAIN</option>
                                                    <option value="payment">PAYMENT RELATED</option>
                                                    <option value="service">SERVICE RELATED</option>
                                                  </select>
                                                </div>
                                            </div>
                                            <!--SLAVE CATAGORY-->
                                            <div class="span4">
                                               <div class="form-group">
                                                   <!--3G RELATED COMPLAIN-->
                                                    <div id="3g"  style="display:none">
                                                       <label>Problem Sub-Catagory</label>
                                                      <select class="form-control" size="6" id="selection" style="width:300px" name="slave"> 
<option></option>
                                                            <option value="3g1">3G SERVICE NOT WORKING</option>
                                                            <option value="3g2">3G PACKAGE ACTIVATION</option>
                                                            <option value="3g3">3G PACKAGE DEACTIVATION</option>
                                                        </select>
                                                    </div>
                                                   <!-- BILL ADJUSTMENT-->
                                                      <div id="bill_adjust"  style="display:none">
                                                       <label>Problem Sub-Catagory</label>
                                                        <select class="form-control" size="6" id="selection" style="width:300px" name="slave"> 
<option></option>
                                                            <option value="bill_adjust1">FNF OVERCHARGED</option>
                                                            <option value="bill_adjust2">OTHER OVERCHARGED ISSUE</option>
                                                            <option value="bill_adjust3"> REFIL/RECHARGE BONUS</option>
                                                            <option value="bill_adjust4">FINANCIAL ADJUSTMENTS</option>
                                                        </select>
                                                      </div>
                                                    <!-- BILL RECIEVING PROBLEM-->
                                                         <div id="bill_recieve"  style="display:none">
                                                           <label>Problem Sub-Catagory</label>
                                                           <select class="form-control" size="6" id="selection" style="width:300px" name="slave"> 
<option></option>
                                                                <option value="bill_recieve1">BILL NOT RECIEVED VIA POST</option>
                                                                <option value="bill_recieve2">BILL NOT RECIEVED VIA EMAIL</option>
                                                            </select>
                                                 </div>
                                                    <!-- CREDIT CONTROL PROBLEM-->
                                                         <div id="credit_control" style="display:none">
                                                           <label>Problem Sub-Catagory</label>
                                                           <select class="form-control" size="6" id="selection" style="width:300px" name="slave"> 
<option></option>
                                                                <option value="credit_control1">OGBAR COMPLAIN</option>            
                                                            </select>
                                                 </div>
                                                    <!--GENERAL COMPLAIN-->
                                                         <div id="general"  style="display:none">
                                                           <label>Problem Sub-Catagory</label>
                                                           <select class="form-control" size="6" id="selection" style="width:300px" name="slave"> 
<option></option>
                                                                <option value="general1">DISTRIBUTOR/RETAILER/SALES MAN COMPLAIN</option>
                                                            </select>
                                                 </div>
                                                    <!--NETWORK COMPLAIN-->
                                                         <div id="network" style="display:none">
                                                           <label>Problem Sub-Catagory</label>
                                                           <select class="form-control" size="6" id="selection" style="width:300px" name="slave"> 
<option></option>
                                                                <option value="network1">ECHO COMPLAIN</option>
                                                                <option value="network2">CALL DROP COMPLAIN</option>
                                                                <option value="network3">OUTGOING CALL COMPLAIN</option>
                                                                <option value="network4">SMS INCOMING COMPLAIN</option>
                                                                <option value="network5">SMS OUTGOING COMPLAIN</option>
                                                                <option value="network6">INCOMING COMPLAIN</option>
                                                                <option value="network7">SIGNAL COMPLAIN</option>
                                                                <option value="network8">ISD INCOMING COMPLAIN</option>
                                                                <option value="network9">NON COVERAGE AREA</option>
                                                            </select>
                                                 </div>
                                                    <!-- PAYMENT RELATED-->
                                                         <div id="payment" style="display:none">
                                                           <label>Problem Sub-Catagory</label>
                                                           <select class="form-control" size="6" id="selection" style="width:300px" name="slave"> 
<option></option>
                                                                <option value="payment1">UNABLE TO PAY RECHARGE ACCOUNT</option>
                                                                <option value="payment2">PAYMENT NOT POSTED</option>
                                                            </select>
                                                 </div>

                                                    <!--  SERVICE RELATED-->
                                                     <div id="service"  style="display:none">
                                                       <label>Problem Sub-Catagory</label>
                                                       <select size="6" class="form-control" id="selection" style="width:300px" name="slave">
                                                            <option value="service1">UNABLE TO DIVERT/FORWARD CALLS</option>
                                                            <option value="service2">UNABLE TO USE GPRS</option>
                                                            <!--<option value="service3">VAS ACTIVATION COMPLAIN</option>-->
                                                            <option value="service4">VAS DEACTIVATION COMPLAIN</option>
                                                            <option value="service5">VAS NOT WORKING COMPLAIN</option>
                                                            <!--<option value="service6">DELETE FNFS</option>-->
                                                            <option value="service7">POSTPAID PACKAGE PLAN CHANGE COMPLAIN</option>
                                                            <option value="service8">PREPAID PACKAGE PLAN CHANGE COMPLAIN</option>
                                                            <option value="service9">ADD FNFS</option>
                                                        </select>
                                                 </div>
                                                    <!--END Of Sub-Cqatagory-->  
                                               </div>
                                            </div>
                                            <br><br>
                                        </div><hr>
                                        <!--END OF CATAGORIES WITH SUB-CATAGORIES-->

                                        <!--TRIGGERED FORM SECTION-->
                                        <div class="span12" style="height:220px; overflow:scroll;">
                                        <!--3G RELATED COMPLAIN-->
                                           <!--3g service not working-->
                                            <div id="3g1"  style="display:none">
                                               <div class="form-inline">
                                                    <div class="span6">
                                                      <table>
                                                          <tr>
                                                              <td><label>DIVISION</label></td>
                                                              <td>
                                                              <select name="3g1_division" class="div">
                                                              <?php echo $division; ?>
                                                              </select>
                                                              </td>
                                                          </tr>

                                                          <tr>
                                                              <td><label>DISTRICT:</label></td>
                                                              <td>
                                                              <select name="3g1_district" class="dis">
                                                              	
                                                              </select>
                                                              </td>
                                                          </tr>

                                                          <tr>
                                                              <td><label>THANA:</label></td>
                                                              <td><input name="3g1_thana"  type="text"  ></td>
                                                          </tr>

                                                          <tr>
                                                              <td><label>Location details:</label></td>
                                                              <td><input name="3g1_loc"  type="text" ></td>
                                                          </tr>
                                                           <tr>
                                                              <td><label>Problem description:</label></td>
                                                              <td><textarea cols="50" rows="2" name="3g1_prob"  type="text"></textarea></td>
                                                          </tr>
                                                      </table>
                                                    </div> 
                                                    <div class="span6">   
                                                      <table> 
                                                          <tr>
                                                              <td><label>Hand set with model:</label></td>
                                                              <td><input name="3g1_set_m"  type="text"  ></td>
                                                          </tr>

                                                          <tr>
                                                              <td><label>Error Message:</label></td>
                                                              <td><textarea cols="50" rows="2" name="3g1_error_m"  type="text"  ></textarea></td>
                                                          </tr>

                                                          <tr>
                                                              <td><label>Alternate No:</label></td>
                                                              <td><input name="3g1_alt_no"  type="text"  ></td>
                                                          </tr>   
                                                      </table>
                                                    </div>
                                              </div>
                                            </div>
                                              <!--3g service not working-->
                                            <div id="3g2"  style="display:none">
                                               <div class="form-inline">
                                                <div class="span6">
                                                    <table>
                                                      <tr>
                                                        <td><label>DIVISION</label></td>
                                                        <td>
                                                        <select name="3g2_division" class="div">
                                                        <?php echo $division; ?>
                                                        </select>
                                                        </td>
                                                      </tr>
                                                      <tr>
                                                        <td><label>DISTRICT:</label></td>
                                                        <td>
                                                        <select name="3g2_district" class="dis">
                                                              	
                                                              </select>
                                                        </td>
                                                      </tr>
                                                       <tr >
                                                        <td><label>THANA:</label></td>
                                                        <td><input name="3g2_thana" type="text" ></td>
                                                      </tr>
                                                       <tr>
                                                        <td><label>Location details:</label></td>
                                                        <td><input name="3g2_loc" type="text"   ></td>
                                                      </tr>
                                                    </table>
                                                  </div>
                                                  <div class="span6">
                                                    <table>
                                                      <tr>
                                                        <td><label>3g Package name</label></td>
                                                        <td><input name="3g2_3g_pac" type="text"></td>
                                                      </tr>
                                                       <tr>
                                                        <td><label>Hand set with model:</label></td>
                                                        <td><input name="3g2_set_m" type="text"></td>
                                                      </tr>
                                                       <tr>
                                                        <td><label>Error Message:</label></td>
                                                        <td><textarea cols="50" rows="2" name="3g2_error_m"  type="text"></textarea></td>
                                                      </tr>
                                                    </table>
                                                  </div>
                                              </div>
                                            </div>
                                              <!--3g service not working-->
                                            <div id="3g3"  style="display:none">
                                               <div class="form-inline">
                                                 <table>
                                                      <tr>
                                                        <td><label>3G package Name:</label></td>
                                                        <td><input name="3g3_3g_pac" type="text"></td>
                                                      </tr>
                                                      <tr>
                                                        <td><label>Error Message:</label></td>
                                                        <td><textarea cols="50" rows="2" name="3g3_error_m"  type="text"  ></textarea></td>
                                                      </tr>
                                                 </table>
                                              </div>
                                            </div>
                                        <!--3G RELATED COMPLAIN end-->

                                        <!--BILL ADJUSTMENTS-->
                                              <!--FNF overcharged-->
                                            <div id="bill_adjust1"  style="display:none">
                                               <div class="form-inline">
                                                 <table>
                                                      <tr>
                                                        <td><label>Amount:</label></td>
                                                        <td><input name="bill1_amount" type="text" ></td>
                                                      </tr>
                                                      <tr>
                                                        <td><label>FnF no:</label></td>
                                                        <td><input name="bill1_fnf" type="text"  ></td>
                                                      </tr>
                                                       <tr >
                                                        <td><label>Fnf add date and Time</label></td>
                                                        <td><input name="bill1_fnf_d" type="date" ></td>
                                                      </tr>
                                                      <tr>
                                                        <td><label>Overcharged Periods</label></td>
                                                        <td><input name="bill1_overc_p" type="text" ></td>
                                                      </tr>
                                                 </table>          
                                              </div>
                                            </div>
                                              <!--Other Overcharged Issue-->
                                            <div id="bill_adjust2"  style="display:none">
                                               <div class="form-inline">
                                                 <table>
                                                      <tr>
                                                        <td><label>Amount</label></td>
                                                        <td><input name="bill2_amount" type="text" ></td>
                                                      </tr>
                                                      <tr>
                                                        <td><label>Problem Description:</label></td>
                                                        <td><textarea cols="50" rows="2" name="bill2_prob"  type="text"></textarea></td>
                                                      </tr>
                                                       <tr>
                                                        <td><label>Overcharged Period:</label></td>
                                                        <td><input name="bill2_overc_p" type="text" ></td>
                                                      </tr>
                                                       <tr>
                                                        <td><label>Alternate No:</label></td>
                                                        <td><input name="bill2_alt_no" type="text"   ></td>
                                                      </tr>
                                                 </table>
                                              </div>
                                            </div>
                                              <!--Refil/Recharge Bonus-->
                                            <div id="bill_adjust3"  style="display:none">
                                               <div class="form-inline">
                                                 <table>
                                                     <tr>
                                                        <td><label>Amount:</label></td>
                                                        <td><input name="bill3_amount" type="text" ></td>
                                                   </tr>
                                                      <tr>
                                                        <td><label>Eligible for which offer:</label></td>
                                                        <td><input name="bill3_eleg_offer" type="text"  ></td>
                                                      </tr>
                                                       <tr>
                                                        <td><label>Alternate No:</label></td>
                                                        <td><input name="bill3_alt_no" type="text"  ></td>
                                                      </tr>
                                                       <tr>
                                                        <td><label>If bonus which DATE</label></td>
                                                        <td><input name="bill3_bon_date" type="date"  ></td>
                                                      </tr>
                                                 </table>
                                              </div>
                                            </div>
                                              <!--Financial Adjustments-->
                                            <div id="bill_adjust4"  style="display:none">
                                               <div class="form-inline">
                                                 <table>
                                                     <tr>
                                                        <td><label>Amount:</label></td>
                                                        <td><input name="bill4_amount" type="text" ></td>
                                                   </tr>
                                                      <tr>
                                                        <td><label>Problem description:</label></td>
                                                        <td><textarea cols="50" rows="2" name="bill4_prob"  type="text"  ></textarea>
                                                      </tr>
                                                       <tr>
                                                        <td><label>Alternate No:</label></td>
                                                        <td><input name="bill4_alt_no" type="text"  ></td>
                                                      </tr>
                                                 </table>
                                              </div>
                                            </div>
                                        <!--BILL ADJUSTMENTS ends-->

                                        <!--BILL RECIEVING COMPLAIN-->
                                            <!--Bill not recieved via mail-->
                                            <div id="bill_recieve1"  style="display:none">
                                                <div class="form-inline">
                                                 <table>
                                                      <tr>
                                                        <td><label>Address Detail:</label></td>
                                                        <td><textarea cols="50" rows="2" name="br1_address"  type="text"  ></textarea>
                                                      </tr>
                                                      <tr>
                                                        <td><label>Month for bill required:</label>
                                                        <td><input name="br1_req_bill_month" type="text"  ></td>
                                                      </tr>
                                                       <tr>
                                                        <td><label>Modified address:</label></td>
                                                        <td><textarea cols="50" rows="2" name="br1_mod_address"  type="text"  ></textarea></td>
                                                      </tr>
                                                      <tr>
                                                        <td><label>Alternate No:</label></td>
                                                        <td><input name="br1_alt_no" type="text" ></td>
                                                      </tr>
                                                  </table>
                                                </div>
                                            </div>
                                             <!--Bill not recieved via mail-->
                                            <div id="bill_recieve2"  style="display:none">
                                               <div class="form-inline">
                                                <table>
                                                      <tr>
                                                        <td><label>Email Address:</label></td>
                                                        <td><input name="br2_email" type="email" ></td>
                                                      </tr>
                                                      <tr>
                                                        <td><label>Month for bill required:</label></td>
                                                        <td><input name="br2_req_bill_month" type="text"  ></td>
                                                      </tr>
                                                       <tr>
                                                        <td><label>Modified address:</label></td>
                                                        <td><textarea cols="50" rows="2" name="br2_mod_address"  type="text"  ></textarea>
                                                      </tr>
                                                      <tr>
                                                        <td><label>Alternate No:</label></td>
                                                        <td><input name="br2_alt_no" type="text" ></td>
                                                      </tr>
                                                 </table> 
                                              </div>
                                            </div>
                                        <!--BILL RECIEVING COMPLAIN ENDS-->

                                        <!--CREDIT CONTROL RELATED PROBLEM-->
                                             <!--OGBAR COMPLAIN-->
                                             <div id="credit_control1"  style="display:none">
                                                <div class="form-inline">
                                                 <table>
                                                      <tr>
                                                        <td><label>Date:</label></td>
                                                        <td><input name="ccr1_date" type="date"></td>
                                                      </tr>
                                                      <tr>
                                                        <td><label>problem description:</label></td>
                                                        <td><textarea cols="50" rows="2" name="ccr1_prob"  type="text"  ></textarea></td>
                                                      </tr>
                                                       <tr >
                                                        <td><label>Current total bill:</label></td>
                                                        <td><input name="ccr1_current_bill" type="text" ></td>
                                                      </tr>
                                                  </table>
                                                </div>
                                            </div>
                                        <!--CREDIT CONTROL RELATED PROBLEM ENDS-->

                                        <!--GENERAL COMPLAIN-->
                                            <!--Distributor/Retailer/Sales Man Complain-->
                                                 <div id="general1"  style="display:none">
                                                    <div class="form-inline">
                                                     <div class="span6"> 
                                                      <table>
                                                          <tr>
                                                            <td><label>Relevant Center Address:</label></td>
                                                            <td><input name="g1_address" type="text"  ></td>
                                                          </tr>
                                                          <tr>
                                                            <td><label>Problem description:</label></td>
                                                            <td><textarea cols="50" rows="2" name="g1_prob"  type="text"  ></textarea></td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>Date of Call</label></td>
                                                            <td><input name="g1_call_date" type="date"></td>
                                                          </tr>
                                                          <tr >
                                                            <td><label>complained customer's MSISDN/Calling number:</label></td>
                                                            <td><input name="g1_customer_MSISDN" type="text" ></td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>Alternate No:</label></td>
                                                            <td><input name="g1_alt_no" type="text" ></td>
                                                          </tr>
                                                      </table>
                                                      </div>
                                                    </div>
                                                </div>    
                                        <!--GENERAL COMPLAIN ENDS-->
                                        <!--NETWORK COMPLAIN-->
                                             <!--Echo complain-->
                                                 <div id="network1"  style="display:none">
                                                    <div class="form-inline">
                                                      <div  class="span6">
                                                       <table>
                                                            <tr>
                                                              <td><label>Division</label></td>
                                                              <td>
                                                                <select name="net1_division" class="div">
                                                                <?php echo $division; ?>
                                                                </select>
                                                        	  </td>
                                                            </tr>
                                                            <tr>
                                                              <td><label>District</label></td>
                                                              <td>
                                                              <select name="net1_district" class="dis">
                                                              	
                                                              </select>
                                                              </td>
                                                            </tr>
                                                             <tr>
                                                              <td><label>Thana</label></td>
                                                              <td><input name="net1_thana" type="text" ></td>
                                                            </tr>
                                                            <tr >
                                                              <td><label>Location details</label></td>
                                                              <td><input name="net1_loc" type="text" ></td>
                                                            </tr>
                                                             <tr >
                                                              <td><label>B-party Number and Location</label></td>
                                                              <td><input name="net1_b_MSISDN" type="text" ></td>
                                                            </tr>
                                                        </table>
                                                      </div>  
                                                      <div class="span6">
                                                        <table>
                                                            <tr >
                                                              <td><label>Problem with other Handset</label></td>
                                                              <td><input name="net1_problem_with_other_set" value="yes" type="radio" checked > Yes 
                                                                  <input name="net1_problem_with_other_set" value="no" type="radio" > NO
                                                              </td>
                                                            </tr>
                                                            <tr >
                                                              <td><label>Any Specific  Time</label></td>
                                                              <td><input name="net1_spec_time" type="text" ></td>
                                                            </tr>
                                                             <tr >
                                                              <td><label>Temporary/Persistent Issue</label></td>
                                                              <td>
                                                                  <input name="net1_temp_or_pers" value="Temporary" type="radio" checked> Temporary
                                                                  <input name="net1_temp_or_pers" value="Persistent" type="radio" > Persistent
                                                              </td>
                                                            </tr>
                                                             <tr >
                                                              <td><label>Signal strength</label></td>
                                                              <td><input name="net1_signal" type="text" ></td>
                                                            </tr>
                                                             <tr >
                                                              <td><label>Alternate No</label></td>
                                                              <td><input name="net1_alt_no" type="text" ></td>
                                                            </tr>
                                                        </table>
                                                      </div>  
                                                    </div>
                                                 </div>
                                             <!--Call drop complain-->
                                                 <div id="network2"  style="display:none">
                                                    <div class="form-inline">
                                                      <div class="span6">
                                                         <table>
                                                            <tr>
                                                              <td><label>Division</label></td>
                                                              	<td>
                                                                <select name="net2_division" class="div">
                                                                <?php echo $division; ?>
                                                                </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                              <td><label>District</label></td>
                                                              <td>
                                                              <select name="net2_district" class="dis">
                                                              	
                                                              </select>
                                                              </td>
                                                            </tr>
                                                             <tr>
                                                              <td><label>Thana</label></td>
                                                              <td><input name="net2_thana" type="text" ></td>
                                                            </tr>
                                                            <tr >
                                                              <td><label>Location details</label></td>
                                                              <td><input name="net2_loc" type="text" ></td>
                                                            </tr>
                                                             <tr >
                                                              <td><label>B-party Number and Location</label></td>
                                                              <td><input name="net2_b_MSISDN" type="text" ></td>
                                                            </tr>
                                                          </table>
                                                        </div>
                                                        <div class="span6">  
                                                            <table>
                                                            <tr >
                                                              <td><label>Problem with other Handset</label></td>
                                                              <td><input name="net2_problem_with_other_set" value="yes" type="radio" checked > Yes 
                                                                  <input name="net2_problem_with_other_set" value="no" type="radio" > NO
                                                              </td>
                                                            </tr>
                                                            <tr >
                                                              <td><label>Any Specific  Time</label></td>
                                                              <td><input name="net2_spec_time" type="text" ></td>
                                                            </tr>
                                                             <tr >
                                                              <td><label>Temporary/Persistent Issue</label></td>
                                                              <td>
                                                                  <input name="net2_temp_or_pers" value="Temporary" type="radio" checked> Temporary
                                                                  <input name="net2_temp_or_pers" value="Persistent" type="radio" > Persistent
                                                              </td>
                                                            </tr>
                                                             <tr >
                                                              <td><label>Signal strength</label></td>
                                                              <td><input name="net2_signal" type="text" ></td>
                                                            </tr>
                                                             <tr >
                                                              <td><label>Alternate No</label></td>
                                                              <td><input name="net2_alt_no" type="text" ></td>
                                                            </tr>
                                                        </table>
                                                      </div>
                                                    </div>
                                                 </div>
                                             <!--Outgoing call complain-->
                                                 <div id="network3"  style="display:none">
                                                    <div class="form-inline">
                                                      <div class="span6">
                                                          <table>
                                                            <tr>
                                                              <td><label>Division</label></td>
                                                              <td>
                                                                <select name="net3_division" class="div">
                                                                <?php echo $division; ?>
                                                                </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                              <td><label>District</label></td>
                                                              <td>
                                                              <select name="net3_district" class="dis">
                                                              	
                                                              </select>
                                                              </td>
                                                            </tr>
                                                             <tr>
                                                              <td><label>Thana</label></td>
                                                              <td><input name="net3_thana" type="text" ></td>
                                                            </tr>
                                                            <tr >
                                                              <td><label>Location details</label></td>
                                                              <td><input name="net3_loc" type="text" ></td>
                                                            </tr>
                                                             <tr >
                                                              <td><label>B-party Number and Location</label></td>
                                                              <td><input name="net3_b_MSISDN" type="text" ></td>
                                                            </tr>
                                                            </table>
                                                          </div>
                                                          <div class="span6">  
                                                              <table>
                                                                  <tr >
                                                                    <td><label>Problem with other Handset</label></td>
                                                                    <td><input name="net3_problem_with_other_set" value="yes" type="radio" checked > Yes 
                                                                        <input name="net3_problem_with_other_set" value="no" type="radio" > NO
                                                                    </td>
                                                                  </tr>
                                                                  <tr >
                                                                    <td><label>Any Specific  Time</label></td>
                                                                    <td><input name="net3_spec_time" type="text" ></td>
                                                                  </tr>
                                                                   <tr >
                                                                    <td><label>Temporary/Persistent Issue</label></td>
                                                                    <td>
                                                                        <input name="net3_temp_or_pers" value="Temporary" type="radio" checked> Temporary
                                                                        <input name="net3_temp_or_pers" value="Persistent" type="radio"> Persistent
                                                                    </td>
                                                                  </tr>
                                                                   <tr >
                                                                    <td><label>Signal strength</label></td>
                                                                    <td><input name="net3_signal" type="text" ></td>
                                                                  </tr>
                                                                   <tr >
                                                                    <td><label>Alternate No</label></td>
                                                                    <td><input name="net3_alt_no" type="text" ></td>
                                                                  </tr>
                                                              </table>
                                                            </div>
                                                    </div>
                                                 </div>

                                             <!--SMS incoming Complain-->
                                                 <div id="network4"  style="display:none">
                                                    <div class="form-inline">
                                                      <div class="span6">
                                                          <table>
                                                              <tr>
                                                                <td><label>Division</label></td>
                                                                <td>
                                                                <select name="net4_division" class="div">
                                                                <?php echo $division; ?>
                                                                </select>
                                                                </td>
                                                              </tr>
                                                              <tr>
                                                                <td><label>District</label></td>
                                                                <td>
                                                              <select name="net4_district" class="dis">
                                                              	
                                                              </select>
                                                              </td>
                                                              </tr>
                                                               <tr>
                                                                <td><label>Thana</label></td>
                                                                <td><input name="net4_thana" type="text" ></td>
                                                              </tr>
                                                              <tr >
                                                                <td><label>Location details</label></td>
                                                                <td><input name="net4_loc" type="text" ></td>
                                                              </tr>
                                                               <tr >
                                                                <td><label>B-party Number and Location</label></td>
                                                                <td><input name="net4_b_MSISDN" type="text" ></td>
                                                              </tr>
                                                            </table>
                                                          </div>
                                                          <div class="span6">
                                                            <table>
                                                              <tr >
                                                                <td><label>Problem with other Handset</label></td>
                                                                <td><input name="net4_problem_with_other_set" value="yes" type="radio" checked > Yes 
                                                                    <input name="net4_problem_with_other_set" value="no" type="radio" > NO
                                                                </td>
                                                              </tr>
                                                              <tr >
                                                                <td><label>Any Specific  Time</label></td>
                                                                <td><input name="net4_spec_time" type="text" ></td>
                                                              </tr>
                                                               <tr >
                                                                <td><label>Temporary/Persistent Issue</label></td>
                                                                <td>
                                                                    <input name="net4_temp_or_pers" value="Temporary" type="radio" checked> Temporary
                                                                    <input name="net4_temp_or_pers" value="Persistent" type="radio" > Persistent
                                                                </td>
                                                              </tr>
                                                               <tr >
                                                                <td><label>Signal strength</label></td>
                                                                <td><input name="net4_signal" type="text" ></td>
                                                              </tr>
                                                               <tr >
                                                                <td><label>Alternate No</label></td>
                                                                <td><input name="net4_alt_no" type="text" ></td>
                                                              </tr>
                                                            </table>
                                                          </div>
                                                    </div>
                                                 </div>  
                                             <!--SMS outgoing Complain-->
                                                 <div id="network5"  style="display:none">
                                                    <div class="form-inline">

                                                      <div class="span6">
                                                         <table>
                                                          <tr>
                                                            <td><label>Division</label></td>
                                                            <td>
                                                            <select name="net5_division" class="div">
                                                            <?php echo $division; ?>
                                                            </select>
                                                            </td>
                                                          </tr>
                                                          <tr>
                                                            <td><label>District</label></td>
                                                            <td>
                                                              <select name="net5_district" class="dis">
                                                              	
                                                              </select>
                                                              </td>
                                                          </tr>
                                                           <tr>
                                                            <td><label>Thana</label></td>
                                                            <td><input name="net5_thana" type="text" ></td>
                                                          </tr>
                                                          <tr >
                                                            <td><label>Location details</label></td>
                                                            <td><input name="net5_loc" type="text" ></td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>B-party Number and Location</label></td>
                                                            <td><input name="net5_b_MSISDN" type="text" ></td>
                                                          </tr>
                                                        </table>
                                                        </div>

                                                       <div class="span6">     
                                                        <table>
                                                          <tr >
                                                            <td><label>Problem with other Handset</label></td>
                                                            <td><input name="net5_problem_with_other_set" value="yes" type="radio" checked > Yes 
                                                                <input name="net5_problem_with_other_set" value="no" type="radio" > NO
                                                            </td>
                                                          </tr>
                                                          <tr >
                                                            <td><label>Any Specific  Time</label></td>
                                                            <td><input name="net5_spec_time" type="text" ></td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>Temporary/Persistent Issue</label></td>
                                                            <td>
                                                                <input name="net5_temp_or_pers" value="Temporary" type="radio" checked> Temporary
                                                                <input name="net5_temp_or_pers" value="Persistent" type="radio" > Persistent
                                                            </td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>Signal strength</label></td>
                                                            <td><input name="net5_signal" type="text" ></td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>Alternate No</label></td>
                                                            <td><input name="net5_alt_no" type="text" ></td>
                                                          </tr>
                                                      </table>
                                                      </div>
                                                    </div>
                                                 </div>
                                             <!--Incoming Complain-->
                                                 <div id="network6"  style="display:none">
                                                    <div class="form-inline">
                                                      <div class="span6">
                                                        <table>
                                                          <tr>
                                                            <td><label>Division</label></td>
                                                            <td>
                                                            <select name="net6_division" class="div">
                                                            <?php echo $division; ?>
                                                            </select>
                                                            </td>
                                                          </tr>
                                                          <tr>
                                                            <td><label>District</label></td>
                                                            <td>
                                                              <select name="net6_district" class="dis">
                                                              	
                                                              </select>
                                                              </td>
                                                          </tr>
                                                           <tr>
                                                            <td><label>Thana</label></td>
                                                            <td><input name="net6_thana" type="text" ></td>
                                                          </tr>
                                                          <tr >
                                                            <td><label>Location details</label></td>
                                                            <td><input name="net6_loc" type="text" ></td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>B-party Number and Location</label></td>
                                                            <td><input name="net6_b_MSISDN" type="text" ></td>
                                                          </tr>
                                                        </table>
                                                      </div>
                                                      <div class="span6"> 
                                                      <table> 
                                                          <tr >
                                                            <td><label>Problem with other Handset</label></td>
                                                            <td><input name="net6_problem_with_other_set" value="yes" type="radio" checked > Yes 
                                                                <input name="net6_problem_with_other_set" value="no" type="radio" > NO
                                                            </td>
                                                          </tr>
                                                          <tr >
                                                            <td><label>Any Specific  Time</label></td>
                                                            <td><input name="net6_spec_time" type="text" ></td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>Temporary/Persistent Issue</label></td>
                                                            <td>
                                                                <input name="net6_temp_or_pers" value="Temporary" type="radio" checked> Temporary
                                                                <input name="net6_temp_or_pers" value="Persistent" type="radio" > Persistent
                                                            </td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>Alternate No</label></td>
                                                            <td><input name="net6_alt_no" type="text" ></td>
                                                          </tr>
                                                      </table>
                                                      </div>   
                                                    </div>
                                                 </div>       
                                             <!--Signal Complain-->
                                                 <div id="network7"  style="display:none">
                                                    <div class="form-inline">
                                                      <div class="span6">
                                                        <table>
                                                          <tr>
                                                            <td><label>Division</label></td>
                                                            <td>
                                                            <select name="net7_division" class="div">
                                                            <?php echo $division; ?>
                                                            </select>
                                                            </td>
                                                          </tr>
                                                          <tr>
                                                            <td><label>District</label></td>
                                                            <td>
                                                              <select name="net7_district" class="dis">
                                                              	
                                                              </select>
                                                              </td>
                                                          </tr>
                                                           <tr>
                                                            <td><label>Thana</label></td>
                                                            <td><input name="net7_thana" type="text" ></td>
                                                          </tr>
                                                          <tr >
                                                            <td><label>Location details</label></td>
                                                            <td><input name="net7_loc" type="text" ></td>
                                                          </tr>

                                                          <tr >
                                                            <td><label>Problem with other Handset</label></td>
                                                            <td><input name="net7_problem_with_other_set" value="yes" type="radio" checked > Yes 
                                                                <input name="net7_problem_with_other_set" value="no" type="radio" > NO
                                                            </td>
                                                          </tr>
                                                          </table>
                                                      </div>
                                                      <div class="span6">
                                                          <table>
                                                               <tr >
                                                                <td><label>Temporary/Persistent Issue</label></td>
                                                                <td>
                                                                    <input name="net7_temp_or_pers" value="Temporary" type="radio" checked> Temporary
                                                                    <input name="net7_temp_or_pers" value="Persistent" type="radio" > Persistent
                                                                </td>
                                                              </tr>
                                                               <tr >
                                                                <td><label>Signal strength</label></td>
                                                                <td><input name="net7_signal" type="text" ></td>
                                                              </tr>
                                                               <tr >
                                                                <td><label>Alternate No</label></td>
                                                                <td><input name="net7_alt_no" type="text" ></td>
                                                              </tr>
                                                          </table>
                                                      </div>
                                                    </div>
                                                 </div>
                                             <!--ISD Incoming Complain -->
                                                 <div id="network8"  style="display:none">
                                                    <div class="form-inline">
                                                      <div class="span6">
                                                        <table>
                                                            <tr>
                                                              <td><label>Division</label></td>
                                                              	<td>
                                                                <select name="net8_division" class="div">
                                                                <?php echo $division; ?>
                                                                </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                              <td><label>District</label></td>
                                                              <td>
                                                              <select name="net8_district" class="dis">
                                                              	
                                                              </select>
                                                              </td>
                                                            </tr>
                                                             <tr>
                                                              <td><label>Thana</label></td>
                                                              <td><input name="net8_thana" type="text" ></td>
                                                            </tr>
                                                            <tr >
                                                              <td><label>Location details</label></td>
                                                              <td><input name="net8_loc" type="text" ></td>
                                                            </tr>
                                                          </table>
                                                        </div>
                                                        <div class="span6">  
                                                          <table>
                                                             <tr>
                                                              <td><label>ISD No</label></td>
                                                              <td><input name="net8_isd_no" type="text" ></td>
                                                            </tr>
                                                             <tr >
                                                              <td><label>Signal Strength </label></td>
                                                              <td><input name="net8_signal" type="text" ></td>
                                                            </tr>
                                                             <tr >
                                                              <td><label>Alternate No</label></td>
                                                              <td><input name="net8_alt_no" type="text" ></td>
                                                            </tr>
                                                          </table>
                                                        </div>  
                                                    </div>
                                                 </div>       
                                             <!--Non Coverage area-->
                                                 <div id="network9"  style="display:none">
                                                      <div class="form-inline">
                                                        <div class="span6">
                                                          <table>     
                                                              <tr>
                                                                <td><label>Division</label></td>
                                                                <td>
                                                                <select name="net9_division" class="div">
                                                                <?php echo $division; ?>
                                                                </select>
                                                                </td>
                                                              </tr>
                                                              <tr>
                                                                <td><label>District</label></td>
                                                                <td>
                                                              <select name="net9_district" class="dis">
                                                              	
                                                              </select>
                                                              </td>
                                                              </tr>
                                                               <tr>
                                                                <td><label>Thana</label></td>
                                                                <td><input name="net9_thana" type="text" ></td>
                                                              </tr>
                                                            </table>
                                                          </div>
                                                          <div class="span6">  
                                                            <table>
                                                              <tr >
                                                                <td><label>Location details</label></td>
                                                                <td><input name="net9_loc" type="text" ></td>
                                                              </tr>
                                                               <tr >
                                                                <td><label>Signal Strength </label></td>
                                                                <td><input name="net9_signal" type="text" ></td>
                                                              </tr>
                                                               <tr >
                                                                <td><label>Alternate No</label></td>
                                                                <td><input name="net9_alt_no" type="text" ></td>
                                                              </tr>
                                                            </table>
                                                        </div>  
                                                    </div>
                                                 </div>             
                                        <!--NETWORK COMPLAIN ENDS-->

                                        <!--Payment related problem-->
                                             <!--Unable to recharge acount-->
                                                 <div id="payment1"  style="display:none">
                                                    <div class="form-inline">
                                                      <div class="span6">
                                                          <table>     
                                                            <tr>
                                                              <td><label>How subscriber is trying to recharge</label></td>
                                                              <td><input name="pay1_recharge_method" type="text"></td>
                                                            </tr>
                                                            <tr>
                                                              <td><label>Scratch card serial number</label></td>
                                                              <td><input name="pay1_card_serial" type="text"></td>
                                                            </tr>
                                                             <tr >
                                                              <td><label>Duration of the problem</label></td>
                                                              <td><input name="pay1_prob_duration" type="text"></td>
                                                            </tr>
                                                          </table>
                                                       </div>
                                                       <div class="span6">       
                                                          <table>
                                                            <tr >
                                                              <td><label>Error Message:</label></td>
                                                              <td><textarea cols="50" rows="2" name="pay1_error_m"></textarea></td>
                                                            </tr>
                                                            <tr >
                                                              <td><label>Exact Location:</label></td>
                                                              <td><input name="pay1_loc" type="text" ></td>
                                                            </tr>
                                                            <tr >
                                                              <td><label>Problem description:</label></td>
                                                              <td><textarea cols="50" rows="2" name="pay1_prob_desc"></textarea></td>
                                                            </tr>
                                                            <tr >
                                                              <td><label>Date of Tried</label></td>
                                                              <td><input name="pay1_date_tried" type="date"></td>
                                                            </tr>
                                                          </table>
                                                        </div>        
                                                    </div>
                                                 </div>
                                                 <!--Distributor/Retailer/Sales Man Complain-->
                                                 <div id="payment2"  style="display:none">
                                                    <div class="form-inline">
                                                         <table>
                                                          <tr>
                                                            <td><label>Paid amount:</label></td>
                                                            <td><input name="pay2_paid_amount" type="text"  ></td>
                                                          </tr>
                                                          <tr>
                                                            <td><label>Discrepant amount:</label></td>
                                                            <td><input name="pay2_dis_amount" type="text" ></td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>Date of payment</label></td>
                                                            <td><input name="pay2_payment_date" type="date"></td>
                                                          </tr>
                                                          <tr >
                                                            <td><label>Payment Given from</label></td>
                                                            <td><input name="pay2_payment_method" type="text" ></td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>Alternate No:</label></td>
                                                            <td><input name="pay2_alt_no" type="text" ></td>
                                                          </tr>
                                                        </table>  
                                                    </div>
                                                 </div>        
                                        <!--Payment related problem Ends-->

                                        <!--SERVICE RELATED PROBLEM-->
                                            <!--Unable to divert/forward calls-->
                                                 <div id="service1"  style="display:none">
                                                    <div class="form-inline">
                                                      <div class="span6">
                                                        <table>     
                                                              <tr>
                                                                <td><label>Division</label></td>
                                                                <td>
                                                                <select name="ser1_division" class="div">
                                                                <?php echo $division; ?>
                                                                </select>
                                                                </td>
                                                              </tr>
                                                              <tr>
                                                                <td><label>District</label></td>
                                                               <td>
                                                              <select name="ser1_district" class="dis">
                                                              	
                                                              </select>
                                                              </td>
                                                              </tr>
                                                               <tr >
                                                                <td><label>Thana</label></td>
                                                               <td> <input name="ser1_thana" type="text" ></td>
                                                              </tr>
                                                              <tr >
                                                                <td><label>Location details</label></td>
                                                                <td><input name="ser1_loc" type="text" ></td>
                                                              </tr>
                                                               <tr >
                                                                <td><label>B Party Number and Location</label></td>
                                                                <td><input name="ser1_b_MSISDN" type="text" ></td>
                                                              </tr>
                                                          </table>
                                                          </div>
                                                          <div class="span6">   
                                                          <table>    
                                                              <tr>
                                                                <td><label>Problem with Handset</label></td>
                                                                <td>
                                                                    <input  name="ser1_problem_with_other_set" value="yes" type="radio" checked > Yes 
                                                                    <input  name="ser1_problem_with_other_set" value="no" type="radio" > NO
                                                                </td>
                                                              </tr>
                                                               <tr>
                                                                <td><label>Temporary/Persistent Issue</label></td>
                                                                <td>
                                                                     <input  name="ser1_temp_or_pers" value="Temporary" type="radio" checked> Temporary
                                                                     <input  name="ser1_temp_or_pers" value="Persistent" type="radio" > Persistent
                                                                </td>
                                                              </tr>
                                                               <tr >
                                                                <td><label>Signal strength</label></td>
                                                                <td><input name="ser1_signal" type="text" ></td>
                                                              </tr>
                                                               <tr>
                                                                <td><label>Alternate No</label></td>
                                                                <td><input name="ser1_alt_no" type="text"></td>
                                                              </tr>
                                                        </table>
                                                        </div>      
                                                    </div>
                                                 </div>
                                             <!--Unable to use GPRS-->
                                                 <div id="service2"  style="display:none">
                                                    <div class="form-inline">
                                                      <div class="span6">
                                                         <table>
                                                            <tr>
                                                              <td><label>Division</label></td>
                                                              <td>
                                                                <select name="ser2_division" class="div">
                                                                <?php echo $division; ?>
                                                                </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                              <td><label>District</label></td>
                                                              <td>
                                                              <select name="ser2_district" class="dis">
                                                              	
                                                              </select>
                                                              </td>
                                                            </tr>
                                                             <tr >
                                                              <td><label>Thana</label></td>
                                                              <td><input name="ser2_thana" type="text" ></td>
                                                            </tr>
                                                            <tr >
                                                              <td><label>Exact Location details</label></td>
                                                              <td><input name="ser2_loc" type="text" ></td>
                                                            </tr>
                                                          </table>
                                                       </div>
                                                       <div class="span6">   
                                                          <table>
                                                           <tr >
                                                            <td><label>Hand set with model</label></td>
                                                            <td><input name="ser2_phone_model" type="text" ></td>
                                                          </tr>
                                                          <tr >
                                                            <td><label>GPRS Pack Name</label></td>
                                                            <td><input name="ser2_gprs_pack" type="text" ></td>
                                                          </tr>
                                                          <tr >
                                                            <td><label>Duration of problem</label></td>
                                                            <td><input name="ser2_prob_duration" type="text" ></td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>Alternate No</label></td>
                                                            <td><input name="ser2_alt_no" type="text" ></td>
                                                          </tr>
                                                        </table>
                                                        </div>
                                                    </div>
                                                 </div>
                                             <!--VAS activation complain-->
                                                 <div id="service3"  style="display:none">
                                                    <div class="form-inline">
                                                        <table>     
                                                              <tr>
                                                                <td><label>VAS name:</label></td>
                                                                <td><input name="ser3_vas" type="text" ></td>
                                                              </tr>
                                                              <tr>
                                                                <td><label>Customer Verification through whom: </label></td>
                                                                <td><input name="ser3_cust_veri"  type="text"  ></td>
                                                              </tr>
                                                               <tr >
                                                                <td><label>Shortcode:</label></td>
                                                                <td><input name="ser3_shortcode" type="text" ></td>
                                                              </tr>
                                                               <tr>
                                                                <td><label>Alternate No:</label></td>
                                                                <td><input name="ser3_alt_no" type="text"></td>
                                                              </tr>
                                                        </table>      
                                                    </div>
                                                 </div>
                                             <!--VAS deactivation complain-->
                                                 <div id="service4"  style="display:none">
                                                     <div class="form-inline">
                                                        <table>
                                                          <tr>
                                                            <td><label>VAS name:</label></td>
                                                            <td><input name="ser4_vas" type="text" ></td>
                                                          </tr>
                                                          <tr>
                                                            <td><label>Customer Verification:</label></td>
                                                            <td><input name="ser4_cust_veri" type="text" ></td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>Shortcode:</label></td>
                                                            <td><input name="ser4_shortcode" type="text" ></td>
                                                          </tr>
                                                           <tr>
                                                            <td><label>Alternate No:</label></td>
                                                            <td><input name="ser4_alt_name" type="text"></td>
                                                          </tr>
                                                        </table>  
                                                    </div>
                                                 </div>  
                                             <!--VAS Not Working complain-->
                                                 <div id="service5"  style="display:none">
                                                     <div class="form-inline">
                                                        <table>     
                                                              <tr>
                                                                <td><label>VAS name:</label></td>
                                                                <td><input name="ser5_vas" type="text"  ></td>
                                                              </tr>
                                                              <tr>
                                                                <td><label>Problem description:</label></td>
                                                                <td><textarea cols="50" rows="2" name="ser5_prob_desc"  type="text"  ></textarea></td>
                                                              </tr>
                                                               <tr >
                                                                <td><label>Customer Location:</label></td>
                                                                <td><input name="ser5_loc" type="text"></td>
                                                              </tr>
                                                               <tr>
                                                                <td><label>Alternate No:</label></td>
                                                                <td><input name="ser5_alt_no" type="text" ></td>
                                                              </tr>
                                                        </table>      
                                                    </div>
                                                 </div>
                                             <!--Delete FnFs-->
                                                 <div id="service6"  style="display:none">
                                                     <div class="form-inline">
                                                        <table>     
                                                              <tr>
                                                                <td><label>Current package:</label></td>
                                                                <td><input name="ser6_current_package" type="text"  ></td>
                                                              </tr>
                                                              <tr>
                                                                <td><label>Requested FnF no:</label></td>
                                                                <td><input name="ser6_req_fnf" type="text"  ></td>
                                                              </tr>
                                                               <tr >
                                                                <td><label>FnF add date:</label></td>
                                                                <td><input name="ser6_fnf_add_date" type="date" ></td>
                                                              </tr>
                                                               <tr>
                                                                <td><label>Alternate No:</label></td>
                                                                <td><input name="ser6_alt_no" type="text" ></td>
                                                              </tr>
                                                        </table>      
                                                    </div>
                                                 </div>
                                            <!--Postpaid Package plan change complain-->
                                                 <div id="service7"  style="display:none">
                                                     <div class="form-inline">
                                                        <table>     
                                                              <tr>
                                                                <td><label>Current package:</label></td>
                                                                <td><input name="ser7_current_package" type="text"  ></td>
                                                              </tr>
                                                              <tr>
                                                                <td><label>Desired Package:</label></td>
                                                                <td><input name="ser7_desired_pack" type="text"  ></td>
                                                              </tr>
                                                               <tr >
                                                                <td><label>Effecttive date:</label></td>
                                                                <td><input name="ser7_effective_date" type="date" ></td>
                                                              </tr>
                                                        </table>      
                                                    </div>
                                                 </div>
                                            <!--Prepaid Package plan change complain-->
                                                 <div id="service8"  style="display:none">
                                                     <div class="form-inline">
                                                        <table>     
                                                              <tr>
                                                                <td><label>Current package:</label></td>
                                                                <td><input name="ser8_current_package" type="text"  ></td>
                                                              </tr>
                                                              <tr>
                                                                <td><label>Desired Package:</label></td>
                                                                <td><input name="ser8_desired_pack" type="text"  ></td>
                                                              </tr>
                                                        </table>      
                                                    </div>
                                                 </div>
                                            <!--Add Fnfs-->
                                                 <div id="service9"  style="display:none">
                                                     <div class="form-inline">
                                                        <table>     
                                                              <tr>
                                                                <td><label>Current package:</label></td>
                                                                <td><input name="ser9_current_package" type="text"  ></td>
                                                              </tr>
                                                              <tr>
                                                                <td><label>Desired FnFs:</label></td>
                                                                <td><input name="ser9_desired_fnf" type="text"  ></td>
                                                              </tr>
                                                        </table>      
                                                    </div>
                                                 </div>          
                                        <!--SERVICE RELATED PROBLEM ENDS-->

                                        </div>                    
                                    </div>
                                    <hr>
                                    <div class="span2 offset4">
                                    </div>
                                    <div class="span6 offset4">
                                    <textarea cols="50" rows="2" name="agent_message" id="agent_message"  type="text"  style="background-color:#D7FFD7; display:none" placeholder="Please Leave a Message"></textarea>
                                    <input type="checkbox" value="2" id="agent_wrap" name="status" onClick="showHide()"> Check, if issue solved.
                                    <button style="margin-top:5px;" class="btn btn-xs btn-success">SEND</button>
                                    </div>
                          </form>
                                
                            <!--COMPLAIN TAKING FORM AREA-->
                        </div>
                    </div>
                    <!-- /block -->
                </div>
                    <p style="text-align:center">&copy; Digicon Technologies Limited, 2015</p>
            </div>
</div>
        <!--/.fluid-container-->

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
