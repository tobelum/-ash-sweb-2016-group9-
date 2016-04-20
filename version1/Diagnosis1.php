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
						<span class="menuitem1" >Enter Diagnosis Detail and click Add to Submit</span>		
					</div>
					<div id="divContent">
					<!--User login form-->
					<form action="loginform.php" method="post"> 
						Patient ID <input type = "text" name = "pid"><br>
						Date           <input type = "date" name = "date"><br>
						Temperature <input type = "text" name = "temp"><br>
						SpO2 <input type = "text" name = "sp"><br>
						Pulse <input type = "text" name = "pulse"><br>
						Blood Pressure <input type = "text" name = "bp"><br>
						Complaint <input type = "text" name = "comp"><br>
						Treatment <input type = "text" name = "treatment"><br>
						Remark <input type = "text" name = "rmk"><br>

						<input type = "submit" value = "Add"><br>
						
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
	include_once("nurse.php");

	if(!empty($_REQUEST)) {
	$obj = new nurse();

	$p_id = $_REQUEST['pid'];
	$date = $_REQUEST['date'];
	$temp = $_REQUEST['temp'];
	$sp = $_REQUEST['sp'];
	$pulse = $_REQUEST['pulse'];
	$bp = $_REQUEST['bp'];
	$com = $_REQUEST['comp'];
	$treat = $_REQUEST['treatment'];
	$remark = $_REQUEST['rmk'];

	$add = $obj->addNewDiagnosis($date,$temp,$sp,$pulse,$bp,$com,$treat,$remark,$p_id);
	
	if ($add) {echo "Data Sucessfully added";}    
	else {echo "Could not add data";}

	}
	?>