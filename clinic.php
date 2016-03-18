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
	$patientData = $nurse->patientExists($pid);
	$data = $nurse->fetch();
	
	//print_r($data);
	
	if ($data == false) {
		echo "nope";
		
	}
	else {echo "success"; exit();}
}

?>