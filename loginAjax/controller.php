<?php 

	/**
		*Start a session before proceding
	*/
		session_start();

		if(!isset($_REQUEST['cmd'])){
		  echo '{"result": 0, "message": "Unknown command"}';
		  return;
		}
	/**
		*Check command
		*@param cmd
	*/
		$cmd = $_REQUEST['cmd'];

		switch ($cmd) {
		  case 1:
		  Login(); // call the login functio
		  break;

		  default:
		  echo '{"result": 0, "message": "Unknown command"}';
		  return;
		  break;
		}

	/**
		*Login function that enables you login with your username and password
		*@return boolean ture if connected else false
	*/
		function Login(){
			
			//check if there is a user code
				if(!isset($_REQUEST['username'])&& !isset($_REQUEST['password'])){
					echo "username & password not given";	//change to json message	
					exit();
				}
		  // include the users file		
		  include "users.php";

		  $myuser = new users();

		  $username = $_GET['username'];
		  $password = $_GET['password'];
		  $password_hash= MD5($password); // password is encrypted
		  $myuser->Login($username, $password_hash);
		  $row=$myuser->fetch();

		  if($row){
			session_destroy(); 
			session_start(); // start session here

			$_SESSION['username'] = $username;
			echo '{"result": 1, "user": [';
			while($row){
			  echo json_encode($row);
			  $row = $myuser->fetch();
			  if($row){
				echo ',';
			  }
			}
			echo "]}";
			return; 
		  }
		  echo '{"result": 0, "message": "Wrong details! Please try again"}';
		  return;

		}

	/**
		*Logout fumction that enable a user to sign out 
	*/
		function logout(){

		  if(!$_SESSION['username']){
			echo '{"result": 0, "message": "User not loged in"}';
			return;
		  }
		  else{
			session_destroy();
			echo '{"result": 1, "message": "Loged out successfully"}';
			return;
		  }
		}
		
	


	/**
		*Connect to database 
	*/
		function getuserSession(){
		  if(!$_SESSION["username"]){
			echo '{"result": 0, "message": "No session stored"}';
			return;  
		  }
		  echo '{"result": 1, "message": "'.$_SESSION["username"].'"}';

		  return;

		}
?>
