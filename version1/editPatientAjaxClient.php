<html>
<head> </head>
<body>
<script>
function editPatientComplete(xhr, status) {
	if (!status="sucess") {
		divStatus.innerHTML = "Error while updating patient";
		return;
	}
	else {
		divStatus.innerHTML=xhr.responseText;
	}
	
} 

function editPatient(patientID,username,firstname,lastname,gender,nationality,insurance_type,
						dob,group_name,phone_number,email) {
	var pageURL = "editAjax.php?cmd=1&uid="+patientID+"&username="+username+"&firstname="+firstname+ "&lastname="+lastname
	+"&gender="+gender+"&nationality="+nationality+"&insurance_type="+insurance_type+"$dob="+dob+ "&group_name="+group_name
	+"&phone_number="+phone_number+"&email="email;
	$.ajax(pageURL, {async:true, complete:editPatientComplete});
}



</script>

</body>



</html>