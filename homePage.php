<html>
	<head>
		<title> User Interface Design </title>
		<link rel="stylesheet" href="css/style1.css">
	</head>
	<body>
		<header id="pageheader">
			<div>
			<h1 style="text-align:left; font-size:80%;">You are logged in as UserUnknown</h1>
			<h2 style="color:black; font-family:castellar; font-size:180%; text-align:center;">ASHESI HEALTH CENTER</h2>
			</div>
		</header>
		<table id="menubar"><tr>
				<td class="menuitem"><a href="loginPage.php">Home</a></td>
				<td class="menuitem"><a href="addPatientForm.php"> Register Patient </a> </td>
				<td class="menuitem"><a href="patientsHomepage.php"> Update Patient's Info</a></td>
				<td class="menuitem"><a href="clinic.php">Patient Diagnosis </a> </td>
				<td class="menuitem"><a href="searchpage.php"> View Patient  </a></td>
				<td class="menuitem"><a href="logout.php"> Logout</a></td>
			</tr>
		</table>
		<table>
			
			<tr>
				<td id="sidebar">
					<div class="menuitem"><a href="http://mail.office365.com/"> Send us an email </a></div>
					<div class="menuitem"><a href="http://www.ashesi.edu.gh/student-life-5/health-and-wellbeing.html">
						More info</a></div>
					<div class="menuitem"><a href="http://www.who.int/topics/en/"> Health News</a></div>
				</td>
				
				<td id="content">
				<div id="titlebar">Welcome to Home Page</div>
				</td>
				
			</tr>
		</table>
		<footer id="pagefooter">
			<?php echo '<a href="logout.php">logout </a>'; ?>
			<p>©Ashesi University College. All rights reserved.</p>
			<p>1 University Avenue, Berekuso; PMB CT 3, Cantonments, Accra, Ghana | Phone: +233.302.610.330</p>
		</footer>
	</body>
</html>