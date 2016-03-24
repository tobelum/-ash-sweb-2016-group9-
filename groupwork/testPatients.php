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

    public function testEditPatient(){

        $obj=new patients();
		
        $this->assertEquals(true, 
		$obj->patientExists(
			"84082017"				//status
			));   
			
		$this->assertEquals(true,$obj->editPatient("84082017","roslynne.amoah","Roslynne","Amoah","Female","Ghanaian","NHIS","1994-02-17",2,"0261264795","roslynne.amoah@ashesi.edu.gh"));
    }

    }
	
	

?>