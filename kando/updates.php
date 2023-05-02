<?php
	$host = 'localhost';
	 $username = 'root';
	 $pass = '';
	 $dbname = 'kando';
	$id = $_GET['id'];
	$conn = mysqli_connect($host,$username,$pass,$dbname);
	
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
	$sql = "update kando set NameNews='$NameNews',Detail='$Detail',Status='$Status' where EmployeeId='$id' ";
	mysqli_query($conn,$sql);
	header('location:index.php');
	?>
