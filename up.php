<?php
echo "
<html>
<body>
<style>
body{
	background-size: cover;
	background-image : url('https://www.instructure.com/sites/default/files/migration/portfolium_landing_pages/background_home.jpg');
	background-attachment: fixed;
    background-repeat: no-repeat;
    }  
</style>
<br>
<br>
<br>
<button><a href='nirma1.html'>Update</a></button>
<br>
<br>
</body>
</html>
";
$sname = filter_input(INPUT_POST,'sname');
$sid = filter_input(INPUT_POST,'sid');
$age = filter_input(INPUT_POST,'age');
$gender = filter_input(INPUT_POST,'gender');
$dno = filter_input(INPUT_POST,'dno');
$dname = filter_input(INPUT_POST,'dname');
$hos = filter_input(INPUT_POST,'hos');
$hosid = filter_input(INPUT_POST,'hosid');
$submit = filter_input(INPUT_POST,'submit');
if(!empty($sname)){
if(!empty($sid)){
if(!empty($age)){
if(!empty($gender)){
if(!empty($dname)){
if(!empty($dno)){
if(!empty($hos)){
if(!empty($hosid)){

$host="localhost";
$db="root";
$dbpass="";
$dbname="hostel management";
$conn = new mysqli ($host,$db,$dbpass,$dbname);

if(mysqli_connect_error()){
die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
}

else
{	$sql = "UPDATE student1 SET Student_name='$_POST[sname]',Student_id='$_POST[sid]', Age=$_POST[age],Gender='$_POST[gender]', D_no=$_POST[dno] WHERE Student_id='$_POST[sid]'";
	$sql1 = "UPDATE hostel SET Hostel_name='$_POST[hos]',Hostel_id=$_POST[hosid],Student_id='$_POST[sid]'";
}
if($conn->query($sql) && $conn->query($sql1)){
	echo "New record is updated successfully";
}
else{
	echo "Error:".$sql."<br>".$conn->error;
}
}
else{
	echo "Hostel-ID should not be empty";
	die();
}
}
else{
	echo "Hostel-name should not be empty";
	die();
}
}
else{
	echo "Department name should not be empty";
	die();
}
}
else{
	echo "Department no should not be empty";
	die();
}
}
else{
	echo "Gender should not be empty";
	die();
}
}
else{
	echo "Age should not be empty";
	die();
}
}
else{
	echo "Student-ID should not be empty";
	die();
}
}
else{
	echo "Press the button to update ";
	die();
}
?>
