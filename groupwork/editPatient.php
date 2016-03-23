<html>
     <head>
          <title>Edit Patient</title>
          <link rel="stylesheet" href="css/style.css">
          <script>
               <!--add validation js script here
          </script>
     </head>
     <body>
          <table>
               <tr>
                    <td colspan="2" id="pageheader">
                         UPDATE PATIENT'S PERSONAL INFOMATION
                    </td>
               </tr>
               <tr>
                    <td id="mainnav">
                         <div class="menuitem">menu 1</div>
                         <div class="menuitem">menu 2</div>
                         <div class="menuitem">menu 3</div>
                         <div class="menuitem">menu 4</div>
                    </td>
                    <td id="content">
                         <div id="divPageMenu">
                              <span class="menuitem" >Home Page</span>
                              <span class="menuitem" >Add Patient</span>
                              <span class="menuitem" >View All Patients</span>
                              <span class="menuitem" >Add Diagnosis</span>
                              <input type="text" id="txtSearch" />
                              <span class="menuitem">search</span>         
                         </div>
<?php
               //initialize
               $strStatusMessage ="Edit Patient";
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
          
               //1) what is the purpose of this if block
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
                              <?php echo  $strStatusMessage ?>
                         </div>
                         <div id="divContent">
                              TO UPDATE PATIENTS INFORMATION PLEASE CHANGE THE REQUIRED INPUT:
                              
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
               <div>Gender: <select name="gender"><option value="1">Male</option>
                                                  <option value="2">Female</option>
               </select>
               </div>
               <br>                  
               <div> Nationality: <input type="text" name="nationality" value="<?php echo $nationality; ?>"/></div>
               <br> 
               <div>Insurance Type: <select name="insurance_type"><option value="1">MedEx</option>
                                                                  <option value="2">NHIS</option>
               </select>
               </div>
               <br> 
               <div>Date of Birth: <input type="date" name="dob" value="<?php echo $dob; ?>"/></div>
               <br> 
               <div>Phone Number: <input type="text" name="phone_number" value="<?php echo $phone_number; ?>"/></div>
               <br> 
               <div>Email Address: <input type="text" name="email" value="<?php echo $email; ?>"/></div>
    
               <div>Patient's Group: 
                    <select name="group_name">
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




               <input type="submit" value="Update" name="update">
          </form>                                 
                         </div>
                    </td>
               </tr>
          </table>
     </body>
</html>   
