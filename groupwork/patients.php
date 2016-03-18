<?php
     include_once("adb.php");

     class patients extends adb{

/**  
     *Function search patients
     *@param int $filter contains the Patient ID
*/
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

/**  
     *Function get patients
     *@param int $filter contains the Patient ID abd retrieves the information from the database
*/
     	function getPatients($filter=false){

     	  $strQuery = "select patient_id, username,firstname,lastname,gender,nationality,insurance_type,dob,group_name,phone_number,
            email from patients left join patientgroup on patients.group_name=patientgroup.groupID"; 
               if($filter!=false){
                    $strQuery=$strQuery . " where $filter";

          }
               return $this->query($strQuery);
     	}

/**  
     *Function edit Patient
     *@param int $filter contains $patientID,$username,$firstname,$lastname,$gender,$nationality,$insurance_type,
     *       $dob,$group,$phone_number,$email which allow the user to change these details the application.
*/

          function editPatient($patientID,$username,$firstname,$lastname,$gender,$nationality,$insurance_type,
               $dob,$group,$phone_number,$email){

               $strQuery="update patients set username='$username',firstname='$firstname',lastname='$lastname',
               gender='$gender',nationality='$nationality',insurance_type='$insurance_type',dob='$dob',group_name='$group',
               phone_number='$phone_number',email='$email' where patient_id='$patientID'";

               return $this->query($strQuery);
          }


     }
