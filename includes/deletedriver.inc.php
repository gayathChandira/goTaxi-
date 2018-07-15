<?php
session_start();	
	if(isset($_POST['submit'])){
		include_once 'dbh.inc.php';    //connecting to database

		echo $_POST['driver'] ;
		$driverid = mysqli_real_escape_string($conn, $_POST['driver']);
		

		$sql = "DELETE FROM driverdetails WHERE id='$driverid';";
		$result = mysqli_query($conn, $sql);
		header("Location: ../driverdetails.php?submit=success");
		exit();

	}
?>