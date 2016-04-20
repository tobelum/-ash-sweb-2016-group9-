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
				<!--Links to important websites-->
				
				<td id="content">
						<div id="divPageMenu">
							<span class="menuitem1" >Update Patient's Personal Information</span>		
						</div>
						<div id="divContent">
						<?php
				   //initialize
				   //$strStatusMessage ="Edit Patient";
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
						$group_name=0;
					
				  
		  if(isset($_REQUEST['patientID'])){
						$patientID = $_REQUEST['patientID'];
						$username=$_REQUEST['username'];
						$firstname=$_REQUEST['firstname'];
						$lastname=$_REQUEST['lastname'];
						$gender=$_REQUEST['gender'];
						$nationality=$_REQUEST['nationality'];
						$insurance_type=$_REQUEST['insurance_type'];
						$dob=$_REQUEST['dob'];
						$phone_number=$_REQUEST['phone_number'];
						$email=$_REQUEST['email'];
						$group_name=$_REQUEST['group_name'];

				   }
			  
						if(isset($_REQUEST['update'])){

						// happens after clicking edit
						include_once("patients.php");
						$obj=new patients();
						$r=$obj->editPatient($patientID,$username,$firstname,$lastname,$gender,$nationality,$insurance_type,
						$dob,$group_name,$phone_number,$email);
						//1) what is the purpose of this if block
						if($r==false){
							 $strStatusMessage="error while editing user";
						}else{
							header("Location:patientsHomepage.php");
							 $strStatusMessage="$username edited";
						}

				   }
								  
				   
	?>
							 <div id="divStatus" class="status">
								  <?php //echo  $strStatusMessage ?>
							 </div>
							 <div id="divContent">
								  To update click on input boxes:
								  
	<BR>
		 
			<form action="" method="GET">
				   <div>Patient's ID : <input type="text" name="patientID" value="<?php echo $patientID; ?>" readonly/> </div>  
				   <br>               
				   <div> Username: <input type="text" name="username" value="<?php echo $username; ?>"/></div>
				   <br> 
				   <div>First Name: <input type="text" name="firstname" value="<?php echo $firstname; ?>"/></div>
				   <br> 
				   <div>Last Name: <input type="text" name="lastname" value="<?php echo $lastname; ?>"/></div>
				   <br> 
				   <div>Gender:<?php $default_gender = $gender;?>
				  	<select name="gender">
				  		<option value='<?php echo $default_gender?>' selected='selected'><?php echo $default_gender?></option>
				  		<option value="1">Male</option>
						<option value="2">Female</option>
				   	</select>
				   </div>
				   <br>                  
				   <div> Nationality: <input type="text" name="nationality" value="<?php echo $nationality; ?>"/></div>
				   <br>
				   <div>Insurance Type:<?php $default_insurance_type = $insurance_type;?>
				   	<select name='insurance_type'>
    					<option value='<?php echo $default_insurance_type?>' selected='selected'><?php echo $default_insurance_type?></option>
   				    	<option value='1'>MedEx</option>
    					<option value='2'>NHIS</option>
					</select>
				   </div>
				   <br> 
				   <div>Date of Birth: <input type="date" name="dob" value="<?php echo $dob; ?>"/></div>
				   <br> 
				   <div>Phone Number: <input type="text" name="phone_number" value="<?php echo $phone_number; ?>"/></div>
				   <br> 
				   <div>Email Address: <input type="text" name="email" value="<?php echo $email; ?>"/></div>
					<div>Patient's Group::<?php $default_group_name = $group_name;?>
				   	<select name='group_name'>
    					<option value='<?php echo $default_group_name?>' selected='selected'><?php echo $default_group_name?></option>
	<?php
		 //a call to the class
		 include_once("patientGroup.php");
		 $group_name= new patientGroup();
		 $result=$group_name->getAllPatientGroup();
		 //echo $strQuery;
		 if($result==false){
			  //
			  echo "result is false";
		 }else{
			  while($row=$group_name->fetch()){
				   echo "<option value='{$row['groupID']}'>{$row['groupName']}</option>";
			  }
		 }
		 
		 //display in loop
	?>                  
						</select>
				   </div>


				<Script>
					function updatePatient(){
						alert("You have successfully update the patient Info")
					}
					//updatePatient();
				</script>

				   <input type="submit" value="Update" name="update" onClick="updatePatient()"> </input>
			</form>                                 
			  </div>
						
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


