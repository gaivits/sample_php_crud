<?php
	
	 $host = 'localhost';
	 $username = 'root';
	 $pass = '';
	 $dbname = 'kando';
	
	$conn = mysqli_connect($host,$username,$pass,$dbname);
	$EmployeeId = $_POST['EmployeeId'];
	$NameNews = $_POST['NameNews'];
	$Status = $_POST['Status'];
	if($Status)
	{
		$Status=1;
	}
	else
	{
		$Status=0;
		
	}
	$Detail = $_POST['Detail'];
	
	
	$UpdatedDate = $_POST['UpdatedDate'];
	
	$ButtonView = $_POST['ButtonView'];
	$ButtonEdit = $_POST['ButtonEdit'];
	$ButtonDelete = $_POST['ButtonDelete'];
	$sql = "INSERT INTO kando (EmployeeId,NameNews,Detail,Status,UpdatedDate,ButtonView,ButtonEdit,ButtonDelete) VALUES ('$EmployeeId','$NameNews','$Detail','$Status','$UpdatedDate','$ButtonView','$ButtonEdit','$ButtonDelete')";
	mysqli_query($conn,$sql);
	header('location:index.php');


?>