<?php
/**
 *The main purpose of this page is to to provide the functions to be called by the Ajax.php and patientsPageAjax.php.
 *this page queries the databse ino rder to get information.
 *This page includes the following:
 *patientgroup() - Which is used to get the patients group from the database.
 *
 * @summary   This file basically queries the database.
 *
 *@access public
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

