
<?php
	if($_POST){
		$username = $_POST['username'];
		$password = $_POST['password'];

		// Usename can contain a minimum of 2 characters and maximum of 20 characters
		if (eregi('^[A-Za-z0-9_]{3,20}$',$username)){
			$valid_username=$username;
		}else{
			$error_username='Enter valid Username min 3 Chars.';
		}

		// Password can contain a minimum of 2 characters and maximum of 20 characters
		if (eregi('^[A-Za-z0-9!@#$%^&*()_]{5,20}$',$password)){
			$valid_password=$password;
		}else{
		 $error_password='Enter valid Password min 6 Chars.';
		}
		

		if((strlen($valid_username)>0)&&(strlen($valid_password)>0)){
			mysql_query(" SQL insert statement ");
			header("Location: loginAjaxPage.php");
		}
	else{ 
	}

}
?>