<?php
include_once("adb.php");
class patientGroup extends adb{
	function patientgroup(){
	
	}
	
	function getAllPatientGroup(){
		$strQuery="select groupID, groupName from patientgroup";
		return $this->query($strQuery);
	
}

}

?>
