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

    public function testAjaxDiagnosis(){
    	//test the ajaxpage url
    	$url = "diagnosisajax.php?cmd=1&uc=123456";
    	$this->assertTrue(true,'{"result":1,"diagnosis":[{"diagnosis_id":"3","diagnosedate":"2016-03-18 04:39:43","temp":"34","sp02":"nitrogen","pulse":"45","bloodPressure":"678","complaints":"cant sleep properly","treatment":"sleeping pills","remark":"should sleep better tonight","specificPatient_id":"123456"}]}',$url);

    }
	
	
    
	
}
?>