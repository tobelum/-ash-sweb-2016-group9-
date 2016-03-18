<?php
	// check if session is not registered, redirect back to login page
	// put this code in first line of web page.
	session_start();
	if(isset($_SESSION ['$user_id']) && !empty($_SESSION['$user_id'])){
		//header("location:loginPage.php");
		echo "You are not successfully logged in";
	} else{
		include_once("clinicHomePage.php");
	}
	
?>

<!--
<html>
	<body>
		<script type="text/javascript" language="javascript">
			function enterValidUser(){
				alert("Login Successful")
			}
			enterValidUser();
		</script>
		<?php //include_once("clinicHomePage.php") ?>
	</body>
</html>
-->