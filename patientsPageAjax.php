<! doctype html>
<?php
//  session_start();
  //if(!isset($_SESSION['USER'])){
  	//header("location:login.php");
	 //exit();
?>
<html>
	<head>
		<title>Ashesi Health Center: Update Patient's Information</title>
		<link rel="stylesheet" href="css/styles.css">
		<script type="text/javascript" src="js/jquery-1.12.1.js"></script>
		<script type="text/javascript">

			function editPatientComplete(xhr, status) {
				if (status!="success") {
					divStatus.innerHTML = "Error while updating patient";
					
					return;
				}
				var obj=$.parseJSON(xhr.responseText);
						if(obj.result==0){
							  divStatus.innerHTML= obj.message;	
						}else{
							
							  divStatus.innerHTML="Patient Updated";
							  alert("You have successfully update the patient Info");
							  location.reload();
						}
			} 


			function editPatient(val,modal){

				modal.style.display="none";
 				var vpatientID=document.getElementById("patientID"+val).value;
 				var vusername=document.getElementById("username"+val).value;
 				var vfirstname=document.getElementById("firstname"+val).value;
 				var vlastname=document.getElementById("lastname"+val).value;
 				var vgender=document.getElementById("gender"+val).value;
 				var vnationality=document.getElementById("nationality"+val).value;
 				var vinsurance_type=document.getElementById("insurance_type"+val).value;
 				var vdob=document.getElementById("dob"+val).value;
 				var vgroupName=document.getElementById("group_name"+val).value;
 				var vphone_number=document.getElementById("phone_number"+val).value;
 				var vemail=document.getElementById("email"+val).value;

				var pageURL = "editAjax.php?command=1&patientID="+vpatientID+"&username="+vusername+"&firstname="+vfirstname+ "&lastname="+vlastname
							  +"&gender="+vgender+"&nationality="+vnationality+"&insurance_type="+vinsurance_type+"&dob="+vdob+ "&group_name="
							  +vgroupName+"&phone_number="+vphone_number+"&email="+vemail;	  
					$.ajax(pageURL, 
			   			{
			   			 async:true, 
			   			 complete:editPatientComplete
			   			}
					);

			}

		</script>
	</head>
	<body>
		<div class="status" id="divStatus"></div> 
		<table>
			<tr>
				<td colspan="2" id="pageheader">
				<div id="div7"> <img src="logo.png" height="60"/> </div>
					<font color="white">Ashesi Health Center</font>
					<!--Links to the other application pages-->
					<ul>
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

