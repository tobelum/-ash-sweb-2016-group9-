<?php
include_once("adb.php");

class report extends adb{

function getAllPatientGroups(){
		$strQuery="select groupID, groupName from patientgroup";
		return $this->query($strQuery);
	
	}
    
function newPatient ($patientID ='none',$username='none',$firstname='none',$lastname='none',$gender='none',$nationality='none', $insuranceType='none',$dob='none',$group=0,$phoneNumber='none'){
    
    $strQuery = "insert into patients SET patient_id = '$patientID',
                                           username = '$username',
                                           firstname = '$firstname',
                                           lastname = '$lastname',
                                           gender = '$gender',
                                           nationality = '$nationality',
                                           insurance_type = '$insuranceType',
                                           dob = '$dob',
                                           group_name = '$group',
                                           phone_number = '$phoneNumber'
                                    
                                           ";
return $this->query ($strQuery);

    
}
    
}

<?