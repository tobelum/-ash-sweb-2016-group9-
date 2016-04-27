<?php
	/**
	*/
	include_once("adb.php");
	/**
	*Users  class
	*/
	class users extends adb{
		function users(){
		}
		/**
		*Adds a new user
		*@param string username login name
		*@param string firstname first name
		*@param string lastname last name
		*@param string password login password
		*@param string usergroup group id
		*@param int permission permission as an int
		*@param int status status of the user account
		*@return boolean returns true if successful or false 
		*/
		function addUser($nurse_id, $username,$firstname='none',$lastname='none',$phone_number='none',$working_hours='none',$email='none', $password='none'){
			$strQuery="insert into nurse set
							nurse_id = 'nurse_id',
							username='$username',
							firstname='$firstname',
							lastname='$lastname',
							phone_number='$phone_number'
							working_hours='$working_hours',
							email='$email',
							password=MD5('$password')";
			return $this->query($strQuery);				
		}
		/**
		*gets user records based on the filter
		*@param string mixed condition to filter. If  false, then filter will not be applied
		*@return boolean true if successful, else false
		*/
		function login($username,$password){
			$strQuery="select firstname, lastname
			FROM nurse
			WHERE username='$username'
			AND  password='$password'";
			
			//echo $strQuery;
			return $this->query($strQuery);
		}
		
		
	}
	/*
	$obj=new users();
	$row=$obj->getUser(2);
	print_r($row);
	*/
?>




