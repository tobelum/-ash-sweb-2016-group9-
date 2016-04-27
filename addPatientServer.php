<?php
	//check command
	if(!isset($_REQUEST['cmd'])){
		echo "cmd is not provided";
		exit();
	}
	/*get command*/
	$cmd=$_REQUEST['cmd'];
	switch($cmd){
		case 1:
			addPatient();		
			break;
		
		default:
			echo '{"result":0,"message":"wrong cmd"}';	
			break;
	}
	
	
	
	function addPatient(){
		include_once("addPatient.php");
		
		if(!isset($_REQUEST["pd"])){
			echo '{"result":0,"message":"user code is not correct"}';
			//echo "0";
			return;
		}
		$patientID=$_REQUEST["pd"];
        $username=$_REQUEST["un"];
        $firstname=$_REQUEST["fn"];
        $lastname=$_REQUEST["ln"];
        $gender=$_REQUEST["gn"];
        $nationality=$_REQUEST["nt"];
        $insuranceType=$_REQUEST["it"];
        $dob=$_REQUEST["db"];
        $group=$_REQUEST["gr"];
        $phonenumber=$_REQUEST["pn"];
        $email=$_REQUEST["em"];
		
        echo "patient id is ".$patientID;
        
		$obj=new addPatient();
		
		$row=$obj->newPatient($patientID,$username,$firstname,$lastname,$gender,$nationality,$insuranceType,$dob,$group,$phonenumber,$email);
		
		if($row==false){
			echo '{"result":0,"message":"Please fill in all details of the Patient"}';
			return;
		}
		
		else{
        
        echo '{"result":1,"message":"New Patient Added"}';
        }
			
	}

	
	
?>