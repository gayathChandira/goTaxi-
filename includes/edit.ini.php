<?php
session_start();	
	if(isset($_POST['submit'])){
		include_once 'dbh.inc.php';    //connecting to database
		$iddri = $_POST['iddri'];
		$fname = mysqli_real_escape_string($conn, $_POST['firstname']);
		$lname = mysqli_real_escape_string($conn, $_POST['lastname']);
		$nic = mysqli_real_escape_string($conn, $_POST['nic']);
		$age = mysqli_real_escape_string($conn, $_POST['age']);
		$vehitype = mysqli_real_escape_string($conn, $_POST['vehicletype']);
		$contact = mysqli_real_escape_string($conn, $_POST['contact']);

		$sql = "UPDATE driverdetails SET firstname='$fname',  lastname = '$lname', nic = '$nic',age = '$age',vehicletype = '$vehitype', contact = '$contact' WHERE id = $iddri ";
		$result = mysqli_query($conn, $sql);
		header("Location: ../driverdetails.php?submit=success");
		exit();

	}
?>