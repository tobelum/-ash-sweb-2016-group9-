<?php
/**
*/
include_once("adb.php");
/**
*Patients  class
*/
class patients extends adb{
	function patients(){
	}
	/**
	*Gets all patients
	*@param int patient_id patient ID
	*@param string username username
	*@param string firstname first name
	*@param string lastname last name
	*@param string gender gender
	*@param string nationality nationality
	*@param string insurance_type insurance type
	*@param date dob date of birth
	*@param int group_name group name
	*@param int phone_number phone number
	*@param string email email address
	*@return boolean returns true if successful or false 
	*/
	
	
	/** 
	*gets patients' records based on the filter
	*@param string mixed condition to filter. If false, then filter will not be applied
	*@return boolean true if successful, else false
	*/
	function getPatients($filter=false){
		$strQuery="select patient_id,username,firstname,lastname,gender,nationality, insurance_type,dob,patientgroup.groupName,
		phone_number,email from patients, patientgroup where patients.group_name=patientgroup.groupID";
		if($filter!=false){
			$strQuery=$strQuery . " & $filter";
			


		}

		return $this->query($strQuery);
	}

	/**
	*Searches for patient by patient id
	*@param string text search text
	*@return boolean true if successful, else false
	*/
	function searchPatients($text=false){
	
		$strQuery="select patient_id, firstname, lastname from patients where patient_id= $text";

		return $this->query($strQuery);

	}


	
	}
?>