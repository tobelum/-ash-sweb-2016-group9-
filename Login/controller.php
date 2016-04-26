<?php
	//check command
	if(!isset($_REQUEST['cmd'])){
		echo "cmd is not provided";
		exit();
	}
	/*get command*/
	$cmd=$_REQUEST['cmd'];
	switch($cmd){
		case 1:
			loginUser();		//if cmd=1 the call delete
			break;
		case 2:
			changeUserStatus();	//if cmd=2 the change status
			break;
		case 4:
			viewUser();
			break;
		default:
			echo "wrong cmd";	//change to json message
			break;
	}
	
	function loginUser(){
		//check if there is a user code
		if(!isset($_REQUEST['username'])&& !isset($_REQUEST['password'])){
			echo "username & password not given";	//change to json message	
			exit();
		}
		
		$username=$_REQUEST['username'];
		$password=$_REQUEST['password'];
		$password_hash=MD5($password);
		include("users.php");
		$obj=new users();
		//delete the user
		echo("us".$username." pas ".$password_hash);
		$obj->login($username,$password_hash);
			$row=$obj->fetch();
			echo("row: ".$row." obj");
			if($row){
			echo '{"result":1,"message":"Login succesfull"}';
			return;
			}	
			else{
			echo '{"result":0,"message":"invalid username or password"}';
			return;
		}
		
	}
	
	

?>