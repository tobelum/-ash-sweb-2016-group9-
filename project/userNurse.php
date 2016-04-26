<?php
/**
*/
include_once("adb.php");
/**
*Users  class
*/
class userNurse extends adb{
	function userNurse(){
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
	// nurse_id, username, firstname,lastname, phone_number, working_hours, email, password
	/**
	*gets user records based on the filter
	*@param string mixed condition to filter. If  false, then filter will not be applied
	*@return boolean true if successful, else false
	*/
	function getUsers($filter=false){
		$strQuery="select nurse_id, username, firstname,lastname, phone_number, working_hours, email, password from nurse ";
		if($filter!=false){
			$strQuery=$strQuery . " where $filter";
		}
		//echo "$strQuery";
		return $this->query($strQuery);
	}
	
	/**
	*Searches for user by username, fristname, lastname 
	*@param string text search text
	*@return boolean true if successful, else false
	*/
	function searchUsers($text=false){
		$filter=false;
		if($text!=false){
			$filter=" username like '$text' or firstname like '$text' or lastname like '$text' ";
		}
		
		return $this->getUsers($filter);
	}
	
	/**
	*delete user
	*@param int usercode the user code to be deleted
	*returns true if the user is deleted, else false
	*/
	function deleteUser($usercode){
		/*Compelete the function*/
		$strQuery = "delete from nurse where nurse_id=$usercode ";
		
		return $this->query($strQuery);
		
		
	}
	
	/**
	*Edit a user
	*@param string username login name
	*@param string firstname first name
	*@param string lastname last name
	*@param string password login password
	*@param string usergroup group id
	*@param int permission permission as an int
	*@param int status status of the user account
	*@return boolean returns true if successful or false 
	*/
	function editUser($username,$firstname='none',$lastname='none', $phone_number='none',$working_hours='none',$email='none', $password='none'){
		$strQuery="update nurse set
						username='$username',
						firstname='$firstname',
						lastname='$lastname',
						phone_number='$phone_number'
						working_hours='$working_hours',
						email='$email',
						password=MD5('$password')";
		return $this->query($strQuery);				
	}

}
?>