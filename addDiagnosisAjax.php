
<?php
session_start();
if (!isset($_SESSION['id'])) {
	header("Location: clinic.php");
}
	
?>

<html>

<head> 
		<title>Ashesi Health Center: Patient's History</title>
		<link rel="stylesheet" href="css/styles.css">
		<script type="text/javascript" src="js/jquery-1.12.1.js"></script>
		<script>
			<!--add validation js script here
			function addDiagnosisComplete(xhr,status) {
				//alert("reached-1");
				if (status!="success") {
					alert("reached-2");
					//console.log(xhr.responseText)
					divSearch.innerHTML = "Could not add Diagnosis for";
					return;
				}
				//alert("reached-3");
				var obj = $.parseJSON(xhr.responseText);
				//console.log(xhr.responseText)
				//alert(obj.text);
				divSearch .innerHTML = obj.message;
			}
			
			function addDiagnosis() {
				
				date = $("#date").val();
				temp = $("#temp").val();
				sp = $("#sp").val();
				pulse = $("#pulse").val();
				bp = $("#bp").val();
				comp = $("#comp").val();
				treat = $("#treatment").val();
				rmk = $("#rmk").val();
				pid = $("#pid").val();
				
				pageUrl = "nurseAjax.php?cmd=2&date="+date+"&temp="+temp+"&sp="+sp+"&pulse="+pulse+"&bp="+bp+"&com="+comp+"&treat="+treat+"&rmk="+rmk+"&p_id="+pid;
				//prompt('url',pageUrl);
				$.ajax(pageUrl,
				{async:true,complete:addDiagnosisComplete}	
				);
			}
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
		      <li2><a href="logout.php"><font color = 'white'>Logout</font> </a></li2>
			</ul>
				</td>

			</tr>
			<tr>
				<!--Links to important websites-->
				
				<td id="content">
						<div id="divPageMenu">
							<span class="menuitem1" >Add New Diagnosis</span>		
						</div>
						<div id="divContent">  
						<span id= "divSearch">
						 Click Here To Add New Diagnosis for </span> <?php
						$name = $_SESSION['name'];
						echo "<span style='font-family: times;font-size: 20px;'> {$name} </span>";
						?>
						<!--<a href = 'Diagnosis.php'> Add New Diagnosis </a>
						For-->
		
						<center>
					<table style=font-family: times;font-size: 20px>	
				 <tr> <td><label for="pid"> Patient ID</label></td>
				 <td><input type = "text" id = "pid" value= "<?php echo $_SESSION['id']?>" readonly></td></tr>
				 
				<tr> <td><label for="date"> Date </label></td>           
				<td><input type = "date" id = "date"></td></tr>

				<tr> <td><label for="temp"> Temperature </label></td> 
				<td><input type = "text" id = "temp"></td></tr>

				<tr> <td><label for="sp"> SpO2 </label></td>
				<td><input type = "text" id = "sp"></td></tr>

				<tr> <td><label for="pulse"> Pulse </label></td> 
				<td><input type = "text" id = "pulse"></td></tr>

				 <tr> <td><label for="bp"> Blood Pressure </label></td>
				<td><input type = "text" id = "bp"></td></tr>

				<tr> <td><label for="comp">Complaint </label></td>
				<td><input type = "text" id = "comp"></td></tr>

				<tr> <td><label for="treatment"> Treatment </label></td> 
				<td><input type = "text" id = "treatment"></td></tr>

				<tr> <td><label for="rmk">Remark </label></td>
				<td><input type = "text" id = "rmk"></td></tr>
				</table>

						<button onclick ="addDiagnosis()">Add</button><br><br>
			</center>
<center>
	<table border = '1' >
		<tr bgcolor = #993333>
		<th><font color = white> Date </font></th>
		<th><font color = white> Patient's ID </font></th>
		<th><font color = white> Temperature </font></th>
		<th><font color = white> SPO2 </font></th>
		<th><font color = white> Pulse </font></th>
		<th><font color = white> BP </font></th>
		<th><font color = white> Complaints </font></th>
		<th><font color = white> Treatment </font></th>
		<th><font color = white> Remark/Review </font></th>
		</tr>			
						
	</center>			
<?php
		
		include_once("nurse.php");
		$obj = new nurse();
		$history = $obj->getPatientHistory($_SESSION['id']);
		if (!$history) {
			header("Location: Diagnosis.php"); 
			
		}
		else {
			$row = $obj->fetch();
			while ($row) {
				echo "<tr bgcolor = white>
				<td> {$row['diagnosedate']} </td>
				<td> {$row['specificPatient_id']}</td>
				<td> {$row['temp']} </td>
				<td> {$row['spO2']} </td>
				<td> {$row['pulse']} </td>
				<td> {$row['bloodPressure']} </td>
				<td> {$row['complaints']} </td>
				<td> {$row['treatment']} </td>
				<td> {$row['remark']} </td>
				</tr>";
				$row=  $obj->fetch();
			}
		}
?>

</div>
</td>
</tr>
</table>
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