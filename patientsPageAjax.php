! doctype html>
<html>
	<head>
		<title>Ashesi Health Center: Update Patient's Information</title>
		<link rel="stylesheet" href="css/styles.css">
		<script type="text/javascript" src="js/jquery-1.12.1.js"></script>
		<script type="text/javascript">


function editPatientComplete(xhr, status) {
	if (status!="sucess") {
		divStatus.innerHTML = "Error while updating patient";
		return;
	}
	var obj=$.parseJSON(xhr.responseText);
				if(obj.result==0){
					divStatus.innerHTML= obj.message;	
				}else{
					
					divStatus.innerHTML="Patient Updated";
				}
} 

function editPatient(patientID,username,firstname,lastname,gender,nationality,insurance_type,dob,phone_number,email,groupName) {

		// var username = $ ('#txtUsername').val();
		// var firstname = $ ('#txtFirstname').val();
		// var lastname = $ ('#txtLastname').val();
		// var gender = $ ('#txtGender').val();
		// var nationality = $ ('#txtNationality').val();
		// var insurance_type = $ ('#txtInsurance_type').val();
		// var dob = $ ('#txtDob').val();
		// var group_name = $ ('#txtGroup_name').val();
		// var phone_number = $ ('#txtPhone_number').val();
		// var email = $ ('#txtEmail ').val();
 

		var pageURL = "editAjax.php?command=1&patientID="+patientID+"&username="+username+"&firstname="+firstname+ "&lastname="+lastname
				  	  +"&gender="+gender+"&nationality="+nationality+"&insurance_type="+insurance_type+"$dob="+dob+ "&group_name="
				  	  +group_name+"&phone_number="+phone_number+"&email="+email;
		$.ajax(pageURL, 
			   {async:true, 
			   	complete:editPatientComplete
			   }
		);
		prompt("url", pageURL);
		}

function updatePatients(obj,id){
	document.getElementById('row').innerHTML= "<input type='text'>";
				
				// var currentUsername = obj.innerHTML;
				// var currentFirstname = obj.innerHTML;
				// var currentLastname = obj.innerHTML;
				// var currentGender = obj.innerHTML;
				// var currentNationality = obj.innerHTML;
				// var currentInsurance_type = obj.innerHTML;
				// var currentDob = obj.innerHTML;
				// var currentGroup_name = obj.innerHTML;
				// var currentPhone_number = obj.innerHTML;
				// var currentEmail = obj.innerHTML;

				// obj.innerHTML="<input id='txtUsername' type='text' name='username'><input id='txtUsername' type='text' name='username'>
				// 			   <input id='txtFirstname' type='text' name='firstname'><input id='txtFirstname' type='text' name='firstname'>
				// 			   <input id='txtLastname' type='text' name='lastname'><input id='txtLastname' type='text' name='lastname'>
				// 			   <input id='txtGender' type='text' name='gender'><input id='txtGender' type='text' name='gender'>
				// 			   <input id='txtNationality' type='text' name='nationality'><input id='txtNationality' type='text' name='nl'>
				// 			   <input id='txtInsurance_type' type='text' name='insurance_type'><input id='txtInsurance_type' type='text' name='insurance_type'>
				// 			   <input id='txtDob' type='text' name='dob'><input id='txtDob' type='text' name='dob'>
				// 			   <input id='txtGroup_name' type='text' name='group_name'><input id='txtGroup_name' type='text' name='group_name'>
				// 			   <input id='txtPhone_number' type='text' name='phone_number'><input id='txtPhone_number' type='text' name='phone_number'>
				// 			   <input id='txtEmail' type='text' name='email'><input id='txtEmail' type='text' name='em'>
				// 	 		   <span class='clickspot' onclick='editPatient("+id+")' >save</span>";
			
				// $ ('#txtUsername').val(currentUsername);
				// $ ('#txtFirstname').val(currentFirstname);
				// $ ('#txtLastname').val(currentLastname);
				// $ ('#txtGender').val(currentGender);
				// $ ('#txtNationality').val(currentNationality);
				// $ ('#txtInsurance_type').val(currentInsurance_type);
				// $ ('#txtDob').val(currentDob);
				// $ ('#txtGroup_name').val(currentGroup_name);
				// $ ('#txtPhone_number').val(currentPhone_number);
				// $ ('#txtEmail').val(currentEmail);
		
}



function searchPatientComplete(xhr, status) {
	if (status!="success") {
		divStatus.innerHTML = "Error while searching for patient";
		return;
	}
	var obj=$.parseJSON(xhr.responseText);
				if(obj.result==0){
					divStatus.innerHTML=obj.message;	
				}else{
					
					divStatus.innerHTML="patient's with this discription displayed below";
	}
} 



function searchPatients(){
	var search=document.getElementById('search').value;
	var theUrl="editAjax.php?command=2&search="+search;
				$.ajax(theUrl,
				{
					async:true,
					complete:searchPatientComplete
				}
				)

				//prompt("url", theUrl);

}
var btn = document.getElementById("myBtn");
var modal = document.getElementById('myModal');


		</script>
	</head>
	<body>
		<div class="status" id="divStatus">Ready</div> 
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
						Search for Patient:
						<input type="text" id = "search" name="txtSearch">
						<div ><button id="button" onclick="searchPatients()">Search</button>	
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

					<th style = 'background-color: white '><span onclick=''>updatePation</a></th>
					

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

					
					<th style = 'background-color: white '><button onclick='editPatient({$row["patient_id"]},{$row["username"]},{$row["firstname"]},{$row["lastname"]},{$row["gender"]},{$row["nationality"]},{$row["insurance_type"]},{$row["dob"]},{$row["phone_number"]},
						{$row["email"]}),{$row["groupName"]})'>Update</button></th>
					

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



editAjax.php?command=1&patientID="+patientID+"&username="+username+"&firstname="+firstname+"&lastname="+lastname+"&gender="+gender+"&nationality="+nationality+"&insurance_type="+insurance_type+"$dob="+dob+"&group_name="+group_name+"&phone_number="+phone_number+"&email="+email;
