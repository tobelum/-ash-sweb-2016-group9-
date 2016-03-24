<html>
	<head>
		<title>Homepage</title>
		<link rel="stylesheet" href="css/style.css">
		<script>
			<!--add validation js script here
		</script>
	</head>
	<body>
		<table>
			<tr>
				<td colspan="2" id="pageheader">
					Patients Homepage
				</td>
			</tr>
			<tr>
				<td id="mainnav">
					<div class="menuitem">menu 1</div>
					<div class="menuitem">menu 2</div>
				</td>
				<td id="content">
					<div id="divPageMenu">
						<span class="menuitem" >page menu 1</span>
						<input type="text" id="txtSearch" />
						<span class="menuitem">search</span>		
					</div>
					<div id="divStatus" class="status">
						status message
					</div>
					<div id="divContent">
						Content space
					<form action="" method="GET">
						Name:
						<input type="text" name="txtSearch">
						<input type="submit" value="search" >		
					</form>	
				


<?php

	//1) Create object of patients class
	include_once("patients.php");
	$obj=new patients();
	
	//2) Call the object's getPatients method and check for error

	if(isset($_REQUEST['txtSearch'])){
		$r=$obj->searchPatients($_REQUEST['txtSearch']);

		$col1 = "orange";
	echo "<table border='1'><tr bgcolor=$col1>
					<td>Patient ID</td>
					<td>Username</td>
					<td>Firstname</td>
					<td>Lastname</td>
					<td>Gender</td>
					<td>Nationality</td>
					<td>Insurance Type</td>
					<td>Date of Birth</td>
					<td>Phone Number</td>
					<td>Email</td>
					<td>Group</td>
				</tr>";
	while($row=$obj->fetch()){
//$patientID,$username,$firstname,$lastname,$gender,$nationality,$insurance_type,
               //$dob,$group,$phone_number,$email
		$col2="yellow";
		echo "<tr bgcolor=$col2>
				<td>{$row['patient_id']}</td>
				<td>{$row['username']}</td>
				<td>{$row['firstname']}</td>
				<td>{$row['lastname']}</td>
				<td>{$row['gender']}</td>
				<td>{$row['nationality']}</td>
				<td>{$row['insurance_type']}</td>
				<td>{$row['dob']}</td>
				<td>{$row['phone_number']}</td>
				<td>{$row['email']}</td>
				<td>{$row['group_name']}</td>

				<td><a href='editPatient.php?patientID={$row['patient_id']}&username={$row['username']}&firstname={$row['firstname']}
				&lastname={$row['lastname']}&gender={$row['gender']}&nationality={$row['nationality']}&insurance_type=
				{$row['insurance_type']}&dob={$row['dob']}&phone_number={$row['phone_number']}&email={$row['email']}
				&group_name={$row['group_name']}'>Edit</a></td>";	

				}	

	}else{
		$r=$obj->getPatients();
        if(!$r){
		echo"error getting patient";

	}
		$col1 = "orange";
	echo "<table border='1'><tr bgcolor=$col1>
					<td>Patient ID</td>
					<td>Username</td>
					<td>Firstname</td>
					<td>Lastname</td>
					<td>Gender</td>
					<td>Nationality</td>
					<td>Insurance Type</td>
					<td>Date of Birth</td>
					<td>Phone Number</td>
					<td>Email</td>
					<td>Group</td>
				</tr>";
	while($row=$obj->fetch()){
//$patientID,$username,$firstname,$lastname,$gender,$nationality,$insurance_type,
               //$dob,$group,$phone_number,$email
		$col2="yellow";
		echo "<tr bgcolor=$col2>
				<td>{$row['patient_id']}</td>
				<td>{$row['username']}</td>
				<td>{$row['firstname']}</td>
				<td>{$row['lastname']}</td>
				<td>{$row['gender']}</td>
				<td>{$row['nationality']}</td>
				<td>{$row['insurance_type']}</td>
				<td>{$row['dob']}</td>
				<td>{$row['phone_number']}</td>
				<td>{$row['email']}</td>
				<td>{$row['groupName']}</td>




				<td><a href='editPatient.php?patientID={$row['patient_id']}&username={$row['username']}&firstname={$row['firstname']}
				&lastname={$row['lastname']}&gender={$row['gender']}&nationality={$row['nationality']}&insurance_type=
				{$row['insurance_type']}&dob={$row['dob']}&phone_number={$row['phone_number']}&email={$row['email']}
				&group_name={$row['groupName']}'>Edit</a></td>";	
	}
	}
			
?>						
					</div>
				</td>
			</tr>
		</table>
	</body>
</html>	
