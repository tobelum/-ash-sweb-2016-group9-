	<! doctype html>
	<html>
		<head>
			<title>Ashesi Health Center</title>
			<link rel="stylesheet" href="css/style.css">
			<script>
				<!--add validation js script here
			</script>
		</head>
		<body>
			<table>
				<tr>
					<td colspan="2" id="pageheader">
					<div id="div7"> <img src="images/logo.jpg" height="80"/> </div>
						<font color="white">Ashesi Health Center</font>
					</td>
				</tr>
				<tr>
					<!--Links to important websites-->
					<td id="mainnav">
						<div class="menuitem"><a href="http://mail.office365.com/"> Send us an email </a></div>
						<div class="menuitem"><a href="http://www.ashesi.edu.gh/student-life-5/health-and-wellbeing.html">
							More info</a></div>
						<div class="menuitem"><a href="http://www.who.int/topics/en/"> Health News</a></div>
					</td>
					<td id="content">
						<div id="divPageMenu">
							<span class="menuitem1" >To search patient's history; enter the patient's ID</span>		
						</div>
						
						<div id="divStatus" class="status">
							View Patient's History
						</div>
						
						<div id="divContent">
						Enter Patient ID to search
						<form action="" method="GET">
							Patient's ID:
							<input type="text" name="txtSearch">
							<input type="submit" value="search" >		
						</form>	
						
						<!--link to homepage-->
						<p><a href ="searchpage.php">Homepage</a></p>


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
												<td>Phone Number</td>
												<td>Email</td>
												<td>Group Name</td>
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
									<td>{$row['phone_number']}</td>
									<td>{$row['email']}</td>
									<td>{$row['groupName']}</td>
			
			
			
					<td><a href='editPatient.php?patientID={$row['patient_id']}&username={$row['username']}&firstname={$row['firstname']}
					&lastname={$row['lastname']}&gender={$row['gender']}&nationality={$row['nationality']}&insurance_type=
					{$row['insurance_type']}&dob={$row['dob']}&phone_number={$row['phone_number']}&email={$row['email']}
					&group_name={$row['groupName']}'>Edit</a></td>";
			
			}

		}

		

		
		//3) show the result

		
		
		


	?>
							</div>
						
						</td>
					</tr>
					</table>
				</tr>
				
				<tr>
					<td colspan="2" id="pagefooter">
					<footer>
							<?php echo '<a href="logout.php">logout </a>'; ?>
							<p>©Ashesi University College. All rights reserved.</p>
							<p>1 University Avenue, Berekuso; PMB CT 3, Cantonments, Accra, Ghana | Phone: +233.302.610.330</p>
					 </footer>
					</td>
				</tr>	
				
			</table>
		</body>
	</html>	




