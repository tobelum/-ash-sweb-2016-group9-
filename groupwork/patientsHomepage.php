<! doctype html>
<html>
	<head>
		<title>Ashesi Health Center: Update Patient's Information</title>
		<link rel="stylesheet" href="css/styles.css">
		<script>
			<!--add validation js script here
		</script>
	</head>
	<body>
		<table>
			<tr>
				<td colspan="2" id="pageheader">
				<div id="div7"> <img src="logo.png" height="60"/> </div>
					<font color="white">Ashesi Health Center</font>
				<ul>
					<!--Links to important websites-->
			  <li><a href="">Home</a></li>
			  <li><a href="">Edit Patient</a></li>
			  <li><a href="">View Patient</a></li>
			  <li><a href="">Add New Patient</a></li>
			  <li><a href="">Add New Diagnosis</a></li>
			  <li2 ><a href="logout.php"><font color = 'white'>Logout</font> </a></li2>
			</ul>
				</td>

			</tr>
			<tr>
				
				<td id="content">
					<div id="divPageMenu">
						<span>Patients Personal Records</span>		
					</div>
					<div id="divContent">
						<div id="divSearch">
					<form action="" method="GET">
						Search for Patient:
						<input type="text" name="txtSearch">
						<div id="button"><input type="submit" value="Search" ></div>	
					</form>	
						</div>
						<center>

<?php
	 $col1 = "#993333";
	echo "<table border='1'><tr bgcolor=$col1>
					<th><font color = 'white'>Patient ID</font></th>
					<th><font color = 'white'>Username</font></th>
					<th><font color = 'white'>Firstname</font></th>
					<th><font color = 'white'>Lastname</font></th>
					<th><font color = 'white'>Gender</font></th>
					<th><font color = 'white'>Nationality</font></th>
					<th><font color = 'white'>Insurance Type</font></th>
					<th><font color = 'white'>Date of Birth</font></th>
					<th><font color = 'white'>Phone Number</font></th>
					<th><font color = 'white'>Email</font></th>
					<th><font color = 'white'>Group</font></th>
					<th><font color = 'white'>Update this Patient</font></th>

				</tr>";
				
	//1) Create object of patients class
	include_once "patients.php";
	$patients = new patients();
	
	//2) Call the object's getPatients method and check for error
	if (!$patients->getPatients()){
		echo "error getting patient";
	}
	else if(isset($_REQUEST['txtSearch'])){
		
		$search = $_REQUEST['txtSearch'];
		$result=$patients->searchPatients($search);
				
		while ($row=$patients->fetch()){
		echo "<tr>
					<td style = 'background-color: white '>{$row["patient_id"]}</td>
				  
					<td style = 'background-color: white '>{$row["username"]}</td>

					<td style = 'background-color: white '>{$row["firstname"]}</td>

					<td style = 'background-color: white '>{$row["lastname"]}</td>

					<td style = 'background-color: white '>{$row["gender"]}</td>

					<td style = 'background-color: white '>{$row["nationality"]}</td>

					<td style = 'background-color: white '>{$row["insurance_type"]}</td>

					<td style = 'background-color: white '>{$row["dob"]}</td>

					<td style = 'background-color: white '>{$row["phone_number"]}</td>

					<td style = 'background-color: white '>{$row["email"]}</td>

					<td style = 'background-color: white '>{$row["groupName"]}</td>

					<th style = 'background-color: white '><a href='editPatient.php?patientID={$row['patient_id']}&username={$row['username']}&firstname={$row['firstname']}
					&lastname={$row['lastname']}&gender={$row['gender']}&nationality={$row['nationality']}&insurance_type=
					{$row['insurance_type']}&dob={$row['dob']}&phone_number={$row['phone_number']}&email={$row['email']}
   					&group_name={$row['groupName']}'>Update</a></th>
					

					</tr>";
		}
	}

	
	while($row=$patients->fetch()){
          //$patientID,$username,$firstname,$lastname,$gender,$nationality,$insurance_type,
          //$dob,$group,$phone_number,$email
		echo
	"<tr>
					<td style = 'background-color: white '>{$row["patient_id"]}</td>
				  
					<td style = 'background-color: white '>{$row["username"]}</td>

					<td style = 'background-color: white '>{$row["firstname"]}</td>

					<td style = 'background-color: white '>{$row["lastname"]}</td>

					<td style = 'background-color: white '>{$row["gender"]}</td>

					<td style = 'background-color: white '>{$row["nationality"]}</td>

					<td style = 'background-color: white '>{$row["insurance_type"]}</td>

					<td style = 'background-color: white '>{$row["dob"]}</td>

					<td style = 'background-color: white '>{$row["phone_number"]}</td>

					<td style = 'background-color: white '>{$row["email"]}</td>

					<td style = 'background-color: white '>{$row["groupName"]}</td>

					<th style = 'background-color: white '><a href='editPatient.php?patientID={$row['patient_id']}&username={$row['username']}&firstname={$row['firstname']}
					&lastname={$row['lastname']}&gender={$row['gender']}&nationality={$row['nationality']}&insurance_type=
					{$row['insurance_type']}&dob={$row['dob']}&phone_number={$row['phone_number']}&email={$row['email']}
   					&group_name={$row['groupName']}'>Update</a></th>
					

					</tr>";
		}
		
?>	
</center>					
					</div>
				</td>
			</tr>
		</table>
		</tr>
		
		</tr>
			
			<tr>
				<td colspan="2" id="pagefooter">
				<footer>

					<div class="menuitem"><a href="http://mail.office365.com/"><font color = 'white'> Send us an email </font></a></div>
					<div class="menuitem"><a href="http://www.ashesi.edu.gh/student-life-5/health-and-wellbeing.html"><font color = 'white'>
						More Info</font></a></div>
					<div class="menuitem"><a href="http://www.who.int/topics/en/"><font color = 'white'> Health News</font></a></div>
			
						<?php echo '<a href="logout.php">Logout </a>'; ?>
						<p>©Ashesi University College. All rights reserved.</p>
						<p>1 University Avenue, Berekuso; PMB CT 3, Cantonments, Accra, Ghana | Phone: +233.302.610.330</p>
				 </footer>
				</td>
			</tr>	
			
		</table>
	</body>
</html>	
