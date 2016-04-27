<html>

<head> 
		<title>Ashesi Health Center: Add New Diagnosis</title>
		<link rel="stylesheet" href="css/styles.css">
		<script>
			<!--add validation js script here
		</script>
		</head>

<head> <title> AshClinic </title> </head>


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
		      <li><a href="logout.php"><font color = 'white'>Logout</font> </a></li>
			</ul>
				</td>

			</tr>
			<tr>
				<!--Links to important websites-->
				
				<td id="content">
						<div id="divPageMenu">
							<span class="menuitem1" >Search For a Patient</span>		
						</div>
						<div id="divContent">

<center>
<form method="GET", action="clinic.php">

<label for="id"> Enter Patient's ID </label>
<input type = "text" name = "id">
					<input type = "submit", value = "Search">
					</form>
					
					</center>
					<?php
include_once ("nurse.php");
if (isset($_REQUEST['id'])) {
	$pid = $_REQUEST['id'];
	$nurse = new nurse();
	$patientData = $nurse->patientExists($pid);
	
	//print_r($data);
	
	if (!$patientData) {
		echo "Please Enter a Valid ID";
		
		
	}
	else {
		session_start();
		$_SESSION['id'] = $_REQUEST['id'];
		$_SESSION['name'] = $patientData['username'];
		header("Location: addDiagnosisAjax.php");
		}
}
?>
					
					
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
						<p>1 University Avenue, Berekuso; PMB CT 3, Cantonments, Accra, Ghana | Phone: +233 302 610 330</p>
				 </footer>
				</td>
			</tr>	
			
		</table>
</body>


</html>




