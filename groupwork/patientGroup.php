<?php
include_once("adb.php");
class patientGroup extends adb{
	function patientgroup(){
	
	}
	
	function getAllPatientGroup(){
		$strQuery="select groupID, groupName from patientgroup";
		return $this->query($strQuery);
	
	}
/*	 function addPatientGroup($text){
	 	$strQuery="insert into patientgroup (groupName) values ('$text')";
	 	return $this->query($strQuery);
	 	
	 	if (!$this->query($strQuery)){
			echo "Error adding PATIENTgroup";
			exit();
	 	}else{
	 		echo "Success adding usergroup";
	 	}
	 }
	 */

}

?>