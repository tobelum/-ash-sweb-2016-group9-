<?php

	//check command
	if (!isset($_REQUEST['cmd'])) {
		echo "command not set";
		return;
	}

	/*get command*/
	$command = $_REQUEST['cmd'];
	switch($command) {
		case 1:
			editPatient(); 		//if cmd=1 update Patient's info
			break;
		case 2:
			searchPatient() 	//if cmd=2 search pateint
			break;
		case 3:
			viewPatient() 		//if cmd=3 view patients' info
			break;
		default:
			echo "wrong cmd";	//change to json message
			break;
	}



	function editPatient () {
		// check if theew is a patients ID
		if (!isset($_REQUEST['patientID'])) {
			echo '{"result": 0 "message": "Patient not set"}'
			//echo "0";
			return();
		 }

		$patientID = $_REQUEST['patientID'];
//		  $username=$_REQUEST['username'];
//		  $firstname=$_REQUEST['firstname'];
//		  $lastname=$_REQUEST['lastname'];
//		  $gender=$_REQUEST['gender'];
//		  $nationality=$_REQUEST['nationality'];
//		  $insurance_type=$_REQUEST['insurance_type'];
//		  $dob=$_REQUEST['dob'];
//		  $phone_number=$_REQUEST['phone_number'];
//		  $email=$_REQUEST['email'];
//		  $group_name=$_REQUEST['group_name'];
			include_once("patient.php");
			$patient = new patient();
			
			//update patients information
			$edit = $patient->editPatient($patientID,$username,$firstname,$lastname,$gender,$nationality,$insurance_type,
										  $dob,$group_name,$phone_number,$email);
	
			if (!$edit) {
				echo '{"result": 0, "message": "Error Updating Patient\'s information"}';
				return;
			}
			else {
				echo '{"result": 1, "message": "Patient\'s information sucessfully updated"}';
			}
						
	}


function searchPatient(){



}


function viewPatient(){


}













?>