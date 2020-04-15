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
<button><a href='nirma2.html'>Delete</a></button>
<br>
<br>
</body>
</html>
";
$sid = filter_input(INPUT_POST,'sid');
$submit = filter_input(INPUT_POST,'submit');

if(!empty($sid)){

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
$sql= "DELETE FROM student1 WHERE Student_id='$sid'";
}
if($conn->query($sql))
{
	echo "Record is deleted successfully";
}
else{
	echo"Not Deleted";
}
}
else{
	echo "Press the button to delete";
	die();
}
?>