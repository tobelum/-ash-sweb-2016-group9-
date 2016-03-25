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
						<span class="menuitem1" >Search Patient by name</span>		
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
		</tr>
		
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
