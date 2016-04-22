<html>
	<head>
		<title>Ashesi Health Center: Update Patient's Information</title>
		<link rel="stylesheet" href="css/styles.css">
		
		<script type="text/javascript">
			
			function addPatientComplete(xhr,status){
				if(status!="success"){
					divStatus.innerHTML="error while adding a new Patient";
					return;
				}
				add();
				
				}
			
			
            function addPatients (patientID,username,firstname,lastname,gender,nationality,insurance,dob,group,phone,email){
                if($("#ID").val() != ""){
                    var patientID = $( "#ID" ).val();
                } else {
                 alert("PLEASE INCLUDE THE PATIENT ID");
                    return;
                }
                
                if($("#usename").val() != ""){
                    var username = $( "#usename" ).val();
                } else {
                 alert("PLEASE INCLUDE THE PATIENT USERNAME");
                    return;
                }
                
                if($("#first").val() != ""){
                    var firstname = $( "#first" ).val();
                } else {
                 alert("PLEASE INCLUDE THE PATIENT FIRSTNAME");
                    return;
                }
                
                if($("#last").val() != ""){
                    var lastname = $( "#last" ).val();
                } else {
                 alert("PLEASE INCLUDE THE PATIENT LASTNAME");
                    return;
                }
                
                if($("#gen").val() != ""){
                    var gender = $( "#gen" ).val();
                } else {
                 alert("PLEASE INCLUDE THE PATIENT GENDER");
                    return;
                }
            
			    if($("#nat").val() != ""){
                    var firstname = $( "#nat" ).val();
                } else {
                 alert("PLEASE INCLUDE THE PATIENT NATIONALITY");
                    return;
                }
                
                if($("#ins").val() != ""){
                    var firstname = $( "#ins" ).val();
                } else {
                 alert("PLEASE INCLUDE THE PATIENT INSURANCE TYPE");
                    return;
                }
            
                if($("#dob").val() != ""){
                    var firstname = $( "#dob" ).val();
                } else {
                 alert("PLEASE INCLUDE THE PATIENT DATE OF BIRTH");
                    return;
                }
                
                if($("#phone").val() != ""){
                    var firstname = $( "#phone" ).val();
                } else {
                 alert("PLEASE INCLUDE THE PATIENT PHONE NUMBER");
                    return;
                }
                
                if($("#email").val() != ""){
                    var firstname = $( "#email" ).val();
                } else {
                 alert("PLEASE INCLUDE THE PATIENT EMAIL");
                    return;
                }
                
             var group = $( "#group" ).val();
             
                
				var ajaxPageUrl="addPatientServer.php?cmd=1&pd="+patientID+"&un="+username+"&fn="+firstname+"&ln="+lastname+"&gn="+gender+"&nt="+nationality+"&it="+insurance+"&db="+dob+"&gr="+group+"&pn="+phone+"&em="+email;
                
				$.ajax(ajaxPageUrl,
{async:true,complete:addPatientComplete	}	
				);
			}
			
			
			
			
			
			
			
			function add(){
                alert("Added patient");
			}
			
		</script>
      <style>
form { width: 400px; }

label { float: left; width: 150px; }

input[type=text] { float: left; width: 250px; }

.clear { clear: both; height: 0; line-height: 0; }

.floatright { float: right; }

</style>
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
							<span class="menuitem1" >Add New Patient</span>		
						</div>
						
				
        
		<div id="divContent">
            <br/>
            
            <table>
            <tr>
                <td>
            <form action="addPatientajax.php" method="GET" >

                    <label for="patientID">Patient ID:</label> <input type="text" name="patientID" id="ID" maxlength="8" /><br></br>
                    <label for="username">User Name:</label> <input type="text" name="username" id="usename"/><br></br>
                    <label for="firstname">First Name:</label> <input type="text" name="firstname" id="first" /><br></br>
                    <label for="lastname">Last Name:</label> <input type="text" name="lastname" id="last"/><br></br>
                    <label for="gender">Gender:</label><input type="text" name="gender" id="gen" /><br></br>
                    <label for="nationality">Nationality:</label> <input type="text" name="nationality" id="nat" /><br></br>
                    <label for="insuranceType">Insurance Type:</label> <input type="text" name="insuranceType" id="ins"/> <br></br>
                    <label for="dob">Date of Birth:</label> <input type="text" name="dob" id="dob"/> <br></br>
                    <label for="patientgroup">Patient Group:</label> <select id="group" name="patientgroup">
                   
    <?php
        //a call to the class
        include_once("patientGroups.php");
        $usergroup= new patientGroup();
        $result=$usergroup->getAllPatientGroups();
        //echo $strQuery;
        if($result==false){
            //
            echo "result is false";
        }else{
            while($row=$usergroup->fetch()){
                echo "<option value='{$row['groupID']}'>{$row['groupName']}</option>";
            }
        }



    ?>				
                            </select>
                            <br></br>
                        <label for="phoneNum">Phone Number:</label> <input type="text" name="phoneNum" id="phone"/><br></br>
                        <label for="email">Email:</label> <input type="text" name="email" id="email" /><br></br>

                        <br class="clear" /> <br />
                            <input type="submit" value="Add" onClick = addPatients() >
                       
                </form>	
				 </table>  
                    </div>       
           

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
                <script type="text/javascript" src="js/jquery-1.12.1.js"></script>
			 </body>

		</html>	

		