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
		case 2:
			searchPatients() ;		//if command=2 search pateint
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


	function searchPatients(){

			include_once("patients.php");
			// check if there is any any input in the search box
			if (!isset($_REQUEST['search'])) {
				echo '{"result": 0 "message": "There is nothing to search for"}';
				//echo "0";
				exit();
		 	}	
		 	//Store search for the URL
		 	$search = $_REQUEST['search'];
		 	// create an object of patients
			$patient = new patients();

			$row = $patient -> searchPatients($search);
			
			if ($row==false){
				echo '{"result":0,"message":"input has not been provided"}';
				return;
			}

			else{
				$result=$patient->fetch();

				if($result==false){
					echo '{"result":0,"message":"No patient found"}';
				}else{ 
				echo '{"result":1,"user":[';
				while($result)
				echo json_encode($result);

				$result=$obj->fetch();
				if($result!=false){
					echo ',';
				}
				}
				echo "}]";
			}

	}
	













?>