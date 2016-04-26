
<! doctype html>
<html>
	<head>
		<title>Ashesi Health Center: Update Patient's Information</title>
		<link rel="stylesheet" href="css/styles.css">
		<script src="jquery-1.12.1.js"></script>
		<script language = "javascript" type = "text/javascript">
         <!--
			
         //-->
				 /*
		 * This is an ajax function that sends request to the browser
		 */
		 function sendAjaxRequest(myUrl){
			 	
			var obj = $.ajax({url: myUrl, async: false});
		
			var result= $.parseJSON(obj.responseText);
				//alert(result);
		
			return result;
		 }
		 /*
		  * Login function that check the user name and password
		  * entered and display result on the browser for the user to see
		  */
		 function userLogin(){
			 //alert("clicked");
			 var username=$("#username").val();
			 var password=$("#password").val();
			 var url="controller.php?cmd=1&username="+username+"&password="+password;
			//prompt("Url",url		);
			var obj = sendAjaxRequest(url);
			//alert(obj.result);
			if(obj.result==0){
				//alert(result.message);
				alert("Please enter a valid username and password");
				window.location="loginAjaxPage.php";
			}
			else{
				//alert(result.message);
				alert("You have succesfully logged in");
				window.location="newclinicHomePage.php";
			}
		}
      </script>
	</head>
	<body>
		<table>
			<tr>
				<td colspan="2" id="pageheader">
				<div id="div7"> <img src="logo.png" height="60"/> </div>
					<font color="white">Ashesi Health Center</font>
			<!--	<ul>
					<!--Links to important websites-->
			 <!-- <li><a href="newclinicHomepage.php">Home</a></li> -->
			<!--  <li><a href="">Edit Patient</a></li> -->
			 <!-- <li><a href="">View Patient</a></li> -->
			<!--  <li><a href="">Add New Patient</a></li> -->
			<!--  <li><a href="">Add New Diagnosis</a></li> -->
			<!--  <li2 ><a href="logout.php"><font color = 'white'>Logout</font> </a></li2> -->
			<!--</ul> -->
			
				</td>

			</tr>
			<tr>
				
				<td id="content">
					<div id="divPageMenu">
						<span>Login Page</span>		
					</div>
					<div id="divContent">
					
					<div id="divSearch">
					<form>
						Login with your username and password	
					</form>	
					</div>
				<?php include_once("regExpression.php") ?>
				<form name= "myForm"> 
						<div id="div2"> <h2 class="h1color"> 
						<div id="div3"> <h2 class="h1color"> 
						<center> Username</strong>:<input type="username" id="username" name="username" value=""> </center>
						</h2> </div>
						<div id="div4"> <h2 class="h1color"> 
						<center> Password</strong>:<input type="password"  id="password" name="password" value=""> </center> 
						</h2> </div>
						<div id="div5"> <h2 class="h1color"> 
						<center><button type="button" onclick="	userLogin()" > Login</button> </center>
						</div></h2> 
						
				</form> 
				<!--<div id= "ack">Your result is shown here</div> -->
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
			
						<?php echo '<a href="logout.php">Logout </a>' ?>
						<p>©Ashesi University College. All rights reserved.</p>
						<p>1 University Avenue, Berekuso; PMB CT 3, Cantonments, Accra, Ghana | Phone: +233.302.610.330</p>
				 </footer>
				</td>
			</tr>	
			
		</table>
	</body>
</html>	
