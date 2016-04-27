<?php
	session_start();
	session_destroy();
	
	include_once("loginAjaxPage.php");
	
	//header("Location: loginPage.php");
?>