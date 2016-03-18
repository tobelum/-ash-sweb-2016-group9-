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


	//1) Create object of patients and diagnosis classes
	include_once ("patients.php");
	include_once ("diagnosis.php");
	$obj=new patients();
	$sub= new diagnosis();

	
	//2) Call the objects' getPatients and searchDiagnosis methods and check for error

		if(isset($_REQUEST['txtSearch'])){
			$r=$_REQUEST['txtSearch'];
			$sub->searchDiagnosis($r);

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
			while($row=$sub->fetch()){
				if(!$row){
				echo "Invalid Patient ID";
				}
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


		}else{
			$obj->getPatients();

				$col1 = "orange";
				echo "<table border='1'><tr bgcolor=$col1>
											<td>Patient ID</td>
											<td>Username</td>
											<td>First Name</td>
											<td>Last Name</td>
											<td>Gender</td>
											<td>Nationality</td>
											<td>Insurance Type</td>
											<td>Date of Birth</td>
											<td>Group Name</td>
											<td>Phone Number</td>
											<td>Email</td>
										</tr>";
				while($row=$obj->fetch()){
				if(!$row){
				echo "Invalid Patient ID";
				}
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
								<td>{$row['group_name']}</td>
								<td>{$row['phone_number']}</td>
								<td>{$row['email']}</td>
							</tr>";
		}

	}

	

	
	//3) show the result

	
	
	


?>

					</div>
				</td>
			</tr>
		</table>
	</body>
</html>	
