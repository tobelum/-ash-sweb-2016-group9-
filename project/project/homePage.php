<! doctype html>
<html>

<head>
	<title> 
		Ashesi Clinic Home Page
	</title>
	
	<style type="text/css">
		body{background-color:#ff0033;
			padding-bottom: 20px;
			padding-top:20px;
			padding-left:20px;
			padding-right:20px;
		}
		h1{	text-align:center;
			background-color:yellow;
			border-bottom-color:green;
			border-bottom-style:dotted;
			border-bottom-width:4px;	
		}
		h2{position:20px;
			text-align: center-left;
		}
		a:link{color:green; text-decoration:none;}
		a:visited{color:blue;}
		a:hover{color:white; text-decoration:underline; background-color: blue; font-weight:bold}
		a:active{background-color:orange}
		div{border:2px solid red; position: absolute; width:100px;left:50px;}
		
		.h1color {color:black; text-align: left-side;}
		
		#div1{border:green; position:absolute; top:300px; left:25px;}
		#div2{border:green; position:absolute; top:300px; left:200px;}
		#div3{border:green; position:absolute; top:300px; left:400px;}
		#div4{border:green; position:absolute; top:300px; left:600px;}
		#div5{border:green; position:absolute; top:300px; left:800px; width:240px;}
	</style>
</head>
<body>
<img src="index.jpg" height="100"/>
	<h1> <em> Home Page </em> </h1>
	<header>
		<h1> <em> Welcome to Ashesi Clinic</em> </h1>
	</header>
<!-- <h1> <em> Home Page </em> </h1> --> 
	<div id="div1"> <h2 >About AseClinic </h2> </div> 
	<div id="div2"> <h2 >Add New User </h2> </div> 
	<div id="div3"> <h2>Edit User</h2> </div> 
	<div id="div4"> <h2> Update</h2> </div> 
	<div id="div5"> <h2> Delete:
		<form> 
			<select name="Courses Time">
				<option value=""> </option>
				<option value="First Session"> Active</option>
				<option value="Second Session"> Inactive </option>
			</select> 
		</form></h2> </div>
	<br/> <br/>  <br/> <br/> <br/>
	
<?php 
	echo 'You are loggedin. <a href="logout.php"> Log out </a>';
 ?>

</body

</html>