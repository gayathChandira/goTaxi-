<?php
session_start();	
	if(isset($_POST['submit'])){
		include_once 'dbh.inc.php';    //connecting to database

		
		$vehicleid = mysqli_real_escape_string($conn, $_POST['vehicle']);
		

		$sql = "DELETE FROM vehicledetails WHERE id='$vehicleid';";
		$result = mysqli_query($conn, $sql);
		header("Location: ../vehicledetails.php?submit=success");
		exit();

	}
?>