<?php

	 $col1 = "#993333";
	// Echo the table header
	echo "<table border='1'><tr bgcolor=$col1>
					<th><font color = 'white'>Patient ID</font></th>
					<th><font color = 'white'>Username</font></th>
					<th><font color = 'white'>Firstname</font></th>
					<th><font color = 'white'>Lastname</font></th>
					<th><font color = 'white'>Gender</font></th>
					<th><font color = 'white'>Nationality</font></th>
					<th><font color = 'white'>Insurance Type</font></th>
					<th><font color = 'white'>Date of Birth</font></th>
					<th><font color = 'white'>Group</font></th>
					<th><font color = 'white'>Phone Number</font></th>
					<th><font color = 'white'>Email</font></th>
					<th><font color = 'white'>Update this Patient</font></th>
							</tr>";
				
	//1) Create object of patients class
	include_once "patients.php";
	$patients = new patients();


	$patientID = "";
						$username="";
						$firstname="";
						$lastname="";
						$gender="";
						$nationality="";
						$insurance_type="";
						$dob="";
						$phone_number="";
						$email="";
						$group_name=1;
	
	//2) Call the object's getPatients method and check for error
	if (!$patients->getPatients()){
		echo "error getting patient";
	}
	//check if there is any thing in the textbox
	else if(isset($_REQUEST['txtSearch'])){
		//call the database and check if the patient exists
		$search = $_REQUEST['txtSearch'];
		$result=$patients->searchPatients($search);
	}
	 
	// create an increment to change the value of modal and button each time the table loops				
	$I=0;
	// else if the search textbox is empty dispay all patients in a table form
	while($row=$patients->fetch()){
          //$patientID,$username,$firstname,$lastname,$gender,$nationality,$insurance_type,
          //$dob,$group,$phone_number,$email, update button
	$I=$I+1;
		echo"<tr><td style = 'background-color: white '>{$row["patient_id"]}</td>
				<td style = 'background-color: white '>{$row["username"]}</td>
				<td style = 'background-color: white '>{$row["firstname"]}</td>
				<td style = 'background-color: white '>{$row["lastname"]}</td>
			   	<td style = 'background-color: white '>{$row["gender"]}</td>
				<td style = 'background-color: white '>{$row["nationality"]}</td>
				<td style = 'background-color: white '>{$row["insurance_type"]}</td>
				<td style = 'background-color: white '>{$row["dob"]}</td>
				<td style = 'background-color: white '>{$row["groupName"]}</td>
				<td style = 'background-color: white '>{$row["phone_number"]}</td>
				<td style = 'background-color: white '>{$row["email"]}</td>
				<td style = 'background-color: white '>"
				?>
				<!--An update button is placed in the table, when licked a modal pops ups to allow the nurse to modify the patients Information-->
				<!-- Trigger/Open The Modal -->
				
				<button id="<?php echo "myButton".$I; ?>" value ="<?php echo $row["patient_id"] ;?>" onclick="openModal('<?php echo "myButton".$I; ?>','<?php echo "myModal".$I; ?>','<?php echo "close".$I; ?>')">Update</button>

				<!-- The Modal -->
				<div id="<?php echo "myModal".$I; ?>"  value ="<?php echo $row["patient_id"] ;?>" class="modal">

  				<!-- Modal content -->
  				<div class="modal-content">
   					<div class="modal-header">
     					<button id="<?php echo "close".$I; ?>">Exit</button>
     				    <h2>Update Patient's Personal Information</h2>
   					</div>
   					<div class="modal-body">
   							<!-- Create a form in the modal in order to modify patients personal information-->
				   				<div>Patient's ID : <input type="text" id="<?php echo "patientID".$I; ?>" name="patientID" value="<?php echo $row["patient_id"]; ?>" readonly/> </div>  
				   				<br>               
				   				<div> Username: <input type="text" id="<?php echo "username".$I; ?>" value="<?php echo $row["username"];?>"/></div>
				  				<br> 
				  				<div>First Name: <input type="text" id="<?php echo "firstname".$I; ?>" value="<?php echo $row["firstname"];?>"/></div>
				   				<br> 
				   				<div>Last Name: <input type="text" id="<?php echo "lastname".$I; ?>" value="<?php echo $row["lastname"];?>"/></div>
				   				<br> 
				   				<div>Gender:<?php $default_gender = $row["gender"]?>
				  				  <select id="<?php echo "gender".$I; ?>">
				  					<option value='<?php echo $default_gender?>' selected='selected'><?php echo $default_gender?></option>
				  					<option value="1">Male</option>
									<option value="2">Female</option>
				   				  </select>
				   				</div>
				   				<br>                  
				  				<div> Nationality: <input type="text" id="<?php echo "nationality".$I; ?>" value="<?php echo $row["nationality"] ?>"/></div>
				   				<br>
				   				<div>Insurance Type:<?php $default_insurance_type = $row["insurance_type"]?>
				  				  <select id="<?php echo "insurance_type".$I; ?>">
				  					<option value='<?php echo $default_insurance_type?>' selected='selected'><?php echo $default_insurance_type?></option>
				  					<option value="1">MedEx</option>
									<option value="2">NHIS</option>
				   				  </select>
				   				</div>
				   				<br> 
				   				<div>Date of Birth: <input type="date" id="<?php echo "dob".$I; ?>" value="<?php echo $row["dob"] ?>" pattern="/^(18|20)\d{2}$\/(0[1-9]|1[0-2])\/(0[1-9]|1\d|2\d|3[01])/"/></div>
				   				<br>
				   				<div>Phone Number: <input type="text" id="<?php echo "phone_number".$I; ?>" value="<?php echo $row["phone_number"] ?>"/></div>
				   				<br> 
				   				<div>Email Address: <input type="text" id="<?php echo "email".$I; ?>" value="<?php echo $row["email"] ?>"/></div>
				   				<br> 
				   				<div>Patient's Group: <?php $default_group_name= $row["group_name"] ?>
				   				  <select id="<?php echo "group_name".$I; ?>">
    								<option value='<?php echo $default_group_name?>' selected><?php echo $row["groupName"]?></option>
									<?php
									 //Call and create an object of the patientGroup class
	 								include_once("patientGroup.php");
	 								$group_name= new patientGroup();
									 $result=$group_name->getAllPatientGroup();
		 							 	//if unable to get patientGroup print false
										if($result==false){
			  								echo "result is false";
	 									//else display the array in groupName
		 								}else{
			  								while($row=$group_name->fetch()){
				   								echo "<option value='{$row['groupID']}'>{$row['groupName']}</option>";
			  							}
									}
		 							//display in loop
									?>                  
								  </select>
				    			</div>
				    			
				   				
				   		      <button name="update" onClick="editPatient(<?php echo $I ?>, <?php echo "myModal".$I; ?>)">Update</button>


    				</div>
    				<div class="modal-footer">
      					<h3>Modal Footer</h3>
    				</div>
  				</div>

				</div>
				<?php 
					echo"</td>
					</tr>";}
				?>	

		<script>

		function openModal(id,modal,close){
		 //Get the modal
		var modal = document.getElementById(modal);
		

		// Get the button that opens the modal
		var btn = document.getElementById(id);
		

		// When the user clicks the button, open the modal 
		btn.onclick = function() {
 		   modal.style.display = "block";
		}

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
    		if (event.target == modal) {
        		modal.style.display = "none";
    		}
		}	
			var span = document.getElementById(close);
			span.onclick = function() {
    		modal.style.display = "none";
		}
		}
		
		</script>					
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
					<div class="menuitem"><a href="http://www.ashesi.edu.gh/student-life-5/health-and-wellbeing.html"><font color = 'white'>More Info</font></a></div>
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
<?php
//  session_destroy();
?>
