<?php
include_once ("adb.php");
class addPatient extends adb {

function addPatient () {

}
    

function newPatient ($patientID ='none',$username='none',$firstname='none',$lastname='none',$gender='none',$nationality='none', $insuranceType='none',$dob='none',$group=0,$phoneNumber='none',$email='none'){
    
    $strQuery = "INSERT INTO `webtech`.`patients` (`patient_id`, `username`, `firstname`, `lastname`, `gender`, `nationality`, `insurance_type`, `dob`, `group_name`, `phone_number`, `email`) VALUES ('$patientID', '$username', '$firstname', '$lastname', '$gender', '$nationality', '$insuranceType', '$dob', '$group', '$phoneNumber', '$email')";
                                           
return $this->query ($strQuery);


}

}
/*$obj = new addPatient ();

$result = $obj->newPatient('60702017','jesse.akosa','jesse','akosa','male','ghanaian','nhis',1993-03-02,1,'0279507667');

if ($result = false){
echo "add unsuccessful";
}

else {
echo "add successful";
}
*/

?>

