<?php
include_once("diagnosis.php");;

class testDiagnosis extends PHPUnit_Framework_TestCase
{
    public function testGetDiagnosis()
    {
		// generate test patient id
		$strTestPatient_id=random_bytes(10);
        $obj=new diagnosis();
		$obj->connect();

       	$a =$obj->getDiagnosis();
			
		$this->assertTrue($a);
		
    }
	

	
}
?>