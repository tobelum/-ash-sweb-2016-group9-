<html>

<head> <title> Add New Diagnosis </title> </head>
<body>
<h1> Enter Diagnosis Detail and click Add to Submit</h1>
<form method = "post", action = "">
 Diagnoses ID<input type = "number" name = "id"><br>
 Patient ID <input type = "text" name = "pid"><br>
Date <input type = "date" name = "date"><br>
Temperature <input type = "text" name = "temp"><br>
SpO2 <input type = "text" name = "sp"><br>
Pulse <input type = "text" name = "pulse"><br>
Blood Pressure <input type = "text" name = "bp"><br>
Complaint <input type = "text" name = "comp"><br>
Treatment <input type = "text" name = "treatment"><br>
Remark <input type = "text" name = "rmk"><br>

		<input type = "submit" value = "Add"><br>
</body>
</html>

<?php
include_once("nurse.php");

if(!empty($_REQUEST)) {
$obj = new nurse();

$did = $_REQUEST['id'];
$p_id = $_REQUEST['pid'];
$date = $_REQUEST['date'];
$temp = $_REQUEST['temp'];
$sp = $_REQUEST['sp'];
$pulse = $_REQUEST['pulse'];
$bp = $_REQUEST['bp'];
$com = $_REQUEST['comp'];
$treat = $_REQUEST['treatment'];
$remark = $_REQUEST['rmk'];

$add = $obj->addNewDiagnosis($did,$date,$temp,$sp,$pulse,$bp,$com,$treat,$remark,$p_id);


if ($add) {echo "Data Sucessfully added";}    
else {echo "Could not add data";}

}
?>