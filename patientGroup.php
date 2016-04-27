<?php
/**
*/
include_once("adb.php");
/**
*patientGroup class
*/
class patientGroup extends adb{
	function patientgroup(){
	}
	/**
	*gets Group ID and group name
	*@param int groupID Group ID
	*@param enum groupName GroupName
	*@return boolean returns true if successful or false
	*/
	
	
	/**
	*gets get patient's group based on the filter
	*@param If  false, then filter will not be applied
	*@return boolean true if successful, else false
	*/
	function getAllPatientGroup(){
		$strQuery="select groupID, groupName from patientgroup";
		return $this->query($strQuery);
	
}

}

?>
