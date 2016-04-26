<?php
if (!isset($_REQUEST['cmd'])) {
	echo "command not set";
	return;
}
$command = $_REQUEST['cmd'];
switch($command) {
	case 1:
	editPatient();
	break;
}
function editPatient () {
	if (!isset($_REQUEST[])) {
		echo '{"result": 0 "message": "Patient not set"}'
	}
	$pid = $_REQUEST['patientID'];
	$username=$_REQUEST['username'];
	$firstname=$_REQUEST['firstname'];
	$lastname=$_REQUEST['lastname'];
	$gender=$_REQUEST['gender'];
	$nationality=$_REQUEST['nationality'];
	$insurance_type=$_REQUEST['insurance_type'];
	$dob=$_REQUEST['dob'];
	$phone_number=$_REQUEST['phone_number'];
	$email=$_REQUEST['email'];
	$group_name=$_REQUEST['group_name'];
	include_once("patient.php");
	$patient = new patient();
	$x = $patient->editPatient($patientID,$username,$firstname,$lastname,$gender,$nationality,$insurance_type,
						$dob,$group_name,$phone_number,$email)
	if (!$x) {
				echo '{"result": 0, "message": "Error Updating Patient\'s information"}';
				return;
			}
	else {
		echo '{"result": 1, "message": "Patient\'s information sucessfully updated"}';
	}
						
}

?>