<?php
/**
*/
include_once("adb.php");
/**
*Patients  class
*/
class patients extends adb{
     function patients(){
     }
     /**
     *Gets all patients
     *@param int patient_id patient ID
     *@param string username username
     *@param string firstname first name
     *@param string lastname last name
     *@param string gender gender
     *@param string nationality nationality
     *@param string insurance_type insurance type
     *@param date dob date of birth
     *@param int group_name group name
     *@param int phone_number phone number
     *@param string email email address
     *@return boolean returns true if successful or false 
     */
     
     
     /** 
     *gets patients' records based on the filter
     *@param string mixed condition to filter. If false, then filter will not be applied
     *@return boolean true if successful, else false
     */
     function getPatients($filter=false){
          $strQuery="select patient_id,username,firstname,lastname,gender,nationality, insurance_type,dob,patientgroup.groupName,
          phone_number,email from patients, patientgroup where patients.group_name=patientgroup.groupID";
          if($filter!=false){
               $strQuery=$strQuery . " where $filter";
               


          }

          return $this->query($strQuery);
     }

/**  
     *Function search patients
     *@param int $filter contains the Patient ID
*/
          function searchPatients($text=false){
               $filter=false;
               if($text!=false){
                    $filter=" patientID like '%$text%' or username like '%$text%' or firstname like '%$text%' or lastname 
                    like '%$text%' or gender like '%$text%' or nationality like '%$text%' or insurance_type like '%$text%'";
               }
               
               return $this->getPatients($filter);
               
          }

     function getPatient($patient_id){
          $strQuery="select patient_id,username,firstname,lastname,gender,nationality, 
                         insurance_type,dob,patientgroup.groupName,phone_number,email from patients, patientgroup 
                         where patient_id =$patient_id and patients.group_name=patientgroup.groupID ";

          return $this->query($strQuery);

     }

/**  
     *Function edit Patient
     *@param int $filter contains $patientID,$username,$firstname,$lastname,$gender,$nationality,$insurance_type,
     *       $dob,$group,$phone_number,$email which allow the user to change these details the application.
*/
          function editPatient($patientID,$username,$firstname,$lastname,$gender,$nationality,$insurance_type,
               $dob,$group_name,$phone_number,$email){

               $strQuery="update patients set username='$username',firstname='$firstname',lastname='$lastname',
               gender='$gender',nationality='$nationality',insurance_type='$insurance_type',dob='$dob',group_name='$group_name',
               phone_number='$phone_number',email='$email' where patient_id='$patientID'";

               return $this->query($strQuery);
          }
     
     }
?>