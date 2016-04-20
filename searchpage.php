<html>
	<head>
		<title>Ashesi Health Center: View Patient's History</title>
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
						<span>View Patient's History</span>		
					</div>
					<div id="divContent">
						<div id="divSearch">
					<form action="" method="GET">
						Enter Patient's ID:
						<input type="text" name="txtSearch">
						<div id="button"><input type="submit" value="Search" ></div>	
					</form>	
						</div>
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
										$obj->searchPatients($r);

										// calling the patient info before the diagnosis
										$s=$_REQUEST['txtSearch'];
										if(!$obj->searchPatients($s)){
											echo "Error getting patient";
										}

											while($row=$obj->fetch()){
							                     // to check if the Patient's ID is valid
							                    if(!$row)
							                     {
							                     	echo "Invalid Patient ID";
							                     }
							                    else
							                    {
												echo "<table>
															<tr>{$row['firstname']}</tr>
															<tr>{$row['lastname']}</tr>
													 ";
												}
											}
								

										if(!$sub->searchDiagnosis($r)){
											echo "Error getting diagnosis";
										}

										$col1 = "#993333";
										echo "<table border='1'><tr bgcolor=$col1>
																	<th><font color='white'>Date</font></th>
																	<th><font color='white'>Temperature</font></td>
																	<th><font color='white'>SP02</font></th>
																	<th><font color ='white'>Pulse</font></th>
																	<th><font color='white'>Blood Pressure</font></th>
																	<th><font color ='white'>Complaints</font></th>
																	<th><font color= 'white'>Treatments Given</font></th>
																	<th><font color= 'white'>Remarks of Nurse</font></th>
																</tr>";
											
										
										while($row=$sub->fetch()){
											if(!$row){
											echo "Invalid Patient ID";
											}
											else{
												$col2="white";
														echo "<tr bgcolor=$col2>
																	<td>{$row['diagnosedate']}</td>
																	<td>{$row['temp']}</td>
																	<td>{$row['sp02']}</td>
																	<td>{$row['pulse']}</td>
																	<td>{$row['bloodPressure']}</td>
																	<td>{$row['complaints']}</td>
																	<td>{$row['treatment']}</td>
																	<td>{$row['remark']}</td>

																</tr>";
															}
													}

												

									}
									//if there is no patient id searched in the text box, then display list of patients
									else{
									
										if(!$obj->getPatients()){
											echo "Error getting patients";
										}

											$col1 = "#993333";
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
																		<td>View</td>
																	</tr>";
											
											while($row=$obj->fetch()){
							                     // to check if the Patient's ID is valid
							                    if(!$row)
							                     {
							                     	echo "Invalid Patient ID";
							                     }
							                    else
							                    {
												$col2="white";
												echo "<tr bgcolor=$col2>
															<td>{$row['patient_id']}</td>
															<td>{$row['username']}</td>
															<td>{$row['firstname']}</td>
															<td>{$row['lastname']}</td>
															<td>{$row['gender']}</td>
															<td>{$row['nationality']}</td>
															<td>{$row['insurance_type']}</td>
															<td>{$row['dob']}</td>
															<td>{$row['groupName']}</td>
															<td>{$row['phone_number']}</td>
															<td>{$row['email']}</td>
															<td><a href='searchpage.php?txtSearch={$row['patient_id']}'>View</a></td>

											</tr>
															

														";
													}

									

									}
								}
		


?>
                                
			 </div>
				</td>
			</tr>
		</table>
						
				</td>
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

