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
		viewDiagnosisinfo(); //call the function to view the patient's history
		break;
	
	default:
		echo "wrong cmd";
		break;
}

function viewDiagnosisinfo(){
	include_once("diagnosis.php");

	//check for patient id
	if(!isset($_REQUEST['uc'])){
		echo '{"result":0,"message":"Patient ID not provided"}';
		return;
	}
	$patientid = $_REQUEST['uc'];

	//create an object of the diagnosis class
	$obj=new diagnosis();

	// call searchDiagnosis method
	$row=$obj->searchDiagnosis($patientid);

	if($row==false){
		echo '{"result":0,"message":"Patient ID entered is not correct"}';	
		return;
	}
	//check if the query returns an empty result meaning its not in the database
	$result=$obj->fetch();
	if($result==false){
		echo '{"result":0,"message":"Patient ID entered is not correct"}';
	}else{
		echo '{"result":1,"diagnosis":[';
		while($result){
			echo json_encode($result);
			$result=$obj->fetch();
			if($result!=false){
				echo ",";
			}
		}
		echo "]}";
	}

}

?>