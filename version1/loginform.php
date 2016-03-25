<?php
	include_once("db.php");

	//check username, id and password sent from the form
	if(isset($_POST['username'])&&isset($_POST['password'])){
		$username=$_POST['username'];
		$password=$_POST['password'];
	
		$password_hash=MD5($password);
		
		if(!empty($username)&& !empty($password)){
			$strQuery= "SELECT firstname, lastname FROM nurse WHERE username='$username' AND password='$password_hash'";
			// variable result holds the outcome of the query
			//echo $strQuery;
			if($result = mysql_query($strQuery)){
				// Mysql_num_row is counting table row
				$num_of_rows = mysql_num_rows($result);
				//check if result matches username and password  , a table of 1 row is shown
				//echo $num_of_rows;
				if($num_of_rows==0){
					echo 'Invalid username or password. <a href="loginPage.php">Go to loginPage </a>';
				}else if($num_of_rows==1){ 
					//allow nurse id or (username and password) and redirect to "login_successful.php"
					echo $num_of_rows;
					$user_id = mysql_result($result, 0, 'id');
					$_SESSION['$user_id']= $user_id;
					header("location:login_successful.php");	
				} 
			}
		}else{ // Mysql_num_row is counting table row
			
			echo 'You must login with your username and password. <a href="loginPage.php">Go to loginPage </a>';
			//header("location:loginPage.php");
		}
	}	
?>
<!--
<html>
	<body>
		<script type="text/javascript" language="javascript">
			function enterValidUser(){
				alert("You must login with your username and password");
				header("location:loginPage.php");
			}
			enterValidUser();
		</script>
		<?php //include_once("clinicHomePage.php") ?>
	</body>
</html>
-->