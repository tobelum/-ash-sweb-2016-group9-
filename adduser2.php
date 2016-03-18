<html>
	<head>
	</head>
	<body>
		<form action="adduser2.php" method="GET">
			<div>Username: <input type="text" name="username"/></div>
			<div>Password: <input type="password" name="pword"/></div>
			<div>
	<!--In this example the checkboxes are independent inputs-->
				Permission :<input type="checkbox" value="1" name="pview"> View
<input type="checkbox" value="2" name="pview"> Edit
<input type="checkbox" value="4" name="pview"> Delete				
			</div>
			<div>User Group: 
				<select name="usergroup">
<?php
	//connect
	$db=new mysqli("localhost","root","","my_courseware");
	if($db->connect_errno){
		//no connection, exit
		exit();
	}
	
	//query
	$strQuery="select USERGROUP_ID,GROUPNAME from usergroups";
	$result=$db->query($strQuery);
	//echo $strQuery;
	if($result==false){
		//
		echo "result is false";
	}else{
		//fetch
		$row=$result->fetch_assoc();
		//print_r($row);
		while($row){
			echo "<option value='{$row['USERGROUP_ID']}'>{$row['GROUPNAME']}</option>";
			$row=$result->fetch_assoc();
		}
	}
	
	//display in loop
?>				
				</select>
			</div>
			<input type="submit" value="Add">
		</form>	
	</body>
</html>

<?php
	if(!isset($_REQUEST['username'])){
		exit();		//if no data, exit
	}
	print_r($_REQUEST);
	$username=$_REQUEST['username'];
	$usergroup=$_REQUEST['usergroup'];
	$pword=$_REQUEST['pword'];
    
	$db=new mysqli("localhost","root","","my_courseware");
	if($db->connect_errno){
		//no connection, exit
		exit();
	}
	$strQuery=("insert into admin SET user_name='$username',
                                First_name='none',
                                Last_name='none',
                                pword=MD5('$pword'),
                                user_group=$usergroup");

	//echo $strQuery;
	if($db->query($strQuery)){
		echo "Data Added";
	}else{
		echo "Error while adding data";
	}
	
	
?>