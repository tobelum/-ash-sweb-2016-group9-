<?php
include_once("patientGroup.php");;
class testPatientGroup extends PHPUnit_Framework_TestCase
{
    public function testPatientGroup()
    {
		// generate test Group IDs
		$strTestGroupID=random_bytes(10);
        $obj=new patientGroup();
		$obj->connect();
       	$groups =$obj->getAllPatientGroup();
			
		$this->assertTrue($groups);
		
	}
}