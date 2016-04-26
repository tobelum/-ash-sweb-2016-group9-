<?php

	if (!isset($_REQUEST['cmd'])) {
		echo '{"result": 0, "message": "Command not entered"}';
	}
	$command = $_REQUEST['cmd'];
	switch($command) {
		case 1:
		deletePatient();
		break;
		case 2:
		addDiagnosis();
		break;
		
		case 3:
		displayTable();
		break;
		
		case 4:
		searchPatient();
		break;
		
		default:
		echo "wrong cmd";
		break;
	}
/**
takes Ajax requests and sends requests to nurse class to add new diagnosis. Sends message back to 
Ajax page after request is carried our
*/
function addDiagnosis() {
	if (!isset($_REQUEST['date']) && !isset($_REQUEST['temp']) && !isset($_REQUEST['sp']) && !isset($_REQUEST['pulse'])
		&& !isset($_REQUEST['bp']) && !isset($_REQUEST['com']) && !isset($_REQUEST['treat']) && !isset($_REQUEST['rmk']) 
		&& !isset($_REQUEST['p_id']) ) {
		echo '{"result":0, "message": "Diagnosis information not given"}';
		return;
	}
	
	include_once("nurse.php");
	$obj = new nurse();
	$date = $_REQUEST['date'];
	$temp = $_REQUEST['temp'];
	$sp = $_REQUEST['sp'];
	$pulse = $_REQUEST['pulse'];
	$bp = $_REQUEST['bp'];
	$com = $_REQUEST['com'];
	$treat = $_REQUEST['treat'];
	$rmk = $_REQUEST['rmk'];
	$p_id = $_REQUEST['p_id'];
	
	$a = $obj->addNewDiagnosis($date,$temp,$sp,$pulse,$bp,$com,$treat,$rmk,$p_id);
	//echo $a;
	if (!$a) {
		echo '{"result":0 ,"message": "Could not add diagnosis"}';
		
	}
	
	else {
	 echo '{"result": 1, "message": "Diagnosis sucessfully added for"}';	
	}
	
}

function displayTable() {
	if (!isset($_REQUEST['pid'])) { 
	echo '{"result":0, "message": "No ID set"}';
	return;
	}
	$pid = $_REQUEST['pid'];
	include_once("nurse.php");
		$obj = new nurse();
		$history = $obj->getPatientHistory($pid);
		if (!$history) {
			header("Location: Diagnosis.php"); 
			
		}
		else {
			$row = $obj->fetch();
			$result = array();
			while ($row) {
				//print_r($row);
				//echo '<br>';
				array_push($result,$row);
				$row=  $obj->fetch();
			}
			echo json_encode($result);
		}
}


?>