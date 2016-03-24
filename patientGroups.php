<?php
include_once("adb.php");
class patientGroup extends adb{
	function patientGroup(){
	
	}
	
	function getAllPatientGroups(){
		$strQuery="select groupID, groupName from patientgroup";
		return $this->query($strQuery);
	
	}

}
/*$obj = new patientGroup();
$result = $obj->getAllPatientGroups();

if($result = false){
echo "get failed";
}

else{
echo "get success";
}
*/
?>