<?php
include_once("..\nurse.php");

class testNurse extends PHPUnit_Framework_TestCase
{
    public function testPatientExists()
    {
        $obj=new nurse();
		
        $this->assertEquals(true, 
		$obj->patientExists(
			"AUE00049"				//status
			));
			
		$this->assertEquals(true,$obj->addNewDiagnosis(1,2015-03-05,2,4,6,8,"knee jerk", "massage", "see me", "15842017"));
    }
	

	
}