<?php
include_once("patients.php");;

class testPatients extends PHPUnit_Framework_TestCase
{
    public function testGetPatients()
    {
		// generate test patient_id
		$strTestPatient_id=random_bytes(10);
        $obj=new patients();
		$obj->connect();

       	$a =$obj->getPatients();
			
		$this->assertTrue($a);
		
    }
	

	
}
?>