    <html>
        <head>
            
        </head>
        <body>
            
            <table>
            <tr>
                <td>
            <form action="addPatientForm.php" method="GET" align = middle>

                <div>Patient ID: <input type="text" name="patientID" </div><br></br>
                    <div>User Name: <input text-align="right" type="text" name="username" </div><br></br>
                    <div>First Name: <input type="text" name="firstname" </div><br></br>
                    <div>Last Name: <input type="text" name="lastname" </div> <br></br>
                    <div>Gender: <input type="text" name="gender" </div><br></br>
                    <div>Nationality: <input type="text" name="nationality" </div><br></br>
                    <div>Insurance Type: <input type="text" name="insuranceType" </div><br></br>
                    <div>Date Of Birth: <input type="text" name="dob" </div> <br></br>
                     <div>Group Type: <select name="patientgroup">
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
                            </div><br></br>
                    <div>Phone Number: <input type="text" name="phoneNum" </div><br></br>
                        <div>Email: <input type="text" name="email" </div> <br></br>


                            <input type="submit" value="Add">
                </form>	
                           
            </body>
        </html>
        
         <?php
    include_once("addPatient.php");
    
	if(!isset($_REQUEST['patientID'])){
		exit();		
	}
    $obj= new addPatient();
	print_r($_REQUEST);
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

