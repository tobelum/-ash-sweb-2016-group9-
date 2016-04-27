<?php

include_once("adb.php");
/**
*Users  class
*/
class nurse extends adb{
	function nurse(){
	}
	
	
	
	/**
	*Checks if a patient exists in patient's table
	*@param int pid Patient's id
	*@return boolean returns true if patient existst in patient's table or false 
	*/	
	function patientExists($p_id) {
		$query = "SELECT * FROM patients WHERE patient_id = '$p_id'";
		$a =  $this->query($query);
		 if (!$a) {
			 echo '{"result":0, "message": "Patient does not exist"}';
			 return;
		 }
		 $b = $this->fetch();
		 if (!$b){
			 echo '{"result:0, "message":"Could not fetch data"}';
			 return;
		 }
		 return $b;
	}
	
	function getPatientHistory($pid) {
		$query = "SELECT * from diagnosis WHERE specificPatient_id =  '$pid' ORDER BY diagnosedate DESC";
		return $this->query($query);
	}
	
	
	/**
	*Adds a new Diagnosis or record
	*@param int diagnosis id unique identifier
	*@param date date date of diagnosis
	*@param double temp temeprature of patient
	*@param double spO2 arterial oxygen saturation of patient
	*@param double pulse patient's pulse
	*@param double bp Blood pressure of patient
	*@param text com description of patient's symptoms
	*@param text treat drugs and treatments administered to patient
	*@param text rem description of patient's symptoms
	*@param text p_id patient's ID
	*@return boolean returns true if successful or false 
	*/
	function addNewDiagnosis($date,$temp,$sp,$pulse,$bp,$com,$treat,$rmk,$p_id) {
		$strQuery = "INSERT INTO diagnosis set
					diagnosedate = '$date',
					temp = '$temp',
					spO2 = '$sp',
					pulse = '$pulse',
					bloodPressure = '$bp',
					complaints = '$com',
					treatment = '$treat',
					remark = '$rmk',
					specificPatient_id = '$p_id'";
					
					
		return $this->query($strQuery);
	} 

}
?>