<html>
	<head>
		<title>View Patient's history</title>
		<link rel="stylesheet" href="css/style.css">
		<script>
			<!--add validation js script here
		</script>
	</head>
	<body>
		<table>
			<tr>
				<td colspan="2" id="pageheader">
					Ashesi Health Clinic
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
						View Patient's History
					</div>
					<div id="divContent">
						To search patient's history; enter the patient's ID
					<form action="" method="GET">
						Patient's ID:
						<input type="text" name="txtSearch">
						<input type="submit" value="search" >		
					</form>	

<?php


	//1) Create object of users class
	include_once ("diagnosis.php");
	$obj=new diagnosis();

	
	//2) Call the object's getUsers method and check for error
	
	if(!$obj->getDiagnosis()){
		echo "Error getting diagnosis";
		return;
	}

	else if(isset($_REQUEST['txtSearch'])){
		$r=$_REQUEST['txtSearch'];
		$obj->searchDiagnosis($r);


	}else{
		$obj->getDiagnosis();


	}

	

	
	//3) show the result
	$col1 = "orange";
	echo "<table border='1'><tr bgcolor=$col1>
					<td>Diagnosis ID</td>
					<td>Date</td>
					<td>Temperature</td>
					<td>SP02</td>
					<td>Pulse</td>
					<td>Blood Pressure</td>
					<td>Complaints</td>
					<td>Treatments Given</td>
					<td>Remarks of Nurse</td>
					<td>Patient ID</td>
				</tr>";
	while($row=$obj->fetch()){

		$col2="yellow";
		echo "<tr bgcolor=$col2>
				<td>{$row['diagnosis_id']}</td>
				<td>{$row['diagnosedate']}</td>
				<td>{$row['temp']}</td>
				<td>{$row['sp02']}</td>
				<td>{$row['pulse']}</td>
				<td>{$row['bloodPressure']}</td>
				<td>{$row['complaints']}</td>
				<td>{$row['treatment']}</td>
				<td>{$row['remark']}</td>
				<td>{$row['specificPatient_id']}</td>
			</tr>";
		}
	
	
	


?>

					</div>
				</td>
			</tr>
		</table>
	</body>
</html>	
