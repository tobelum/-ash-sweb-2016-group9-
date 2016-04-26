<?php
	session_start();
	session_destroy();
	
	include_once("loginPage.php");
	
	//header("Location: loginPage.php");
?>