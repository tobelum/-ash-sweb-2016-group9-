<?php
	//check command
	if (!isset($_REQUEST['command'])) {
		echo "command has not been provided";
		return;
	}

	/*get command*/
	$command = $_REQUEST['command'];
	switch($command) {
		case 1:
			editPatient(); 			//if command=1 update Patient's info
			break;
		default:
			echo "wrong command";	//change to json message
			break;
	}

	function editPatient () {
		// check if there is a patients ID
		if (!isset($_REQUEST['patientID'])) {
			echo '{"result": 0 "message": "Patient not set"}';
			//echo "0";
			exit();
		 }


		 // check if each input has been placed into textbox
		 if((!isset($_REQUEST['patientID']))&&(!isset($_REQUEST['username']))&&(!isset($_REQUEST['firstname']))&&(!isset($_REQUEST['lastname']))
		 	&&(!isset($_REQUEST['gender']))&&(!isset($_REQUEST['nationality']))&&(!isset($_REQUEST['insurance_type']))&&(!isset($_REQUEST['dob']))
		 	&&(!isset($_REQUEST['phone_number']))&&(!isset($_REQUEST['email']))&&(!isset($_REQUEST['group_name'])))
		 	echo '{"result": 0 "message": "The information needed to update has not been provided"}';

		 		//Store variables for the URL
		  		$patientID = $_REQUEST['patientID'];
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
			
			//Create an object of the patients class
			include_once("patients.php");
			$patient = new patients();
			
			//update patients information
			$edit = $patient->editPatient($patientID,$username,$firstname,$lastname,$gender,$nationality,$insurance_type,
										  $dob,$group_name,$phone_number,$email);

			//check whether the edit function from the patient's class is working
			if (!$edit) {
				echo '{"result": 0, "message": "Error Updating Patient\'s information"}';
				return;
			}
			else {
				echo '{"result": 1, "message": "Patient\'s information sucessfully updated"}';
			}				
	}
?>
