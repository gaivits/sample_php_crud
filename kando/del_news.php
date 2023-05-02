<?php
	$host = 'localhost';
	 $username = 'root';
	 $pass = '';
	 $dbname = 'kando';
	$id = $_GET['id'];
	$conn = mysqli_connect($host,$username,$pass,$dbname);
	
	$sql = "delete from kando where NewsId='$id' ";
	mysqli_query($conn,$sql);
	
	?>

