<?php

//check for command
if(!isset($_REQUEST['cmd'])){
	echo "cmd is not found";
	exit();
}

//get the command
$cmd=$_REQUEST['cmd'];

switch ($cmd) {
	case 1:
		viewPatientinfo(); //call the function to view the rest of the patient's info
		break;
	
	default:
		echo "wrong cmd";
		break;
}

function viewPatientinfo(){
	include_once("patients.php");

	//check for patient id
	if(!isset($_REQUEST['uc'])){
		echo '{"result":0,"message":"Patient ID not provided"}';
		return;
	}
	$patientid = $_REQUEST['uc'];

	//create an object of the patient class
	$obj=new patients();

	// call getPatient method
	$row=$obj->getPatient($patientid);

	if($row==false){
		echo '{"result":0,"message":"Patient ID not correct"}';	
		return;
	}
	$result=$obj->fetch();
		
	echo '{"result":1,"patient":';
		echo json_encode($result);
	echo '}';

}

?>