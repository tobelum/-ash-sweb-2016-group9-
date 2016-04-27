<?php
include_once ("adb.php");
class addPatient extends adb {

function addPatient () {

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
/*$obj = new addPatient ();

$result = $obj->addPatient('60702017','jesse.akosa','jesse','akosa','male','ghanaian','nhis',1993-03-02,1,'0279507667');

if ($result = false){
echo "add unsuccessful";
}

else {
echo "add successful";
}
*/

?>

