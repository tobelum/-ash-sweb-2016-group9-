<?php
include_once("nurse.php");

class testNurse extends PHPUnit_Framework_TestCase
{
    public function testPatientExists()
    {
        $obj=new nurse();
		
        $this->assertEquals(true, 
		$obj->patientExists(
			"15842017"				//status
			));   
			
		$this->assertEquals(true,$obj->addNewDiagnosis(5,"2015-03-05",2,4,6,8,"knee jerk", "massage", "see me", "AUE00049"));
    }
	

	
}