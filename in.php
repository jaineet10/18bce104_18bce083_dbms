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
<button><a href='nirma.html'>Back</a></button>
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
	$update = filter_input(INPUT_POST,'update');
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
	{
		$sql="INSERT INTO `student1`(`Student_name`, `Student_id`, `Age`, `Gender`, `D_no`) VALUES ('$sname','$sid',$age,'$gender',$dno)";
		$sql1="INSERT INTO `hostel`(`Hostel_name`, `Hostel_id`, `Student_id`) VALUES ('$hos',$hosid,'$sid')";

		if( $conn->query($sql) && $conn->query($sql1))
		{
			echo "New record is inserted successfully";
		}
	else
	{
		echo "Error:".$sql."<br>".$conn->error;
	}
	$conn->close();
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
	echo "Student-name should not be empty";
	die();
}
?>