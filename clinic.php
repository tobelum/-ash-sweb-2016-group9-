<html>
<head> </head>

<body>
<form method="GET", action="clinic.php">
Search for Patient (Enter ID) <input type = "text" name = "id">
					<input type = "submit", value = "Search">
					</form>
</body>


</html>




<?php
include_once ("nurse.php");

if (isset($_REQUEST['id'])) {
	$pid = $_REQUEST['id'];
	$nurse = new nurse();
	$patientData = $nurse->patientExists($pid);..36+6
	$data = $nurse->fetch();
	
	//print_r($data);
	
	if ($data == false) {
		echo "Please Enter a Valid ID";
		
		
	}
	else {header("Location: Diagnosis.php");}
}

?>