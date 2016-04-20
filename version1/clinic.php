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
				<div id="div7"> <img src="images/logo.jpg" height="80"/> </div>
					<font color="white">  Ashesi Health Center</font>
				</td>
			</tr>
			<tr>
				<!--Links to important websites-->
				<td id="mainnav">
					<div class="menuitem"><a href="http://mail.office365.com/"> Send us an email </a></div>
					<div class="menuitem"><a href="http://www.ashesi.edu.gh/student-life-5/health-and-wellbeing.html">
						More info</a></div>
					<div class="menuitem"><a href="http://www.who.int/topics/en/"> Health News</a></div>
				</td>
				<td id="content">
					<div id="divPageMenu">
						<span class="menuitem1" >Enter a patient ID and begin search</span>		
					</div>
					<div id="divContent">
					<!--User login form-->
					<form action="loginform.php" method="post"> 
						Search for Patient (Enter ID) <input type = "text" name = "id">
						<input type = "submit", value = "Search">
						
					</form>
					
				</td>
			</tr>
			
			<tr>
				<td colspan="2" id="pagefooter">
				<footer>
						<?php echo '<a href="logout.php">logout </a>'; ?>
						<p>©Ashesi University College. All rights reserved.</p>
						<p>1 University Avenue, Berekuso; PMB CT 3, Cantonments, Accra, Ghana | Phone: +233.302.610.330</p>
				 </footer>
				</td>
			</tr>	
			
		</table>
	</body>
</html>





<?php
include_once ("nurse.php");

if (isset($_REQUEST['id'])) {
	$pid = $_REQUEST['id'];
	$nurse = new nurse();
	$patientData = $nurse->patientExists($pid);
	$data = $nurse->fetch();
	
	//print_r($data);
	
	if ($data == false) {
		echo "Please Enter a Valid ID";
		
		
	}
	else {header("Location: Diagnosis1.php");}
}

?>
