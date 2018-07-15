<?php
session_start();	
	if(isset($_POST['submit'])){
		include_once 'dbh.inc.php';    //connecting to database

		$fname = mysqli_real_escape_string($conn, $_POST['firstname']);
		$lname = mysqli_real_escape_string($conn, $_POST['lastname']);
		$nic = mysqli_real_escape_string($conn, $_POST['nic']);
		$age = mysqli_real_escape_string($conn, $_POST['age']);
		$vehitype = mysqli_real_escape_string($conn, $_POST['vehicletype']);
		$contact = mysqli_real_escape_string($conn, $_POST['contact']);

		$sql = "INSERT INTO driverdetails (nic,firstname,lastname,age,contact,vehicletype) 
						VALUES ('$nic','$fname','$lname','$age','$contact','$vehitype')";
		$result = mysqli_query($conn, $sql);
		header("Location: ../driverdetails.php?submit=success");
		exit();

	}
?>