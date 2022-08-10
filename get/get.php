<?php
$host = "localhost";
$username = "root";
$password = "";

try 
{
    $conn = new PDO("mysql:host=$host;dbname=student_information", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}

// FORM SUBMITTED DATA CAN ACCESSED BY:
// 1. $_REQUEST : CAN BE USED FOR BOTH get AND post METHOD
// 2. $_POST : CAN BE USED ONLY FOR post METHOD
// 3. $_GET : CAN BE USED ONLY FOR get METHOD

if(isset($_POST['save']))
{
	//print_r($_POST);
	$sql = "INSERT INTO student_info(Student_name, Student_ID,Student_Section, Email) VALUES('".addslashes($_POST['Student_name'])."', '".addslashes($_POST['Student_ID'])."','".addslashes($_POST['Student_Section'])."', '".addslashes($_POST['Email'])."')";
	$conn->query($sql);
}

?>

<html>
	<head>
		<title>PHP Form</title>
		  <meta charset="UTF-8">
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.min.css">
	</head>
	<body style=" background-color:#ef9a9a" ;>
	
	<h1>Student information</h1>
		<form action="" method="post">
			<div> Student_name: <input type="text" name="Student_name" value="" /></div>
			<div> Student_ID: <input type="text" name="Student_ID" value="" /></div>
			<div> Student_Section: <input type="text" name="Student_Section" value="" /></div>
			<div> Email: <input type="text" name="Email" value="" /></div>
			<div>  <input type="submit" name="save" value="Save" /></div>
		</form>
	</body>
</html>