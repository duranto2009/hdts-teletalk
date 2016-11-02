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
?>
<?php
$time = date("l jS \of F Y h:i:s A");
$t_id = date("Ymd").time().rand(0,1000);
$agent = $_SESSION['username'];
$customer_no = "015".$_POST['customer_no'];
$agent_message=$_POST['agent_message'];
if (!isset($_POST['status'])){
	$status = 0;	
} else {
	$status = $_POST['status'];
}

if (isset($_POST['slave'])){
	 // 3g1
	if ($_POST['slave']=="3g1"){
		$master = $_POST['master'];
		$slave = $_POST['slave'];
		$division = $_POST['3g1_division'];
		$district = $_POST['3g1_district'];
		$thana = $_POST['3g1_thana'];
		$loc = $_POST['3g1_loc'];
		$problem = $_POST['3g1_prob'];
		$error_m = $_POST['3g1_error_m'];
		$alt_m = $_POST['3g1_alt_no'];
		$set_m = $_POST['3g1_set_m'];
		$skill=201;
		$subject = "3G RELATED COMPLAIN | 3G SERVICE NOT WORKING";
		
		$sql = "INSERT INTO ticket (id,ticket_id,skill_id,start_date,customer_no,subject,status,agent_id) VALUES ('', '$t_id', '$skill', now(), '$customer_no', '$subject', '$status', '$agent')";
		$sql2 = "INSERT INTO form1 (id,ticket_id,district,division,thana,loc,problem,set_m,error_m,alt_m,agent_message) VALUES ('', '$t_id', '$district', '$division', '$thana', '$loc', '$problem', '$set_m', '$error_m', '$alt_m', '$agent_message')";
		
		if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
			include "mail.php";
		} else {
			echo "Error: " . $sql  . $conn->error;
		}
		
		$conn->close();
	} //3g2 
	else if ($_POST['slave']=="3g2"){
		$master = $_POST['master'];
		$slave = $_POST['slave'];
		$division = $_POST['3g2_division'];
		$district = $_POST['3g2_district'];
		$thana = $_POST['3g2_thana'];
		$loc = $_POST['3g2_loc'];
		$package = $_POST['3g2_3g_pac'];
		$error_m = $_POST['3g2_error_m'];
		$set_m = $_POST['3g2_set_m'];
		$skill=202;
		$subject = "3G RELATED COMPLAIN | 3G PACKAGE ACTIVATION";
		
		
		$sql = "INSERT INTO ticket (id,ticket_id,skill_id,start_date,customer_no,subject,status,agent_id) VALUES ('', '$t_id', '$skill', now(), '$customer_no', '$subject', '$status', '$agent')";
		$sql2 = "INSERT INTO form1 (id,ticket_id,district,division,thana,loc,3g_pac,set_m,error_m,agent_message) VALUES ('', '$t_id', '$district', '$division', '$thana', '$loc', '$package', '$set_m', '$error_m', '$agent_message')";
		if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
			include "mail.php";
		} else {
			echo "Error: " . $sql  . $conn->error;
		}
		
		$conn->close();
	} //3g3 
	else if ($_POST['slave']=="3g3"){
		$master = $_POST['master'];
		$slave = $_POST['slave'];
		$package = $_POST['3g3_3g_pac'];
		$error_m = $_POST['3g3_error_m'];
		$skill=101;
		$subject = "3G RELATED COMPLAIN | 3G PACKAGE DE-ACTIVATION";
		
		
		$sql = "INSERT INTO ticket (id,ticket_id,skill_id,start_date,customer_no,subject,status,agent_id) VALUES ('', '$t_id', '$skill', now(), '$customer_no', '$subject', '$status', '$agent')";
		$sql2 = "INSERT INTO form1 (id,ticket_id,3g_pac,error_m, agent_message) VALUES ('', '$t_id','$package', '$error_m', '$agent_message')";
		if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
			include "mail.php";
		} else {
			echo "Error: " . $sql  . $conn->error;
		}
		
		$conn->close();
		
	} // bill_adjust1
	else if ($_POST['slave']=="bill_adjust1"){
		$master = $_POST['master'];
		$slave = $_POST['slave'];
		$amount = $_POST['bill1_amount'];
		$fnf = $_POST['bill1_fnf'];
		$fnf_d = $_POST['bill1_fnf_d'];
		$overc_p = $_POST['bill1_overc_p'];
		$skill=101;
		$subject = "FNF OVER CHARGED";
		
		$sql = "INSERT INTO ticket (id,ticket_id,skill_id,start_date,customer_no,subject,status,agent_id) VALUES ('','$t_id', '$skill', now(), '$customer_no', '$subject', '$status', '$agent')";
		$sql2 = "INSERT INTO form2 (id,ticket_id,amount,fnf,fnf_d,overc_p,agent_message) VALUES ('', '$t_id','$amount', '$fnf', '$fnf_d','$overc_p','$agent_message')";
		if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
			include "mail.php";
		} else {
			echo "Error: " . $sql  . $conn->error;
		}
		
		$conn->close();
	} // bill_adjust2
	else if ($_POST['slave']=="bill_adjust2"){
		$master = $_POST['master'];
		$slave = $_POST['slave'];
		$amount = $_POST['bill2_amount'];
		$problem = $_POST['bill2_prob'];
		$alt_no = $_POST['bill2_alt_no'];
		$overc_p = $_POST['bill2_overc_p'];
		$skill=101;
		$subject = "OTHER OVERCHARGED ISSUE";
		
		$sql = "INSERT INTO ticket (id,ticket_id,skill_id,start_date,customer_no,subject,status,agent_id) VALUES ('', '$t_id', '$skill', now(), '$customer_no', '$subject', '$status', '$agent')";
		$sql2 = "INSERT INTO form2 (id,ticket_id,amount,prob,alt_no,overc_p,agent_message) VALUES ('', '$t_id','$amount', '$problem', '$alt_no', '$overc_p','$agent_message')";
		if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
			include "mail.php";
		} else {
			echo "Error: " . $sql  . $conn->error;
		}
		
		$conn->close();
		
	} // bill_adjust3
	else if ($_POST['slave']=="bill_adjust3"){
		$master = $_POST['master'];
		$slave = $_POST['slave'];
		$amount = $_POST['bill3_amount'];
		$eleg_offer = $_POST['bill3_eleg_offer'];
		$alt_no = $_POST['bill3_alt_no'];
		$bon_date = $_POST['bill3_bon_date'];
		$skill=101;
		$subject = "REFILL/RECHARGE BONUS";
		
		$sql = "INSERT INTO ticket (id,ticket_id,skill_id,start_date,customer_no,subject,status,agent_id) VALUES ('', '$t_id', '$skill', now(), '$customer_no', '$subject', '$status', '$agent')";
		$sql2 = "INSERT INTO form2 (id,ticket_id,amount,eleg_offer,alt_no,bon_date,agent_message) VALUES ('', '$t_id','$amount', '$eleg_offer', '$alt_no', '$bon_date','$agent_message')";
		if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
			include "mail.php";
		} else {
			echo "Error: " . $sql  . $conn->error;
		}
		
		$conn->close();
		
	} // bill_adjust4
	else if ($_POST['slave']=="bill_adjust4"){
		$master = $_POST['master'];
		$slave = $_POST['slave'];
		$amount = $_POST['bill4_amount'];
		$problem = $_POST['bill4_prob'];
		$alt_no = $_POST['bill4_alt_no'];
		$skill=203;
		$subject = "FINANCIAL ADJUSTMENTS";
		
		$sql = "INSERT INTO ticket (id,ticket_id,skill_id,start_date,customer_no,subject,status,agent_id) VALUES ('', '$t_id', '$skill', now(), '$customer_no', '$subject', '$status', '$agent')";
		$sql2 = "INSERT INTO form2 (id,ticket_id,amount,prob,alt_no,agent_message) VALUES ('', '$t_id','$amount', '$problem', '$alt_no','$agent_message')";
		if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
			include "mail.php";
		} else {
			echo "Error: " . $sql  . $conn->error;
		}
		
		$conn->close();
		
	} 
	// bill_recieve1
	else if ($_POST['slave']=="bill_recieve1"){
		$master = $_POST['master'];
		$slave = $_POST['slave'];
		$address = $_POST['br1_address'];
		$mod_address = $_POST['br1_mod_address'];
		$req_bill_month = $_POST['br1_req_bill_month'];
		$alt_no = $_POST['br1_alt_no'];
		$skill=101;
		$subject = "BILL NOT RECEIVED VIA POST";
		
		$sql = "INSERT INTO ticket (id,ticket_id,skill_id,start_date,customer_no,subject,status,agent_id) VALUES ('', '$t_id', '$skill', now(), '$customer_no', '$subject', '$status', '$agent')";
		$sql2 = "INSERT INTO form3 (id,ticket_id,address,mod_address,req_bill_month,alt_no,agent_message) VALUES ('', '$t_id','$address', '$mod_address', '$req_bill_month', '$alt_no','$agent_message')";
		if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
			include "mail.php";
		} else {
			echo "Error: " . $sql  . $conn->error;
		}
		
		$conn->close();
		
	}  // bill_recieve2
	else if ($_POST['slave']=="bill_recieve2"){
		$master = $_POST['master'];
		$slave = $_POST['slave'];
		$email = $_POST['br2_email'];
		$mod_address = $_POST['br2_mod_address'];
		$req_bill_month = $_POST['br2_req_bill_month'];
		$alt_no = $_POST['br2_alt_no'];
		$skill=101;
		$subject = "BILL NOT RECEIVED VIA EMAIL";
		
		$sql = "INSERT INTO ticket (id,ticket_id,skill_id,start_date,customer_no,subject,status,agent_id) VALUES ('', '$t_id', '$skill', now(), '$customer_no', '$subject', '$status', '$agent')";
		$sql2 = "INSERT INTO form3 (id,ticket_id,email,mod_address,req_bill_month,alt_no,agent_message) VALUES ('', '$t_id','$email', '$mod_address', '$req_bill_month', '$alt_no','$agent_message')";
		if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
			include "mail.php";
		} else {
			echo "Error: " . $sql  . $conn->error;
		}
		
		$conn->close();
		
	} // credit_control1
	else if ($_POST['slave']=="credit_control1"){
		$master = $_POST['master'];
		$slave = $_POST['slave'];
		$date = $_POST['ccr1_date'];
		$prob = $_POST['ccr1_prob'];
		$current_bill = $_POST['ccr1_current_bill'];
		$skill=101;
		$subject = "DISTRIBUTOR/RETAILER/SALES MAN COMPLAIN";
		
		$sql = "INSERT INTO ticket (id,ticket_id,skill_id,start_date,customer_no,subject,status,agent_id) VALUES ('', '$t_id', '$skill', now(), '$customer_no', '$subject', '$status', '$agent')";
		$sql2 = "INSERT INTO form3 (id,ticket_id,date,prob,current_bill,agent_message) VALUES ('', '$t_id','$date', '$prob', '$current_bill','$agent_message')";
		if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
			include "mail.php";
		} else {
			echo "Error: " . $sql  . $conn->error;
		}
		
		$conn->close();
		
	} // general1
	else if ($_POST['slave']=="general1"){
		$master = $_POST['master'];
		$slave = $_POST['slave'];
		$address = $_POST['g1_address'];
		$prob = $_POST['g1_prob'];
		$call_date = $_POST['g1_call_date'];
		$msisdn = $_POST['g1_customer_MSISDN'];
		$alt_no = $_POST['g1_alt_no'];
		$skill=103;
		$subject = "DISTRIBUTOR/RETAILER/SALES MAN COMPLAIN";
		
		$sql = "INSERT INTO ticket (id,ticket_id,skill_id,start_date,customer_no,subject,status,agent_id) VALUES ('', '$t_id', '$skill', now(), '$customer_no', '$subject', '$status', '$agent')";
		$sql2 = "INSERT INTO form3 (id,ticket_id,address,prob,call_date,msisdn,alt_no,agent_message) VALUES ('', '$t_id','$address', '$prob', '$call_date', '$msisdn', '$alt_no','$agent_message')";
		if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
			include "mail.php";
		} else {
			echo "Error: " . $sql  . $conn->error;
		}
		
		$conn->close();
		
	} // network1
	else if ($_POST['slave']=="network1"){
		$master = $_POST['master'];
		$slave = $_POST['slave'];
		$division = $_POST['net1_division'];
		$district = $_POST['net1_district'];
		$thana = $_POST['net1_thana'];
		$loc = $_POST['net1_loc'];
		$b_msisdn = $_POST['net1_b_MSISDN'];
		$other_set = $_POST['net1_problem_with_other_set'];
		$spec_time = $_POST['net1_spec_time'];
		$top = $_POST['net1_temp_or_pers'];
		$signal = $_POST['net1_signal'];
		$alt_no = $_POST['net1_alt_no'];
		$skill=201;
		$subject = "ECHO COMPLAINT";
		$sql = "INSERT INTO ticket (id,ticket_id,skill_id,start_date,customer_no,subject,status,agent_id) VALUES ('', '$t_id', '$skill', now(), '$customer_no', '$subject', '$status', '$agent')";
		$sql2 = "INSERT INTO form1 (id,ticket_id,district,division,thana,loc,b_msisdn,other_set,spec_time,top,signal_str,alt_m,agent_message) VALUES ('', '$t_id', '$district', '$division', '$thana', '$loc', '$b_msisdn', '$other_set', '$spec_time', '$top', '$signal', '$alt_no','$agent_message')";
		if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
			include "mail.php";
		} else {
			echo "Error: " . $sql  . $conn->error;
		}
		
		$conn->close();
		
		
	}  // network2
	else if ($_POST['slave']=="network2"){
		$master = $_POST['master'];
		$slave = $_POST['slave'];
		$division = $_POST['net2_division'];
		$district = $_POST['net2_district'];
		$thana = $_POST['net2_thana'];
		$loc = $_POST['net2_loc'];
		$b_msisdn = $_POST['net2_b_MSISDN'];
		$other_set = $_POST['net2_problem_with_other_set'];
		$spec_time = $_POST['net2_spec_time'];
		$top = $_POST['net2_temp_or_pers'];
		$signal = $_POST['net2_signal'];
		$alt_no = $_POST['net2_alt_no'];
		$skill=104;
		$subject = "Call Drop Complaint";
		
		$sql = "INSERT INTO ticket (id,ticket_id,skill_id,start_date,customer_no,subject,status,agent_id) VALUES ('', '$t_id', '$skill', now(), '$customer_no', '$subject', '$status', '$agent')";
		$sql2 = "INSERT INTO form1 (id,ticket_id,district,division,thana,loc,b_msisdn,other_set,spec_time,top,signal_str,alt_m,agent_message) VALUES ('', '$t_id', '$district', '$division', '$thana', '$loc', '$b_msisdn', '$other_set', '$spec_time', '$top', '$signal', '$alt_no','$agent_message')";
		if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
			include "mail.php";
		} else {
			echo "Error: " . $sql  . $conn->error;
		}
		
		$conn->close();
		
	} // network3
	else if ($_POST['slave']=="network3"){
		$master = $_POST['master'];
		$slave = $_POST['slave'];
		$division = $_POST['net3_division'];
		$district = $_POST['net3_district'];
		$thana = $_POST['net3_thana'];
		$loc = $_POST['net3_loc'];
		$b_msisdn = $_POST['net3_b_MSISDN'];
		$other_set = $_POST['net3_problem_with_other_set'];
		$spec_time = $_POST['net3_spec_time'];
		$top = $_POST['net3_temp_or_pers'];
		$signal = $_POST['net3_signal'];
		$alt_no = $_POST['net3_alt_no'];
		$skill=202;
		$subject = "Outgoing Call Complaint";
		
		$sql = "INSERT INTO ticket (id,ticket_id,skill_id,start_date,customer_no,subject,status,agent_id) VALUES ('', '$t_id', '$skill', now(), '$customer_no', '$subject', '$status', '$agent')";
		$sql2 = "INSERT INTO form1 (id,ticket_id,district,division,thana,loc,b_msisdn,other_set,spec_time,top,signal_str,alt_m,agent_message) VALUES ('', '$t_id', '$district', '$division', '$thana', '$loc', '$b_msisdn', '$other_set', '$spec_time', '$top', '$signal', '$alt_no','$agent_message')";
		if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
			include "mail.php";
		} else {
			echo "Error: " . $sql  . $conn->error;
		}
		
		$conn->close();
		
	} // network4
	else if ($_POST['slave']=="network4"){
		$master = $_POST['master'];
		$slave = $_POST['slave'];
		$division = $_POST['net4_division'];
		$district = $_POST['net4_district'];
		$thana = $_POST['net4_thana'];
		$loc = $_POST['net4_loc'];
		$b_msisdn = $_POST['net4_b_MSISDN'];
		$other_set = $_POST['net4_problem_with_other_set'];
		$spec_time = $_POST['net4_spec_time'];
		$top = $_POST['net4_temp_or_pers'];
		$signal = $_POST['net4_signal'];
		$alt_no = $_POST['net4_alt_no'];
		$skill=202;
		$subject = "SMS Incoming Complaint";
		
		$sql = "INSERT INTO ticket (id,ticket_id,skill_id,start_date,customer_no,subject,status,agent_id) VALUES ('', '$t_id', '$skill', now(), '$customer_no', '$subject', '$status', '$agent')";
		$sql2 = "INSERT INTO form1 (id,ticket_id,district,division,thana,loc,b_msisdn,other_set,spec_time,top,signal_str,alt_m,agent_message) VALUES ('', '$t_id', '$district', '$division', '$thana', '$loc', '$b_msisdn', '$other_set', '$spec_time', '$top', '$signal', '$alt_no','$agent_message')";
		if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
			include "mail.php";
		} else {
			echo "Error: " . $sql  . $conn->error;
		}
		
		$conn->close();
		
	} // network5
	else if ($_POST['slave']=="network5"){
		$master = $_POST['master'];
		$slave = $_POST['slave'];
		$division = $_POST['net5_division'];
		$district = $_POST['net5_district'];
		$thana = $_POST['net5_thana'];
		$loc = $_POST['net5_loc'];
		$b_msisdn = $_POST['net5_b_MSISDN'];
		$other_set = $_POST['net5_problem_with_other_set'];
		$spec_time = $_POST['net5_spec_time'];
		$top = $_POST['net5_temp_or_pers'];
		$signal = $_POST['net5_signal'];
		$alt_no = $_POST['net5_alt_no'];
		$skill=202;
		$subject = "SMS Outgoing Complaint";
		
		$sql = "INSERT INTO ticket (id,ticket_id,skill_id,start_date,customer_no,subject,status,agent_id) VALUES ('', '$t_id', '$skill', now(), '$customer_no', '$subject', '$status', '$agent')";
		$sql2 = "INSERT INTO form1 (id,ticket_id,district,division,thana,loc,b_msisdn,other_set,spec_time,top,signal_str,alt_m,agent_message) VALUES ('', '$t_id', '$district', '$division', '$thana', '$loc', '$b_msisdn', '$other_set', '$spec_time', '$top', '$signal', '$alt_no','$agent_message')";
		if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
			include "mail.php";
		} else {
			echo "Error: " . $sql  . $conn->error;
		}
		
		$conn->close();
		
	} // network6
	else if ($_POST['slave']=="network6"){
		$master = $_POST['master'];
		$slave = $_POST['slave'];
		$division = $_POST['net6_division'];
		$district =$_POST['net6_district'];
		$thana = $_POST['net6_thana'];
		$loc = $_POST['net6_loc'];
		$b_msisdn = $_POST['net6_b_MSISDN'];
		$other_set = $_POST['net6_problem_with_other_set'];
		$spec_time = $_POST['net6_spec_time'];
		$top = $_POST['net6_temp_or_pers'];
		$alt_no = $_POST['net6_alt_no'];
		$skill=202;
		$subject = "Incoming Complaint";
		
		$sql = "INSERT INTO ticket (id,ticket_id,skill_id,start_date,customer_no,subject,status,agent_id) VALUES ('', '$t_id', '$skill', now(), '$customer_no', '$subject', '$status', '$agent')";
		$sql2 = "INSERT INTO form1 (id,ticket_id,district,division,thana,loc,b_msisdn,other_set,spec_time,top,alt_m,agent_message) VALUES ('', '$t_id', '$district', '$division', '$thana', '$loc', '$b_msisdn', '$other_set', '$spec_time', '$top', '$alt_no','$agent_message')";
		if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
			include "mail.php";
		} else {
			echo "Error: " . $sql  . $conn->error;
		}
		
		$conn->close();
		
	} // network7
	else if ($_POST['slave']=="network7"){
		$master = $_POST['master'];
		$slave = $_POST['slave'];
		$division = $_POST['net7_division'];
		$district = $_POST['net7_district'];
		$thana = $_POST['net7_thana'];
		$loc = $_POST['net7_loc'];
		$other_set = $_POST['net7_problem_with_other_set'];
		$top = $_POST['net7_temp_or_pers'];
		$signal = $_POST['net7_signal'];
		$alt_no = $_POST['net7_alt_no'];
		$skill=201;
		$subject = "Signal Complaint";
		
		$sql = "INSERT INTO ticket (id,ticket_id,skill_id,start_date,customer_no,subject,status,agent_id) VALUES ('', '$t_id', '$skill', now(), '$customer_no', '$subject', '$status', '$agent')";
		$sql2 = "INSERT INTO form1 (id,ticket_id,district,division,thana,loc,other_set,top,signal_str,alt_m,agent_message) VALUES ('', '$t_id', '$district', '$division', '$thana', '$loc', '$other_set', '$top', '$signal', '$alt_no','$agent_message')";
		if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
			include "mail.php";
		} else {
			echo "Error: " . $sql  . $conn->error;
		}
		
		$conn->close();
		
	} // network8
	else if ($_POST['slave']=="network8"){
		$master = $_POST['master'];
		$slave = $_POST['slave'];
		$division = $_POST['net8_division'];
		$district = $_POST['net8_district'];
		$thana = $_POST['net8_thana'];
		$loc = $_POST['net8_loc'];
		$isd_no = $_POST['net8_isd_no'];
		$signal = $_POST['net8_signal'];
		$alt_no = $_POST['net8_alt_no'];
		$skill=202;
		$subject = "ISD Incoming Complaint";
		
		$sql = "INSERT INTO ticket (id,ticket_id,skill_id,start_date,customer_no,subject,status,agent_id) VALUES ('', '$t_id', '$skill', now(), '$customer_no', '$subject', '$status', '$agent')";
		$sql2 = "INSERT INTO form1 (id,ticket_id,district,division,thana,loc,isd_no,signal_str,alt_m,agent_message) VALUES ('', '$t_id', '$district', '$division', '$thana', '$loc', '$isd_no', '$signal', '$alt_no','$agent_message')";
		if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
			include "mail.php";
		} else {
			echo "Error: " . $sql  . $conn->error;
		}
		
		$conn->close();
		
	} // network9
	else if ($_POST['slave']=="network9"){
		$master = $_POST['master'];
		$slave = $_POST['slave'];
		$division = $_POST['net9_division'];
		$district = $_POST['net9_district'];
		$thana = $_POST['net9_thana'];
		$loc = $_POST['net9_loc'];
		$signal = $_POST['net9_signal'];
		$alt_no = $_POST['net9_alt_no'];
		$skill=201;
		$subject = "Non Coverage Area";
		
		$sql = "INSERT INTO ticket (id,ticket_id,skill_id,start_date,customer_no,subject,status,agent_id) VALUES ('', '$t_id', '$skill', now(), '$customer_no', '$subject', '$status', '$agent')";
		$sql2 = "INSERT INTO form1 (id,ticket_id,district,division,thana,loc,signal_str,alt_m,agent_message) VALUES ('', '$t_id', '$district', '$division', '$thana', '$loc', '$signal', '$alt_no','$agent_message')";
		if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
			include "mail.php";
		} else {
			echo "Error: " . $sql  . $conn->error;
		}
		
		$conn->close();
		
	} // payment1
	else if ($_POST['slave']=="payment1"){
		$master = $_POST['master'];
		$slave = $_POST['slave'];
		$recharge_method = $_POST['pay1_recharge_method'];
		$card_serial = $_POST['pay1_card_serial'];
		$prob_duration = $_POST['pay1_prob_duration'];
		$error_m = $_POST['pay1_error_m'];
		$loc = $_POST['pay1_loc'];
		$problem = $_POST['pay1_prob_desc'];
        $date_tried = $_POST['pay1_date_tried'];
		$skill=101;
		$subject = "Unable To Recharge Account";
		
		
		$sql = "INSERT INTO ticket (id,ticket_id,skill_id,start_date,customer_no,subject,status,agent_id) VALUES ('', '$t_id', '$skill', now(),        '$customer_no', '$subject', '$status', '$agent')";
		$sql2 = "INSERT INTO form4 (id,ticket_id,recharge_method,card_serial,prob_duration,error_m,loc,prob,date_tried,agent_message) VALUES ('', '$t_id', '$recharge_method', '$card_serial', '$prob_duration', '$error_m', '$loc', '$problem', '$date_tried','$agent_message')";
		if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
			include "mail.php";
		} else {
			echo "Error: " . $sql  . $conn->error;
		}
		
		$conn->close();
		
	}  // payment2
	else if ($_POST['slave']=="payment2"){
		$master = $_POST['master'];
		$slave = $_POST['slave'];
		$paid_amount = $_POST['pay2_paid_amount'];
		$dis_amount = $_POST['pay2_dis_amount'];
		$payment_date = $_POST['pay2_payment_date'];
		$pay_method = $_POST['pay2_payment_method'];
		$alt_no = $_POST['pay2_alt_no'];
		$skill=203;
		$subject = "Payment Not Posted";
		
		$sql = "INSERT INTO ticket (id,ticket_id,skill_id,start_date,customer_no,subject,status,agent_id) VALUES ('', '$t_id', '$skill', now(), '$customer_no', '$subject', '$status', '$agent')";
		$sql2 = "INSERT INTO form4 (ticket_id,paid_amount,dis_amount,payment_date,payment_method,alt_no,agent_message) VALUES ('$t_id', '$paid_amount', '$dis_amount', '$payment_date', '$pay_method', '$alt_no','$agent_message')";
		if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
			include "mail.php";
		} else {
			echo "Error: " . $sql  . $conn->error;
		}
		
		$conn->close();
		
	} // service1
	else if ($_POST['slave']=="service1"){
		$master = $_POST['master'];
		$slave = $_POST['slave'];
		$division = $_POST['ser1_division'];
		$district = $_POST['ser1_district'];
		$thana = $_POST['ser1_thana'];
		$loc = $_POST['ser1_loc'];
		$b_msisdn = $_POST['ser1_b_MSISDN'];
		$other_set = $_POST['ser1_problem_with_other_set'];
		$top = $_POST['ser1_temp_or_pers'];
		$signal_str = $_POST['ser1_signal'];
		$alt_m = $_POST['ser1_alt_no'];
		$skill="202";
		$subject = "Unable to divert/forward calls";
        
        $sql = "INSERT INTO ticket (id,ticket_id,skill_id,start_date,customer_no,subject,status,agent_id) 
                VALUES ('', '$t_id', '$skill', now(), '$customer_no', '$subject', '$status', '$agent')";
        
        $sql2 = "INSERT INTO form1 (ticket_id,division,district,thana,loc,b_msisdn,other_set,top,signal_str,alt_m,agent_message) 
                 VALUES ('$t_id', '$division', '$district','$thana','$loc','$b_msisdn','$other_set','$top','$signal_str','$alt_m','$agent_message')";
		if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
			include "mail.php";
		} else {
			echo "Error: " . $sql  . $conn->error;
		}
		
		$conn->close();
        
		
	}
    // service2
	else if ($_POST['slave']=="service2"){
		$master = $_POST['master'];
		$slave = $_POST['slave'];
		$division = $_POST['ser2_division'];
		$district = $_POST['ser2_district'];
		$thana = $_POST['ser2_thana'];
		$loc = $_POST['ser2_loc'];
        $phone_model = $_POST['ser2_phone_model'];
        $gprs_pack = $_POST['ser2_gprs_pack'];
        $prob_duration = $_POST['ser2_prob_duration'];
        $alt_m = $_POST['ser2_alt_no'];
		$skill="202";
		$subject = "Unable to Use GPRS";
        
         $sql = "INSERT INTO ticket (id,ticket_id,skill_id,start_date,customer_no,subject,status,agent_id) 
                VALUES ('', '$t_id', '$skill', now(), '$customer_no', '$subject', '$status', '$agent')";
        
        $sql2 = "INSERT INTO form1 (ticket_id,division,district,thana,loc,set_m,gprs_pack,prob_duration,alt_m,agent_message) 
                 VALUES ('$t_id', '$division', '$district','$thana','$loc','$phone_model','$gprs_pack','$prob_duration','$alt_m','$agent_message')";
		if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
			include "mail.php";
		} else {
			echo "Error: " . $sql  . $conn->error;
		}
		
		$conn->close();
	}
    // service3
	else if ($_POST['slave']=="service3"){
		$master = $_POST['master'];
		$slave = $_POST['slave'];
		$vas = $_POST['ser3_vas'];
		$cust_veri = $_POST['ser3_cust_veri'];
		$short_code = $_POST['ser3_shortcode'];
        $alt_m = $_POST['ser3_alt_m'];
        $skill="204";
		$subject = "VAS Activation Complaint";
        
        $sql = "INSERT INTO ticket (id,ticket_id,skill_id,start_date,customer_no,subject,status,agent_id) VALUES ('', '$t_id', '$skill', now(), '$customer_no', '$subject', '$status', '$agent')";
        
        $sql2 = "INSERT INTO form1 (ticket_id,vas,cust_veri,shortcode,alt_m,agent_message) VALUES ('$t_id','$vas','$cust_veri','$shortcode','$alt_m','$agent_message')";
		if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
			include "mail.php";
		} else {
			echo "Error: " . $sql  . $conn->error;
		}
		
		$conn->close();
        
        
	}
       // service4
	else if ($_POST['slave']=="service4"){
		$master = $_POST['master'];
		$slave = $_POST['slave'];
		$vas = $_POST['ser4_vas'];
		$cust_veri = $_POST['ser4_cust_veri'];
		$short_code = $_POST['ser4_shortcode'];
        $alt_name = $_POST['ser4_alt_name'];
        $skill="204";
		$subject = "VAS Deactivation Complaint";
        
        
        $sql = "INSERT INTO ticket (id,ticket_id,skill_id,start_date,customer_no,subject,status,agent_id) VALUES ('', '$t_id', '$skill', now(), '$customer_no', '$subject', '$status', '$agent')";
        
        
        $sql2 = "INSERT INTO form1 (ticket_id,vas,cust_veri,shortcode,alt_name,agent_message)
        
                 VALUES ('$t_id', '$vas', '$cust_veri', '$short_code', '$alt_name','$agent_message')";
		if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
			include "mail.php";
		} else {
			echo "Error: " . $sql  . $conn->error;
		}
		
		$conn->close();
	}
    // service5
	else if ($_POST['slave']=="service5"){
		$master = $_POST['master'];
		$slave = $_POST['slave'];
		$vas = $_POST['ser5_vas'];
        $prob_desc = $_POST['ser5_prob_desc'];
        $loc = $_POST['ser5_loc'];
        $alt_m = $_POST['ser5_alt_m'];
        $skill="204";
		$subject = "VAS Not Working Complaint";
        
        $sql = "INSERT INTO ticket (id,ticket_id,skill_id,start_date,customer_no,subject,status,agent_id) VALUES ('', '$t_id', '$skill', now(), '$customer_no', '$subject', '$status', '$agent')";
        
        
         $sql2 = "INSERT INTO form1 (ticket_id,vas,problem,loc,alt_m,agent_message)
        
                 VALUES ('$t_id','$vas','$prob_desc','$loc','alt_m','$agent_message')";
		if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
			include "mail.php";
		} else {
			echo "Error: " . $sql  . $conn->error;
		}
		
		$conn->close();
	}
    // service6
	else if ($_POST['slave']=="service6"){
		$master = $_POST['master'];
		$slave = $_POST['slave'];
		$current_package = $_POST['ser6_current_package'];
        $req_fnf = $_POST['ser6_req_fnf'];
        $fnf_add_date = $_POST['ser6_fnf_add_date'];
        $alt_m = $_POST['ser6_alt_m'];
        $skill="203";
		$subject = "Delete FNFS";
        
        $sql = "INSERT INTO ticket (id,ticket_id,skill_id,start_date,customer_no,subject,status,agent_id) VALUES ('', '$t_id', '$skill', now(), '$customer_no', '$subject', '$status', '$agent')";
        
        $sql2 = "INSERT INTO form1 (ticket_id,current_package,req_fnf,fnf_add_date,alt_m,agent_message)
        
                 VALUES ('$t_id','current_package','req_fnf','fnf_add_date','alt_m','$agent_message' )";
		if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
			include "mail.php";
		} else {
			echo "Error: " . $sql  . $conn->error;
		}
		
		$conn->close();
     
	}
       // service7
	else if ($_POST['slave']=="service7"){
		$master = $_POST['master'];
		$slave = $_POST['slave'];
		$current_package = $_POST['ser7_current_package'];
        $desired_pack = $_POST['ser7_desired_pack'];
        $effective_date = $_POST['ser7_effective_date'];
        $skill="203";
		$subject = "Postpaid Package plan change complaints";
        
        $sql = "INSERT INTO ticket (id,ticket_id,skill_id,start_date,customer_no,subject,status,agent_id) VALUES ('', '$t_id', '$skill', now(), '$customer_no', '$subject', '$status', '$agent')";
        
        
        $sql2 = "INSERT INTO form1 (ticket_id,current_package,desired_pack,effective_date,agent_message)
        
                 VALUES ('$t_id','$current_package','$desired_pack','$effective_date','$agent_message')";
        
		if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
			include "mail.php";
		} else {
			echo "Error: " . $sql  . $conn->error;
		}
		
		$conn->close();
	}
       // service8
	else if ($_POST['slave']=="service8"){
		$master = $_POST['master'];
		$slave = $_POST['slave'];
		$current_package = $_POST['ser8_current_package'];
        $desired_pack = $_POST['ser8_desired_pack'];
        $skill="203";
		$subject = "Prepaid Package plan change complaints";
        
        $sql = "INSERT INTO ticket (id,ticket_id,skill_id,start_date,customer_no,subject,status,agent_id) VALUES ('', '$t_id', '$skill', now(), '$customer_no', '$subject', '$status', '$agent')";
        
        
         $sql2 = "INSERT INTO form1 (ticket_id,current_package,desired_pack,agent_message)
        
                 VALUES ('$t_id','$current_package','$desired_pack','$agent_message' )";
        
		if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
			include "mail.php";
		} else {
			echo "Error: " . $sql  . $conn->error;
		}
		
		$conn->close();
	}
    // service9
	else if ($_POST['slave']=="service9"){
		$master = $_POST['master'];
		$slave = $_POST['slave'];
		$current_package = $_POST['ser9_current_package'];
        $desired_fnf = $_POST['ser9_desired_fnf'];
        $skill="203";
		$subject = "ADD FNFS";
        
        $sql = "INSERT INTO ticket (id,ticket_id,skill_id,start_date,customer_no,subject,status,agent_id) VALUES ('', '$t_id', '$skill', now(), '$customer_no', '$subject', '$status', '$agent')";
        
        
        $sql2 = "INSERT INTO form1 (ticket_id,current_package,desired_fnf,agent_message)
        
                 VALUES ('$t_id','$current_package','$desired_fnf','$agent_message')";
        
		if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
			include "mail.php";
		} else {
			echo "Error: " . $sql  . $conn->error;
		}
		
		$conn->close();
	}
} else {
	echo "You Did not select any subcategory";
}
?>