<?php
// create connection to the database
	$host="localhost"; // Host name
	$username="root"; // Mysql username
	$password="C5ZQ3E6CBKTH"; // Mysql password
	$db_name="ashesics_francis_yinbil"; // Database name


	// check connection
	mysql_connect("$host", "$username", "$password")or die("cannot connect");
	mysql_select_db("$db_name")or die("cannot select DB");
?>