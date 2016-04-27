
<! doctype html>
<html>
	<head>
		<title>Ashesi Health Center: Home Page</title>
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
					<!--Links to important websites-->
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
				
				<td id="content">
					<div id="divPageMenu">
						<span>Home Page</span>		
					</div>
					<div id="divContent">
						<div id="divSearch">
					<form action="" method="GET">
						<p style= "text-align:center; font-size:180%;">Ashesi Health Center </p>
					</form>	
						</div>

				<form action="" method="GET">
						<p style= "text-align:Justify; font-size:180%;" >
							The Ashesi Health Center was established to meet the growing health needs of the student on campus.
							As a result of the increasing number of students as well as staff, health records can therefore not
							be kept manually as mostly done in hospitals and clinics across the country. Hence the need for
							the application.It is needed to help the nurses working in the clinic to keep track of students health records.
						</p>
				</form>					
					</div>
				</td>
			</tr>
	
		</tr>
		
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
