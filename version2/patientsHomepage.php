<html>
	<head>
		<title> User Interface Design </title>
		<link rel="stylesheet" href="style.css">
		<style>

		</style>
	</head>
	<body>
		<header id="pageheader" width:100%, height:100%>
			<div>
			<h1 style="text-align:left; font-size:80%;">You are logged in as UserUnknown</h1>
			<h2 style="color:black; font-family:castellar; font-size:200%; text-align:center;">ASHESI HEALTH CENTER</h2>
			</div>
		</header>
		<table id="menubar", width:100%, height:100%><tr>
				<td class="menuitem">Home</td>
				<td class="menuitem">New Patient</td>
				<td class="menuitem">View Patient's history</td>
				<td class="menuitem">Edit Patient</td>
				<td class="menuitem">Add Diagnosis</td>
				<td class="menuitem">Log Out</td>
			</tr>
		</table>
		<table>
			<tr id="space"></tr>
			<tr>
				<td id="sidebar">
					<p class="menuitem">Calendar</p>
					<p class="menuitem">More Info</p>
					<p class="menuitem">Send Email</p>
					<p class="menuitem">Dictionary</p>
				</td>
				<td class="sidespace"></td>
				<td id="content">
					<div id="titlebar">EDIT PATIENT'S PERSONAL INFOMATION</div>
					<div id="space"></div>
					<div id="contentarea">
					
					
						<div id="divContent">
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
	 $col1 = "#b30000";
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
				
	//1) Create object of patients class
	include_once "patients.php";
	$patients=new patients();
	
	//2) Call the object's getPatients method and check for error
	if (!$patients->getPatients()){
		echo "error getting patient";
	}
	
	else if(isset($_REQUEST['txtSearch'])){
		
		$search = $_REQUEST['txtSearch'];
		$result=$patients->searchPatients($search);
				
		while ($row=$patients->fetch()){
				//$patientID,$username,$firstname,$lastname,$gender,$nationality,$insurance_type,
               //$dob,$group,$phone_number,$email
		$col2="#e7d3dc";
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
				&group_name={$row['groupName']}'>Edit</a></td>

				</tr>";
				}
	}

	/* }else{
		$r=$obj->getPatients();
        if(!$r){
		echo"error getting patient";

	} */
	
	
	
	
		
	/*echo "<table border='1'><tr bgcolor=$col1>
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
				</tr>"; */
	while($row=$patients->fetch()){
//$patientID,$username,$firstname,$lastname,$gender,$nationality,$insurance_type,
               //$dob,$group,$phone_number,$email
		$col2="#e7d3dc";
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
	
			
?>						
					</div>
				</td>
			</tr>
		</table>
		</tr>
		</table>
		
		</tr>
			
			<tr>
				<td colspan="2" id="pagefooter">
				<footer id="pagefooter">1 University Avenue Berekuso, Eastern Region. Ghana</footer>
	</body>
</html>
