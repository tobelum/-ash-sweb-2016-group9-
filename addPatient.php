<?php
include_once ("adb.php");
class addPatient extends adb {

function addPatient () {

}
    

function newPatient ($patientID ='none',$username='none',$firstname='none',$lastname='none',$gender='none',$nationality='none', $insuranceType='none',$dob='none',$group=0,$phoneNumber='none'){
    
    $strQuery = "insert into patients values patient_id = '$patientID',
                                           username = '$username',
                                           firstname = '$firstname',
                                           lastname = '$lastname',
                                           gender = '$gender',
                                           nationality = '$nationality',
                                           insurance_type = '$insuranceType',
                                           dob = '$dob',
                                           groups = '$group',
                                           phone_number = '$phoneNumber'
                                    
                                           ";
return $this->query ($strQuery);


}

}

