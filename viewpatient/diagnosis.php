<?php
/**
*/
include_once("adb.php");
/**
*Diagnosis class
*/
class diagnosis extends adb{
	function diagnosis(){
	}
	/*
	*Views diagnoses corresponding to a patient's id
	*@param int diagnosis_id diagnosis id
	*@param timestamp date date
	*@param string sp02 sp02
	*@param int pulse pulse
	*@param int bloodPressure blood pressure
	*@param string complaints complaints of patient
	*@param string treatment treatment given to pateint
	*@param string remark comments of the nurse
	*@param int specificPatient_id id of corressponding patient
	*@return boolean returns true if successful or false
	*/
			
	
	/**
	*gets patient's records based on the filter
	*@param string mixed condition to filter. If  false, then filter will not be applied
	*@return boolean true if successful, else false
	*/
	function getDiagnosis($filter=false){
		$strQuery="select diagnosis_id, date,temp,sp02,pulse,bloodPressure,complaints,treatments,remarks,specificPatient_id";
		if($filter!=false){
			$strQuery=$strQuery . " where $filter";
			

		}
		return $this->query($strQuery);
	}
	
	/**
	*Searches for diagnosis by specificPatient_id 
	*@param string text search text
	*@return boolean true if successful, else false
	*/
	function searchDiagnosis($text=false){
		$filter=false;
		if($text!=false){
			$filter="specificPatient_id=$text";
		}
		
		return $this->getDiagnosis($filter);
	}
	

	}
?>