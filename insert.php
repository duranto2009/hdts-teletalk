<!DOCTYPE html>
<html>
    
<head>
        <title>Customer Complain</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <link href="assets/DT_bootstrap.css" rel="stylesheet" media="screen">
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <style>
		body{background-color:#e0e0e0;overflow-x: hidden}
        </style>
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
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="#">Profile</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav">
                            <li class="active">
                                <a href="agent/index.php">Dashboard</a>
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
                            <a href="agent/index.php">Dashboard</a>
                        </li>
                        <li>
                            <a href="agent/search.php">Ticket Status</a>
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
            <!--COMPLAIN TAKING FORM AREA-->
                          <form action="test.php" method="POST" name="ticket">
                                    <div class="container span12">
                                        <!--CATAGORIES WITH SUB-CATAGORIES-->
                                        <div class="row">
                                           <!--MASTER CATAGORY-->
                                            <div class="span4 offset2">
                                                <div class="form-group">
                                                  <label>Problem Catagory</label>
                                                  <select class="form-control" size="6" id="selection" style="width:300px"> 
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
                                                      <select class="form-control" size="6" id="selection" style="width:300px"> 
<option></option>
                                                            <option value="3g1">3G SERVICE NOT WORKING</option>
                                                            <option value="3g2">3G PACKAGE ACTIVATION</option>
                                                            <option value="3g3">3G PACKAGE DEACTIVATION</option>
                                                        </select>
                                                    </div>
                                                   <!-- BILL ADJUSTMENT-->
                                                      <div id="bill_adjust"  style="display:none">
                                                       <label>Problem Sub-Catagory</label>
                                                        <select class="form-control" size="6" id="selection" style="width:300px"> 
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
                                                           <select class="form-control" size="6" id="selection" style="width:300px"> 
<option></option>
                                                                <option value="bill_recieve1">BILL NOT RECIEVED VIA MAIL</option>
                                                                <option value="bill_recieve2">BILL NOT RECIEVED VIA MAIL</option>
                                                            </select>
                                                 </div>
                                                    <!-- CREDIT CONTROL PROBLEM-->
                                                         <div id="credit_control" style="display:none">
                                                           <label>Problem Sub-Catagory</label>
                                                           <select class="form-control" size="6" id="selection" style="width:300px"> 
<option></option>
                                                                <option value="credit_control1">OGBAR COMPLAIN</option>            
                                                            </select>
                                                 </div>
                                                    <!--GENERAL COMPLAIN-->
                                                         <div id="general"  style="display:none">
                                                           <label>Problem Sub-Catagory</label>
                                                           <select class="form-control" size="6" id="selection" style="width:300px"> 
<option></option>
                                                                <option value="general1">DISTRIBUTOR/RETAILER/SALES MAN COMPLAIN</option>
                                                            </select>
                                                 </div>
                                                    <!--NETWORK COMPLAIN-->
                                                         <div id="network" style="display:none">
                                                           <label>Problem Sub-Catagory</label>
                                                           <select class="form-control" size="6" id="selection" style="width:300px"> 
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
                                                           <select class="form-control" size="6" id="selection" style="width:300px"> 
<option></option>
                                                                <option value="payment1">UNABLE TO PAY RECHARGE ACCOUNT</option>
                                                                <option value="payment2">PAYMENT NOT POSTED</option>
                                                            </select>
                                                 </div>

                                                    <!--  SERVICE RELATED-->
                                                     <div id="service"  style="display:none">
                                                       <label>Problem Sub-Catagory</label>
                                                       <select size="6" class="form-control" id="selection" style="width:300px">
                                                            <option value="service1">UNABLE TO DIVERT/FORWARD CALLS</option>
                                                            <option value="service2">UNABLE TO USE GPRS</option>
                                                            <option value="service3">VAS ACTIVATION COMPLAIN</option>
                                                            <option value="service4">VAS DEACTIVATION COMPLAIN</option>
                                                            <option value="service5">VAS NOT WORKING COMPLAIN</option>
                                                            <option value="service6">DELETE FNFS</option>
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
                                        <div class="span12" style="height:250px; overflow:scroll">
                                        <!--3G RELATED COMPLAIN-->
                                           <!--3g service not working-->
                                            <div id="3g1"  style="display:none">
                                               <div class="form-inline">
                                                      <table>
                                                        <tr>
                                                            <td><label>DIVISION</label></td>
                                                            <td><input name="division" type="text"  ></td>
                                                        </tr>

                                                        <tr>
                                                            <td><label>DISTRICT:</label></td>
                                                            <td><input name="district"   type="text"  ></td>
                                                        </tr>

                                                        <tr>
                                                            <td><label>THANA:</label></td>
                                                            <td><input name="thana"  type="text"  ></td>
                                                        </tr>

                                                        <tr>
                                                            <td><label>Location details:</label></td>
                                                            <td><input name="loc"  type="text" ></td>
                                                        </tr>

                                                        <tr>
                                                            <td><label>Problem description:</label></td>
                                                            <td><textarea cols="50" rows="5" name="prob_desc"  type="text"></textarea></td>
                                                        </tr>

                                                        <tr>
                                                            <td><label>Hand set with model:</label></td>
                                                            <td><input name="phone_model"  type="text"  ></td>
                                                        </tr>

                                                        <tr>
                                                            <td><label>Error Message:</label></td>
                                                            <td><textarea cols="50" rows="2" name="error_m"  type="text"  ></textarea></td>
                                                        </tr>

                                                        <tr>
                                                            <td><label>Alternate No:</label></td>
                                                            <td><input name="alt_no"  type="text"  ></td>
                                                        </tr>  
                                                    </table>
                                              </div>
                                            </div>
                                              <!--3g service not working-->
                                            <div id="3g2"  style="display:none">
                                               <div class="form-inline">
                                                    <table>
                                                      <tr>
                                                        <td><label>DIVISION</label></td>
                                                        <td><input name="division" type="text" ></td>
                                                      </tr>
                                                      <tr>
                                                        <td><label>DISTRICT:</label></td>
                                                        <td><input name="district" type="text"  ></td>
                                                      </tr>
                                                       <tr >
                                                        <td><label>THANA:</label></td>
                                                        <td><input name="thana" type="text" ></td>
                                                      </tr>
                                                       <tr>
                                                        <td><label>Location details:</label></td>
                                                        <td><input name="loc" type="text"   ></td>
                                                      </tr>
                                                       <tr>
                                                        <td><label>3g Package name</label></td>
                                                        <td><input name="3g_pac" type="text"  ></td>
                                                      </tr>
                                                       <tr>
                                                        <td><label>Hand set with model:</label></td>
                                                        <td><input name="phone_model" type="text"  ></td>
                                                      </tr>
                                                       <tr>
                                                        <td><label>Error Message:</label></td>
                                                        <td><textarea cols="50" rows="2" name="error_m"  type="text"  ></textarea></td>
                                                      </tr>
                                                    </table>
                                              </div>
                                            </div>
                                              <!--3g service not working-->
                                            <div id="3g3"  style="display:none">
                                               <div class="form-inline">
                                                 <table>
                                                      <tr>
                                                        <td><label>3G package Name:</label></td>
                                                        <td><input name="3g_pac" type="text"></td>
                                                      </tr>
                                                      <tr>
                                                        <td><label>Error Message:</label></td>
                                                        <td><textarea cols="50" rows="2" name="error_m"  type="text"  ></textarea></td>
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
                                                        <td><input name="amount" type="text" ></td>
                                                      </tr>
                                                      <tr>
                                                        <td><label>FnF no:</label></td>
                                                        <td><input name="fnf" type="text"  ></td>
                                                      </tr>
                                                       <tr >
                                                        <td><label>Fnf add date and Time</label></td>
                                                        <td><input name="fnf_d" type="date" ></td>
                                                      </tr>
                                                      <tr>
                                                        <td><label>Overcharged Periods</label></td>
                                                        <td><input name="overc_p" type="text" ></td>
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
                                                        <td><input name="amount" type="text" ></td>
                                                      </tr>
                                                      <tr>
                                                        <td><label>Problem Description:</label></td>
                                                        <td><textarea cols="50" rows="5" name="prob_desc"  type="text"  ></textarea></td>
                                                      </tr>
                                                       <tr>
                                                        <td><label>Overcharged Period:</label></td>
                                                        <td><input name="overc_p" type="text" ></td>
                                                      </tr>
                                                       <tr>
                                                        <td><label>Alternate No:</label></td>
                                                        <td><input name="alt_no" type="text"   ></td>
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
                                                        <td><input name="amount" type="text" ></td>
                                                   </tr>
                                                      <tr>
                                                        <td><label>Eligible for which offer:</label></td>
                                                        <td><input name="eleg_offer" type="text"  ></td>
                                                      </tr>
                                                       <tr>
                                                        <td><label>Alternate No:</label></td>
                                                        <td><input name="alt_no" type="text"  ></td>
                                                      </tr>
                                                       <tr>
                                                        <td><label>If bonus which DATE</label></td>
                                                        <td><input name="bon_date" type="date"  ></td>
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
                                                        <td><input name="amount" type="text" ></td>
                                                   </tr>
                                                      <tr>
                                                        <td><label>Problem description:</label></td>
                                                        <td><textarea cols="50" rows="5" name="prob_desc"  type="text"  ></textarea>
                                                      </tr>
                                                       <tr>
                                                        <td><label>Alternate No:</label></td>
                                                        <td><input name="alt_no" type="text"  ></td>
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
                                                        <td><textarea cols="50" rows="5" name="address"  type="text"  ></textarea>
                                                      </tr>
                                                      <tr>
                                                        <td><label>Month for bill required:</label>
                                                        <td><input name="req_bill_month" type="text"  ></td>
                                                      </tr>
                                                       <tr>
                                                        <td><label>Modified address:</label></td>
                                                        <td><textarea cols="50" rows="5" name="mod_address"  type="text"  ></textarea></td>
                                                      </tr>
                                                      <tr>
                                                        <td><label>Alternate No:</label></td>
                                                        <td><input name="alt_no" type="text" ></td>
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
                                                        <td><input name="email" type="text" ></td>
                                                      </tr>
                                                      <tr>
                                                        <td><label>Month for bill required:</label></td>
                                                        <td><input name="req_bill_month" type="text"  ></td>
                                                      </tr>
                                                       <tr>
                                                        <td><label>Modified address:</label></td>
                                                        <td><textarea cols="50" rows="5" name="mod_address"  type="text"  ></textarea>
                                                      </tr>
                                                      <tr>
                                                        <td><label>Alternate No:</label></td>
                                                        <td><input name="alt_no" type="text" ></td>
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
                                                        <td><input name="date" type="date"></td>
                                                      </tr>
                                                      <tr>
                                                        <td><label>problem description:</label></td>
                                                        <td><textarea cols="50" rows="5" name="prob_desc"  type="text"  ></textarea></td>
                                                      </tr>
                                                       <tr >
                                                        <td><label>Current total bill:</label></td>
                                                        <td><input name="current_bill" type="text" ></td>
                                                      </tr>
                                                  </table>
                                                </div>
                                            </div>
                                        <!--CREDIT CONTROL RELATED PROBLEM ENDS-->

                                        <!--GENERAL COMPLAIN-->
                                            <!--Distributor/Retailer/Sales Man Complain-->
                                                 <div id="general1"  style="display:none">
                                                    <div class="form-inline">
                                                      <table>
                                                          <tr>
                                                            <td><label>Relevant Center Address:</label></td>
                                                            <td><input name="address" type="text"  ></td>
                                                          </tr>
                                                          <tr>
                                                            <td><label>Problem description:</label></td>
                                                            <td><textarea cols="50" rows="5" name="prob_desc"  type="text"  ></textarea></td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>Date of Call</label></td>
                                                            <td><input name="call_date" type="date"></td>
                                                          </tr>
                                                          <tr >
                                                            <td><label>complained customer's MSISDN/Calling number:</label></td>
                                                            <td><input name="customer_MSISDN" type="text" ></td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>Alternate No:</label></td>
                                                            <td><input name="alt_no" type="text" ></td>
                                                          </tr>
                                                      </table>
                                                    </div>
                                                </div>    
                                        <!--GENERAL COMPLAIN ENDS-->
                                        <!--NETWORK COMPLAIN-->
                                             <!--Echo complain-->
                                                 <div id="network1"  style="display:none">
                                                    <div class="form-inline">
                                                     <table>
                                                          <tr>
                                                            <td><label>Division</label></td>
                                                            <td><input name="division" type="text"  ></td>
                                                          </tr>
                                                          <tr>
                                                            <td><label>District</label></td>
                                                            <td><input name="district" type="text" ></td>
                                                          </tr>
                                                           <tr>
                                                            <td><label>Thana</label></td>
                                                            <td><input name="thana" type="text" ></td>
                                                          </tr>
                                                          <tr >
                                                            <td><label>Location details</label></td>
                                                            <td><input name="loc" type="text" ></td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>B-party Number and Location</label></td>
                                                            <td><input name="b_MSISDN" type="text" ></td>
                                                          </tr>
                                                          <tr >
                                                            <td><label>Problem with other Handset</label></td>
                                                            <td><input  name="problem_with_other_set" value="yes" type="radio" > Yes 
                                                                <input  name="problem_with_other_set" value="no" type="radio" > NO
                                                            </td>
                                                          </tr>
                                                          <tr >
                                                            <td><label>Any Specific  Time</label></td>
                                                            <td><input name="spec_time" type="text" ></td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>Temporary/Persistent Issue</label></td>
                                                            <td>
                                                                <input  name="temp_or_pers" value="Temporary" type="radio" > Temporary
                                                                <input  name="temp_or_pers" value="Persistent" type="radio" > Persistent
                                                            </td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>Signal strength</label></td>
                                                            <td><input name="signal" type="text" ></td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>Alternate No</label></td>
                                                            <td><input name="alt_no" type="text" ></td>
                                                          </tr>
                                                      </table>
                                                    </div>
                                                 </div>
                                             <!--Call drop complain-->
                                                 <div id="network2"  style="display:none">
                                                    <div class="form-inline">
                                                         <table>
                                                          <tr>
                                                            <td><label>Division</label></td>
                                                            <td><input name="division" type="text"  ></td>
                                                          </tr>
                                                          <tr>
                                                            <td><label>District</label></td>
                                                            <td><input name="district" type="text" ></td>
                                                          </tr>
                                                           <tr>
                                                            <td><label>Thana</label></td>
                                                            <td><input name="thana" type="text" ></td>
                                                          </tr>
                                                          <tr >
                                                            <td><label>Location details</label></td>
                                                            <td><input name="loc" type="text" ></td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>B-party Number and Location</label></td>
                                                            <td><input name="b_MSISDN" type="text" ></td>
                                                          </tr>
                                                          <tr >
                                                            <td><label>Problem with other Handset</label></td>
                                                            <td><input  name="problem_with_other_set" value="yes" type="radio" > Yes 
                                                                <input  name="problem_with_other_set" value="no" type="radio" > NO
                                                            </td>
                                                          </tr>
                                                          <tr >
                                                            <td><label>Any Specific  Time</label></td>
                                                            <td><input name="spec_time" type="text" ></td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>Temporary/Persistent Issue</label></td>
                                                            <td>
                                                                <input  name="temp_or_pers" value="Temporary" type="radio" > Temporary
                                                                <input  name="temp_or_pers" value="Persistent" type="radio" > Persistent
                                                            </td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>Signal strength</label></td>
                                                            <td><input name="signal" type="text" ></td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>Alternate No</label></td>
                                                            <td><input name="alt_no" type="text" ></td>
                                                          </tr>
                                                      </table>
                                                    </div>
                                                 </div>
                                             <!--Outgoing call complain-->
                                                 <div id="network3"  style="display:none">
                                                    <div class="form-inline">
                                                        <table>
                                                          <tr>
                                                            <td><label>Division</label></td>
                                                            <td><input name="division" type="text"  ></td>
                                                          </tr>
                                                          <tr>
                                                            <td><label>District</label></td>
                                                            <td><input name="district" type="text" ></td>
                                                          </tr>
                                                           <tr>
                                                            <td><label>Thana</label></td>
                                                            <td><input name="thana" type="text" ></td>
                                                          </tr>
                                                          <tr >
                                                            <td><label>Location details</label></td>
                                                            <td><input name="loc" type="text" ></td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>B-party Number and Location</label></td>
                                                            <td><input name="b_MSISDN" type="text" ></td>
                                                          </tr>
                                                          <tr >
                                                            <td><label>Problem with other Handset</label></td>
                                                            <td><input  name="problem_with_other_set" value="yes" type="radio" > Yes 
                                                                <input  name="problem_with_other_set" value="no" type="radio" > NO
                                                            </td>
                                                          </tr>
                                                          <tr >
                                                            <td><label>Any Specific  Time</label></td>
                                                            <td><input name="spec_time" type="text" ></td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>Temporary/Persistent Issue</label></td>
                                                            <td>
                                                                <input  name="temp_or_pers" value="Temporary" type="radio" > Temporary
                                                                <input  name="temp_or_pers" value="Persistent" type="radio" > Persistent
                                                            </td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>Signal strength</label></td>
                                                            <td><input name="signal" type="text" ></td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>Alternate No</label></td>
                                                            <td><input name="alt_no" type="text" ></td>
                                                          </tr>
                                                      </table>
                                                    </div>
                                                 </div>
                                             <!--SMS incoming Complain-->
                                                 <div id="network4"  style="display:none">
                                                    <div class="form-inline">
                                                        <table>
                                                          <tr>
                                                            <td><label>Division</label></td>
                                                            <td><input name="division" type="text"  ></td>
                                                          </tr>
                                                          <tr>
                                                            <td><label>District</label></td>
                                                            <td><input name="district" type="text" ></td>
                                                          </tr>
                                                           <tr>
                                                            <td><label>Thana</label></td>
                                                            <td><input name="thana" type="text" ></td>
                                                          </tr>
                                                          <tr >
                                                            <td><label>Location details</label></td>
                                                            <td><input name="loc" type="text" ></td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>B-party Number and Location</label></td>
                                                            <td><input name="b_MSISDN" type="text" ></td>
                                                          </tr>
                                                          <tr >
                                                            <td><label>Problem with other Handset</label></td>
                                                            <td><input  name="problem_with_other_set" value="yes" type="radio" > Yes 
                                                                <input  name="problem_with_other_set" value="no" type="radio" > NO
                                                            </td>
                                                          </tr>
                                                          <tr >
                                                            <td><label>Any Specific  Time</label></td>
                                                            <td><input name="spec_time" type="text" ></td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>Temporary/Persistent Issue</label></td>
                                                            <td>
                                                                <input  name="temp_or_pers" value="Temporary" type="radio" > Temporary
                                                                <input  name="temp_or_pers" value="Persistent" type="radio" > Persistent
                                                            </td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>Signal strength</label></td>
                                                            <td><input name="signal" type="text" ></td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>Alternate No</label></td>
                                                            <td><input name="alt_no" type="text" ></td>
                                                          </tr>
                                                      </table>
                                                    </div>
                                                 </div>  
                                             <!--SMS outgoing Complain-->
                                                 <div id="network5"  style="display:none">
                                                    <div class="form-inline">
                                                        <table>
                                                          <tr>
                                                            <td><label>Division</label></td>
                                                            <td><input name="division" type="text"  ></td>
                                                          </tr>
                                                          <tr>
                                                            <td><label>District</label></td>
                                                            <td><input name="district" type="text" ></td>
                                                          </tr>
                                                           <tr>
                                                            <td><label>Thana</label></td>
                                                            <td><input name="thana" type="text" ></td>
                                                          </tr>
                                                          <tr >
                                                            <td><label>Location details</label></td>
                                                            <td><input name="loc" type="text" ></td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>B-party Number and Location</label></td>
                                                            <td><input name="b_MSISDN" type="text" ></td>
                                                          </tr>
                                                          <tr >
                                                            <td><label>Problem with other Handset</label></td>
                                                            <td><input  name="problem_with_other_set" value="yes" type="radio" > Yes 
                                                                <input  name="problem_with_other_set" value="no" type="radio" > NO
                                                            </td>
                                                          </tr>
                                                          <tr >
                                                            <td><label>Any Specific  Time</label></td>
                                                            <td><input name="spec_time" type="text" ></td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>Temporary/Persistent Issue</label></td>
                                                            <td>
                                                                <input  name="temp_or_pers" value="Temporary" type="radio" > Temporary
                                                                <input  name="temp_or_pers" value="Persistent" type="radio" > Persistent
                                                            </td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>Signal strength</label></td>
                                                            <td><input name="signal" type="text" ></td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>Alternate No</label></td>
                                                            <td><input name="alt_no" type="text" ></td>
                                                          </tr>
                                                      </table>
                                                    </div>
                                                 </div>
                                             <!--Incoming Complain-->
                                                 <div id="network6"  style="display:none">
                                                    <div class="form-inline">
                                                  <table>
                                                          <tr>
                                                            <td><label>Division</label></td>
                                                            <td><input name="division" type="text"  ></td>
                                                          </tr>
                                                          <tr>
                                                            <td><label>District</label></td>
                                                            <td><input name="district" type="text" ></td>
                                                          </tr>
                                                           <tr>
                                                            <td><label>Thana</label></td>
                                                            <td><input name="thana" type="text" ></td>
                                                          </tr>
                                                          <tr >
                                                            <td><label>Location details</label></td>
                                                            <td><input name="loc" type="text" ></td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>B-party Number and Location</label></td>
                                                            <td><input name="b_MSISDN" type="text" ></td>
                                                          </tr>
                                                          <tr >
                                                            <td><label>Problem with other Handset</label></td>
                                                            <td><input  name="problem_with_other_set" value="yes" type="radio" > Yes 
                                                                <input  name="problem_with_other_set" value="no" type="radio" > NO
                                                            </td>
                                                          </tr>
                                                          <tr >
                                                            <td><label>Any Specific  Time</label></td>
                                                            <td><input name="spec_time" type="text" ></td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>Temporary/Persistent Issue</label></td>
                                                            <td>
                                                                <input  name="temp_or_pers" value="Temporary" type="radio" > Temporary
                                                                <input  name="temp_or_pers" value="Persistent" type="radio" > Persistent
                                                            </td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>Alternate No</label></td>
                                                            <td><input name="alt_no" type="text" ></td>
                                                          </tr>
                                                      </table>    
                                                    </div>
                                                 </div>       
                                             <!--Signal Complain-->
                                                 <div id="network7"  style="display:none">
                                                    <div class="form-inline">
                                                        <table>
                                                          <tr>
                                                            <td><label>Division</label></td>
                                                            <td><input name="division" type="text"  ></td>
                                                          </tr>
                                                          <tr>
                                                            <td><label>District</label></td>
                                                            <td><input name="district" type="text" ></td>
                                                          </tr>
                                                           <tr>
                                                            <td><label>Thana</label></td>
                                                            <td><input name="thana" type="text" ></td>
                                                          </tr>
                                                          <tr >
                                                            <td><label>Location details</label></td>
                                                            <td><input name="loc" type="text" ></td>
                                                          </tr>

                                                          <tr >
                                                            <td><label>Problem with other Handset</label></td>
                                                            <td><input  name="problem_with_other_set" value="yes" type="radio" > Yes 
                                                                <input  name="problem_with_other_set" value="no" type="radio" > NO
                                                            </td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>Temporary/Persistent Issue</label></td>
                                                            <td>
                                                                <input  name="temp_or_pers" value="Temporary" type="radio" > Temporary
                                                                <input  name="temp_or_pers" value="Persistent" type="radio" > Persistent
                                                            </td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>Signal strength</label></td>
                                                            <td><input name="signal" type="text" ></td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>Alternate No</label></td>
                                                            <td><input name="alt_no" type="text" ></td>
                                                          </tr>
                                                      </table>
                                                    </div>
                                                 </div>
                                             <!--ISD Incoming Complain -->
                                                 <div id="network8"  style="display:none">
                                                    <div class="form-inline">
                                                        <table>
                                                          <tr>
                                                            <td><label>Division</label></td>
                                                            <td><input name="division" type="text"  ></td>
                                                          </tr>
                                                          <tr>
                                                            <td><label>District</label></td>
                                                            <td><input name="district" type="text" ></td>
                                                          </tr>
                                                           <tr>
                                                            <td><label>Thana</label></td>
                                                            <td><input name="thana" type="text" ></td>
                                                          </tr>
                                                          <tr >
                                                            <td><label>Location details</label></td>
                                                            <td><input name="loc" type="text" ></td>
                                                          </tr>
                                                           <tr>
                                                            <td><label>ISD No</label></td>
                                                            <td><input name="isd_no" type="text" ></td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>Signal Strength </label></td>
                                                            <td><input name="signal" type="text" ></td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>Alternate No</label></td>
                                                            <td><input name="alt_no" type="text" ></td>
                                                          </tr>
                                                        </table>  
                                                    </div>
                                                 </div>       
                                             <!--Non Coverage area-->
                                                 <div id="network9"  style="display:none">
                                                      <div class="form-inline">
                                                        <table>     
                                                          <tr>
                                                            <td><label>Division</label></td>
                                                            <td><input name="division" type="text"  ></td>
                                                          </tr>
                                                          <tr>
                                                            <td><label>District</label></td>
                                                            <td><input name="district" type="text" ></td>
                                                          </tr>
                                                           <tr>
                                                            <td><label>Thana</label></td>
                                                            <td><input name="thana" type="text" ></td>
                                                          </tr>
                                                          <tr >
                                                            <td><label>Location details</label></td>
                                                            <td><input name="loc" type="text" ></td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>Signal Strength </label></td>
                                                            <td><input name="signal" type="text" ></td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>Alternate No</label></td>
                                                            <td><input name="alt_no" type="text" ></td>
                                                          </tr>
                                                        </table>  
                                                    </div>
                                                 </div>             
                                        <!--NETWORK COMPLAIN ENDS-->

                                        <!--Payment related problem-->
                                             <!--Unable to recharge acount-->
                                                 <div id="payment1"  style="display:none">
                                                    <div class="form-inline">
                                                        <table>     
                                                              <tr>
                                                                <td><label>How subscriber is trying to recharge</label></td>
                                                                <td><input name="recharge_method" type="text"></td>
                                                              </tr>
                                                              <tr>
                                                                <td><label>Scratch card serial number</label></td>
                                                                <td><input name="card_serial" type="text"></td>
                                                              </tr>
                                                               <tr >
                                                                <td><label>Duration of the problem</label></td>
                                                                <td><input name="prob_duration" type="text"></td>
                                                              </tr>
                                                              <tr >
                                                                <td><label>Error Message:</label></td>
                                                                <td><textarea cols="50" rows="2" name="error_m"></textarea></td>
                                                              </tr>
                                                               <tr >
                                                                <td><label>Exact Location:</label></td>
                                                                <td><input name="loc" type="text" ></td>
                                                              </tr>
                                                              <tr >
                                                                <td><label>Problem description:</label></td>
                                                                <td><textarea cols="50" rows="5" name="prob_desc"></textarea></td>
                                                              </tr>
                                                              <tr >
                                                                <td><label>Date of Tried</label></td>
                                                                <td><input name="date_tried" type="date"></td>
                                                              </tr>
                                                        </table>      
                                                    </div>
                                                 </div>
                                                 <!--Distributor/Retailer/Sales Man Complain-->
                                                 <div id="payment2"  style="display:none">
                                                    <div class="form-inline">
                                                         <table>
                                                          <tr>
                                                            <td><label>Paid amount:</label></td>
                                                            <td><input name="paid_amount" type="text"  ></td>
                                                          </tr>
                                                          <tr>
                                                            <td><label>Discrepant amount:</label></td>
                                                            <td><input name="dis_amount" type="text" ></td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>Date of payment</label></td>
                                                            <td><input name="payment_date" type="date"></td>
                                                          </tr>
                                                          <tr >
                                                            <td><label>Payment Given from</label></td>
                                                            <td><input name="payment_method" type="text" ></td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>Alternate No:</label></td>
                                                            <td><input name="alt_no" type="text" ></td>
                                                          </tr>
                                                        </table>  
                                                    </div>
                                                 </div>        
                                        <!--Payment related problem Ends-->

                                        <!--SERVICE RELATED PROBLEM-->
                                            <!--Unable to divert/forward calls-->
                                                 <div id="service1"  style="display:none">
                                                    <div class="form-inline">
                                                        <table>     
                                                              <tr>
                                                                <td><label>Division</label></td>
                                                                <td><input name="division" type="text"  ></td>
                                                              </tr>
                                                              <tr>
                                                                <td><label>District</label></td>
                                                               <td> <input name="district" type="text"  ></td>
                                                              </tr>
                                                               <tr >
                                                                <td><label>Thana</label></td>
                                                               <td> <input name="thana" type="text" ></td>
                                                              </tr>
                                                              <tr >
                                                                <td><label>Location details</label></td>
                                                                <td><input name="loc" type="text" ></td>
                                                              </tr>
                                                               <tr >
                                                                <td><label>B Party Number and Location</label></td>
                                                                <td><input name="b_MSISDN" type="text" ></td>
                                                              </tr>
                                                              <tr>
                                                                <td><label>Problem with Handset</label></td>
                                                                <td>
                                                                    <input  name="problem_with_other_set" value="yes" type="radio" > Yes 
                                                                    <input  name="problem_with_other_set" value="no" type="radio" > NO
                                                                </td>
                                                              </tr>
                                                               <tr>
                                                                <td><label>Temporary/Persistent Issue</label></td>
                                                                <td>
                                                                     <input  name="temp_or_pers" value="Temporary" type="radio" > Temporary
                                                                     <input  name="temp_or_pers" value="Persistent" type="radio" > Persistent
                                                                </td>
                                                              </tr>
                                                               <tr >
                                                                <td><label>Signal strength</label></td>
                                                                <td><input name="signal" type="text" ></td>
                                                              </tr>
                                                               <tr>
                                                                <td><label>Alternate No</label></td>
                                                                <td><input alt_no type="text"></td>
                                                              </tr>
                                                        </table>      
                                                    </div>
                                                 </div>
                                             <!--Unable to use GPRS-->
                                                 <div id="service2"  style="display:none">
                                                    <div class="form-inline">
                                                         <table>
                                                          <tr>
                                                            <td><label>Division</label></td>
                                                            <td><input name="division" type="text"  ></td>
                                                          </tr>
                                                          <tr>
                                                            <td><label>District</label></td>
                                                            <td><input name="district" type="text"  ></td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>Thana</label></td>
                                                            <td><input name="thana" type="text" ></td>
                                                          </tr>
                                                          <tr >
                                                            <td><label>Exact Location details</label></td>
                                                            <td><input name="loc" type="text" ></td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>Hand set with model</label></td>
                                                            <td><input name="phone_model" type="text" ></td>
                                                          </tr>
                                                          <tr >
                                                            <td><label>GPRS Pack Name</label></td>
                                                            <td><input name="gprs_pack" type="text" ></td>
                                                          </tr>
                                                          <tr >
                                                            <td><label>Duration of problem</label></td>
                                                            <td><input name="prob_duration" type="text" ></td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>Alternate No</label></td>
                                                            <td><input name="alt_no" type="text" ></td>
                                                          </tr>
                                                        </table>
                                                    </div>
                                                 </div>
                                             <!--VAS activation complain-->
                                                 <div id="service3"  style="display:none">
                                                    <div class="form-inline">
                                                        <table>     
                                                              <tr>
                                                                <td><label>VAS name:</label></td>
                                                                <td><input name="vas" type="text" ></td>
                                                              </tr>
                                                              <tr>
                                                                <td><label>Customer Verification through whom: </label></td>
                                                                <td><input name="cust_veri"  type="text"  ></td>
                                                              </tr>
                                                               <tr >
                                                                <td><label>Shortcode:</label></td>
                                                                <td><input name="shortcode" type="text" ></td>
                                                              </tr>
                                                               <tr>
                                                                <td><label>Alternate No:</label></td>
                                                                <td><input name="alt_no" type="text"></td>
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
                                                            <td><input name="vas" type="text" ></td>
                                                          </tr>
                                                          <tr>
                                                            <td><label>Customer Verification:</label></td>
                                                            <td><input name="cust_veri" type="text" ></td>
                                                          </tr>
                                                           <tr >
                                                            <td><label>Shortcode:</label></td>
                                                            <td><input name="shortcode" type="text" ></td>
                                                          </tr>
                                                           <tr>
                                                            <td><label>Alternate No:</label></td>
                                                            <td><input name="alt_name" type="text"></td>
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
                                                                <td><input name="vas" type="text"  ></td>
                                                              </tr>
                                                              <tr>
                                                                <td><label>Problem description:</label></td>
                                                                <td><textarea cols="50" rows="5" name="prob_desc"  type="text"  ></textarea></td>
                                                              </tr>
                                                               <tr >
                                                                <td><label>Customer Location:</label></td>
                                                                <td><input name="loc" type="text"></td>
                                                              </tr>
                                                               <tr>
                                                                <td><label>Alternate No:</label></td>
                                                                <td><input name="alt_no" type="text" ></td>
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
                                                                <td><input name="current_package" type="text"  ></td>
                                                              </tr>
                                                              <tr>
                                                                <td><label>Requested FnF no:</label></td>
                                                                <td><input name="req_fnf" type="text"  ></td>
                                                              </tr>
                                                               <tr >
                                                                <td><label>FnF add date:</label></td>
                                                                <td><input name="fnf_add_date" type="date" ></td>
                                                              </tr>
                                                               <tr>
                                                                <td><label>Alternate No:</label></td>
                                                                <td><input name="alt_no" type="text" ></td>
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
                                                                <td><input name="current_package" type="text"  ></td>
                                                              </tr>
                                                              <tr>
                                                                <td><label>Desired Package:</label></td>
                                                                <td><input name="disired_pack" type="text"  ></td>
                                                              </tr>
                                                               <tr >
                                                                <td><label>Effecttive date:</label></td>
                                                                <td><input name="effective_date" type="date" ></td>
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
                                                                <td><input name="current_package" type="text"  ></td>
                                                              </tr>
                                                              <tr>
                                                                <td><label>Desired Package:</label></td>
                                                                <td><input name="desired_pack" type="text"  ></td>
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
                                                                <td><input name="current_package" type="text"  ></td>
                                                              </tr>
                                                              <tr>
                                                                <td><label>Desired FnFs:</label></td>
                                                                <td><input name="desired_fnf" type="text"  ></td>
                                                              </tr>
                                                        </table>      
                                                    </div>
                                                 </div>          
                                        <!--SERVICE RELATED PROBLEM ENDS-->

                                        </div>                    
                                    </div>
                                    <hr>
                                    <div class="span2 offset5"><button style="margin-top:5px;" class="btn btn-xs btn-success">SUBMIT</button></div>
                                    <input type="hidden" name="MM_insert" value="ticket">
                          </form>
                                
                            <!--COMPLAIN TAKING FORM AREA-->
                        </div>
                    <p style="text-align:center">&copy; Digicon Technologies Limited, 2015</p>
                    </div>
                    <!-- /block -->
                </div>

            </div>
</div>
        <!--/.fluid-container-->

<script src="vendors/jquery-1.9.1.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="vendors/datatables/js/jquery.dataTables.min.js"></script>


<script src="assets/scripts.js"></script>
<script src="assets/DT_bootstrap.js"></script>
<!--SCRIPTS THAT TRIGGER FORM AND ALSO USE FOR POPULATING SELECT OPTION-->        
<script>      
    $(document).on('change','#selection', function () {
        $('.form').hide(); 
        $('#' + $(this).val()).show().siblings().hide();
    });
</script>  
     
</body>
</html>
