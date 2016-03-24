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
						<div id="div7"> <img src="C:\xampp\htdocs\Codes\code sample for practical\New folder\logo.jpg" height="80"/> </div>
							Ashesi Health Center
						</td>
					</tr>
					<tr>
						<td id="mainnav">
							<div class="menuitem"><a href="http://mail.office365.com/"> Send us an email </a></div>
							<div class="menuitem"><a href="http://www.ashesi.edu.gh/student-life-5/health-and-wellbeing.html">
								More info</a></div>
							<div class="menuitem"><a href="http://www.who.int/topics/en/"> Health News</a></div>
						</td>
						<td id="mainnav1">
							<!--Home Page-->
							<div id="divPageMenu">
								<span class="menuitem1" >Welcome to Ashesi Clinic Home Page</span>		
							</div>
							<div id="divContent">
							<!--Links to the rest of the functional requirements -->
							<div id="div2"> <a href="loginPage.php"> <h2 >Add New User</h2> </a> </div> 
							<div id="div3"> <a href="loginPage.php"> <h2>Edit User</h2> </a> </div> 
							<div id="div4"> <a href="loginPage.php"> <h2> Update</h2> </a> </div> 
							<div id="div5"> <a href="searchpage.php"> <h2>view Patient Record: </h2> </a> </div>
							</div>
						</td>
						
					</tr>
                    		
	
				</table>
			</body>

		</html>	
						
					


	



       <html>
        <head>
           <style>

form { width: 400px; }

label { float: left; width: 150px; }

input[type=text] { float: left; width: 250px; }

.clear { clear: both; height: 0; line-height: 0; }

.floatright { float: right; }

</style>
 
        </head>
        <body>
            <br/>
            
            <table>
            <tr>
                <td>
            <form action="addPatientForm.php" method="GET" >

                    <label for="patientID">Patient ID:</label> <input type="text" name="patientID" /><br></br>
                    <label for="username">User Name:</label> <input type="text" name="username" /><br></br>
                    <label for="firstname">First Name:</label> <input type="text" name="firstname" /><br></br>
                    <label for="lastname">Last Name:</label> <input type="text" name="lastname"/><br></br>
                    <label for="gender">Gender:</label><input type="text" name="gender" /><br></br>
                    <label for="nationality">Nationality:</label> <input type="text" name="nationality" /><br></br>
                    <label for="insuranceType">Insurance Type:</label> <input type="text" name="insuranceType"/> <br></br>
                    <label for="dob">Date of Birth:</label> <input type="text" name="dob"/> <br></br>
                    <label for="patientgroup">Patient Group:</label> <select name="patientgroup">
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
                        <label for="phoneNum">Phone Number:</label> <input type="text" name="phoneNum"/><br></br>
                        <label for="email">Email:</label> <input type="text" name="email" /><br></br>

                        <br class="clear" /> <br />
                            <input type="submit" value="Add">
                </form>	
                           
            </body>
        </html>
<html>
<tr>
						<td colspan="2" id="pagefooter">
						<!--This is the footer page -->
						<footer>
								<p>©Ashesi University College. All rights reserved.</p>
								<p>1 University Avenue, Berekuso; PMB CT 3, Cantonments, Accra, Ghana | Phone: +233.302.610.330</p>
						 </footer>
						</td>
					</tr>	
					
				</table>
			</body>

		</html>	

                        
    <?php
    include_once("addPatient.php");
    
	if(!isset($_REQUEST['patientID'])){
		exit();		
	}
    $obj= new addPatient();
	//print_r($_REQUEST);
    $patientID=$_REQUEST['patientID'];
	$username=$_REQUEST['username'];
	$firstname=$_REQUEST['firstname'];
    $lastname=$_REQUEST['lastname'];
    $gender=$_REQUEST['gender'];
    $nationality=$_REQUEST['nationality'];
    $insurance=$_REQUEST['insuranceType'];
    $dob=$_REQUEST['dob'];
    $group=$_REQUEST['patientgroup'];
    $phone=$_REQUEST['phoneNum'];
    $email=$_REQUEST['email'];

	
	$result = $obj-> newPatient($patientID,$username,$firstname,$lastname,$gender,$nationality,$insurance,$dob,$group,$phone,$email);
	//echo $strQuery;
	if($result != false){
		echo "Data Added";
	}else{
		echo "Error while adding data";
	}
	
	
?>



