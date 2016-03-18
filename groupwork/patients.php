<?php
     include_once("adb.php");

     class patients extends adb{


          function searchPatients($text=false){
          $filter=false;
          if($text!=false){
               $filter="patient_id like '%$text%' or firstname like '%$text%' or lastname like '%$text%' or 
               group_name like '%$text%' or username like '%$text%' or insurance_type like '%$text%' or gender like '%$text%' or 
               or nationality like '%$text%'";
          }
               return $this->getPatients($filter);
          }
// select username,firstname,lastname,gender,nationality,insurance_type,dob,group_name,phone_number,
//             email from patients left join patientgroup on patients.group_name=patientgroup.groupID where patient_id = '84082017'


     	function getPatients($filter=false){

     	  $strQuery = "select patient_id, username,firstname,lastname,gender,nationality,insurance_type,dob,group_name,phone_number,
            email from patients left join patientgroup on patients.group_name=patientgroup.groupID"; 
               if($filter!=false){
                    $strQuery=$strQuery . " where $filter";

          }
               return $this->query($strQuery);
     	}



          function editPatient($patientID,$username,$firstname,$lastname,$gender,$nationality,$insurance_type,
               $dob,$group,$phone_number,$email){

               $strQuery="update patients set username='$username',firstname='$firstname',lastname='$lastname',
               gender='$gender',nationality='$nationality',insurance_type='$insurance_type',dob='$dob',group_name='$group',
               phone_number='$phone_number',email='$email' where patient_id='$patientID'";

               return $this->query($strQuery);
          }


     }