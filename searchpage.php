<html>
	<head>
		<title>Ashesi Health Center: View Patient's History</title>
		<link rel="stylesheet" href="css/styles.css">
		<script type="text/javascript" src="js/jquery-1.12.1.js"></script>
		<script type="text/javascript">
			<!--add validation js script here

			function viewDiagnosisComplete(xhr,status){
				if(status!="success"){
					divStatus.innerHTML = "error while viewing Patient's History";
					return;
				}
				var obj=$.parseJSON(xhr.responseText);
				if(obj.result==0){
					divStatus.innerHTML=obj.message;
					console.log(obj.message);	
				}else{
					divStatus.innerHTML="View Patient's History";
					// Get the modal
					var modal = document.getElementById('myModal');
					// Get the button that opens the modal
					var btn = document.getElementById("myBtn");
					// Get the <span> element that closes the modal
					var span = document.getElementsByClassName("close")[0];
					 modal.style.display = "block";
					// When the user clicks on <span> (x), close the modal
					span.onclick = function() {
						 modal.style.display = "none";
					}
					// When the user clicks anywhere outside of the modal, close it
					window.onclick = function(event) {
						if (event.target == modal) {
					    	modal.style.display = "none";
						}
					}
					//To view the content in the modal									
					var table=document.getElementById("table");
					var info="";
					//To view the header of the diagnosis table
					info+="<tr><th>Date</th><th>Temperature</th><th>SP02</th><th>Pulse</th><th>Blood Pressure</th><th>Complaints</th><th>Treatments Given</th><th>Remarks of Nurse</th></tr>";
					//To view the details in the diagnosis entry for a specific patient, call the JSON object
					var length=obj.diagnosis.length;
					while(length>0){
						info+="<tr><td>"+obj.diagnosis[length-1].diagnosedate+"</td><td>"+obj.diagnosis[length-1].temp+"</td><td>"+obj.diagnosis[length-1].sp02+"</td><td>"+obj.diagnosis[length-1].pulse+"</td><td>"+obj.diagnosis[length-1].bloodPressure+"</td><td>"+obj.diagnosis[length-1].complaints+"</td><td>"+obj.diagnosis[length-1].treatment+"</td><td>"+obj.diagnosis[length-1].remark+"</td></tr>";
						length-=1;
					}
					//Displaying the information into the pop-up
					table.innerHTML=info;
				}

			}

			function viewDiagnosis(patientid){
				var pageUrl="diagnosisajax.php?cmd=1&uc="+patientid;
				$.ajax(pageUrl,{async:true,complete:viewDiagnosisComplete});
			}

			function searchfunction(){
				var re6digit=/[0-9]{6}/; //regular expression defining a 6 digit number
				//if match failed
				if(!re6digit.test(txtbox.value)){
					alert("Please enter a valid 6 digit number inside the search box.");
					return ;
				}
				
				var text=document.getElementById("txtbox").value;
				viewDiagnosis(text);
			}
		</script>
	</head>
	<body>
		<table>
			<tr>
				<td colspan="2" id="pageheader">
				<div id="div7"> <img src="css/logo.png" height="60"/> </div>
				<font color="white">Ashesi Health Center</font>
				<ul>
					<!--Links to important websites-->
			  <li><a href="newclinicHomePage.php">Home</a></li>
			  <li><a href="patientsPageAjax.php">Edit Patient</a></li>
			  <li><a href="searchpage.php">View Patient</a></li>
			  <li><a href="addPatientajax.php">Add New Patient</a></li>
			  <li><a href="clinic.php">Add New Diagnosis</a></li>
			  <li2 ><a href="logout.php"><font color = 'white'>Logout</font> </a></li2>
			</ul>
				</td>
			</tr>
			<tr>
				<td id="content">
					<!--Title bar for my specific functional requirement-->
					<div id="divPageMenu">
						<span>View Patient's History</span>		
					</div>
					<div id="divContent">
						<div id="divSearch">
							<div id="divStatus" class="status">
								To Display Patient's History
							</div>
							Enter Patient's ID:
							<input type="text" id="txtbox" name="txtSearch">
							<button id="button" onclick='searchfunction()'>Search</button>	
						</div>

						<!--html for the popup-->
						<!-- The Modal -->
						<div id="myModal" class="modal">
						    <div class="modal-content">
						        <span class="close">×</span>
								<table id='table' border='1'>
						  		<!-- Modal content -->
						  		</table>
							</div>
						</div>

<?php
	//Create object of patients class
	include_once ("patients.php");
	$obj=new patients();

	//check if there are patients in the database
	if(!$obj->getPatients()){
		echo "Error getting patients";
	}
	//display the header for the patients table
	$col1 = "#993333";
	echo "<table border='1'>
			<tr bgcolor=$col1>
				<th><font color='white'>Patient ID</font></th>
				<th><font color='white'>Username</font></th>
				<th><font color='white'>First Name </font></th>
				<th><font color='white'>Last Name</font></th>
				<th><font color='white'>Gender</font></th>
				<th><font color='white'>Nationality</font></th>
				<th><font color='white'>Insurance Type</font></th>
				<th><font color='white'>Date of Birth</font></th>
				<th><font color='white'>Patient Group</font></th>
				<th><font color='white'>Phone number</font></th>
				<th><font color='white'>Email Address</font></th>
				<th><font color='white'>View</font></th>
			</tr>";								
			while($row=$obj->fetch()){
			// to check if the Patient's ID is valid
			if(!$row){
				echo "Invalid Patient ID";
			}else{
				//display the patients and their information in the table
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
						<td><button id='myBtn' onclick='viewDiagnosis({$row['patient_id']})'>view history</button></td>
					</tr>";	
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

